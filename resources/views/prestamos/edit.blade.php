@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Préstamo</h1>
        <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="libro_id">Libro</label>
                <select name="libro_id" id="libro_id" class="form-control">
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}" {{ $libro->id == $prestamo->libro_id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $prestamo->usuario }}">
            </div>
            <div class="form-group">
                <label for="fecha_prestamo">Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" value="{{ $prestamo->fecha_prestamo }}">
            </div>
            <div class="form-group">
                <label for="fecha_devolucion">Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" value="{{ $prestamo->fecha_devolucion }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
