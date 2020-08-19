<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar los datos del formulario
      $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:users|email|max:255',
        'password' => 'required|between:8,255|confirmed',
        'password_confirmation' => 'required',
        'view'=>'required'
     
    ]);  

    // con el confirmed sabe que debe ser igual a password_confirmation del formulario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; //primer email es de la DB el segundo email es del Formunario name='email'
        $user->password = Hash::make($request->password);
        $user->view=$request->view;
       // dd($user->view);
        $user->save();
        return redirect('/users')->with('message', 'User Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        //validar los datos del formulario
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
            'view'=>'required'
         
        ]);  
        $user->name = $request->name;
        $user->email = $request->email;
        $user->view=$request->view; //primer email es de la DB el segundo email es del Formunario name='email'
        if($request->password !=null){
            $user->password = Hash::make($request->password);
            
        }
        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       
       $user->delete();
        return redirect('/users');
    }
}
