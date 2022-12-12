@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-autos">


    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="container">
            <h1 class="col-12 display-5 catalogo text-center pb-3"> Catálogo</h1>

        </div>
        <a class="shadow fondo-pantalla text-center mt-5 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="#" onclick="history.back()">Volver</a>
             <div class="container row justify-content-center">

                <div style="width: 50%; display:flex; justify-content: center;">
                    <div class="card col-lg-6 col-sm-10 col-md-5 row mx-5 mb-3 d-flex justify-content-center align-items-center listado text-white sombra">
                        <h2 class="px-2 py-2 text-center">{{ $libro->nombre }}</h2>
                            <div class="card-header text-center col-12 d-flex justify-content-center">
                                <img class="img-fluid border p-0" src="/{{$libro->imagen}}">
                        
                            </div>
                            <div class="text-black pt-3 pb-3">
                            <p class="pt-2 pb-2">Nombre: {{ $libro->nombre }}</p>
                            <p class="pt-2 pb-2">Autor: {{ $libro->autor }}</p>
                            <p class="pt-2 pb-2">Editorial: {{ $libro->editorial }}</p>
                            <p class="pt-2 pb-2">Año: {{ $libro->año }}</p>
                            <p class="pt-2 pb-2">Editorial: {{ $libro->editorial }}</p>
                            <p class="pt-2 pb-2">Unidades: {{ $libro->unidades - App\Models\Prestamo::where('libros', '=', $libro->id)->count() }}</p>
                            </div>
                            
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</main>
@endsection