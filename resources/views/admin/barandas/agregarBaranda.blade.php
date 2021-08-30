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
                        Agregar Baranda
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-info" href="{{route('barandas.index')}}">
                            Volver
                        </a>
                    </div>  
                </div>
                <div class="card-body">
                    <form action="{{route('barandas.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden">
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" >
                            <h6>Texto</h6>
                            <textarea name="texto"></textarea>
                            <h6>Imagen Uno</h6>
                            <input type="file"  name="img1">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Dos</h6>
                            <input type="file"  name="img2">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 394px * 267px</small>
                            <h6>Imagen Principal</h6>
                            <input type="file"  name="imgPrincipal">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 1366px * 768px</small>
                        </div>
                        <div class="col-md-4">
                            <h6>Imagen Pasamanos</h6>
                            <input type="file"  name="imgpasamanos1">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                           
                        </div>
                        <div class="col-md-4">
                            <h6>Imagen Pasamanos</h6>
                            <input type="file"  name="imgpasamanos2">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                          
                        </div>
                        <div class="col-md-4">
                            <h6>Imagen Pasamanos</h6>
                            <input type="file"  name="imgpasamanos3">
                            <br>
                            <small class="text-muted">Resolución Recomendada: 300px * 300px</small>
                            
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