<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        
        return view('roles.gestionar-roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   // aqui deberian ir los permisos;
        $permisos = Permission::all();
        return view('roles.crear-roles',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permisos = $request['permisos'];
        $rol = Role::where('name', $request['nombre'])->first();
            if($rol){
                return redirect()->route('roles')->with('success',"Se creo rol con exito");
            }
            $role = Role::create([
                'name'=>$request['nombre'],
            ]);
            for($i=0;$i<count($permisos);$i++){
                $permiso = Permission::findOrFail($permisos[$i]);
                $role->givePermissionTo($permiso);
            }

        return redirect()->route('roles')->with('success',"Se creo rol con exito");
    }


    public function cambiarEstado(string $id){
        $rol = Role::find($id);
        if ($rol) {
          
            $rol->state = !$rol->state;
            $rol->save();
            return redirect()->route('roles')->with('success', 'Estado del usuario actualizado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'El usuario no existe.');
        }
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
        $rol = Role::find($id);
        $permisos = Permission::all();
        for($i=0;$i<count($permisos);$i++){
            $cadena = "";
            if($rol->hasAnyPermission($permisos[$i]->name)){
                $permisos[$i]->active=true;
                $cadena.=$permisos[$i]->name."\n";
            }
        }
        return view('roles.editar-roles',compact('rol','permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Role::find($id);
        $permisos = $request['permisos'];
        for($i=0;$i<count($permisos);$i++){
            $permiso = Permission::find($permisos[$i]);
            $rol->givePermissionTo($permiso);
        }
            if($rol){
                $rol->name=$request['nombre'];
                $rol->save();
            }
            return redirect()->route('roles')->with('success', 'Estado del usuario actualizado exitosamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
