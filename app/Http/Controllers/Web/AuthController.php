<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RequestValidationLogin;
use App\Http\Requests\Web\RequestValidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestValidate $request)
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

        return Redirect::to('users/login')->with('success', 'El usuario ha sido creado correctamente.');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(RequestValidationLogin $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('users/index');
        }

        return Redirect::to('users/login')->with('danger', __('auth.failed'));

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('users/login')->with('success', __('auth.succesful'));
    }

}