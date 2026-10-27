<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $this->authorize('create', Categoria::class);
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $this->authorize('create', Categoria::class);

        Categoria::create($request->validated());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(Categoria $categoria)
    {
        $this->authorize('update', $categoria);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        $categoria->update($request->validated());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', $categoria);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
