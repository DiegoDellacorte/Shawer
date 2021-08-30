<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b3aeabf072.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Fuentes-->
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <!--Estilos Plantilla-->
    <link rel="stylesheet" href="{{asset('css/plantilla.css')}}">
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Jquery-->
    <script src="{{asset('js/jquery/jquery.js')}}"></script>
    <title>Quamaq</title>
  </head>
  <body>
    <header>
        <div class="d-flex lineasuperior align-items-center justify-content-between ps-5">
            <div class="d-flex align-items-center">
              
               @foreach ($contactos as $contacto)
                    @if ($contacto->dato=="instagram")
                        <a href="{{$contacto->texto}}">
                            <i class="fab fa-instagram" style="color: #6698CC"></i>
                        </a>
                        <div class="mx-2" style="height: 18px;background-color:#6698CC;width:1px;"></div>
                    @endif
                   
                   @if ($contacto->dato=="facebook")
                       <a href="{{$contacto->texto}}">
                        <i class="fab fa-facebook-f " style="color: #6698CC"></i>
                        </a>
                        <div class="mx-2" style="height: 18px;background-color:#6698CC;width:1px;"></div>
                   @endif
                   @if ($contacto->dato=="youtube")
                   <a href="{{$contacto->texto}}">
                    <i class="fab fa-youtube" style="color: #6698CC"></i>
                    </a>
                    <div class="mx-2" style="height: 18px;background-color:#6698CC;width:1px;"></div>
               @endif
               @endforeach
            </div>
            <div class="">
                <form action="{{route('buscar')}}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center">
                        <div class="mx-1" style="height: 18px;background-color:#6698CC;width:1px;"></div>

                        <button type="submit" style="border: none;width:20px"> <i class="fas fa-search" style="color: #6698CC"></i></button>
                        <input type="text" class="input-buscar" name="buscar" placeholder="Estoy Buscando">
                    </div>
                
                </form>
            </div>
           
        </div>
        <?php 
        $routeName = Route::currentRouteName();
    
    
    switch ($routeName) {
        case 'empresa':
            $empresa_active = 'active';
            break;
        case 'categorias':
        case 'categoria':
        case 'producto':
            $productos_active = 'active';
            break;
        case 'servicios':
            $servicios_active= 'active';
            break;
        case 'clientes':
            $clientes_active='active';
            break;
        case 'videos':
            $videos_active = 'active';
            break;
        case 'presupuesto':
            $presupuesto_active = 'active';
            break;
        case 'contacto':
            $contacto_active = 'active';
        break;	
      
    }
            ?>
        <div class="container-fluid ps-5">
            <nav class="navbar navbar-expand-lg navbar-light" style="padding: unset">
              <a class="navbar-brand" href="{{route('inicio')}}"><img class="img-fluid" src="{{asset(Storage::url($iconoSup->icono))}}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ms-auto pe-md-5 ">
                    <li class="nav-item {{$empresa_active ?? ''}}">
                    <a class="nav-link " href="{{route('empresa')}}">EMPRESA</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$productos_active ?? ''}}" href="{{route('categorias')}}">PRODUCTOS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$servicios_active ?? ''}}" href="{{route('servicios')}}">Servicios</a>
                    </li>
                    <li class="nav-item {{$clientes_active ?? ''}}">
                        <a class="nav-link" href="{{route('clientes')}}">Clientes</a>
                      </li>
                    <li class="nav-item {{$videos_active ?? ''}}">
                      <a class="nav-link" href="{{route('videos')}}">Videos</a>
                    </li>
                    <li class="nav-item {{$presupuesto_active ?? ''}}">
                        <a class="nav-link" href="{{route('presupuesto')}}">Solicitar Presupuesto</a>
                    </li>
                    <li class="nav-item {{$contacto_active ?? ''}}">
                        <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                    </li>
                   
                  </ul>
                 
                </div>
            </nav>
        </div>
    </header>
    @yield('contenido')
    <footer>
        
        {{-- <div class="container-fluid " style="background-image: url({{asset(('images/footer.svg'))}});
        padding-top:50px;
        padding-bottom:100px;
        background-repeat:no-repeat;
        background-size:contain;
        background-position:bottom;
       "> --}}
       <div class="container-fluid py-5 ps-5 " style="background-color: #444444">
            
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('inicio')}}"> <img class="img-fluid" src="{{asset(Storage::url($iconoInf->icono))}}"></a>
                </div>
                <div class="col-md-4">
                    <div class="pie_titulo">Mapa del sitio</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=""><a class="pie_secciones" href="{{route('inicio')}}">Home</a></div>
                            <div class=""><a class="pie_secciones" href="{{route('empresa')}}">Empresa</a></div>
                            <div class=""><a class="pie_secciones" href="{{route('categorias')}}">Productos</a></div>
                            <div class=""><a class="pie_secciones" href="{{route('servicios')}}">Servicios</a></div>
                        </div>
                        <div class="col-md-6">
                            <div class=""><a class="pie_secciones" href="{{route('clientes')}}">Clientes</a></div>
                            <div class=""><a class="pie_secciones" href="{{route('presupuesto')}}">Solicitar Presupuesto</a></div>
                            <div class=""><a class="pie_secciones" href="{{route('contacto')}}">Contacto</a></div>

                        </div>
                    </div>
                
                  
                </div>
                <div class="col-md-3">
                    <div class="pie_titulo">QUAMAQ</div>
                    <div class="row">
                        @foreach ($contactos as $contacto)
                        @switch($contacto->dato)
                            @case("direccion")
                                <div class="col-md-1 col-1 mt-2">
                                    <i class="fas fa-map-marker-alt" style="color: #399D7F"></i>
                                </div>
                                <div class="col-md-11 col-11 mt-2 pe-5">
                                    <a class="pie-enlacecontacto" href="https://goo.gl/maps/x1JQBUKA48QzYs8c7">{{$contacto->texto}}</a>
                                </div>
                              
                                @break
                            @case("email")
                                <div class="col-md-1 col-1 mt-2">
                                    <i class="fas fa-envelope" style="color: #399D7F"></i>
                                </div>
                                <div class="col-md-11 col-11 mt-2">
                                    <a class="pie-enlacecontacto" href="mailto:{{$contacto->texto}}">{{$contacto->texto}}</a>
                                </div>
                                @break
                            @case("telefono_uno")
                                <div class="col-md-1 col-1 mt-2">
                                    <i class="fas fa-phone-alt" style="color: #399D7F"></i>
                                </div>
                                <div class="col-md-11 col-11 mt-2">
                                    <a class="pie-enlacecontacto" href="tel:{{$contacto->texto}}">{{$contacto->texto}}</a>
                                </div>
                                @break
                                @case("telefono_dos")
                                <div class="col-md-1 col-1 mt-2">
                                   
                                </div>
                                <div class="col-md-11 col-11 mt-2">
                                    <a class="pie-enlacecontacto" href="tel:{{$contacto->texto}}">{{$contacto->texto}}</a>
                                </div>
                                @break
                            @default
                                
                        @endswitch
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-3">
                    <div style="border-top:2px solid white;width:90%">
                </div>
                <div class="col-md-4 mt-3">
                    <div class="d-flex align-items-center">
                        <div class="seguinos_en me-3" style="font-family: 'Poppins-Light'">Seguinos en</div>
                        @foreach ($contactos as $contacto)
                        @if ($contacto->dato=="instagram")
                            <a href="{{$contacto->texto}}">
                                <i class="fab fa-instagram" style="color: white"></i>
                            </a>
                            <div class="mx-2" style="height: 18px;background-color:white;width:1px;"></div>
                        @endif
                       
                       @if ($contacto->dato=="facebook")
                           <a href="{{$contacto->texto}}">
                            <i class="fab fa-facebook-f " style="color: white"></i>
                            </a>
                            <div class="mx-2" style="height: 18px;background-color:white;width:1px;"></div>
                       @endif
                       @if ($contacto->dato=="youtube")
                       <a href="{{$contacto->texto}}">
                        <i class="fab fa-youtube" style="color: white"></i>
                        </a>
                        <div class="mx-2" style="height: 18px;background-color:white;width:1px;"></div>
                   @endif
                   @endforeach
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>
    <script>

    </script>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
  </body>
</html>