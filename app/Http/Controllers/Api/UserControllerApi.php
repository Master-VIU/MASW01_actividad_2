<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RequestEditValidate;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersList(Request $request)
    {

        $user = User::all();
        $totalUsers = $user->count();
        return response()->json([
            RouteServiceProvider::CODE => RouteServiceProvider::OK,
            'all_users' => $totalUsers,
            RouteServiceProvider::DATA => $user
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEditValidate $request, $id)
    {
        try {
            $request->validated();

            $user = User::findOrFail($id);
            $user->name = strtoupper($request->nombre);
            $user->surnames = strtoupper($request->apellidos);
            $user->dni = strtoupper($request->dni);
            $user->email = $request->email;
            $user->phone = $request->telefono;
            $user->country = $request->pais;
            $user->iban = strtoupper($request->iban);
            $user->over_you = $request->sobreTi;
            $user->createToken('auth_token')->plainTextToken;
            $changes = $user->getDirty();
            $user->save();
            if ($changes) {
                return response()->json([
                    RouteServiceProvider::CODE => RouteServiceProvider::OK,
                    RouteServiceProvider::MESSAGE => "Usuario actualizado con exito",
                    RouteServiceProvider::DATA => $user
                ], Response::HTTP_OK);
            }

        } catch (Throwable $e) {
            return response()->json([
                RouteServiceProvider::CODE => RouteServiceProvider::ERROR,
                RouteServiceProvider::MESSAGE => 'Error, al intentar actualizar el usuario'
            ], Response::HTTP_OK);
        }

        return response()->json(
            [
                RouteServiceProvider::CODE => RouteServiceProvider::INFO,
                RouteServiceProvider::MESSAGE => 'No se realizaron cambios en el usuario'
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json([
                RouteServiceProvider::CODE => RouteServiceProvider::ERROR,
                RouteServiceProvider::MESSAGE => 'El usuario no existe en bbdd.'
            ], Response::HTTP_NOT_FOUND);
        }
        $user->delete();
        return response()->json([
            RouteServiceProvider::CODE => RouteServiceProvider::OK,
            RouteServiceProvider::MESSAGE => 'Usuario eliminado con exito!'
        ], Response::HTTP_OK);
    }
}