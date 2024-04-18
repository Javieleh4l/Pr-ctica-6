@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Libro</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Título:</strong> {{ $libro->titulo }}</p>
            <p><strong>Autor:</strong> {{ $libro->autor }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Cantidad:</strong> {{ $libro->cantidad }}</p>
            <p><strong>Estado:</strong> {{ $libro->estado }}</p>
        </div>
    </div>
</div>
@endsection
