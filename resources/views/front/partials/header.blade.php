<header>
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