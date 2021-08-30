@extends('layouts.plantilla')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}

@section('contenido')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.407653021274!2d-58.36462468503155!3d-34.72011757117268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccc4fcdb2b147%3A0x275b87402a447459!2sQuamaq!5e0!3m2!1ses-419!2sar!4v1616365650044!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<style>
 .link:hover{
  color:#ffffff;
 }    
 .link_correo:hover{
     color: #ffffff;
 }
 .titulo_contacto{
     font-family: 'Montserrat-Bold';
     color:#ffffff;
     font-size:18px;    
 }
</style>
<div class="container-fluid py-5 ps-5">

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4">
          <div style="color: #399D7F;font-family:'Poppins-Medium';font-size:20px">  Quamaq</div>
        
            <div class="row mt-2">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                <p class=""style="font-family:'Poppins-Light';color:#212121;font-size:16px">
                    Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.
                </p>
                </div>
            </div>
            <div class="row">
                
                <div class="col-xl-12 col-lg-12 col-md-12">
                   
                       
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-map-marker-alt fa-lg" style="color:#399D7F;"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10 my-2">
                                @foreach ($contactos as $contacto)
                                    @if($contacto->dato=="direccion")
                                    
                                    <a class="FormContacto-enlace"  href="https://goo.gl/maps/MDdAkFnH8rtnktpP9">   <span>{{$contacto->texto}}</span></a>
                                    @endif
                                @endforeach
                            </div>
                          
                            
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-phone-alt fa-lg" style="color:#399D7F"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10  my-2">
                                @foreach ($contactos as $contacto)
                                @if($contacto->dato=="telefono_uno")
                               
                            <a class="FormContacto-enlace" href="tel:{{$contacto->texto}}">    <span >{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                                @foreach ($contactos as $contacto)
                                @if($contacto->dato=="telefono_dos")
                               <br>
                            <a class="FormContacto-enlace" href="tel:{{$contacto->texto}}">    <span >{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                            </div>
                            
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-envelope fa-lg" style="color: #399D7F"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                @if($contacto->dato=="email")
                               
                                <a class="FormContacto-enlace" href="mailto:{{$contacto->texto}}">     <span >{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                            </div>
                    
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            <form id="contacto" method="POST" action="{{route('consulta')}}">
               @csrf
               @if (session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                    @endif
                <div class="row">
                  <div class="col">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                  </div>
                  <div class="col">
                   <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
                  </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                      <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                    <textarea class="form-control" name="mensaje" id="mensaje"placeholder="Mensaje" rows="4" cols="50" required></textarea>
                    </div>
                </div>
               
                <div class="row my-3">
                    <div class="col ">
                        <button class="btn py-2 px-5 float-end" type="submit" style="background: #6698CC; color:white;font-family:'Poppins-Bold';font-size:14px">
                        <span class="spinner-border spinner-border-sm d-none"> </span>
                        <span class="btn-text">    ENVIAR</span>
                        </button>
                    </div>
                </div>
              </form>
        </div>
    </div>

</div>

<script>
   
//    $('#contacto').on('submit',function(e){
//     e.preventDefault();
//     let form= new FormData($('#contacto')[0]);
//         $('.spinner-border').removeClass('d-none');
//         $('.btn-text').text('Enviando');
//         $.ajax({
//             type: 'POST',
//             url: 'email',
//             data: form,
//             processData: false,  // tell jQuery not to process the data
//             contentType: false,   // tell jQuery not to set contentType
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
//             success: function(response) {
//             //se llama cuando tiene éxito la respuesta
//             swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
//             $('#contacto')[0].reset();
//             },
//              error: function(response) {
//              console.log(response);
//             swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

//             },complete:function(){
//             $('.spinner-border').addClass('d-none');
//             $('.btn-text').text('Enviar');
//             }
//         });
//    });
</script>


@endsection