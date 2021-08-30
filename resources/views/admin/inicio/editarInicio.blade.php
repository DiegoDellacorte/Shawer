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
                        Editar Inicio
                    </div>
                    <div class="card-body">
                        <form action="{{route('inicio.actualizarSeccionInicio')}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-6">
                                    <h6>Titulo</h6>
                                    <input type="text" class="form-control" value="{{$seccionInicio->titulo}}" name="titulo">
                                  
                                    <h6>Texto</h6>
                                    <textarea name="texto">{!!$seccionInicio->texto!!}</textarea>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img class="img-fluid" src="{{asset(Storage::URL($seccionInicio->imagen))}}">
                                    <input type="file" name="imgInicio" >
                                    <br>
                                    <small>Resolucion Recomendada 1367px * 768px</small>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Modificar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         
            <!--Producto Destacado-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Producto Destacado
                    </div>
                    <div class="card-body">
                        <form action="{{route('inicio.actualizarProdInicio')}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                   <h6>Titulo</h6>
                                   <input type="text" class="form-control" name="titulo" value="{{$productoInicio->titulo}}">
                                   <h6>Texto</h6>
                                   <textarea name="texto">{!!$productoInicio->texto!!}</textarea>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img class="img-fluid" src="{{asset(Storage::URL($productoInicio->img_uno))}}">
                                    <input type="file" name="img_Produno" >
                                    <br>
                                    <small>Resolucion Recomendada 583px * 404px</small>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img class="img-fluid" src="{{asset(Storage::URL($productoInicio->img_dos))}}">
                                    <input type="file" name="img_Proddos" >
                                    <br>
                                    <small>Resolucion Recomendada 583px * 404px</small>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img class="img-fluid" src="{{asset(Storage::URL($productoInicio->img_tres))}}">
                                    <input type="file" name="img_Prodtres" >
                                    <br>
                                    <small>Resolucion Recomendada 583px * 404px</small>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img class="img-fluid" src="{{asset(Storage::URL($productoInicio->img_cuatro))}}">
                                    <input type="file" name="img_Prodcuatro" >
                                    <br>
                                    <small>Resolucion Recomendada 583px * 404px</small>
                                </div>
                                <div class="col-12 text-center my-5">
                                    <button type="submit" class="btn btn-info">
                                        Modificar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Galeria-->
            <div class="col-md-12">
                
                    <div class="card">
                        <div class="card-header">
                            Editar Galeria
                            <div class="float-right">
                                <button class="btn btn-outline-info "  data-toggle="modal" data-target="#ModalAgregarPersonal">
                                    <i class="fas fa-plus"></i>
                                    Agregar Imagen
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <th>Orden</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            
                            <tbody>
                                @foreach ($galeria as $imgGal)
                                    <tr> 
                                        <td>{{$imgGal->orden}}</td>
                                        <td><img src="{{asset(Storage::url($imgGal->imagen))}}" class="img-fluid" width="250px"></td>
                                        <td>
                                            <button class="btn btn-info" onclick="editarGaleria({{$imgGal->id}})"  data-toggle="modal" data-target="#ModalEditarPersonal"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger" onclick="eliminarImagenGaleria({{$imgGal->id}})"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
            <!--Agregar Personal-->
            <div class="modal fade" id="ModalAgregarPersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Imagen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <form id="agregarGaleria" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label>Orden</label>
                        <input id="orden" type="text" class="form-control" name="orden">
                        
                        <label>Imagen</label>
                        <input type="file" name="img_galeria">
                        <small class="form-text text-muted">Tamaño recomendado: 500px x 358px</small>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
            <!--Editar Personal-->
            <div class="modal fade" id="ModalEditarPersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Imagen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <form id="editarGaleria" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="id_Galeria">
                        <label>Orden</label>
                        <input type="text" class="form-control" name="orden" id="orden_Galeria">
                        <label>Imagen</label>
                        <img id="previewGaleria" class="img-fluid">
                        <input type="file" name="img_Galeriae">
                        <small class="form-text text-muted">Tamaño recomendado:  500px x 358px</small>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
             //Galeria
             $('#agregarGaleria').on('submit', function (e) {
                e.preventDefault();
                var form= new FormData($('#agregarGaleria')[0]);
                
                $.ajax({
                    type: "POST",
                    url: "./agregarImagen",
                    data: form,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal("Galeria Added!","","success");
                        setTimeout(function(){location.reload()},1500);
                    },
                    error: function(response){
                        console.log(response);
                        swal("Something went wrong","","error");
                    }
                });
            });
            $('#editarGaleria').on('submit', function (e) {
                e.preventDefault();
                var id=$('#id_Galeria').val();
                var form= new FormData($('#editarGaleria')[0]);
                
                form.append('_method', 'PUT');
                $.ajax({
                    type: "POST",
                    url: "actualizarGaleria/"+id,
                    data: form,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal("Imagen Actualizada !","","success");
                        setTimeout(function(){location.reload()},1500);
                    },
                    error: function(response){
                        console.log(response);
                        swal("Algo salió mal","","error");
                    }
                });
            });
        });
      //Galeria
      function editarGaleria(id) {
            $.ajax({
                type: "get",
                url: "editarGaleria/"+id,
                success: function (response) {
                    //console.log(response);
                    const path="../../storage/";
                    $('#id_Galeria').val(id);
                    $('#orden_Galeria').val(response.orden);
                    $('#previewGaleria').attr('src',path+response.imagen);
                },
                error: function(response){
                    console.log(response);
                }
            });
        }
        function eliminarImagenGaleria(id){
            swal({
                title: "¿Seguro/a de eliminar la Imagen?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: "eliminarGaleria/"+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            swal("Imagen eliminada!","","success");
                            setTimeout(function(){location.reload()},1500);
                        },
                        error: function(response){
                            console.log(response);
                            swal("Algo salió mal","","error");
                        }
                    });

                } else {
                swal("No se ha eliminado nada");
                }
            });

        }
    </script>
@endsection