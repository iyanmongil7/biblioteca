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

            <div class="d-flex justify-content-center pt-3">
            <div class="d-flex justify-content-center p-2 ">
                <form class="row  input-group sombra mx-5 col-3 text-center" id="buscador">

                    <input name="buscarpor" class="form-control col-3" type="search" placeholder="Pagar" aria-label="Search">

                    <button class="btn btn-danger boton col-2 input-group-btn " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search ml-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </form>
            </div>
        </div>
        </div>
    </div>
<div class="mt-3">l
</main>
@endsection