<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\SucursalController;

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







