@extends('layouts.plantilla')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}

@section('contenido')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.669390865537!2d-58.542045385040346!3d-34.46053935744271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcafe3bb11820b%3A0x1f240bd883386da!2sShawer!5e0!3m2!1ses-419!2sar!4v1630420619891!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<style>
 .link:hover{
  color:#ffffff;
 }    
 .link_correo:hover{
     color: #ffffff;
 }
 .titulo_contacto{
     font-family: 'Gotham-Light';
     color:#333333;
     font-size:35px;    
     text-transform: uppercase;
 }
 .texto_contacto{
    font-family: 'Gotham-XLight';
     color:#FFFFFF;
     font-size:25px;    
 }
 .Contacto-dato{
    font-family: 'Gotham-Light';
     color:#FFFFFF;
     font-size:16px; 
     text-decoration: none; 
 }
 .Contacto-dato:hover{
    text-decoration: underline; 
    color:#FFFFFF;
 }
</style>
<div class="container py-5 ">
    <div class="row">
        <div class="col-md-8 d-block ms-auto">
            @if (session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
            @endif
            <div class="titulo_contacto">Contacto</div>
            <div class="row px-5 py-4" style="background-color: #D81326">
                <form id="contacto" method="POST" action="{{route('consulta')}}">
                    @csrf
                <div class="col-md-12">
                    <div class="texto_contacto">
                        Ante cualquier duda, consulte a nuestros especialistas<br> para mayor información
                    </div>
                  
                </div>
                <div class="col-md-12 mt-3">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-md-12 mt-3">
                    <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="col-md-12 mt-3">
                    <textarea class="form-control" name="mensaje" id="mensaje"placeholder="Mensaje" rows="4" cols="50" required></textarea>
                </div>
                <div class="col-md-12 mt-3 ps-0 ms-0">
                    <button class="btn ps-0" type="submit" style="background: none; color:white;font-family:'Gotham-Light';font-size:18px">
                       
                        <span class="btn-text">    ENVIAR <i class="fas fa-long-arrow-alt-right"></i></span>
                    </button>
                </div>
                <div class="col-md-12 mt-5 ps-5 ms-5">
                    @foreach ($contactos as $contacto)
                    @if ($contacto->dato=="direccion")
                        <a href="https://g.page/Shawer?share" class="Contacto-dato">
                            {{$contacto->texto}}
                        </a>
                    @endif
                    @if ($contacto->dato=="telefono")
                        <br>
                    <a href="tel:{{$contacto->texto}}" class="Contacto-dato">
                    T    {{$contacto->texto}}
                    </a>
                    @endif
                    @if ($contacto->dato=="email")
                    <br>
                    <a href="mailto:{{$contacto->texto}}" class="Contacto-dato">
                    E    {{$contacto->texto}}
                    </a>
                    @endif
                    @endforeach
                    
                </div>
                </form>
            </div>
        </div>
        <img src="{{asset('images/imgContacto.png')}}" class="img-fluid" style="width: 500px;height:394px;z-index:1000;position: relative;top:-120px" >
    </div>
    {{-- <div class="row">
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
    </div> --}}

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