<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;

class PrestamoCRUDController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        // Implementar la lógica para seleccionar un libro disponible
        $libros = Libro::where('estado', 'Disponible')->get();
        return view('prestamos.create', compact('libros'));
    }

    public function store(Request $request)
    {
        // Validar y procesar los datos de la solicitud
        $validatedData = $request->validate([
            'libro_id' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
        ]);
    
        try {
            // Crear un nuevo registro de préstamo con los datos proporcionados
            $prestamo = new Prestamo();
            $prestamo->libro_id = $validatedData['libro_id'];
            $prestamo->fecha_prestamo = $validatedData['fecha_prestamo'];
            $prestamo->fecha_devolucion = $validatedData['fecha_devolucion'];
    
            // Asignar un valor predeterminado para la columna 'usuario'
            $prestamo->usuario = 'valor_por_defecto';
    
            // Guardar el préstamo en la base de datos
            $prestamo->save();
    
            return redirect()->route('prestamos.index')->with('success', 'El préstamo se ha registrado exitosamente.');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante el proceso de guardado
            return redirect()->back()->with('error', 'Hubo un error al procesar el préstamo: ' . $e->getMessage());
        }
    }
    

    public function show(Prestamo $prestamo)
    {
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $libros = Libro::where('estado', 'Disponible')->get();
        return view('prestamos.edit', compact('prestamo', 'libros'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        // Actualizar el préstamo
        $prestamo->update($request->all());

        // Actualizar el estado del libro
        $libro = $prestamo->libro;
        $libro->estado = $prestamo->devuelto ? 'Disponible' : 'Prestado';
        $libro->save();

        return redirect()->route('prestamos.index');
    }

    public function destroy(Prestamo $prestamo)
    {
        // Restaurar el estado del libro
        $libro = $prestamo->libro;
        $libro->estado = 'Disponible';
        $libro->save();

        $prestamo->delete();

        return redirect()->route('prestamos.index');
    }
}