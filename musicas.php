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
        // Variavel  de Contador de itens
        $i=0;
        // Conexao
        $conn= new PDO("mysql:dbname=life;host=localhost","root","");
        //Ordem do Banco de dados
        if(isset($_POST['ordem'])){
            $ordem=$_POST['ordem'];
            $stmt = $conn->prepare("SELECT * FROM musicas ORDER BY $ordem");
            $stmt->execute();
        }else{
        $ordem="id";
        $stmt = $conn->prepare("SELECT * FROM musicas ORDER BY views DESC");
        $stmt->execute();
        }
        //Ordem crescente e decrescente
        if(isset($_POST['classificacao'])){
            $classificacao = $_POST['classificacao'];
            $stmt = $conn->prepare("SELECT * FROM musicas ORDER BY $ordem $classificacao");
            $stmt->execute();
        }
        // Pesquisar 
        if(isset($_POST['pesquisa'])){
            $pesquisa=$_POST['pesquisa'];
            $stmt = $conn->prepare("SELECT * FROM musicas WHERE  nome LIKE'%$pesquisa%' ||cantor LIKE'%$pesquisa%' || letra LIKE'%$pesquisa%'");
            $stmt->execute();
        
        }
         
    ?>
    <nav class="row col-lg-12">
        <img src="img/logo.png">
        
    </nav>
    <div id="carouselExampleSlidesOnly" class="row carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/1.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class="categorias row col-lg-12 ">
        <a class="col-lg-3" href="musicas.php">Inicio</a>
        <a class="col-lg-3" href="cadastrar.html">Cadastrar nova musica</a><br><br>
    </div><br>
    <div class="consulta row col-lg-12">
        <form class=" col-lg-8" method="POST" action="musicas.php"><br>
            <input class="searchbar container form-control col-lg-8" name="pesquisa" placeholder="titulo,musica ou cantor ...">
        </form>  
        <form class="col-lg-4" method="POST" action="musicas.php"><br>
           <b class="ordenar"> Ordenar por:</b><select name="ordem" >
                            <option value="views">Visualizações</option>
                            <option value="cantor">Cantor</option>
                            <option value="nome" >Musica</option>
                            <option value="nota" >Nota</option>
                            
                        </select>
                        <select name="classificacao">
                            <option value="DESC">Decrescente</option>
                            <option value="ASC">Crescente</option>
                            
                        </select>
                    <input type="submit" value="Ok"><br><br>
        </form>
    </div>
    <div class="col-lg-12">
        <br><br>

        <table class="table container col-lg-8">
             <tr class="row">
                <td class="header col-lg-6">Musicas</td>

                <td class="header col-lg-1">Nota</td>
                <td class="header col-lg-2">Visualizações</td>
            </tr>
            <?php
                //Consulta banco de dados
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // laço de repetição
                foreach($result as $row){  
                    //Inicio do Contador
                    $i++;
                       
            ?>
            <tr class="row">
                <td class="col-lg-1"><?php echo $i.".";  ?></td>
                <td class="col-lg-2"><?php echo "<a href='detalhes.php?c=$row[cantor]'>".$row['cantor']."</a>" ?></td>
                <td class="col-lg-3"><?php echo "<a href='ver.php?m=$row[nome]'>".$row['nome']."</a>" ?></td>
                <td class="avaliacoes col-lg-1"><?php echo $row['nota'] ?></td>
                <td class="avaliacoes col-lg-2"><?php echo $row['views'] ?></td>
            </tr>
                    
                <?php  } ?>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>