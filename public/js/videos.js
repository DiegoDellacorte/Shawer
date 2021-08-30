$(function(){
    $('#formAgregarVideo').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarVideo')[0]);
        $.ajax({
            type: "POST",
            url: "agregarVideo",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Video Agregado","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formEditarVideo').on('submit',function(e){
        e.preventDefault();
        let id=$('#id_video').val();
        const form= new FormData($('#formEditarVideo')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarVideo/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Video Actualizado","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salió mal","","error");
            }
        });
    });
});
function editarVideo(id){
    $.ajax({
        type: "get",
        url: "editarVideo/"+id,
        success: function (response) {
        $('#id_video').val(id);
        $('#orden_edit').val(response.orden);
        $('#titulo_edit').val(response.titulo);
        $('#enlace_edit').val(response.enlace);
        }
    });
}
function eliminarVideo(id){
    swal({
        title: "Esta seguro/a de eliminar un Video?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarVideo/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Video Eliminado!","","success");
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