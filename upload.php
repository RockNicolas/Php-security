<?php
    $arquivo_tmp = $_FILES["FlArquivo"]["tmp_name"];
    $arquivo_nome = $_FILES["FlArquivo"]["name"];
    move_uploaded_file($arquivo_tmp, "arquivos/".$arquivo_nome);
?>