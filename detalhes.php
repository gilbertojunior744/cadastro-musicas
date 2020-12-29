<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Musicas</title>
</head>
<body>
    <?php
        $i=1;
        $id=$_GET['c'];
        $conn=new PDO("mysql:dbname=life;host=localhost","root","");
        $stmt =$conn->prepare("SELECT * FROM musicas WHERE cantor='$id' ORDER BY nome ASC");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
    <nav class="row col-lg-12">
        <img src="img/logo.png">  
    </nav>
    <nav class=" container row col-lg-12">
            <a href="categorias/pagode.php" class="col-lg-2">Pagode</a>
            <a href="categorias/sertanejo.php" class="col-lg-2">Sertanejo</a>
            <a href="categorias/hiphop" class="col-lg-2">Hip Hop</a>
            <a href="categorias/pop" class="col-lg-2">Pop</a>
            <a href="categorias/funk" class="col-lg-2">Funk</a> 
    </nav>
    <div class="letra container col-lg-12">
        <b class="nome"><?php echo "<br>".$id."<br>" ;?></b>
    </div>
    <div class="col-lg-12">
        <table class="table container col-lg-6">
        <tr class="row">
            <td class=" col-lg-1">N°</td>
            <td class=" col-lg-6">Musicas</td>
        </tr>
        <?php foreach($result as $row){ ?>
        <tr class="row">
            <td class="col-lg-1"><?php echo $i++."." ; ?></td>
            <td class="col-lg-6"><?php echo "<a href='ver.php?m=$row[nome]'>".$row['nome']."</a>"; ?></td>
        </tr>

            <?php } ?>
        </table>
    </div>
</body>
</html>


   
   
