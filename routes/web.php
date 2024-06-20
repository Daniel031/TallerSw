<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SucursalController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['middleware' => 'auth'], function () {
    Route::get('/usuarios',[UserController::class,'index'])->name('usuarios');
    Route::get('/crearUsuarios',[UserController::class,'create'])->name("crear");
    Route::get('/editar/{id}',[UserController::class,'edit'])->name('editar');
    Route::get('/actualizarUsuario/{id}',[UserController::class,'cambiarEstado'])->name('actualizar');
    Route::post('/storeUser',[UserController::class,'store'])->name('almacenar');
    Route::put('/actualizar/{id}',[UserController::class,'update'])->name('updat');



    
    
});


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::get('/create-role',[RoleController::class,'create'])->name('crear-rol');
    Route::post('/store',[RoleController::class,'store'])->name('store-rol');
    Route::get('/edit-role/{id}',[RoleController::class,'edit'])->name('editar-rol');
    Route::put('/actualizar-role/{id}',[RoleController::class,'update'])->name('actualizar-rol');
    Route::get('/cambiarEstado/{id}',[RoleController::class,'cambiarEstado'])->name('actualizar-estado-rol');
});



Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/centros',[CentrosController::class,'index'])->name('centros');
    Route::get('/crear-centro',[CentrosController::class,'create'])->name('crear-centro');
    Route::get('/edit-centro/{id}',[CentrosController::class,'edit'])->name('editar-centro');
    Route::get('/actualizar-estado-centro/{id}',[CentrosController::class,'cambiarEstado'])->name('cambiarEstadoCentro');
    Route::post('/update-centro/{id}',[CentrosController::class,'update'])->name('actualizar-centro');
    Route::post('/store-centro',[CentrosController::class,'store'])->name('store-centro');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/ver-centros',[CentrosController::class,'show'])->name('centros.show');
});

  Route::get('/vista-centro/{center}',[CentrosController::class,'main'])->name('centros.main');




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/sucursales',[SucursalController::class,'index'])->name('sucursales');
    Route::get('/crear-sucursal',[SucursalController::class,'create'])->name('crear-sucursal');
    Route::get('/edit-sucursal/{id}',[SucursalController::class,'edit'])->name('edit-sucursal');
    Route::get('/actualizar-estado-sucursal/{id}',[SucursalController::class,'cambiarEstado'])->name('cambiarEstadoSucursal');
    Route::post('/update-sucursal/{id}',[SucursalController::class,'update'])->name('update-sucursal');
    Route::post('/store-sucursal',[SucursalController::class,'store'])->name('store-sucursal');
});

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/categorias',[CategoryController::class,'index'])->name('categorias');
    Route::get('/crear-categoria',[CategoryController::class,'create'])->name('crear-categoria');
    Route::get('/edit-categoria/{id}',[CategoryController::class,'edit'])->name('edit-categoria');
    Route::get('/actualizar-estado-categoria/{id}',[CategoryController::class,'cambiarEstado'])->name('cambiarEstadoCategoria');
    Route::post('/update-categoria/{id}',[CategoryController::class,'update'])->name('update-categoria');
    Route::post('/store-categoria',[CategoryController::class,'store'])->name('store-categoria');
});


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/articulos',[ArticleController::class,'index'])->name('articulos');
    Route::get('/crear-articulo',[ArticleController::class,'create'])->name('crear-articulo');
    Route::get('/edit-articulo/{id}',[ArticleController::class,'edit'])->name('edit-articulo');
    Route::get('/actualizar-estado-articulo/{id}',[ArticleController::class,'cambiarEstado'])->name('cambiarEstadoArticulo');
    Route::post('/update-articulo/{id}',[ArticleController::class,'update'])->name('update-articulo');
    Route::post('/store-articulo',[ArticleController::class,'store'])->name('store-articulo');
});



Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/publicaciones',[PublicationController::class,'index'])->name('publicaciones');
    Route::get('/crear-publicacion',[PublicationController::class,'create'])->name('crear-publicacion');
    Route::get('/edit-publicacion/{id}',[PublicationController::class,'edit'])->name('edit-publicacion');
    Route::get('/actualizar-estado-publicacion/{id}',[PublicationController::class,'cambiarEstado'])->name('cambiarEstadoPublicacion');
    Route::post('/update-publicacion/{id}',[PublicationController::class,'update'])->name('update-publicacion');
    Route::post('/store-publicacion',[PublicationController::class,'store'])->name('store-publicacion');
    Route::get('/show-publicacion/{id}',[PublicationController::class,'show'])->name('show-publicacion');
});


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/donaciones',[DonationController::class,'index'])->name('donaciones');
    Route::get('/publicaciones-donaciones',[DonationController::class, 'listaPublicaciones'])->name('publicaciones-donaciones');
    Route::get('/crear-donacion/{id}',[DonationController::class,'create'])->name('crear-donacion');
    Route::get('/edit-donacion/{id}',[DonationController::class,'edit'])->name('edit-donacion');
    Route::get('/actualizar-estado-donacion/{id}',[DonationController::class,'cambiarEstado'])->name('cambiarEstadoDonacion');
    Route::post('/update-donacion/{id}',[DonationController::class,'update'])->name('update-donacion');
    Route::post('/store-donacion',[DonationController::class,'store'])->name('store-donacion');
    Route::get('/show-donacion/{id}',[DonationController::class,'show'])->name('show-donacion');
    Route::get('/detalles-donaciones/{id}',[DonationController::class, 'detalles'])->name('detalles-donaciones');

});




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/donantes',[DonorController::class,'index'])->name('donantes');
    Route::get('/publicaciones-donantes',[DonorController::class, 'listaPublicaciones'])->name('publicaciones-donantes');
    Route::get('/crear-donante',[DonorController::class,'create'])->name('crear-donante');
    Route::get('/edit-donante/{id}',[DonorController::class,'edit'])->name('edit-donante');
    Route::get('/actualizar-estado-donante/{id}',[DonorController::class,'cambiarEstado'])->name('cambiarEstadoDonante');
    Route::post('/update-donante/{id}',[DonorController::class,'update'])->name('update-donante');
    Route::post('/store-donante',[DonorController::class,'store'])->name('store-donante');
    Route::get('/show-donante/{id}',[DonorController::class,'show'])->name('show-donante');

});






