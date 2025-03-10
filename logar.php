<?php 
require_once __DIR__ . '/vendor/autoload.php'; 

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $conn = mysqli_connect(
        getenv('DB_HOST'), 
        getenv('DB_USERNAME'), 
        getenv('DB_PASSWORD'), 
        getenv('DB_NAME')
    ); 

    if (!$conn) { 
        die("Falha na conexão: " . mysqli_connect_error()); 
    } 

    $login = mysqli_real_escape_string($conn, $_POST["txtLogin"]); 
    $senha = mysqli_real_escape_string($conn, $_POST["txtSenha"]); 
    $sql = "SELECT * FROM usuarios WHERE login = ? AND senha = ?"; 
    $stmt = mysqli_prepare($conn, $sql); 

    mysqli_stmt_bind_param($stmt, "ss", $login, $senha); 
    mysqli_stmt_execute($stmt); 
    $result = mysqli_stmt_get_result($stmt); 

    if (mysqli_num_rows($result) > 0) { 
        echo "Login correto!"; 
    } else { 
        echo "Login ou senha incorretos!"; 
    } 

    mysqli_stmt_close($stmt); 
    mysqli_close($conn); 
} else { 
    echo "Método de requisição não é POST"; 
} 
?>