@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">


    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="container">
            <h1 class="col-12 display-5 text-primary text-danger text-center mt-2 pb-5"> Metodo de pago</h1>
            <h3 class="col-12 display-5 text-primary text-danger text-center mt-2 pb-5"> Por 2,99</h3>
            <form enctype="multipart/form-data" class="w-full max-w-lg border-4" method="GET" action="{{route('pagado')}}">
                <div class="col-8 mt-2">
                        <p>Nºtarjeta: <input type="text-center" name="N_tarjeta" size="40"></p>
                        @error("N_tarjeta")
                            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                        <p>Fecha caducidad: <input type="text" name="Fecha_caducidad" size="40"></p>
                        @error("Fecha_caducidad")
                            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                        <p>Codigo seguridad: <input type="text" name="Codigo_seguridad" size="40"></p>
                        @error("Codigo_seguridad")
                            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                </div>             
                <button type="submit" class="btn btn-danger" text-center>
                        {{__('Pagar') }}
                </button>
        </form>
        </div>
        </div>


    </div>
<div class="mt-3">
</main>
@endsection