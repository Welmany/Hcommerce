<?php
//Recuperar o id passado pela url
$url = (isset($_GET['url'])) ? $_GET['url']:'';
$explode = explode('/',$url);
$produto_id = $explode[1];

//Consultar os produtos conforme a categoria
$resultado_prod = mysqli_query($conectar, "SELECT * FROM produtos WHERE id = '$produto_id' LIMIT 1");
$linhas_prod = mysqli_fetch_assoc($resultado_prod);
$foto = pg.'/fotos/'.$linhas_prod['foto'];
 //echo $linhas_prod['nome'];
?>
<!-- Marketing messaging and featurettes
    ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
</br>
<div class="container marketing">
 <h1><?php echo $linhas_prod['nome']; ?></h1>


    <!-- START THE FEATURETTES -->

    <div class="row featurette">
        <div class="col-md-5">
            <h2 class="featurette-heading text-center"><?php echo $linhas_prod['nome']; ?></h2>
            <p class="lead"><?php echo $linhas_prod['preco'].' Kz'; ?></p>
            <p class="lead"><?php echo $linhas_prod['descricao_curta']; ?></p>
        </div>
        <div class="col-md-7">
            <img class="featurette-image img-responsive center-block" src="<?php echo $foto; ?>" alt="Generic placeholder image">
        </div>
    </div>

    <!-- /END THE FEATURETTES -->

    </br></br></br></br></br></br></br></br>

    <?php
    include_once ("rodape.php");
    ?>

</div> <!-- /container -->
