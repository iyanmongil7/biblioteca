@extends('layouts.app')

@section("content")

    <h1 class="text-center text-success">{{ __("Listado de libros") }}</h1>
<table class="table table-danger table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Libro") }}</th>
        <th scope="col">{{ ("Nombre") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($prestamos as $prestamo)
            <tr>
    
                <td>{{ $prestamo->libro()->first()->nombre }}</td>
                <td>{{ $prestamo->user()->first()->name }}</td>

            
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay libros") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@if (session('success'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif
<div class="mt-3">

</div>
@endsection
