@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex linea-azul align-items-center ps-5">
    <i class="fas fa-home me-2" style="color: white"></i>
    Productos / {{$subcategoria->categoria->titulo}} /  {{$subcategoria->titulo}}
</div>
 <!--Menu y Productos-->
 <div class="container-fluid ps-5 my-5">
    <div class="row">
        <div class="col-md-3">
            <div class="d-flex flex-column">
                @foreach ($categorias as $cat_menu)
                    <!--Si la categoria esta seleccionada-->
                    @if ($catsel==$cat_menu->id)
                        <a class="item_menu_active" href="{{route('categoria',$cat_menu->id)}}">{{$cat_menu->titulo}}</a>
                        <!--Si la categoria, tiene subcategorias las muestro, sino muestro productos-->
                        @if (!$cat_menu->subcategorias()->get()->isEmpty())
                            @foreach ($cat_menu->subcategorias()->get() as $subcat_menu)
                                @if ($subcat_menu->id==$prodsel)
                                <a class="item_menu_productos_active" href="{{route('subcategoria',$subcat_menu->id)}}">{{$subcat_menu->titulo}}</a>
                                @else
                                    <a class="item_menu_productos" href="{{route('subcategoria',$subcat_menu->id)}}">{{$subcat_menu->titulo}}</a>
                                @endif
                            @endforeach
                        @else
                            @foreach ($cat_menu->productos()->orderby('orden',"ASC")->get() as $prod_menu)
                                @if ($prod_menu->id==$prodsel)
                                    <a class="item_menu_productos_active" href="{{route('producto',$prod_menu->id)}}">{{$prod_menu->nombre}}</a>
                                @else
                                    <a class="item_menu_productos" href="{{route('producto',$prod_menu->id)}}">{{$prod_menu->nombre}}</a>
                                @endif
                            @endforeach
                        @endif
                        
                    @else
                        <a class="item_menu" href="{{route('categoria',$cat_menu->id)}}">{{$cat_menu->titulo}}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
               @foreach ($subcategoria->productos()->orderby('orden',"ASC")->get() as $producto)
                        <div class="col-md-4 mb-3">
                            <a class="enlace_categoria" href="{{route('producto',$producto->id)}}">
                                <div class="card contenedor">
                                    <div class="" style="background-image: url({{asset(Storage::url($producto->img_uno))}});
                                        height:267px;
                                        width:250px;
                                        background-repeat:no-repeat;
                                        background-size:contain;
                                        background-position:center">
                                    </div>
                                    <div class="overlay">
                                        <div class="text">
                                            <i class="fas fa-plus fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            
                                
                                <div class="titulo-categoria">
                                    {{$producto->nombre}}
                                </div>
                            </a>
                        </div>
                        @endforeach
               
            </div>
            
        </div>
    </div>
</div>
@endsection