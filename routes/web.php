<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('storage-link',function(){
    Artisan::call('storage-link');
});
Route::post('solicitarPresupuesto','ContactoController@presupuesto');
Route::post('buscar','ProductosController@buscar')->name('buscar');
Route::post('consulta','ContactoController@enviarConsulta')->name('consulta');
Route::get('/','InicioController@vistaInicio')->name('inicio');
Route::get('barandas','BarandasController@vistaBaranda')->name('barandas');
Route::get('baranda/{id}','BarandasController@show')->name('baranda');
Route::get('empresa','EmpresaController@vistaEmpresa')->name('empresa');
Route::get('contacto','ContactoController@vistaContacto')->name('contacto');
Route::get('categorias','CategoriasController@vistaCategorias')->name('categorias');
Route::get('categoria/{id}','CategoriasController@show')->name('categoria');
Route::get('subcategoria/{id}','SubCategoriasController@show')->name('subcategoria');
Route::get('producto/{id}','ProductosController@show')->name('producto');
Route::get('servicios','ServiciosController@show')->name('servicios');
Route::post('formularioServicios','ServiciosController@formularioServicios')->name('servicio.consulta');
Route::get('clientes','ClientesController@vistaClientes')->name('clientes');
Route::get('videos','VideosController@vistaVideo')->name('videos');
Route::get('presupuesto','ProductosController@vistaPresupuesto')->name('presupuesto');
Route::get('contacto','ContactoController@vistaContacto')->name('contacto');
Auth::routes();

Route::get('adm',function(){
    return redirect('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

     //Inicio
     Route::get('home/sliders','SlidersController@EditarSlidersInicio')->name('inicio.sliders');
     Route::post('home/agregarslider','SlidersController@AgregarSlider');
     Route::get('home/editarslider/{id}','SlidersController@EditarSlider');
     Route::delete('home/eliminarslider/{id}','SlidersController@EliminarSlider');
     Route::put('home/actualizarslider/{id}','SlidersController@ActualizarSlider');
     Route::get('home/inicio/editarInicio','InicioController@editarInicio')->name('inicio.editarContenido');
     Route::put('home/inicio/actualizarSeccionInicio','InicioController@actualizarSeccionInicio')->name('inicio.actualizarSeccionInicio');
     Route::put('home/inicio/actualizarProdInicio','InicioController@actualizarProdInicio')->name('inicio.actualizarProdInicio');
     Route::post('home/inicio/agregarImagen','InicioController@AgregarImagen');
     Route::get('home/inicio/editarGaleria/{id}','InicioController@EditarImagen');
     Route::put('home/inicio/actualizarGaleria/{id}','InicioController@ActualizarImagen');
     Route::delete('home/inicio/eliminarGaleria/{id}','InicioController@EliminarImagen');
     //Mamparas
     Route::resource('home/edit/mamparas', 'MamparasController');
     Route::prefix('home/mamparas')->group(function () {
         Route::get('sliders','MamparasController@sliders')->name('mamparas.sliders');
         Route::get('editarContenido','MamparasController@editarContenido')->name('mamparas.editarContenido');
         Route::put('actualizarContenido','MamparasController@actualizarContenido')->name('mamparas.actualizarContenido');
         Route::post('agregarslider','SlidersController@AgregarSlider');
         Route::get('editarslider/{id}','SlidersController@EditarSlider');
         Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
         Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
     });
     //Barandas
    Route::prefix('home/barandas')->group(function () {
        Route::get('sliders','BarandasController@sliders')->name('barandas.sliders');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
        Route::get('editarContenido','BarandasController@editarContenido')->name('barandas.editarContenido');
        Route::put('actualizarContenido','BarandasController@actualizarContenido')->name('barandas.actualizarContenido');
        Route::get('/','BarandasController@index')->name('barandas.index');
        Route::get('crearBaranda','BarandasController@create')->name('barandas.create');
        Route::post('crearBaranda','BarandasController@store')->name('barandas.store');
        Route::get('editarBaranda/{id}','BarandasController@edit')->name('barandas.edit');
        Route::put('actualizarBaranda/{id}','BarandasController@update')->name('barandas.update');
        Route::delete('eliminarBaranda/{id}','BarandasController@delete');
    });
    //HidroMasajes
    Route::prefix('home/hidromasajes')->group(function () {
        Route::get('sliders','HidroMasajesController@sliders')->name('hidromasajes.sliders');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
        Route::get('editarContenido','HidroMasajesController@editarContenido')->name('hidromasajes.editarContenido');
        Route::put('actualizarContenido','HidroMasajesController@actualizarContenido')->name('hidromasajes.actualizarContenido');
        Route::get('/','HidroMasajesController@index')->name('hidromasajes.index');
        Route::get('crearHidromasaje','HidromasajesController@create')->name('hidromasajes.create');
        Route::post('crearHidromasaje','HidromasajesController@store')->name('hidromasajes.store');
        Route::get('editarHidromasaje/{id}','HidromasajesController@edit')->name('hidromasajes.edit');
        Route::put('actualizarHidromasaje/{id}','HidromasajesController@update')->name('hidromasajes.update');
        Route::delete('eliminarHidromasaje/{id}','HidromasajesController@delete');            
    });
     //Platos de Ducha
     Route::resource('home/edit/platos', 'PlatosController');
     Route::prefix('home/platos')->group(function () {
         Route::get('sliders','PlatosController@sliders')->name('platos.sliders');
         Route::get('editarContenido','PlatosController@editarContenido')->name('platos.editarContenido');
         Route::put('actualizarContenido','PlatosController@actualizarContenido')->name('platos.actualizarContenido');
         Route::post('agregarslider','SlidersController@AgregarSlider');
         Route::get('editarslider/{id}','SlidersController@EditarSlider');
         Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
         Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
     });
    //Vanitorys
    Route::prefix('home/vanitorys')->group(function () {
        Route::get('sliders','VanitorysController@sliders')->name('vanitorys.sliders');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
        Route::get('editarContenido','VanitorysController@editarContenido')->name('vanitorys.editarContenido');
        Route::put('actualizarContenido','VanitorysController@actualizarContenido')->name('vanitorys.actualizarContenido');
        Route::get('/','VanitorysController@index')->name('vanitorys.index');
        Route::get('crearVanitory','VanitorysController@create')->name('vanitorys.create');
        Route::post('crearVanitory','VanitorysController@store')->name('vanitorys.store');
        Route::get('editarVanitory/{id}','VanitorysController@edit')->name('vanitorys.edit');
        Route::put('actualizarVanitory/{id}','VanitorysController@update')->name('vanitorys.update');
        Route::delete('eliminarVanitory/{id}','VanitorysController@delete');    
    });
    //Espejos
    Route::resource('home/edit/espejos', 'EspejosController');
     Route::prefix('home/espejos')->group(function () {
         Route::get('sliders','EspejosController@sliders')->name('espejos.sliders');
         Route::get('editarContenido','EspejosController@editarContenido')->name('espejos.editarContenido');
         Route::put('actualizarContenido','EspejosController@actualizarContenido')->name('espejos.actualizarContenido');
         Route::post('agregarslider','SlidersController@AgregarSlider');
         Route::get('editarslider/{id}','SlidersController@EditarSlider');
         Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
         Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
     });
     //InteriorPlacard
    Route::resource('home/edit/placard', 'InteriorPlacardController');
    Route::prefix('home/placard')->group(function () {
        Route::get('sliders','InteriorPlacardController@sliders')->name('placard.sliders');
        Route::get('editarContenido','InteriorPlacardController@editarContenido')->name('placard.editarContenido');
        Route::put('actualizarContenido','InteriorPlacardController@actualizarContenido')->name('placard.actualizarContenido');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
    });
    //Proyectos
    Route::resource('home/edit/proyectos', 'ProyectosController');
    Route::prefix('home/proyectos')->group(function () {
        Route::get('sliders','ProyectosController@sliders')->name('proyectos.sliders');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
    });
     //Contacto
    Route::group(['prefix' => 'home/contacto'], function () {
        Route::get('editarcontenido','ContactoController@Editarcontenido')->name('contacto.contenido');
        Route::get('editarContacto/{id}','ContactoController@EditarContacto');
        Route::put('actualizarContacto/{id}','ContactoController@ActualizarContacto');
        Route::put('actualizarIconoSup/{id}','ContactoController@actualizarIconoSup');
        Route::put('actualizarIconoInf/{id}','ContactoController@actualizarIconoInf');
        Route::put('home/contacto/actualizarPoliticas','ContactoController@actualizarPoliticas')->name('contacto.politicas');
    });
   
    //Usuarios
     Route::group(['prefix' => 'home/usuarios'], function () {    
     Route::get('/','UsuariosController@index')->name('usuarios.index');
     Route::post('crearusuario','UsuariosController@store');
     Route::get('verusuarios','UsuariosController@verUsuarios')->name('verusuarios');
     Route::get('editarusuario/{id}','UsuariosController@edit');
     Route::put('actualizarusuario/{id}','UsuariosController@update');
     Route::delete('eliminarusuario/{id}','UsuariosController@destroy');
    });
    //Metadatos
    Route::group(['prefix' => 'home/metadatos'], function () {
        Route::get('vercontenido','MetadatosController@show')->name('vermetadatos');
        Route::get('editarmetadato/{id}','MetadatosController@edit');
        Route::put('actualizarmetadato/{id}','MetadatosController@update');
    });
});
