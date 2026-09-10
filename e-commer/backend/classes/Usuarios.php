<?php

class Usuario
{
    private string $usuario;
    private string $password;
    private string $rol;

    public function __construct(
        string $usuario,
        string $password,
        string $rol
    ) {
        $this->usuario = $usuario;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRol(): string
    {
        return $this->rol;
    }
}