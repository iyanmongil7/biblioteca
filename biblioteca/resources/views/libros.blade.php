@extends('layouts.app')

@section("content")

    <h1 class="col-12 display-5 text-center pb-3">{{ __("Listado de libros") }}</h1>

    @if (session('success'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="text-sm border border-t-8 rounded text-red-700 border-green-600 bg-red-100 px-3 py-4 mb-4" role="alert">
            {{ session('error') }}
        </div>
        @endif

<table class="listado table table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Autor") }}</th>
        <th scope="col">{{ ("Editorial") }}</th>
        <th scope="col">{{ ("Año") }}</th>
        <th scope="col">{{ ("Imagen") }}</th>
        <th scope="col">{{ ("Quitar prestamo") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($prestamos as $prestamo)
            <tr>
    
                <td>{{ $prestamo->libro()->first()->nombre }}</td>
                <td>{{ $prestamo->libro()->first()->autor }}</td>
                <td>{{ $prestamo->libro()->first()->editorial }}</td>
                <td>{{ $prestamo->libro()->first()->año }}</td>
                <td>
                    <img class="w-20 img-fluid text-center" src="{{$prestamo->libro()->first()->imagen}}">
                </td>

                
                <td>
                <a href="{{route('devolverPremium', $prestamo->id)}}" class="btn btn-danger" text-center>
                        {{__('Devolver') }}
                    </a>
                </div>
                
            </tr>
        @empty
            <tr>
                <td colspan="12">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay libros") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection
