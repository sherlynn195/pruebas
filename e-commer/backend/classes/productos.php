<?php

declare(strict_types=1);

require_once __DIR__ . '/Producto.php';

/**
 * Clase Productos
 * Repositorio encargado de leer el catálogo de productos (JSON)
 * y devolverlo como objetos Producto.
 */
class Productos
{
    private string $rutaJson;

    public function __construct()
    {
        $this->rutaJson = __DIR__ . '/../config/productos.json';
    }

    /**
     * Devuelve todos los productos del catálogo.
     * @return Producto[]
     */
    public function obtenerTodos(): array
    {
        if (!file_exists($this->rutaJson)) {
            return [];
        }

        $contenido = file_get_contents($this->rutaJson);
        $datos = json_decode($contenido, true);

        if (!is_array($datos)) {
            return [];
        }

        $productos = [];

        foreach ($datos as $item) {
            $productos[] = new Producto(
                (int)$item['id'],
                (string)$item['nombre'],
                (float)$item['precio'],
                (int)$item['existencias'],
                (string)$item['imagen']
            );
        }

        return $productos;
    }

    /**
     * Busca un producto por su id.
     */
    public function obtenerPorId(int $id): ?Producto
    {
        foreach ($this->obtenerTodos() as $producto) {
            if ($producto->getId() === $id) {
                return $producto;
            }
        }

        return null;
    }
}