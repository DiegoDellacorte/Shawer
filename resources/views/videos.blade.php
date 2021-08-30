@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex linea-azul align-items-center ps-5">
    Videos
</div>
    <!--Videos>-->
    <div class="container-fluid my-5">
        <div class="row">
            @foreach ($videos as $video)
            <div class="col-md-3 ps-md-5">
                <iframe width="303" height="200" src="https://www.youtube.com/embed/{{$video->enlace}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div style="font-family: 'Poppins-Medium';color:#212121;text-transform:uppercase;">{{$video->titulo}}</div>
            
            </div>
            @endforeach
        </div>
    </div>
@endsection