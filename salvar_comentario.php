<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_news = $_GET["id_news"];
$nome = addslashes($_POST["txtNome"]);
$comentario = addslashes($_POST["txtComentario"]);
$sql = "INSERT INTO comentarios (nome, comentario, id_news) VALUES ('$nome', '$comentario', '$id_news')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "Comment successfully added!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
