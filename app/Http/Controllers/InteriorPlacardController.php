<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\InteriorPlacard;
use App\Models\Logos;
use App\Models\Seccion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InteriorPlacardController extends Controller
{
    public function editarContenido(){
        $seccionPlacard=Seccion::find(6);
        return view('admin.placards.editarContenido',compact('seccionPlacard'));
   }
   public function actualizarContenido(Request $request){
       $seccionPlacard=Seccion::find(6);
       if($request->hasFile('img1')){
           $seccionPlacard->img_uno=$request->file('img1')->store('images/placard');
       }
       if($request->hasFile('img2')){
           $seccionPlacard->img_dos=$request->file('img2')->store('images/placard');
       }
       try {
           $seccionPlacard->update($request->all());
           return back()->with('success',"Contenido Actualizado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
      
   }
   public function index(){
       $placards =InteriorPlacard::orderby('orden',"ASC")->get();
       return view('admin.placards.productos.index',compact('placards'));
   }
   public function create(){
       return view('admin.placards.productos.create');
   }
   public function store(Request $request){
       $placard=new InteriorPlacard($request->all());
       if($request->hasFile('img1')){
           $placard->img_uno=$request->file('img1')->store('images/placard');
       }
       if($request->hasFile('img2')){
           $placard->img_dos=$request->file('img2')->store('images/placard');
       }
       if($request->hasFile('imgPrincipal')){
           $placard->img_principal=$request->file('imgPrincipal')->store('images/placard');
       }
       try {
           $placard->save();
           return back()->with('success',"Placard Agregado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
   }
   public function edit($id){
       $placard=InteriorPlacard::find($id);
       return view('admin.placards.productos.edit',compact('placard'));
   }
   public function update(Request $request,$id){
       $mampara=InteriorPlacard::find($id);
       
       if($request->hasFile('img1')){
           $mampara->img_uno=$request->file('img1')->store('images/placard');
       }
       if($request->hasFile('img2')){
           $mampara->img_dos=$request->file('img2')->store('images/placard');
       }
       if($request->hasFile('imgPrincipal')){
           $mampara->img_principal=$request->file('imgPrincipal')->store('images/placard');
       }
       try {
           $mampara->update($request->all());
           return back()->with('success',"Placard Actualizado");
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
        $mamparas=InteriorPlacard::find($id);
       Storage::delete($mamparas->img_uno,$mamparas->img_dos,$mamparas->img_principal);
       $mamparas->delete();
    }
    public function sliders(){
        $sliders= Sliders::where('pagina','interiorPlacard')->orderby('orden',"ASC")->get();
        return view('admin.placards.sliders',compact('sliders'));
    }
    public function vistaSeccion(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','interiorPlacard')->orderby('orden',"ASC")->get();
        $seccionPlacard=Seccion::find(6);
        $placards =InteriorPlacard::orderby('orden',"ASC")->get();
        return view('front.placards',compact('contactos','iconoSup','iconoInf','sliders','seccionPlacard','placards'));
    }
    public function show($id){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $placard=InteriorPlacard::find($id);
        return view('front.placard',compact('contactos','iconoSup','iconoInf','placard'));
    }
}
