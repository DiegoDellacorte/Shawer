<footer>
    <div class="container-fluid py-5 px-5 " style="background-color: #FFFFFF">
        
        <div class="row">
            <div class="col-md-8 col-12">
                <div style="font-family:'Gotham-Bold';font-size:16px;color:#D81326">Conozca mejor nuestros productos</div>
                <div style="font-family:'Gotham-Light';font-size:18px;color:#D81326">Consulte a nuestros especialistas para mayor informaci&oacute;n</div>
                <div style="width: 75px;height:1px;background-color:#D81326"></div>
            </div>
            <div class="col-md-4 col-12">
                <a href="{{route('inicio')}}"> <img class="img-fluid d-md-block ms-md-auto mt-3 mt-md-0" src="{{asset(Storage::url($iconoInf->icono))}}"></a>
            </div>
        </div>
         <div class="row mt-5">
            <div class="col-md-2">
                @foreach ($contactos as $contacto)
                    @if ($contacto->dato=="direccion")
                        <a href="https://g.page/Shawer?share" class="pie-enlacecontacto">
                            {{$contacto->texto}}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="col-md-2">
                @foreach ($contactos as $contacto)
                    @if ($contacto->dato=="telefono")

                        <a href="tel:{{$contacto->texto}}" class="pie-enlacecontacto">
                        T    {{$contacto->texto}}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                @foreach ($contactos as $contacto)
                    @if ($contacto->dato=="email")

                        <a href="mailto:{{$contacto->texto}}" class="pie-enlacecontacto">
                        E    {{$contacto->texto}}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        @foreach ($contactos as $contacto)
                            @if ($contacto->dato=="instagram")
                                <div class="col-md-12">
                                    <a href="{{$contacto->texto}}" class="pie-enlacecontacto">
                                        <i class="fab fa-instagram" style="color: #D81326"></i>
                                        @shawermamparas
                                    </a>
                                </div>
                            @endif
                            @if ($contacto->dato=="facebook")
                                <div class="col-md-12">
                                    <a href="{{$contacto->texto}}" class="pie-enlacecontacto">
                                        <i class="fab fa-facebook-f" style="color: #D81326"></i>
                                        mamparas.shawer
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach ($contactos as $contacto)
                            @if ($contacto->dato=="youtube")
                                <div class="col-md-12">
                                    <a href="{{$contacto->texto}}" class="pie-enlacecontacto">
                                        <i class="fab fa-youtube" style="color: #D81326"></i>
                                        @shawermamparas
                                    </a>
                            @endif
                            @if ($contacto->dato=="facebook")
                                <div class="col-md-12">
                                    <a href="{{$contacto->texto}}" class="pie-enlacecontacto">
                                        <i class="fab fa-pinterest" style="color: #D81326"></i>
                                        shawerarg
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</footer>