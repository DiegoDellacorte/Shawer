<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Sliders;
use App\Models\Vanitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VanitorysController extends Controller
{
    public function sliders(){
        $sliders= Sliders::where('pagina','vanitorys')->orderby('orden',"ASC")->get();
        return view('admin.vanitorys.sliders',compact('sliders'));
    }
    public function editarContenido(){
         $seccionVanitorys=Seccion::find(3);
         return view('admin.vanitorys.editarContenido',compact('seccionVanitorys'));
    }
    public function actualizarContenido(Request $request){
        $seccionVanitorys=Seccion::find(3);
        if($request->hasFile('img1')){
            $seccionVanitorys->img_uno=$request->file('img1')->store('images/vanitorys');
        }
        if($request->hasFile('img2')){
            $seccionVanitorys->img_dos=$request->file('img2')->store('images/vanitorys');
        }
        try {
            $seccionVanitorys->update($request->all());
            return back()->with('success',"Contenido Actualizado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
       
    }
    public function index(){
        $vanitorys=Vanitory::orderby('orden',"ASC")->get();
        return view('admin.vanitorys.productos.index',compact('vanitorys'));
    }
    public function create(){
        return view('admin.vanitorys.productos.create');
    }
    public function store(Request $request){
        $vanitory=new Vanitory($request->all());
        if($request->hasFile('img1')){
            $vanitory->img_uno=$request->file('img1')->store('images/vanitorys');
        }
        if($request->hasFile('img2')){
            $vanitory->img_dos=$request->file('img2')->store('images/vanitorys');
        }
        if($request->hasFile('imgPrincipal')){
            $vanitory->img_principal=$request->file('imgPrincipal')->store('images/vanitorys');
        }
        try {
            $vanitory->save();
            return back()->with('success',"Vanitory Agregado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function edit($id){
        $vanitory=Vanitory::find($id);
        return view('admin.vanitorys.productos.edit',compact('vanitory'));
    }
    public function update(Request $request,$id){
        $vanitory=Vanitory::find($id);
        
        if($request->hasFile('img1')){
            $vanitory->img_uno=$request->file('img1')->store('images/vanitorys');
        }
        if($request->hasFile('img2')){
            $vanitory->img_dos=$request->file('img2')->store('images/vanitorys');
        }
        if($request->hasFile('imgPrincipal')){
            $vanitory->img_principal=$request->file('imgPrincipal')->store('images/vanitorys');
        }
        try {
            $vanitory->update($request->all());
            return back()->with('success',"Vanitory Actualizada");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function delete($id){
        $vanitory=Vanitory::find($id);
        Storage::delete($vanitory->img_uno,$vanitory->img_dos,$vanitory->img_principal);
        $vanitory->delete();
    }
}
