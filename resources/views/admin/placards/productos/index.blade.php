@extends('home')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Placard
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('placard.create')}}">
                                <i class="fas fa-plus"></i>
                                Agregar Placard
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <th>Orden</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            @foreach ($placards as $placard)
                                <tr>
                                    <td>{{$placard->orden}}</td>
                                    <td>{{$placard->titulo}}</td>
                                    <td>
                                    <div class="form-button-action">
                                        <a   class="btn btn-link btn-primary btn-lg" href="{{route('placard.edit',$placard->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
    
                                            <button    class="btn btn-link btn-danger"  onclick="eliminarPlacard({{$placard->id}})" >
                                            <i class="fa fa-times"></i>
                                            </button>        
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
             function eliminarPlacard(id){
    swal({
        title: "Esta seguro/a de eliminar un Placard?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.href;
            $.ajax({
                type: "DELETE",
                url: url+"/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Placard Eliminado!","","success");
                      setTimeout(function(){location.reload()},1500);
                     
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salió mal","","error");
                }
            });

        } else {
          swal("No se borrado nada!");
        }
    });

    }
    </script>
@endsection