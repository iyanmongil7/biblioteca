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
            <h1 class="col-12 display-5 text-primary text-danger text-center mt-2 pb-5"> Pagado</h1>
        <div type="text-center">
   


    </div>
<div class="mt-3">
</main>
@endsection