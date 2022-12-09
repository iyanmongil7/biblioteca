@extends ('adminlte::page')

@section("content")
<main class="sm:container sm:mx-auto sm:mt-10">


    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row container d-flex justify-content-center pt-5">
   
        <form id="delete-libro-form" action="{{route('libros.destroy', $id)}}" method="POST" class="hidden">
                    @method('DELETE')
                    @csrf
                </form>
                <h2 class="col-12 display-5 catalogo text-center pb-3">¿Desea eliminar el libro?</h2>
                <button class="col-2 btn btn-danger btn-sm" onclick="event.preventDefault() ; 
                 document.getElementById('delete-libro-form').submit();">confirmar</button>
                      
        </div>


    </div>
<div class="mt-3">
</main>
@endsection

