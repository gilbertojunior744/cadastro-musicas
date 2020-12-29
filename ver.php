<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Letra</title>
</head>
<body>
    <?php 
        $musica = $_GET['m'];
        $conn=new PDO("mysql:dbname=life;host=localhost","root","");
        $stmt=$conn->prepare("SELECT * FROM musicas WHERE nome= '$musica'");
        $stmt->execute();
        $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
        //inserir visualização
        /*$stmt2=$conn->prepare("INSERT into musicas views values('$views+=')");
        $stmt2->execute();*/
        
        foreach($result as $row){
            //busca o numero de visualizações e acrescenta 1
            $views = $row['views'] +1;
            //inserir visualização
        $stmt2=$conn->prepare("UPDATE musicas SET views = $views WHERE nome='$musica'");
        $stmt2->execute();
            
        ?>
        <nav>
            <form class=" row col-lg-12" method="POST" action="musicas.php">
                <input class="searchbar container form-control col-lg-7" name="pesquisa" placeholder="titulo,musica ou cantor ...">
            </form>
        </nav>
        <nav class=" container row col-lg-12">
            <a href="" class="col-lg-2">Pagode</a>
            <a href="" class="col-lg-2">Sertanejo</a>
            <a href="" class="col-lg-2">Hip Hop</a>
            <a href="" class="col-lg-2">Pop</a>
            <a href="" class="col-lg-2">Funk</a>  
    </nav>
    <div class="categorias row col-lg-12 ">
        <a class="col-lg-3" href="musicas.php">Inicio</a>
        <a class="col-lg-3" href="cadastrar.html">Cadastrar nova musica</a><br><br>
    </div><br>
        <div class="letra container col-lg-12">
           <b class="nome"> <?php echo $row['nome'] ;?></b><br>
            <b class="cantor"><?php echo "<a href='detalhes.php?c=$row[cantor]'>".$row['cantor']."</a>" ?></b><br>
            <b class="letra"><?php echo nl2br($row['letra']);?></b>
        </div>
        <?php } ?>
    
    
</body>
</html>