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
                        Editar Subcategoria
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('subcategorias.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('subcategorias.update',$subcategoria->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$subcategoria->orden}}">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$subcategoria->titulo}}">
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Imagen</h6>
                            <img src="/storage/{{$subcategoria->imagen}}" width="200px" id="previewImgCat">
                            <br>
                            <input type="file" name="imgCate" id="imgCat">
                            {!!$errors->first('imgCat','<small class="text-danger">:message</small>')!!}
                            <br>
                            <h6>Seleccione Categoria</h6>
                            <select class="form-control" name="category_id" required>
                                @forelse ($categorias as $cat)
                                    @if ($subcategoria->category_id==$cat->id)
                                        <option value="{{$cat->id}}" selected>{{$cat->titulo}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->titulo}}</option>
                                    @endif
                                @empty
                                    <option value="" disabled selected>Cargue categorias para continuar</option>
                                @endforelse
                            </select>
                            <small class="text-muted">Resolución Recomendada 250px * 250px</small>
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