<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $proyectos=Proyecto::orderby('orden',"ASC")->get();
        return view('admin.proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto= new Proyecto($request->all());
        
        if($request->hasFile('img_uno')){
            $proyecto->img_uno=$request->file('img_uno')->store('images/proyectos');
        }
        if($request->hasFile('img_dos')){
            $proyecto->img_dos=$request->file('img_dos')->store('images/proyectos');
        }
        if($request->hasFile('img_tres')){
            $proyecto->img_tres=$request->file('img_tres')->store('images/proyectos');
        }
        if($request->hasFile('img_cuatro')){
            $proyecto->img_cuatro=$request->file('img_cuatro')->store('images/proyectos');
        }
        try {
            $proyecto->save();
            return back()->with('success','Proyecto Agregado');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto=Proyecto::find($id);
        return view('admin.proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto=Proyecto::find($id);
        
        if($request->hasFile('img_unoe')){
            $proyecto->img_uno=$request->file('img_unoe')->store('images/proyectos');
        }
        if($request->hasFile('img_dose')){
            $proyecto->img_dos=$request->file('img_dose')->store('images/proyectos');
        }
        if($request->hasFile('img_trese')){
            $proyecto->img_tres=$request->file('img_trese')->store('images/proyectos');
        }
        if($request->hasFile('img_cuatroe')){
            $proyecto->img_cuatro=$request->file('img_cuatroe')->store('images/proyectos');
        }
        try {
            $proyecto->update($request->all());
            return back()->with('success','Proyecto Actualizars');
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
        $proyecto=Proyecto::find($id);
        Storage::delete($proyecto->img_uno,$proyecto->img_dos,$proyecto->img_tres,$proyecto->img_cuatro);
        $proyecto->delete();
    }
    public function sliders(){
        $sliders= Sliders::where('pagina','proyectos')->orderby('orden',"ASC")->get();
        return view('admin.proyectos.sliders',compact('sliders'));
    }
}
