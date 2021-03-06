@extends('home')
@section('contenido')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Editar Categoria
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('categorias.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categorias.update',$categoria->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$categoria->orden}}">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$categoria->titulo}}">
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Imagen</h6>
                            <img src="/storage/{{$categoria->imagen}}" width="200px" id="previewImgCat">
                            <br>
                            <input type="file" name="imgCate" id="imgCat">
                            {!!$errors->first('imgCat','<small class="text-danger">:message</small>')!!}
                            <br>
                            <small class="text-muted">Resoluci??n Recomendada 250px * 250px</small>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info">
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const fileInput= document.getElementById('imgCat');
        const img=document.getElementById('previewImgCat')
        fileInput.addEventListener('change',(e)=>{
            const file= e.target.files[0];
            const fileReader= new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.addEventListener('load',(e)=>{
            img.setAttribute('src',e.target.result);
            });
        });

    </script>
@endsection