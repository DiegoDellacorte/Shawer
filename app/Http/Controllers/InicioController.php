<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Galeria;
use App\Models\ImagenPrincipal;
use App\Models\InicioServicio;
use App\Models\Logos;
use App\Models\Metadato;
use App\Models\Producto;
use App\Models\ProductoInicio;
use App\Models\SeccionInicio;
use App\Models\Sliders;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function editarInicio(){
        $seccionInicio=ImagenPrincipal::find(1);
        $productoInicio= ProductoInicio::all()->first();
        $galeria=Galeria::orderby('orden',"ASC")->get();
        return view('admin.inicio.editarInicio',compact('seccionInicio','productoInicio','galeria'));

    }
    public function actualizarSeccionInicio(Request $request){
        $seccionInicio=ImagenPrincipal::find(1);
        if($request->has('imgInicio')){
            Storage::delete($seccionInicio->imagen);
            $seccionInicio->imagen= $request->file('imgInicio')->store('images/inicio');
        }
        if($seccionInicio->update($request->all())){
            return back()->with('success','Contenido Actualizado');
        }else{
            return back()->with('error','Algo salió mal');
        }
    }
    public function actualizarProdInicio(Request $request){
        $productoInicio= ProductoInicio::all()->first();
        if($request->has('img_Produno')){
            Storage::delete($productoInicio->imagen);
            $productoInicio->img_uno= $request->file('img_Produno')->store('images/inicio');
        }
        if($request->has('img_Proddos')){
            Storage::delete($productoInicio->img_dos);
            $productoInicio->img_dos= $request->file('img_Proddos')->store('images/inicio');
        }
        if($request->has('img_Prodtres')){
            Storage::delete($productoInicio->img_tres);
            $productoInicio->img_tres= $request->file('img_Prodtres')->store('images/inicio');
        }
        if($request->has('img_Prodcuatro')){
            Storage::delete($productoInicio->img_cuatro);
            $productoInicio->img_cuatro= $request->file('img_Prodcuatro')->store('images/inicio');
        }
        if($productoInicio->update($request->all())){
            return back()->with('exito','Contenido Actualizado');
        }else{
            return back()->with('fallo','Algo salió mal');
        }
    }
    public function AgregarImagen(Request $request){
        $marca= new Galeria();
        $marca->orden=$request->orden;
        if($request->file('img_galeria')){
            $marca->imagen=$request->file('img_galeria')->store('images/inicio');
        }
        $marca->save();
    }
    public function EditarImagen($id){
        $marca=Galeria::findorFail($id);
        return $marca;
    }
    public function ActualizarImagen(Request $request,$id){
        $marca=Galeria::findorFail($id);
        if($request->file('img_Galeriae')){
            Storage::delete($marca->imagen);
            $marca->imagen=$request->file('img_Galeriae')->store('images/inicio');
        }
        $marca->update($request->all());
    }
    public function EliminarImagen($id){
        $marca=Galeria::findorFail($id);
        $marca->delete();
    }
    public function vistaInicio(){
       

        $sliders= Sliders::where('pagina','inicio')->orderby('orden',"ASC")->get();
        $metadato=Metadato::where('seccion',"inicio")->first()->get();
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        return view('inicio',compact('contactos','sliders','iconoSup','iconoInf','seccionInicio','serviciosInicio','metadato','categorias','productos_destacados'));
    }
}
