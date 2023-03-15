<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RequestValidateApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthControllerApi extends Controller
{
    public function register(RequestValidateApi $request)
    {
        $request->validated();

        $user = new User;
        $user->name = strtoupper($request->nombre);
        $user->surnames = strtoupper($request->apellidos);
        $user->dni = strtoupper($request->dni);
        $user->email = $request->email;
        $user->password = Hash::make($request->contraseña);
        $user->phone = $request->telefono;
        $user->country = $request->pais;
        $user->iban = strtoupper($request->iban);
        $user->over_you = $request->sobreTi;
        $user->save();
        $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'code' => "201", 
            "message" => "El usuario ha sido creado correctamente.",
            "user" => $user
        ], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'code' => "401", 
                'message' => __('auth.failed')
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'code' => "200",
            'token_type' => 'Bearer',
            'access_token' => $token,            
            'message' => 'Usuario logueado con éxito.'
        ], Response::HTTP_OK);
    }



    public function usersList(Request $request)
    {

        $user = User::all();
        return response()->json([
            'code' => '200',
            "users" => "OK",
            "data" => $user
        ], Response::HTTP_OK);
    }

}