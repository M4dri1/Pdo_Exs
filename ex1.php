<?php
function conectar()
{

    $servidor = "localhost";
    $usuario = "root";
    $senha = "12345678";
    $dbname = "library1";

    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $senha);
        $pdo->exec("SET CHARACTER SET utf8");
    } catch (\Throwable $th) {
        return $th;
        die;
    }

    return $pdo;
}