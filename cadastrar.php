<?php
    $nome = $_POST['nome'];
    $cantor = $_POST['cantor'];
    $letra = $_POST['letra'];
    $nota = $_POST['nota'];
    $link = $_POST['url'];
    $views = 0;

    echo nl2br($letra);

    //str_replace($letra);

    $conn = new PDO("mysql:dbname=life;host=localhost" ,"root","");
    $stmt = $conn->prepare("INSERT INTO musicas (nome,cantor,letra,nota,link,views) values('$nome','$cantor','$letra','$nota','$link','$views')");
    $stmt->execute();
    header('Location:musicas.php');
    

?>