<?php

session_start();

require_once "../config/usuarios.php";

$usuarioIngresado = $_POST["usuario"] ?? "";
$passwordIngresada = $_POST["password"] ?? "";

$usuarioEncontrado = null;

foreach ($usuarios as $usuario) {

    if (
        $usuario["usuario"] === $usuarioIngresado &&
        $usuario["password"] === $passwordIngresada
    ) {
        $usuarioEncontrado = $usuario;
        break;
    }
}

if ($usuarioEncontrado === null) {

    header("Location: ../../frontend/pages/error.html");
    exit;
}

$_SESSION["usuario"] = $usuarioEncontrado["usuario"];
$_SESSION["rol"] = $usuarioEncontrado["rol"];

if ($usuarioEncontrado["rol"] === "administrador") {

    header("Location: ../../frontend/pages/dadministrador.html");
    exit;
}

if ($usuarioEncontrado["rol"] === "cliente") {

    header("Location: ../../frontend/pages/cliente.html");
    exit;
}