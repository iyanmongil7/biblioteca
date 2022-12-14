@extends ('adminlte::page')

@section("content")

    <h1 class="text-center text-dark">{{ __("Listado de libros") }}</h1> 
    @if (session('success'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('error') }}
        </div>
        @endif   
    <div class="text-center pt-2 pb-2">
    <a href="{{route('libros.create')}}" class="btn btn-primary">Añadir</a>
    </div>
<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Autor") }}</th>
        <th scope="col">{{ ("Editorial") }}</th>
        <th scope="col">{{ ("Año") }}</th>
        <th scope="col">{{ ("Unidades") }}</th>
        <th scope="col">{{ ("Imagen") }}</th>
    </tr>
    </thead>

    <tbody>
        
        @forelse($libros as $libro)
            <tr>
    
                <td>{{ $libro->nombre }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial}}</td>
                <td>{{ $libro->año }}</td>
                <td>{{ $libro->unidades }}</td>
                <td>{{ $libro->imagen }}</td>

                <td><a href="{{route('libros.edit',  $libro->id )}}" class="btn btn-primary btn-sm">Editar</a></td>
                <td>
                <a href="{{route('confirmarEliminar',  $libro->id )}}" class="btn btn-danger btn-sm">eliminar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
{{ $libros->links() }}


</div>
@endsection
