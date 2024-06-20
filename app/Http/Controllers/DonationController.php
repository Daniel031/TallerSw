<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\PublicationArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use App\Models\DonationArticle;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publication::get();
        return view('donaciones.gestionar-donaciones',compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $articulos_publicaciones = PublicationArticle::where('publication_id',$id)->get();
        $articulos  = array();
        //se deben pasar los donantes igual.
        
        $donantes = Donor::get();

            foreach($articulos_publicaciones as $articulo){
                $item  = Article::find($articulo->article_id);
                array_push($articulos, $item);
            }
        //dd($articulos);
        return view('donaciones.crear-donaciones',compact('articulos','id','donantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $articulos = $request['articulos_seleccionados'];
        $datos = json_decode($articulos, true);
        //dd($datos);
        $fechaActual=Carbon::now();
        $donacion = Donation::create([
            'type_donation'=>'P',
            'economic_contribution'=>0,
            'publication_id'=>$request['publicacion_id'],
            'donation_date'=>$fechaActual,
            'donor_id'=>$request['donante_id'],
            'sucursal_id'=>auth()->id(),
        ]);
        foreach($datos as $dato){
            $donation_article = DonationArticle::create([
                'donation_id'=>$donacion->id,
                'article_id'=>$dato['id'],
                'amount'=>$dato['cantidad'],
            ]);
        }
        return redirect()->route('donaciones')->with("success","Donacion exitosa");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
