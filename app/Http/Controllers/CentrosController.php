<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Center;
use App\Models\Resource;
use App\Models\AdministrorCenter;
use Illuminate\Http\Request;

class CentrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centros = Center::get();
        return view('centros.gestion-centros',compact('centros'));
    }


    public function cambiarEstado(string $id){
        $centro = Center::find($id);
            if($centro){
                $centro->state=!$centro->state;
                $centro->save();
                return redirect()->back()->with('success',"Actualizado con exito");
            }else{
                return redirect()->back()->with('error', 'Error, centro no existe');
            }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$administradores = Administrator::all();    // esto enviar para seleccionar el ADM del centro.
      
        return view('centros.crear-centros');   // enviar aqui.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('foto1') && !$request->hasFile('foto2')){
            return redirect()->back()->with('error', 'La solicitud debe contener una imagen');
        }
        
        $centro = Center::create([
            'name'=>$request['nombre'],
            'description'=>$request['descripcion'],
            'address'=>$request['direccion'],
        ]);

        $archivos = $request->file();

        if ($archivos) {
            
            foreach ($archivos as $archivo) {
                $resultado = Cloudinary::upload($archivo->getPathName());        
                $url = $resultado->getSecurePath();
                Resource::create([
                    'center_id'=>$centro->id,
                    'url'=>$url,  
                ]);
                
            }
        }
        return redirect()->route('centros');
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
        $centro = Center::find($id);
        $resources = Resource::where('center_id',$id)->get();
        return view('centros.editar-centros',compact('centro','resources'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $centro = Center::find($id);
        $inputs = $request->all();
        $centro->name=$inputs['nombre'];
        $centro->description =$inputs['descripcion'];
        $centro->address = $inputs['direccion'];
        $centro->save();
        $resources = Resource::where('center_id',$centro->id)->get();
        $foto1=$request['foto1'];
        $foto2=$request['foto2'];
        $x=true;
            foreach($resources as $resource){
                if($x){
                    $resultado = Cloudinary::upload($foto1->getPathName());        
                    $url = $resultado->getSecurePath();
                    $resource->url=$url;
                    $resource->save();
                    $x=!$x;
                }else{
                    $resultado = Cloudinary::upload($foto2->getPathName());        
                    $url = $resultado->getSecurePath();
                    $resource->url=$url;
                    $resource->save();
                }
               
            }
            return redirect()->route('centros'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
