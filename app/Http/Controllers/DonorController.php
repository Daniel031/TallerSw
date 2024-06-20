<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donantes = Donor::get();
        return view('donadores.gestionar-donadores',compact('donantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('donadores.crear-donantes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs =$request->all();
        $donante = Donor::create($inputs);
        return redirect()->route('donantes')->with("success","Creado con Exito");
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
        $donante = Donor::find($id);
        return view('donadores.editar-donantes',compact('donante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donante = Donor::find($id);    
        $donante->name=$request['name'];
        $donante->email=$request['email'];
        $donante->born_date=$request['born_date'];
        $donante->save();
        return redirect()->route('donantes')->with('success',"Acutalizado con Exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cambiarEstado(string $id){
        $donante = Donor::find($id);
            if($donante){
                $donante->state=!$donante->state;
                $donante->save();
            }
        return redirect()->route('donantes')->with('success',"Actualizado con exito");
    }
}
