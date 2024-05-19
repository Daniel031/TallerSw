<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Center;
use App\Models\Location;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        $centros = Center::all();
            foreach($sucursales as $sucursal){
                foreach($centros as $centro){
                     if($centro->id == $sucursal->center_id){
                        $sucursal->name_center=$centro->name;
                       // dd($sucursal->name_center);
                     }
                }
            }
        return view('sucursales.gestion-sucursales',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centros = Center::where('state',1)->get();
        return view('sucursales.crear-sucursales',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        //dd($inputs);
            if($request->hasFile('foto')){
                $archivo = $request->file('foto');
                $resultado = Cloudinary::upload($archivo->getPathName());        
                $url = $resultado->getSecurePath();
                $sucursal = Sucursal::create([
                    'name'=>$inputs['nombre'],
                    'description'=>$inputs['descripcion'],
                    'center_id'=>$inputs['centro'],
                    'image'=>$url,
                    
                ]);
                $location = Location::create([
                    'latitude'=>$inputs['latitude'],
                    'longitude'=>$inputs['longitude'],
                    'sucursal_id'=>$sucursal->id,
                ]);
                return redirect()->route('sucursales');

            }else{
                return redirect()->back()->with('error',"Inserte una imagen");
            }
    }

    public function cambiarEstado(string $id){
        $sucursal = Sucursal::find($id);
            if($sucursal){
                $sucursal->state=!$sucursal->state;
                $sucursal->save();
                return redirect()->back()->with('success',"Actualizado con exito");
            }

            return redirect()->back()->with('error', 'Error, sucursal no existe');

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
        $sucursal =Sucursal::find($id);
        $locations = Location::where('sucursal_id',$id)->first();

        //dd($locations);
        $centros = Center::where('state',1)->get();
        return view("sucursales.editar-sucursale",compact('sucursal','locations','centros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sucursal =Sucursal::find($id);
            if($sucursal){
              $sucursal->name=$request['nombre'];
              $sucursal->description = $request['descripcion'];
                if($request->hasFile('foto')){
                    $archivo = $request->file('foto');
                    $resultado = Cloudinary::upload($archivo->getPathName());        
                    $url = $resultado->getSecurePath();
                    $sucursal->image=$url;
                }
               $location = Location::where('sucursal_id',$sucursal->id)->first();
                if($location){
                    $location->latitude=$request['latitude'];
                    $location->longitude=$request['longitude'];
                }
                $sucursal->save();
                $location->save();

                return redirect()->route('sucursales');
            }
            return redirect()->back()->with('error', 'Error, sucursal no existe');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
