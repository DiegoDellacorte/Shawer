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
                        Editar Proyecto
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('proyectos.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('proyectos.update',$proyecto->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h6>Orden</h6>
                                    <input type="text" class="form-control" name="orden" value="{{$proyecto->orden}}">
                                    {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                                    <h6>Titulo</h6>
                                    <input type="text" class="form-control" name="titulo" value="{{$proyecto->titulo}}">
                                    {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                                    <h6>Texto</h6>
                                    <textarea  name="texto">{!!$proyecto->texto!!}</textarea>
                                </div>
                              
                                <div class="col-md-6">
                                    <h6>Imagen Uno</h6>
                                    @if ($proyecto->img_uno)
                                    <img class="img-fluid" src="{{asset(Storage::url($proyecto->img_uno))}}" width="300px" id="previewimg_uno">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_uno">
                                    @endif
                                   
                                    <br>
                                    <input type="file" name="img_unoe" id="img_uno">
                                    {!!$errors->first('img_uno','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resoluci??n Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Dos</h6>
                                    @if ($proyecto->img_dos)
                                    <img class="img-fluid" src="{{asset(Storage::url($proyecto->img_dos))}}" width="300px" id="previewimg_dos">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_dos">
                                    @endif
                                    <br>
                                    <input type="file" name="img_dose" id="img_dos">
                                    {!!$errors->first('img_dos','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resoluci??n Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Tres</h6>
                                    @if ($proyecto->img_tres)
                                    <img class="img-fluid" src="{{asset(Storage::url($proyecto->img_tres))}}" width="300px" id="previewimg_tres">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_tres">
                                    @endif
                                    
                                    <br>
                                    <input type="file" name="img_trese" id="img_tres">
                                    {!!$errors->first('img_tres','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resoluci??n Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Cuatro</h6>
                                    @if ($proyecto->img_cuatro)
                                    <img class="img-fluid" src="{{asset(Storage::url($proyecto->img_cuatro))}}" width="300px" id="previewimg_cuatro">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_cuatro">
                                    @endif
                                   
                                    <br>
                                    <input type="file" name="img_cuatroe" id="img_cuatro">
                                    {!!$errors->first('img_cuatro','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resoluci??n Recomendada 366px * 332px</small>
                                </div>
                                
                               
                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-info">
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