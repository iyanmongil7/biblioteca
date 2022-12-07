@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="p-5 flex justify-center flex-wrap">
        @include("contacta.form")
    </div>

    @elseif(!Auth::check())
    
    <div class="text-center pt-5">
        <h1>Necesitas estar logueado</h1>
    </div>
    @endif
@endsection