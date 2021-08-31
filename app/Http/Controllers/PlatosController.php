<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Seccion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatosController extends Controller
{
    public function editarContenido(){
        $seccionMamparas=Seccion::find(2);
        return view('admin.platos de ducha.editarContenido',compact('seccionMamparas'));
   }
   public function actualizarContenido(Request $request){
       $seccionMamparas=Seccion::find(2);
       if($request->hasFile('img1')){
           $seccionMamparas->img_uno=$request->file('img1')->store('images/platos');
       }
       if($request->hasFile('img2')){
           $seccionMamparas->img_dos=$request->file('img2')->store('images/platos');
       }
       try {
           $seccionMamparas->update($request->all());
           return back()->with('success',"Contenido Actualizado");
       } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
       }
      
   }
   public function index(){
       $mamparas=Plato::orderby('orden',"ASC")->get();
       return view('admin.platos de ducha.productos.index',compact('mamparas'));
   }
   public function create(){
       return view('admin.platos de ducha.productos.create');
   }
   public function store(Request $request){
       $mampara=new Plato($request->all());
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
       $mampara=Plato::find($id);
       return view('admin.platos de ducha.productos.edit',compact('mampara'));
   }
   public function update(Request $request,$id){
       $mampara=Plato::find($id);
       
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
        $mamparas=Plato::find($id);
       Storage::delete($mamparas->img_uno,$mamparas->img_dos,$mamparas->img_principal);
       $mamparas->delete();
    }
    public function sliders(){
        $sliders= Sliders::where('pagina','platos')->orderby('orden',"ASC")->get();
        return view('admin.platos de ducha.sliders',compact('sliders'));
    }
}
