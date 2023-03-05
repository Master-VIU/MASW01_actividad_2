<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        //return view('index');
       // dd(response()->json($users));
        return view('users.index')->with('data', response()->json($users));
        //return response()->json($users);
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

        //return back();
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}