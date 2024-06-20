<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos =Article::get();
        return view('articulos.gestion-articulos',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::get();
        return view('articulos.crear-articulos',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $inputs = $request->all();

        if(Auth::check()){
            $articulo = Article::create([
                'name'=>$inputs['nombre'],
                'description'=>$inputs['descripcion'],
                'category_id'=>$inputs['category'],
                'type_article'=>$inputs['tipo_articulo'],
                'center_id'=> auth()->id(),
            ]);
        }else{
            dd(auth());
        }
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $resultado = Cloudinary::upload($archivo->getPathName());        
            $url = $resultado->getSecurePath();
            $imagen = Image::create([
                'article_id'=>$articulo->id,
                'url'=>$url,
            ]);

        return redirect()->route('articulos')->with('successs','Se Creo con Exito');
        }else{
            return redirect()->route('articulos')->with('wrong','Error inserte Imagen');
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
        $articulo = Article::find($id);
        $categorias = Category::where('state',1)->get();
        return view('articulos.editar-articulos',compact('articulo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Article::find($id);
            if($articulo){
                if($request->hasFile('foto')){
                    
                    
                    $archivo = $request->file('foto');
                    $resultado = Cloudinary::upload($archivo->getPathName());        
                    $url = $resultado->getSecurePath();
                    $image = Image::where('article_id',$articulo->id)->first();
                    $image->url=$url;
                    $image->save();

                    
                }
                    $articulo->name=$request['nombre'];
                    $articulo->description=$request['descripcion'];
                    $articulo->category_id=$request['category'];
                    $articulo->type_article=$request['tipo_articulo'];
                    $articulo->center_id=auth()->id();
                    $articulo->save();
                
            }
        return redirect()->route('articulos')->with('success',"Actualizado con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cambiarEstado(string $id){
        $articulo = Article::find($id);
            if($articulo){
                $articulo->state = !$articulo->state;
                $articulo->save();
                return redirect()->route('articulos')->with('success',"se actualizo con exito");
            }
        return redirect()->route('articulos')->with('success',"Error al actualizar");
    }

}
