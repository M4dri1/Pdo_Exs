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

$pdo = conectar();

$pd = "INSERT INTO books (author_id, title) VALUES (2, 'The Silence of Broken Hours')";

if ($pdo->exec($pd)) {
    echo "Livro adicionado com sucesso!";
} else {
    echo "Erro ao adicionar livro";
}
?>