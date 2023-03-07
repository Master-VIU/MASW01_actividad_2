<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;
use Validator;

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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:20',
            'apellidos' => 'required|min:2|max:40|regex:/^[\pL\s]+$/u',
            'dni' => 'required|max:9|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i',
            'email' => 'required|regex:/^.+@.+$/i|unique:users',
            'contraseña' => 'required:min:8|alpha_num',
            'confirmarContraseña' => 'required|same:contraseña',
            'telefono' => 'min:9|max:12|nullable',
            'pais' => 'alpha|nullable',
            'iban' => 'alpha_num|min:24|max:30|required',
            'sobreTi' => 'min:20|max:250|alpha|nullable'
        ]);

        $user = new User;
        $user->name = $request->nombre;
        $user->surnames = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->password = Hash::make($request->contraseña);
        $user->phone = $request->telefono;
        $user->country = $request->pais;
        $user->iban = $request->iban;
        $user->over_you = $request->sobreTi;
        $user->save();

        return Redirect::to('users/index')->with('success', 'El usuario ha sido creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.index', $user);
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
        // return view('users/edit', ['user' => $user]);
        return View::make('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->nombre;
        $user->surnames = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->phone = $request->telefono;
        $user->country = $request->pais;
        $user->iban = $request->iban;
        $user->over_you = $request->sobreTi;
        $changes = $user->getDirty();
        $user->save();
        if ($changes) {
            return Redirect::to('users/index')->with('success', 'El usuario ha sido modificado correctamente.');
        }
        return Redirect::to('users/index')->with('warning', 'No se han actualizado datos.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Redirect::to('users/index')->with('warning', 'El usuario ha sido eliminado correctamente.');
    }
}