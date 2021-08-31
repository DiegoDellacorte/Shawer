<?php

namespace App\Http\Controllers;

use App\Models\Baranda;
use App\Models\SeccionBaranda;
use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Logos;
use Illuminate\Support\Facades\Storage;

class BarandasController extends Controller
{
    public function sliders(){
        $sliders= Sliders::where('pagina','barandas')->orderby('orden',"ASC")->get();
        return view('admin.barandas.sliders',compact('sliders'));
    }
    public function editarContenido(){
        $seccionBaranda=SeccionBaranda::all()->first();
        return view('admin.barandas.editarContenido',compact('seccionBaranda'));
    }
    public function actualizarContenido(Request $request){
        $seccionBaranda=SeccionBaranda::all()->first();
        if($request->hasFile('img1')){
            $seccionBaranda->img_uno=$request->file('img1')->store('images/barandas');
        }
        if($request->hasFile('img2')){
            $seccionBaranda->img_dos=$request->file('img2')->store('images/barandas');
        }
        if($request->hasFile('imgPrincipal')){
            $seccionBaranda->img_principal=$request->file('imgPrincipal')->store('images/barandas');
        }
        if($request->hasFile('imgSoporte1')){
            $seccionBaranda->img_soporte1=$request->file('imgSoporte1')->store('images/barandas');
        }
        if($request->hasFile('imgSoporte2')){
            $seccionBaranda->img_soporte2=$request->file('imgSoporte2')->store('images/barandas');
        }
        if($request->hasFile('imgSoporte3')){
            $seccionBaranda->img_soporte3=$request->file('imgSoporte3')->store('images/barandas');
        }
        try {
            $seccionBaranda->update($request->all());
            return back()->with('success',"Contenido Actualizado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
       
    }
    public function index(){
        $barandas=Baranda::orderby('orden',"ASC")->get();
        return view('admin.barandas.editarBarandas',compact('barandas'));
    }
    public function create(){
        return view('admin.barandas.agregarBaranda');
    }
    public function store(Request $request){
        $baranda=new Baranda($request->all());
        if($request->hasFile('img1')){
            $baranda->img_uno=$request->file('img1')->store('images/barandas');
        }
        if($request->hasFile('img2')){
            $baranda->img_dos=$request->file('img2')->store('images/barandas');
        }
        if($request->hasFile('imgPrincipal')){
            $baranda->img_principal=$request->file('imgPrincipal')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos1')){
            $baranda->img_pasamanos1=$request->file('imgpasamanos1')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos2')){
            $baranda->img_pasamanos2=$request->file('imgpasamanos2')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos3')){
            $baranda->img_pasamanos3=$request->file('imgpasamanos3')->store('images/barandas');
        }
        try {
            $baranda->save();
            return back()->with('success',"Baranda Agregada");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function edit($id){
        $baranda=Baranda::find($id);
        return view('admin.barandas.editarBaranda',compact('baranda'));
    }
    public function show($id){
        $baranda=Baranda::find($id);
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        return view('front.baranda',compact('baranda','contactos','iconoSup','iconoInf'));
    }
    public function update(Request $request,$id){
        $baranda=Baranda::find($id);
        
        if($request->hasFile('img1')){
            $baranda->img_uno=$request->file('img1')->store('images/barandas');
        }
        if($request->hasFile('img2')){
            $baranda->img_dos=$request->file('img2')->store('images/barandas');
        }
        if($request->hasFile('imgPrincipal')){
            $baranda->img_principal=$request->file('imgPrincipal')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos1')){
            $baranda->img_pasamanos1=$request->file('imgpasamanos1')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos2')){
            $baranda->img_pasamanos2=$request->file('imgpasamanos2')->store('images/barandas');
        }
        if($request->hasFile('imgpasamanos3')){
            $baranda->img_pasamanos3=$request->file('imgpasamanos3')->store('images/barandas');
        }
        try {
            $baranda->update($request->all());
            return back()->with('success',"Baranda Actualizada");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function delete($id){
        $baranda=Baranda::find($id);
        Storage::delete($baranda->img_uno,$baranda->img_dos,$baranda->img_principal,$baranda->img_pasamanos1,$baranda->img_pasamanos2,$baranda->img_pasamanos3);
        $baranda->delete();
    }
    public function vistaBaranda(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','barandas')->orderby('orden',"ASC")->get();
        $seccionBaranda=SeccionBaranda::all()->first();
        $barandas=Baranda::orderby('orden',"ASC")->get();
        return view('front.barandas',compact('contactos','iconoSup','iconoInf','sliders','seccionBaranda','barandas'));
    }
}
