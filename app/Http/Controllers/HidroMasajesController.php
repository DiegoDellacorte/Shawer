<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Hidromasaje;
use App\Models\Logos;
use App\Models\Seccion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HidroMasajesController extends Controller
{
    public function sliders(){
        $sliders= Sliders::where('pagina','hidromasajes')->orderby('orden',"ASC")->get();
        return view('admin.hidromasajes.sliders',compact('sliders'));
    }
    public function editarContenido(){
         $seccionHidromasaje=Seccion::find(1);
         return view('admin.hidromasajes.editarContenido',compact('seccionHidromasaje'));
    }
    public function actualizarContenido(Request $request){
        $seccionHidromasaje=Seccion::find(1);
        if($request->hasFile('img1')){
            $seccionHidromasaje->img_uno=$request->file('img1')->store('images/hidromasajes');
        }
        if($request->hasFile('img2')){
            $seccionHidromasaje->img_dos=$request->file('img2')->store('images/hidromasajes');
        }
        try {
            $seccionHidromasaje->update($request->all());
            return back()->with('success',"Contenido Actualizado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
       
    }
    public function index(){
        $hidromasajes=Hidromasaje::orderby('orden',"ASC")->get();
        return view('admin.hidromasajes.productos.index',compact('hidromasajes'));
    }
    public function create(){
        return view('admin.hidromasajes.productos.create');
    }
    public function store(Request $request){
        $hidromasaje=new Hidromasaje($request->all());
        if($request->hasFile('img1')){
            $hidromasaje->img_uno=$request->file('img1')->store('images/hidromasajes');
        }
        if($request->hasFile('img2')){
            $hidromasaje->img_dos=$request->file('img2')->store('images/hidromasajes');
        }
        if($request->hasFile('imgPrincipal')){
            $hidromasaje->img_principal=$request->file('imgPrincipal')->store('images/hidromasajes');
        }
        try {
            $hidromasaje->save();
            return back()->with('success',"Hidromasaje Agregada");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function edit($id){
        $hidromasaje=Hidromasaje::find($id);
        return view('admin.hidromasajes.productos.edit',compact('hidromasaje'));
    }
    public function update(Request $request,$id){
        $hidromasaje=Hidromasaje::find($id);
        
        if($request->hasFile('img1')){
            $hidromasaje->img_uno=$request->file('img1')->store('images/hidromasajes');
        }
        if($request->hasFile('img2')){
            $hidromasaje->img_dos=$request->file('img2')->store('images/hidromasajes');
        }
        if($request->hasFile('imgPrincipal')){
            $hidromasaje->img_principal=$request->file('imgPrincipal')->store('images/hidromasajes');
        }
        try {
            $hidromasaje->update($request->all());
            return back()->with('success',"Hidromasajes Actualizada");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function delete($id){
        $hidromasaje=Hidromasaje::find($id);
        Storage::delete($hidromasaje->img_uno,$hidromasaje->img_dos,$hidromasaje->img_principal,$hidromasaje->img_pasamanos1,$hidromasaje->img_pasamanos2,$hidromasaje->img_pasamanos3);
        $hidromasaje->delete();
    }
    public function vistaSeccion(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','hidromasajes')->orderby('orden',"ASC")->get();
        $seccionHidromasaje=Seccion::find(1);
        $hidromasajes=Hidromasaje::orderby('orden',"ASC")->get();
        return view('front.hidromasajes',compact('contactos','iconoSup','iconoInf','sliders','seccionHidromasaje','hidromasajes'));
    }
    public function show($id){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $hidromasaje=Hidromasaje::find($id);
        return view('front.hidromasaje',compact('contactos','iconoSup','iconoInf','hidromasaje'));
    }
}
