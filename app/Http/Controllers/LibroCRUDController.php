<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro; // Importa el modelo Libro
use App\Http\Controllers\Controller;

class LibroCRUDController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('books', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $libro = Libro::create($request->all());
        return redirect()->route('libros.index');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $libro->update($request->all());
        return redirect()->route('libros.index');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
