@extends('home')
@section('contenido')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Productos
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('productos.create')}}">
                                <i class="fas fa-plus">
                                </i>
                                Agregar Producto
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{$producto->orden}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td><img src="/storage/{{$producto->img_uno}}" width="200px"></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a   class="btn btn-link btn-primary btn-lg" href="{{route('productos.edit',$producto)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
            
                                                    <button    class="btn btn-link btn-danger"  onclick="eliminarProducto({{$producto->id}})" >
                                                    <i class="fa fa-times"></i>
                                                    </button>        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function eliminarProducto(id){
    swal({
        title: "Esta seguro/a de eliminar un Producto?",
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
                    swal("Poof! Producto Eliminado!","","success");
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