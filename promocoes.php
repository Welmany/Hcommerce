<?php

$resultado = mysqli_query($conectar,"SELECT * FROM promocoes");
$linhas = mysqli_num_rows($resultado);
?>

<div class="container marketing">
    <div class="row">
        <?php
        while($linhas = mysqli_fetch_array($resultado)){

            $foto = pg.'/fotos/'.$linhas['foto'];

            ?>
            <div class="col-lg-4 text-center">
                <img class="img-rounded" src="<?php echo $foto; ?>" alt="Generic placeholder image" width="200" height="150">
                <h2><?php echo $linhas['nome']; ?></h2>
                <p><?php echo $linhas['descricao']; ?></p>
                <p itemprop="price" class="preco_produto"><?php echo $linhas['preco'].' Kz'; ?></p>
                <p><a class="btn btn-primary" href="#" role="button"><i class="fa fa-shopping-cart"></i> Comprar &raquo;</a></p>
            </div><!-- /.col-lg-4 -->

        <?php  }?>

    </div><!-- /.row -->
    <br/><br/><br/><br/><br/><br/><br/><br/>

    <?php
    include_once ("rodape.php");
    ?>

    </div> <!-- /container -->
