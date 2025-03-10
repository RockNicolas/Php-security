<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];

if (!is_numeric($id)) {
    echo "Seu IP foi gravado: " . $_SERVER["REMOTE_ADDR"];
    exit;
}

$sql = "SELECT * FROM news WHERE id = $id";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($query);

if ($dados) {
    echo "<h1>" . htmlspecialchars($dados["titulo"]) . "</h1><br>";
    echo htmlspecialchars($dados["conteudo"]);
} else {
    echo "Not found.";
}

echo "<br><br><h3>Comentários:</h3><hr/><br>";
$SQLBuscaComentarios = "SELECT * FROM comentarios WHERE id_news = $id";
$ExecutaBuscaComentarios = mysqli_query($conn, $SQLBuscaComentarios);

while ($Comentario = mysqli_fetch_array($ExecutaBuscaComentarios)) {
    echo "<b>" . htmlspecialchars($Comentario["nome"]) . "</b> diz:<br>";
    echo htmlspecialchars($Comentario["comentario"]) . "<br/><br/>";
}

?>

<br><br>
<form method="POST" action="salvar_comentario.php?id_news=<?php echo $id; ?>">
    Nome: <br><input type="text" name="txtNome" /><br>
    Comentário:<br>
    <textarea rows="10" cols="60" name="txtComentario"></textarea>
    <br>
    <input type="submit" value="Comentar" />
</form>

<?php
mysqli_close($conn);
?> 
