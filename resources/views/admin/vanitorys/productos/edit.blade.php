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
                        Editar Vanitory
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-info" href="{{route('vanitorys.index')}}">
                            Volver
                        </a>
                    </div>  
                </div>
                <div class="card-body">
                    <form action="{{route('vanitorys.update',$vanitory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-12">
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$vanitory->orden}}">
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$vanitory->titulo}}" >
                            <h6>Texto</h6>
                            <textarea name="texto">{!!$vanitory->texto!!}</textarea>
                            <h6>Imagen Uno</h6>
                            <img src="{{asset(Storage::url($vanitory->img_uno))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="img1">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Dos</h6>
                            <img src="{{asset(Storage::url($vanitory->img_dos))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="img2">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Principal</h6>
                            <img src="{{asset(Storage::url($vanitory->img_principal))}}" class="img-fluid">
                            <br>
                            <input type="file"  name="imgPrincipal">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 1366px * 768px</small>
                            <h6>Tabla</h6>
                            <textarea name="tabla">{!!$vanitory->tabla!!}</textarea>
                            <h6>Tabla</h6>
                            <textarea name="tabla2">{!!$vanitory->tabla!!}</textarea>
                            <h6>Destacado</h6>
                            <select class="form-control" name="destacado">
                                <option value="1" {{$vanitory->destacado==true ? 'selected' : '' }}>SI</option>
                                <option value="0" {{$vanitory->destacado==false ? 'selected' : '' }}>NO</option>
                            </select>
                            <h6>Orden Destacado</h6>
                            <input type="text" class="form-control" name="orden_destacado" value="{{$vanitory->orden_destacado}}">
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