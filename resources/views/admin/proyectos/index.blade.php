@extends('home')
@section('contenido')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Proyectos
                        <div class="float-right">
                            <a href="{{route('proyectos.create')}}" class="btn btn-outline-info">
                                Agregar Proyecto
                            </a>
                        </div>
                    </div>  
                    <div class="card-body">
                        <table class="table">
                            <th>Orden</th>
                            <th>Titulo</th>
                            <th>Acciones</th>
                            @foreach ($proyectos as $proyecto)
                                <tr>
                                    <td>{{$proyecto->orden}}</td>
                                    <td>{{$proyecto->titulo}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a   class="btn btn-link btn-primary btn-lg" href="{{route('proyectos.edit',$proyecto->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
        
                                                <button    class="btn btn-link btn-danger"  onclick="eliminarProyecto({{$proyecto->id}})" >
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
        function eliminarProyecto(id){
swal({
   title: "Esta seguro/a de eliminar una Proyecto?",
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
               swal("Poof! Proyecto Eliminada!","","success");
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