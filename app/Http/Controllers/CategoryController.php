<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::get();
        return view('categorias.gestion-categorias',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.crear-cetegorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $newCategory = Category::create([
            'name'=>$datos['nombre'],
        ]);
        return redirect()->route('categorias')->with('success',"Creado con Exito");
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
        $categoria = Category::find($id);
        return view('categorias.editar-categorias',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Category::find($id);
            if($categoria){
                $categoria->update([
                    'name'=>$request['nombre'],
                ]);
                //$categoria->save();
            }
            return redirect()->route('categorias')->with("success","Acutalizado con Exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cambiarEstado(string $id){
        $categoria = Category::find($id);
            if($categoria){
                $categoria->state=!$categoria->state;
                $categoria->save();
            }
        return redirect()->route('categorias')->with("success","ACtualizado con exito");
    }
}
