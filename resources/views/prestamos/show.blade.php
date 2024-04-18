@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Préstamo</div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $prestamo->id }}</p>
                        <p><strong>Libro:</strong> {{ $prestamo->libro ? $prestamo->libro->titulo : 'No disponible' }}</p>
                        <p><strong>Usuario:</strong> {{ $prestamo->usuario }}</p>
                        <p><strong>Fecha de Préstamo:</strong> {{ $prestamo->fecha_prestamo }}</p>
                        <p><strong>Fecha de Devolución:</strong> {{ $prestamo->fecha_devolucion }}</p>
                        <p><strong>Estado:</strong> {{ $prestamo->devuelto ? 'Devuelto' : 'Prestado' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
