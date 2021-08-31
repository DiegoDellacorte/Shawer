<?php 
$routeName = Route::currentRouteName();


switch ($routeName) {
case 'inicio.sliders':
    $inicio_active = 'active';
    break;
case 'inicio.editarContenido':
    $inicio_active = 'active';
    break;
case 'barandas.sliders':
case 'barandas.editarContenido': 
    $barandas_active='active';
    break;
case 'hidromasajes.index':
case 'hidromasajes.create':
case 'hidromasajes.edit':
case 'hidromasajes.sliders': 
case 'hidromasajes.editarContenido': 
    $hidro_active= 'active';
break;
case 'platos.index':
case 'platos.create':
case 'platos.edit':
case 'platos.sliders': 
case 'platos.editarContenido': 
    $platos_active= 'active';
break;
case 'espejos.index':
case 'espejos.create':
case 'espejos.edit':
case 'espejos.sliders': 
case 'espejos.editarContenido': 
    $espejos_active= 'active';
break;
case 'placard.index':
case 'placard.create':
case 'placard.edit':
case 'placard.sliders': 
case 'placard.editarContenido': 
    $placard_active= 'active';
break;
case 'vermetadatos':
    $metadatos_active= 'active';
    break;
case 'contacto.contenido':
    $contacto_active = 'active';
break;	
case 'usuarios.index':
    $usuarios_active = 'active';
    break;
case 'verusuarios':
    $usuarios_active = 'active';
    break;
}
    ?>
<div class="sidebar">
			
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Panel Shawer</h4>
                </li>
                <li class="nav-item {{$inicio_active ?? ''}} ">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-home"></i>
                        <p>Inicio</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('inicio.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                            <li>
                            <a href="{{route('inicio.editarContenido')}}">
                                <span class="sub-item">Contenido</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$mamparas_active ?? ''}} ">
                    <a data-toggle="collapse" href="#mamparas">
                        <i class="fas fa-building"></i>
                        <p>Mamparas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mamparas">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('mamparas.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                            <li>
                            <a href="{{route('mamparas.editarContenido')}}">
                                <span class="sub-item">Contenido Seccion</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{route('mamparas.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$barandas_active ?? ''}} ">
                    <a data-toggle="collapse" href="#barandas">
                        <i class="fas fa-building"></i>
                        <p>Barandas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="barandas">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('barandas.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                            <li>
                            <a href="{{route('barandas.editarContenido')}}">
                                <span class="sub-item">Contenido Seccion</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{route('barandas.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$hidro_active ?? ''}} ">
                    <a data-toggle="collapse" href="#HidroMasajes">
                        <i class="fas fa-building"></i>
                        <p>HidroMasajes</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="HidroMasajes">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hidromasajes.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('hidromasajes.editarContenido')}}">
                                    <span class="sub-item">Contenido Seccion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('hidromasajes.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$platos_active ?? ''}} ">
                    <a data-toggle="collapse" href="#Platos">
                        <i class="fas fa-building"></i>
                        <p>Platos de Ducha</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Platos">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('platos.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('platos.editarContenido')}}">
                                    <span class="sub-item">Contenido Seccion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('platos.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$vanitorys_active ?? ''}} ">
                    <a data-toggle="collapse" href="#vanitorys">
                        <i class="fas fa-building"></i>
                        <p>Vanitorys</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="vanitorys">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('vanitorys.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('vanitorys.editarContenido')}}">
                                    <span class="sub-item">Contenido Seccion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('vanitorys.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$espejos_active ?? ''}} ">
                    <a data-toggle="collapse" href="#espejos">
                        <i class="fas fa-building"></i>
                        <p>Espejos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="espejos">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('espejos.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('espejos.editarContenido')}}">
                                    <span class="sub-item">Contenido Seccion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('espejos.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$placard_active ?? ''}} ">
                    <a data-toggle="collapse" href="#placard">
                        <i class="fas fa-building"></i>
                        <p>Placard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="placard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('placard.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('placard.editarContenido')}}">
                                    <span class="sub-item">Contenido Seccion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('placard.index')}}">
                                    <span class="sub-item">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$proyectos_active ?? ''}} ">
                    <a data-toggle="collapse" href="#proyectos">
                        <i class="fas fa-building"></i>
                        <p>Proyectos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="proyectos">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('proyectos.sliders')}}">
                                        <span class="sub-item">Sliders</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('proyectos.index')}}">
                                    <span class="sub-item">Proyectos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <li class="nav-item {{$contacto_active ?? ''}} ">
                    <a data-toggle="collapse" href="#contacto">
                        <i class="fas fa-address-book"></i>
                        <p>Contacto</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="contacto">
                        <ul class="nav nav-collapse">
                            <li>
                            <a href="{{route('contacto.contenido')}}">
                                    <span class="sub-item">Editar </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$usuarios_active ?? ''}} ">
                    <a data-toggle="collapse" href="#custompages">
                        <i class="fas fa-user"></i>
                        <p>Usuarios</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="custompages">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('usuarios.index')}}">
                                    <span class="sub-item">Crear Usuario</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('verusuarios')}}">
                                    <span class="sub-item">Editar Usuario</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{$metadatos_active ?? ''}}">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-globe"></i>
                        <p>Metadatos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                    <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('vermetadatos')}}">
                                    <span class="sub-item">Editar</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>  
            </ul>
            
        </div>
    </div>
</div>