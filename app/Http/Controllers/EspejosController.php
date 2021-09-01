<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Espejo;
use App\Models\Logos;
use App\Models\Seccion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EspejosController extends Controller
{
    public function editarContenido(){
        $seccionEspejos=Seccion::find(5);
        return view('admin.espejos.editarContenido',compact('seccionEspejos'));
   }
   public function actualizarContenido(Request $request){
       $seccionMamparas=Seccion::find(5);
       if($request->hasFile('img1')){
           $seccionMamparas->img_uno=$request->file('img1')->store('images/espejos');
       }
       if($request->hasFile('img2')){
           $seccionMamparas->img_dos=$request->file('img2')->store('images/espejos');
       }
       try {
           $seccionMamparas->update($request->all());
           return back()->with('success',"Contenido Actualizado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
      
   }
   public function index(){
       $espejos =Espejo::orderby('orden',"ASC")->get();
       return view('admin.espejos.productos.index',compact('espejos'));
   }
   public function create(){
       return view('admin.espejos.productos.create');
   }
   public function store(Request $request){
       $espejos=new Espejo($request->all());
       if($request->hasFile('img1')){
           $espejos->img_uno=$request->file('img1')->store('images/espejos');
       }
       if($request->hasFile('img2')){
           $espejos->img_dos=$request->file('img2')->store('images/espejos');
       }
       if($request->hasFile('imgPrincipal')){
           $espejos->img_principal=$request->file('imgPrincipal')->store('images/espejos');
       }
       try {
           $espejos->save();
           return back()->with('success',"Espejo Agregado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
   }
   public function edit($id){
       $espejo=Espejo::find($id);
       return view('admin.espejos.productos.edit',compact('espejo'));
   }
   public function update(Request $request,$id){
       $mampara=Espejo::find($id);
       
       if($request->hasFile('img1')){
           $mampara->img_uno=$request->file('img1')->store('images/mamparas');
       }
       if($request->hasFile('img2')){
           $mampara->img_dos=$request->file('img2')->store('images/mamparas');
       }
       if($request->hasFile('imgPrincipal')){
           $mampara->img_principal=$request->file('imgPrincipal')->store('images/mamparas');
       }
       try {
           $mampara->update($request->all());
           return back()->with('success',"Plato Actualizado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mamparas=Espejo::find($id);
       Storage::delete($mamparas->img_uno,$mamparas->img_dos,$mamparas->img_principal);
       $mamparas->delete();
    }
    public function sliders(){
        $sliders= Sliders::where('pagina','espejos')->orderby('orden',"ASC")->get();
        return view('admin.espejos.sliders',compact('sliders'));
    }
    public function vistaSeccion(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','espejos')->orderby('orden',"ASC")->get();
        $seccionEspejos=Seccion::find(5);
        $espejos =Espejo::orderby('orden',"ASC")->get();
        return view('front.espejos',compact('contactos','iconoSup','iconoInf','sliders','seccionEspejos','espejos'));
    }
    public function show($id){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $espejo=Espejo::find($id);
        return view('front.espejo',compact('contactos','iconoSup','iconoInf','espejo'));
    }
}
