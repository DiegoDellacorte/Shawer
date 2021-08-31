@extends('home')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar platos
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('platos.create')}}">
                                <i class="fas fa-plus"></i>
                                Agregar plato
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <th>Orden</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            @foreach ($platos as $plato)
                                <tr>
                                    <td>{{$plato->orden}}</td>
                                    <td>{{$plato->titulo}}</td>
                                    <td>
                                    <div class="form-button-action">
                                        <a   class="btn btn-link btn-primary btn-lg" href="{{route('platos.edit',$plato->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
    
                                            <button    class="btn btn-link btn-danger"  onclick="eliminarPlato({{$plato->id}})" >
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
             function eliminarPlato(id){
    swal({
        title: "Esta seguro/a de eliminar un Plato?",
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
                    swal("Poof! Plato Eliminada!","","success");
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