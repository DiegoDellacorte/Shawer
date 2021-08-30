@extends('home')
@section('contenido')
    <div class="container-fluid my-3">
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
                        Agregar Producto
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('productos.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <h6>Orden</h6>
                                    <input type="text" class="form-control" name="orden">
                                    {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                                    <h6>Nombre</h6>
                                    <input type="text" class="form-control" name="nombre">
                                    {!!$errors->first('nombre','<small class="text-danger">:message</small>')!!}
                                    <h6>Ficha</h6>
                                    <input type="file" name="ficha">
                                    <h6>Destacado</h6>
                                    <select name="destacado" class="form-control" required>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                    </select>
                                    <h6>Video Uno</h6>
                                    <input type="text" class="form-control" name="video_uno">
                                    <h6>Video Dos</h6>
                                    <input type="text" class="form-control" name="video_dos">
                                </div>
                                <div class="col-md-6">
                                    <h6>Descripción Breve</h6>
                                    <textarea name="descripcion_breve"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Uno</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_uno">
                                    <br>
                                    <input type="file" name="img_uno" id="img_uno">
                                    {!!$errors->first('img_uno','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Dos</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_dos">
                                    <br>
                                    <input type="file" name="img_dos" id="img_dos">
                                    {!!$errors->first('img_dos','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Tres</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_tres">
                                    <br>
                                    <input type="file" name="img_tres" id="img_tres">
                                    {!!$errors->first('img_tres','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Cuatro</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_cuatro">
                                    <br>
                                    <input type="file" name="img_cuatro" id="img_cuatro">
                                    {!!$errors->first('img_cuatro','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Descripcion Extra</h6>
                                    <textarea name="descripcion_extra_uno"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <h6>Descripcion Extra</h6>
                                    <textarea name="descripcion_extra_dos"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <h6>Producto Relacionado</h6>
                                    <select class="form-control" name="prodrel_uno">
                                        <option value="" selected>Seleccione Producto</option>
                                    @forelse ($productos as $prod_select)
                                        <option value="{{$prod_select->id}}">{{$prod_select->nombre}}</option>
                                    @empty
                                    <option value="" disabled selected>No hay productos cargados</option>
                                    @endforelse
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h6>Producto Relacionado</h6>
                                    <select class="form-control" name="prodrel_dos">
                                        <option value="" selected>Seleccione Producto</option>
                                    @forelse ($productos as $prod_select)
                                        <option value="{{$prod_select->id}}">{{$prod_select->nombre}}</option>
                                    @empty
                                    <option value="" disabled selected>No hay productos cargados</option>
                                    @endforelse
                                    </select>
                                </div>
                                <div class="col-md-4 ">
                                    <h6>Producto Relacionado</h6>
                                    <select class="form-control" name="prodrel_tres">
                                        <option value="" selected>Seleccione Producto</option>
                                    @forelse ($productos as $prod_select)
                                        <option value="{{$prod_select->id}}">{{$prod_select->nombre}}</option>
                                    @empty
                                    <option value="" disabled selected>No hay productos cargados</option>
                                    @endforelse
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                      Categorias
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cat-sub" id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                     SubCategorias
                                    </label>
                                  </div>
                                <div class="col-md-12 mt-3 d-none" id="Categorias" >
                                    <h6>Categorias</h6>
                                    <select class="form-control" id="select_cats"  name="category_id">
                                    <option disabled selected>Seleccione categoria</option>
                                    @forelse ($categorias as $cat_select)
                                        <option value="{{$cat_select->id}}">{{$cat_select->titulo}}</option>
                                    @empty
                                    <option value="" disabled selected>No hay categorias cargadas</option>
                                    @endforelse
                                    </select>
                                    {!!$errors->first('category_id','<small class="text-danger">:message</small>')!!}
                                </div>
                                <div class="col-md-12 mt-3 d-none" id="SubCategorias" >
                                    <h6>SubCategorias</h6>
                                    <select class="form-control " id="select_subcats"  name="subcategory_id" >
                                    <option disabled selected>Seleccione SubCategoria</option>
                                    @forelse ($subcategorias as $subcat_select)
                                        <option value="{{$subcat_select->id}}">{{$subcat_select->titulo}}</option>
                                    @empty
                                    <option value="" disabled selected>No hay SubCategorias cargadas</option>
                                    @endforelse
                                    </select>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-info">
                                        Agregar
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
         $(document).ready(function() {
             $('textarea').summernote({
                 lang: 'es-ES',
                 height: 230,
                     fontNames: ['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
             });
             $('input[name=cat-sub]').on('change',(e)=>{
                if(e.target.value==1){
                    $('#Categorias').removeClass('d-none');
                    $('#select_cats').prop('required',true);
                    $('#SubCategorias').addClass('d-none');
                    $('#select_subcats').prop('required',false);
                }else{
                    $('#Categorias').addClass('d-none');
                    $('#select_cats').prop('required',false);
                    $('#SubCategorias').removeClass('d-none');
                    $('#select_subcats').prop('required',true);
                }
             });
         });
        const fileInputuno= document.getElementById('img_uno');
        const imguno=document.getElementById('previewimg_uno')
        fileInputuno.addEventListener('change',(e)=>{
            const fileUno= e.target.files[0];
            const fileReaderUno= new FileReader();
            fileReaderUno.readAsDataURL(fileUno);
            fileReaderUno.addEventListener('load',(e)=>{
                imguno.setAttribute('src',e.target.result);
            });
        });
        const fileInputdos= document.getElementById('img_dos');
        const imgdos=document.getElementById('previewimg_dos')
        fileInputdos.addEventListener('change',(e)=>{
            const fileDos= e.target.files[0];
            const fileReaderDos= new FileReader();
            fileReaderDos.readAsDataURL(fileDos);
            fileReaderDos.addEventListener('load',(e)=>{
            imgdos.setAttribute('src',e.target.result);
            });
        });
        const fileInputtres= document.getElementById('img_tres');
        const imgtres=document.getElementById('previewimg_tres')
        fileInputtres.addEventListener('change',(e)=>{
            const fileTres= e.target.files[0];
            const fileReaderTres= new FileReader();
            fileReaderTres.readAsDataURL(fileTres);
            fileReaderTres.addEventListener('load',(e)=>{
                imgtres.setAttribute('src',e.target.result);
            });
        });
        const fileInputcuatro= document.getElementById('img_cuatro');
        const imgcuatro=document.getElementById('previewimg_cuatro')
        fileInputcuatro.addEventListener('change',(e)=>{
            const fileCuatro= e.target.files[0];
            const fileReaderCuatro= new FileReader();
            fileReaderCuatro.readAsDataURL(fileCuatro);
            fileReaderCuatro.addEventListener('load',(e)=>{
                imgcuatro.setAttribute('src',e.target.result);
            });
        });

    </script>
@endsection