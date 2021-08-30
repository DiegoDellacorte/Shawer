@extends('layouts.plantilla')
@section('contenido')
    <div class="d-flex linea-azul align-items-center ps-5">
        <i class="fas fa-home me-2" style="color: white"></i>
        Productos
    </div>
     <!--Categorias-->
     <div class="container-fluid ps-5 my-5">
        <div class="row my-5">
            @foreach ($categorias as $categoria)
            <div class="col-md-3 ">
                <a class="enlace_categoria" href="{{route('categoria',$categoria->id)}}">
                    <div class="card contenedor">
                        <div class="" style="background-image: url({{asset(Storage::url($categoria->imagen))}});
                            height:220px;
                            width:220px;
                            background-repeat:no-repeat;
                            background-size:cover;
                            margin:auto">
                        </div>
                        <div class="overlay">
                            <div class="text">
                                <i class="fas fa-plus fa-lg"></i>
                            </div>
                        </div>
                    </div>
                  
                    
                    <div class="titulo-categoria">
                        {{$categoria->titulo}}
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection