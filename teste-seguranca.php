<?php

require_once __DIR__ . '/vendor/autoload.php';  
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = mysqli_query($conn, "SELECT * FROM usuarios");
while ($e = mysqli_fetch_array($query)) {
    echo $e["login"] . "<br>";
    echo $e["senha"] . "<br>";
}

mysqli_close($conn);
?>
