<?php
$conn = mysql_connect("localhost", "root", "");
$db = mysql_select_db("seguranca");


$id_news = $_GET["id_news"];
$nome = addslashes($_POST["txtNome"]);
$comentario = addslashes($_POST["txtComentario"]);

$sql = "INSERT INTO comentarios (nome, comentario, id_news) VALUES ('".$nome."', '".$comentario."', '".$id_news."')";

$query = mysql_query($sql);
?>