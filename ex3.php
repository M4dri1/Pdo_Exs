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

$consulta = $pdo->query("
    SELECT books.*, authors.name FROM books LEFT JOIN authors ON books.author_id = authors.author_id
");

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Books</h2>
    <table border="1">
        <tr>
            <th>ID Book</th>
            <th>Title</th>
            <th>ID Author</th>
            <th>Author</th>
        </tr>
        <?php foreach ($resultado as $linha): ?>
            <tr>
                <td><?= $linha['book_id'] ?></td>
                <td><?= $linha['title'] ?></td>
                <td><?= $linha['author_id'] ?></td>
                <td><?= $linha['name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>