@extends('layouts.plantilla')
@section('contenido')
<style>
    #exampleSlider {
position: relative;
}
@media (max-width: 767px) {
#exampleSlider {
border-color: transparent;
}
}
#exampleSlider .MS-content {
    margin: 0px 0%;
    overflow: hidden;
    white-space: nowrap;
    width: 100%;
    height: 25vw;
    
    padding-top: 10px;
}
@media (max-width: 767px) {
#exampleSlider .MS-content {
margin: 0;
}
}
#exampleSlider .MS-content .item {
display: inline-block;
overflow: hidden;
position: relative;
vertical-align: top;
width: 32.333%;
}
#exampleSlider .MS-content .item div div {
    display: none;
}
#exampleSlider .MS-content .item:hover div div {
    display: flex;
}
.proyecto .proyecto_hover{
    display: none;
}
.proyecto:hover .proyecto_hover{
    display: flex;
}

#exampleSlider .MS-content .item p {
font-size: 30px;
text-align: center;
line-height: 1;
vertical-align: middle;
margin: 0;
padding: 10px 0;
}
#exampleSlider .MS-controls button {
position: absolute;
border: none;
background: transparent;
font-size: 30px;
outline: 0;
top: 35px;
}
@media (max-width: 767px) {
#exampleSlider .MS-controls button {
display: none;
}
}
#exampleSlider .MS-controls button:hover {
cursor: pointer;
}
#exampleSlider .MS-controls .MS-left {
left: 10px;
}
@media (max-width: 992px) {
#exampleSlider .MS-controls .MS-left {
left: -2px;
}
}
#exampleSlider .MS-controls .MS-right {
right: 10px;
}
@media (max-width: 992px) {
#exampleSlider .MS-controls .MS-right {
right: -2px;
}
}
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                @if($loop->first)
                    <div class="carousel-item active">
                        <div class="row" style=" 
                            background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)),url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:769px;
                            background-position:center;
                            ">
                            <div class="col-md-4 ms-5">
                                <div class="imgPrincipal_titulo" style="margin-top:130px">{!!$slider->texto!!}</div>
                                <div style="color:white;margin-top:130px; font-family: 'Gotham-Book';font-size:16px">
                                    aca va el texto
                                    agrego boton
                                </div>
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="carousel-item">
                        <div class="row" style=" 
                            background-image:url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:769px;
                            ">
                            <div class="col-md-4 ms-5 ">
                                <div class="imgPrincipal_titulo">{!!$slider->texto!!}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach 
        </div>
    </div>

    <!--PRODUCTOS INICIO-->

   <div class="d-flex flex-column justify-content-center align-items-center">

   </div>

<!--Carrusel-->
 <div id="exampleSlider">
    <div class="MS-content">
           @forelse ( $marca as $item)
           <div class="item">
            <div class="w-100 d-flex justify-content-center align-items-center" id="{{$loop->index}}" style="background:url({{ asset(Storage::url($item->imagen)) }});height:24vw;background-repeat: no-repeat;background-size: cover;background-position: center;margin: 12px 0;">
              <div onclick="modal('{{$loop->index}}')" class="justify-content-center align-items-center" style="background:#D81326;width:95%;height:22vw;opacity: 0.24;">
                  <img src="{{asset('images/icon_mas.svg')}}">
              </div>
            </div>
            {{-- <img src="{{ asset('img/'.$contenido->cliente[$j]->imagen.'') }}" style="height: 92px;width: 127px;margin: 0% 14%;"> --}}
        </div> 

        <div id="myModal{{$loop->index}}" class="modal">
          <span class="close" onclick="cerrar('myModal{{$loop->index}}')">&times;</span>
          <img class="modal-content" id="imgid{{$loop->index}}">          
      </div> 
           @empty
               
           @endforelse             
              
              
    </div>
    <div class="MS-controls" style="display:none;">
        <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
        <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
    </div>
</div>

<!--Proyectos-->
<div class="d-flex flex-row justify-content-center flex-wrap pb-4 ps-4 pe-4" style="background:#333333;">
    <div class="col-12 d-flex justify-content-center align-items-end" style="height: 148px;color:#fff;text-align:start;">
        <div class="col-5" style="border-right: 1px solid #ccc;height: 148px;">
            
        </div>
        <div class="titulo col-7 ps-4" style="font-size:37px;font-weight: 100;">
            PROYECTOS
        </div>
    </div>
    <div class="col-6" style="padding: 2vw;">
        <div class="col-12 d-flex flex-row flex-wrap">
            @forelse ($proyectos as $item)
            
                <div class="proyecto d-flex justify-content-center align-items-center" style="background:url({{ asset('images/001.png') }});height: 16vw;width: 21vw;background-repeat: no-repeat;background-size: cover;background-position: center;" onclick="proyecto('{{$loop->index}}')">
                    <div onclick="proyecto('{{$item->id}}')" class="justify-content-center align-items-center proyecto_hover" style="background:#D81326;width:95%;height:195px;opacity: 0.24;">
                    </div>      
                </div>
                <input type="hidden" id="titulo_{{$item->id}}" value="{{$item->titulo}}">
                <div style="display: none;" id="texto_{{$item->id}}">{!!$item->texto!!}</div>
            @empty
                
            @endforelse
        </div>
    </div>
    <div class="col-6 d-flex flex-column justify-content-center align-items-start" style="padding: 2vw;text-align:start">
        <div id="proyecto_titulo" class="mb-4" style="color:#fff;font-size:23px;font-weight: 100;"></div>
        <div class="d-flex flex-column" id="proyecto_texto" style="color:#fff;font-size:17px;font-weight: 100;"></div>
        
    </div>
</div>

<script src="{{asset('js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{ asset('js/multislider.min.js') }}"></script>
<script>
  $('#exampleSlider').multislider({
      interval: 50000000,
      slideAll: false,
      duration: 15000000
  });
  function cerrar(id){
      $('#'+id).css('display','none')
  }

  function proyecto(id){          
        var titulo = $('#titulo_'+id).val()
        var texto = $('#texto_'+id+" p").text()
        $('#proyecto_texto').text(texto)
        $('#proyecto_titulo').text(titulo)
        var url = window.location.href
        var url = url+"proyecto/"+id
        console.log(url)
        $('#proyecto_texto').append(`<button class="btn" onclick="window.location='${url}'" style="color:#fff;width:130px;padding:10px 0;text-align: start;" type="button" >VER MAS <i class="fas fa-arrow-right"></i></button>`)
  }
function modal(id){
// Get the modal
var modal = document.getElementById("myModal"+id);

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(id);
style = img.currentStyle || window.getComputedStyle(img, false),
bi = style.backgroundImage.slice(4, -1).replace(/"/g, "");
var modalImg = document.getElementById("imgid"+id);
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = bi;  
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
}
  
  </script>
  @endsection