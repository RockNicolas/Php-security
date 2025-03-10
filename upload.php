<?php
$arquivo_tmp = $_FILES["flArquivo"]["tmp_name"];

$arquivo_nome = $_FILES["flArquivo"]["name"];

$extensao = explode(".", $arquivo_nome);

if ( ($extensao[1] == "jpg") || ($extensao[1] == "jpeg") || ($extensao[1] == "gif")){
	move_uploaded_file($arquivo_tmp, "arquivos/".$arquivo_nome);
} else {
	echo "Selecione um tipo de arquivo permitido.";
}

$extensao = substr($arquivo_nome, -3);

if ($extensao == "jpg"){
	move_uploaded_file($arquivo_tmp, "arquivos/".$arquivo_nome);
} else {
	echo "Selecione um tipo de arquivo permitido.";
}