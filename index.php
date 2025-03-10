<h1>Testando segurança do php</h1>

<?php
    if(!isset($_GET["page"])){
        echo "Seja bem vindo ao site de securyte";
    } else {
        include $_GET["page"].".php";
    }
?>

<br><br><br><br>
<hr>

<h3>Todos os direitos reservados </h3>

