<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("usuarios.gestion-usuarios",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.crear-usuarios');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $user = User::create([
        'name'=>$request['nombre'],
        'email'=>$request['email'],
        'email_verified_at'=> Carbon::now(),
        'password'=>$request['nombre']."123",
       ]);
       return redirect()->route('usuarios')->with('success', 'Estado del usuario actualizado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('usuarios.editar-usuario',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estado = $request['nombre'];
        $user = User::find($id);
        $user->name=$request['nombre'];
        $user->email=$request['email'];
        $user->password=$request['password'];
        $user->save();
        return redirect()->route('usuarios')->with('success', 'Usuario Actualizado');
        
    }


    public function cambiarEstado(string $id){

        $user = User::find($id);
        if ($user) {
          
            $user->state = !$user->state;
            $user->save();
            return redirect()->route('usuarios')->with('success', 'Estado del usuario actualizado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'El usuario no existe.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
