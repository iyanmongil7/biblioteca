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

            <div class="d-flex justify-content-center pt-3">
            <div class="d-flex justify-content-center p-2 ">
                <form class="row input-group sombra mx-5 col-3 text-center" id="buscador">

                    <input name="buscarpor" class="form-control col-3" type="search" placeholder="Buscar libro" aria-label="Search">

                    <button class="listado boton col-2 input-group-btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search ml-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </form>
            </div>
        </div>
             <div class="container row justify-content-center">
                @forelse($libros as $libro)
           
                <div class="col-6 d-flex justify-content-center pb-5">
                    <div class="text-center border flex-column d-flex justify-content-center w-50 ">
                        <h2 class="px-2 py-2 text center">{{ $libro->nombre }}</h2>
                        <img class="w-100 img-fluid text-center" src="{{$libro->imagen}}">
                    
                        @if(Auth::check() and (Auth::user()->hasRoles('premium') or Auth::user()->hasRoles('admin')))
                    <a href="{{route('crearReserva', $libro->id)}}" class="btn btn-primary pt-3">
                        {{__('prestamo') }}
                    </a>
                    @endif


                    </div>
                </div>
            
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100  border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ ("No hay Libros") }}</strong></p>
                            <span class="block sm:inline">{{ ("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
            </div>
            {{ $libros->links() }}
        </div>
    </div>
</main>
@endsection