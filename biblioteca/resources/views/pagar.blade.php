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
        <div type="text-center">
            <form action="ejemplo.php" method="get">
                <p>Nºtarjeta: <input type="text-center" name="nombre" size="40"></p>
            </div>
            <form action="ejemplo.php" method="get">
                <p>Fecha caducidad: <input type="text" name="nombre" size="40"></p>
            </div>
            <form action="ejemplo.php" method="get">
                <p>Codigo seguridad: <input type="text" name="nombre" size="40"></p>
            </div> 
                      
        </div>
        <a href="{{route('pagado')}}" class="btn btn-danger" text-center>
                        {{__('Pagar') }}
                    </a>
        </div>


    </div>
<div class="mt-3">
</main>
@endsection