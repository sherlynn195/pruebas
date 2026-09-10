<?php

declare(strict_types=1);

class Producto
{
    private int $id;
    private string $nombre;
    private float $precio;
    private int $existencias;
    private string $imagen;

    public function __construct(
        int $id,
        string $nombre,
        float $precio,
        int $existencias,
        string $imagen
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->existencias = $existencias;
        $this->imagen = $imagen;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getExistencias(): int
    {
        return $this->existencias;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Representación en array, útil para respuestas JSON.
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'existencias' => $this->existencias,
            'imagen' => $this->imagen,
        ];
    }
}