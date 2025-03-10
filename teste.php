<?php
    $arquivos = scandir($_SERVER["DOCUMENT_ROOT"]);
    print_r($arquivos);

    unlink("./image.png");
?>