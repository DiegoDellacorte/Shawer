<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Mampara;
use App\Models\Seccion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MamparasController extends Controller
{
    public function editarContenido(){
        $seccionMamparas=Seccion::find(4);
        return view('admin.mamparas.editarContenido',compact('seccionMamparas'));
   }
   public function actualizarContenido(Request $request){
       $seccionMamparas=Seccion::find(4);
       if($request->hasFile('img1')){
           $seccionMamparas->img_uno=$request->file('img1')->store('images/mamparas');
       }
       if($request->hasFile('img2')){
           $seccionMamparas->img_dos=$request->file('img2')->store('images/mamparas');
       }
       try {
           $seccionMamparas->update($request->all());
           return back()->with('success',"Contenido Actualizado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
      
   }
   public function index(){
       $mamparas=Mampara::orderby('orden',"ASC")->get();
       return view('admin.mamparas.productos.index',compact('mamparas'));
   }
   public function create(){
       return view('admin.mamparas.productos.create');
   }
   public function store(Request $request){
       $mampara=new Mampara($request->all());
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
           $mampara->save();
           return back()->with('success',"Mampara Agregada");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
   }
   public function edit($id){
       $mampara=Mampara::find($id);
       return view('admin.mamparas.productos.edit',compact('mampara'));
   }
   public function update(Request $request,$id){
       $mampara=Mampara::find($id);
       
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
           return back()->with('success',"Mampara Actualizada");
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
        $mamparas=Mampara::find($id);
       Storage::delete($mamparas->img_uno,$mamparas->img_dos,$mamparas->img_principal);
       $mamparas->delete();
    }
    
    public function sliders(){
        $sliders= Sliders::where('pagina','mamparas')->orderby('orden',"ASC")->get();
        return view('admin.mamparas.sliders',compact('sliders'));
    }
    public function vistaSeccion(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','mamparas')->orderby('orden',"ASC")->get();
        $seccionMamparas=Seccion::find(4);
        $mamparas=Mampara::orderby('orden',"ASC")->get();
        return view('front.mamparas',compact('contactos','iconoSup','iconoInf','sliders','seccionMamparas','mamparas'));
    }
    public function show($id){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $mampara=Mampara::find($id);
        return view('front.mampara',compact('contactos','iconoSup','iconoInf','mampara'));
    }
}
