<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEditValidate;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $data = json_decode($users);

        return view('users.index', ['data' => $data]);

    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return View::make('users.edit')->with('user', $user);
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
        $changes = $user->getDirty();
        $user->save();
        if ($changes) {
            return Redirect::to('users/index')->with('success', 'El usuario ha sido modificado correctamente.');
        }
        return Redirect::to('users/index')->with('danger', 'No se han actualizado datos.');


    }

}