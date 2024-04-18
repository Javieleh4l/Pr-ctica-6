@extends('layouts.app')

@section('content')
    <style>
        /* Estilos personalizados */
        .container {
            margin-top: 20px;
        }

        .btn-primary,
        .btn-danger {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            filter: brightness(90%);
        }

        /* Estilos para la tabla */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Libros</h2>
                <a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">Añadir Libro</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->estado }}</td>
                                <td>
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
