<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Article;
use App\Models\Image;
use App\Models\PublicationArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publication::get();
        return view('publicaciones.gestion-publicaciones',compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articulos = Article::get();
        return view('publicaciones.crear-publicaciones',compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
                $resultado = Cloudinary::upload($archivo->getPathName());        
                $url = $resultado->getSecurePath();
                $publicacion = Publication::create([
                    'title'=>$request['title'],
                    'detail' =>$request['detail'],
                    'initDate'=>$request['initDate'],
                    'finDate'=>$request['finDate'],
                    'economic_contribution'=>$request['contribucion'],
                    'center_id'=>auth()->id(),
                    'imagen'=>$url,
                ]);
            $articulos = $request['articulos'];
                for($i=0;$i<count($articulos);$i++){
                    $publicacionArticulo = PublicationArticle::create([
                        'publication_id' =>$publicacion->id,
                        'article_id' =>$articulos[$i],
                        'meta'=>0,
                    ]);
                }
           
        }
        
        return redirect()->route('publicaciones')->with('success','Se Creo con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $publicacion = Publication::find($id);
        $articulos = PublicationArticle::where('publication_id', $publicacion->id)->get();
        $ListaArticulos = Article::get();

        foreach ($articulos as $articulo) {
            foreach ($ListaArticulos as $listaArticulo) {
                if ($listaArticulo->id == $articulo->id) {
                    $articulo->nombre = $listaArticulo->name;
                    $imagen = Image::where('article_id', $articulo->id)->first();

                    if ($imagen) {
                        $articulo->imagen = $imagen->url;
                    } else {
                        $articulo->imagen = null;

                    }
                }
            }
        }

            //dd($articulos);
        return view('publicaciones.show-publicaciones',compact('publicacion','articulos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulos = Article::where('state',1)->get();
        $publicacion = Publication::find($id);
        return view('publicaciones.editar-publicaciones',compact('articulos','publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicacion = Publication::find($id);
            if($publicacion){
                $publicacion->title=$request['title'];
                $publicacion->economic_contribution=$request['contribucion'];
                $publicacion->detail=$request['detail'];
                $publicacion->initDate=$request['initDate'];
                $publicacion->finDate=$request['finDate'];
                $publicacion->save();
            }
            return redirect()->route('publicaciones')->with('success',"Acutalizado con Exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cambiarEstado(string $id){
        $publicacion = Publication::find($id);
            if($publicacion){
                $publicacion->state=!$publicacion->state;
                $publicacion->save();    
            }
        return redirect()->route('publicaciones')->with('success','Actualizado con Exito');
    }
}
