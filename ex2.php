<?php
function conect()
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

$pdo = conect();

$consult = $pdo->query("SELECT * FROM books");
$result = $consult->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Books</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Authors ID</th>
            <th>Title</th>
        </tr>
        <?php foreach ($resultado as $linha): ?>
            <tr>
                <td><?= $linha['book_id'] ?></td>
                <td><?= $linha['author_id'] ?></td>
                <td><?= $linha['title'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>