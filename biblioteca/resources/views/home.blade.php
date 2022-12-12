@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-autos" style="margin: auto;">
    <div class="w-full sm:px-6 fondo-pantalla2">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="carousel slide carousel-fade container" id="mi-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="width: 100%" src="images\portada3.png" alt="">
                         
                    </div>
                    <div class="carousel-item pt-3" data-bs-interval="5000">
                        <img style="width: 100%" src="images\portada4.jpg" alt="">
                        
                    </div>

                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#mi-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#mi-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>

              
                <div class="carousel-indicators">
                    <button type="button" class="active" data-bs-target="#mi-carousel" data-bs-slide-to="0" aria-label="Slide 1"></button>
                    <button type="button" class="" data-bs-target="#mi-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  
                </div>


         </div>
    </div>
</main>
@endsection
