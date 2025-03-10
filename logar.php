<?php

$conn = mysqli_connect("localhost" , "root", "");
$db = mysqli_select_db("security");

$sql = "SELECT * FROM usuarios WHERE login = '".$login."' and senha = '".$senha."' ";
$query = mysqli_query("$sql");

$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];

if(mysqli_num_rows($query) > 0){
    echo "Correto!";
} else {
    echo "Incorreto!";
}
?>