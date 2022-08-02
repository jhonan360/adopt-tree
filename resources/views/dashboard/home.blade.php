@extends('layouts.dashboard')
@section('contentBody')
    <div class="text-center">
        <h1>BIENVENIDO {{ Str::upper(Auth::user()->nombre )}}</h1>
    </div>
@endsection