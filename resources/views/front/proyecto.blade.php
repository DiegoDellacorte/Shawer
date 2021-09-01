@extends('layouts.plantilla')
@section('contenido')
<style>
    .flechas{
        position: relative;
        bottom: 45px;
    }
    .antes{
        background-color: red;
        border: none;
        color: white;
        padding: 10px;
        border-right: 1px solid white;
    }
    .despues{
        background-color: red;
        border: none;
        color: white;
        padding: 10px;
    }
    .imgFija{
        width: 530px;
        height: 415px;
        position: relative;
        bottom: 150px;
    }
    .proyecto-texto{
        font-family: 'Gotham-Light';
        font-size: 15px;
        color: #505050;
        margin-top: 25px;
    }
</style>
    <!--Img Principal-->
    <div class="container-fluid">
        <div class="row ps-5" style="background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)), url({{asset(Storage::url($proyecto->img_uno))}});
            height:514px;
            background-position:center;
            background-repeat:no-repeat;
            background-size:cover;">
            
            
            <div class="tituloProducto w-75 ms-0" style="padding-top: 140px">
                <div class="tituloCategoria ms-0" style="">proyectos</div>
                {{$proyecto->titulo}}
                <div class="ms-0" style="color:white;margin-top:40px; font-family: 'Gotham-Book';font-size:16px">
                    INICIO|PROYECTOS|{{$proyecto->titulo}}
                </div>
            </div>
          
            </div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center ">
                <div class="seccion-titulo animate__animated animate__fadeInRight animate__slow">
                    {{$proyecto->titulo}}
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide ms-auto" data-bs-ride="carousel" style="width:894px ">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset(Storage::url($proyecto->img_uno))}}" class="d-block w-100" >
                  </div>
                  
                  @if ($proyecto->img_dos!=null)
                  <div class="carousel-item">
                    <img src="{{asset(Storage::url($proyecto->img_dos))}}" class="d-block w-100" >
                  </div>
                  @endif
                  @if ($proyecto->img_tres!=null)
                  <div class="carousel-item">
                    <img src="{{asset(Storage::url($proyecto->img_tres))}}" class="d-block w-100" >
                  </div>
                  @endif
                  @if ($proyecto->img_cuatro!=null)
                  <div class="carousel-item">
                    <img src="{{asset(Storage::url($proyecto->img_cuatro))}}" class="d-block w-100" >
                  </div>
                  @endif
                </div>
                @if ($proyecto->img_dos!=null && $proyecto->img_tres!=null && $proyecto->img_cuatro!=null)
                <div class="flechas d-flex justify-content-end">
                    <button class="antes" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <i class="fas fa-arrow-left fa-1x"></i>
                       
                      </button>
                      <button class="despues" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <i class="fas fa-arrow-right fa-1x"></i>
                      
                      </button>
                </div>
                @endif
              
            </div>
            <div class="col-md-6">
            <img class="imgFija d-md-block d-none" src="{{asset('images/proyectos/imgfijaproyecto.png')}}">
            </div>
            <div class="col-md-6 ps-0">
                <div class="proyecto-texto">
                     {!!$proyecto->texto!!}
                </div>
            </div>
        </div>
    </div>
@endsection