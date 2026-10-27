<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['usuario', 'categorias'])->get();
        return view('productos.index', compact('productos')); // O response()->json si es API
    }

    public function create()
    {
        $this->authorize('create', Producto::class);
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductoRequest $request)
    {
        $this->authorize('create', Producto::class);

        $producto = Producto::create([
            'nombre'      => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio,
            'existencia'  => $request->existencia,
            'usuario_id'  => auth()->id(), // Asigna el usuario autenticado
        ]);

        // Sincronizar categorías (relación N:M)
        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias);
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductoRequest $request, Producto $producto)
    {
        $this->authorize('update', $producto);

        $producto->update($request->only(['nombre', 'descripcion', 'precio', 'existencia']));

        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Producto $producto)
    {
        $this->authorize('delete', $producto);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
}