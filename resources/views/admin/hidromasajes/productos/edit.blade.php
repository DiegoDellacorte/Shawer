@extends('home')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div>
                        Agregar Hidromasaje
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-info" href="{{route('hidromasajes.index')}}">
                            Volver
                        </a>
                    </div>  
                </div>
                <div class="card-body">
                    <form action="{{route('hidromasajes.update',$hidromasaje->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-12">
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$hidromasaje->orden}}">
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$hidromasaje->titulo}}" >
                            <h6>Texto</h6>
                            <textarea name="texto">{!!$hidromasaje->texto!!}</textarea>
                            <h6>Imagen Uno</h6>
                            <img src="{{asset(Storage::url($hidromasaje->img_uno))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="img1">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Dos</h6>
                            <img src="{{asset(Storage::url($hidromasaje->img_dos))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="img2">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Principal</h6>
                            <img src="{{asset(Storage::url($hidromasaje->img_principal))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="imgPrincipal">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 1366px * 768px</small>
                            <h6>Tabla</h6>
                            <textarea name="tabla">{!!$hidromasaje->tabla!!}</textarea>
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-info" type="submit">
                                Modificar
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('textarea').summernote({
             lang: 'es-ES',
             height: 120,
                 fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
                //  toolbar: [
                //  ['style', ['style']],
                //  ['font', ['bold', 'underline', 'clear']],
                //  ['fontNames', ['fontname']],
                //  ['color', ['color']],
                //  ['para', ['ul', 'ol', 'paragraph']]
                 
                //  ]
        });
    });
</script>
@endsection