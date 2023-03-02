<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Validator;

class UserController extends Controller
{

    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //users = $this->users->getUsers();
        $users = User::all();
        return response()->json($users);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:20',
            'surnames' => 'required|min:2|max:40|alpha',
            'dni' => 'required|max:9',
            'email' => 'required|regex:/^.+@.+$/i|unique:users',
            'password' => 'required:min:8|alpha_num',
            'confirmPassword' => 'required|same:password',
            'phone' => 'min:9|max:12',
            'country' => 'alpha',
            'iban' => 'required',
            'overYou' => 'min:20|max:250|alpha'
        ]);

        if ($validator->fails()) {
            return redirect('users/error')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;
        $user->name = $request->get('name');
        $user->surnames = $request->surnames;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->iban = $request->iban;
        $user->over_you = $request->overYou;
        $user->save();

        //return back();
        return redirect()->route('users.create')->with('success', 'Usuario creado correctamente');
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