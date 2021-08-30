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
                        Editar Contenido
                    </div>
                    <div class="card-body">
                        <form action="{{route('barandas.actualizarContenido')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Titulo</h6>
                                <input type="text" class="form-control" name="titulo" value="{{$seccionBaranda->titulo}}">
                                <h6>Subtitulo</h6>
                                <input type="text" class="form-control" name="subtitulo" value="{{$seccionBaranda->subtitulo}}">
                                <h6>Texto</h6>
                                <textarea name="texto">{!!$seccionBaranda->texto!!}</textarea>
                                <h6>Imagen Uno</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_uno))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="img1">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                                <h6>Imagen Dos</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_dos))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="img2">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                                <h6>Imagen Principal</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_principal))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="imgPrincipal">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 1366px * 768px</small>
                            </div>
                            <div class="col-md-6">
                                <h6>Texto Imagen Principal</h6>
                                <textarea name="texto_imgprincipal1">{!!$seccionBaranda->texto_imgprincipal1!!}</textarea>
                            </div>  
                            <div class="col-md-6">
                                <h6>Texto Imagen Principal</h6>
                                <textarea name="texto_imgprincipal2">{!!$seccionBaranda->texto_imgprincipal2!!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <h6>Imagen Soporte</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_soporte1))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="imgSoporte1">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                                <h6>Titulo soporte</h6>
                                <input type="text" class="form-control" name="titulo_soporte1" value="{{$seccionBaranda->titulo_soporte1}}">
                            </div>
                            <div class="col-md-4">
                                <h6>Imagen Soporte</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_soporte2))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="imgSoporte2">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                                <h6>Titulo soporte</h6>
                                <input type="text" class="form-control" name="titulo_soporte2" value="{{$seccionBaranda->titulo_soporte2}}">
                            </div>
                            <div class="col-md-4">
                                <h6>Imagen Soporte</h6>
                                <img src="{{asset(Storage::url($seccionBaranda->img_soporte3))}}" class="img-fluid">
                                <br>
                                <input type="file"  name="imgSoporte3">
                                <br>
                                <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                                <h6>Titulo soporte</h6>
                                <input type="text" class="form-control" name="titulo_soporte3" value="{{$seccionBaranda->titulo_soporte3}}">
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
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
            });
        });
    </script>
@endsection