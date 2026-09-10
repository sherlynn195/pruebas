<?php

session_start();

require_once "../config/usuarios.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$usuarioIngresado = $data["usuario"] ?? "";
$passwordIngresada = $data["password"] ?? "";

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

    echo json_encode([
        "success" => false,
        "message" => "Usuario o contraseña incorrectos"
    ]);

    exit;
}

$_SESSION["usuario"] = $usuarioEncontrado["usuario"];
$_SESSION["rol"] = $usuarioEncontrado["rol"];

echo json_encode([
    "success" => true,
    "usuario" => $usuarioEncontrado["usuario"],
    "rol" => $usuarioEncontrado["rol"]
]);