<?php
$resultado = mysqli_query($conectar,"SELECT * FROM carousels ORDER BY ordem asc LIMIT 3");
$linhas = mysqli_num_rows($resultado);
$contr_sob = $linhas;
?>
<!-- Carousel ================================================== -->
<div class="container body-content">

    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            $controle = 1;
            while($linhas = mysqli_fetch_array($resultado)){
            $foto = pg.'/imagens/'.$linhas['imagem'];

            if($controle == 1){ ?>
            <div class="item active">
                <a href="<?php echo $linhas['url'];?>"><img src="<?php echo $foto;?>" alt="First slide" class="img-responsive">
                </a>
            </div>

            <?php }elseif($controle == 2){?>
            <div class="item">
                <a href="<?php echo $linhas['url'];?>"><img src="<?php echo $foto;?>" alt="Second slide" class="Second-slide"></a>
            </div>

            <?php }elseif($controle == 3){?>
            <div class="item">
                <a href="<?php echo $linhas['url'];?>"><img src="<?php echo $foto;?>" alt="Third slide" class="Third-slide"></a>
            </div>
            <?php }
                $controle = $controle + 1;
            } ?>
        </div>
    </div> <!-- /.carousel -->


    <!-- Marketing messaging and featurettes
        ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <?php
    //Pesquisar o id dos produtos em destaque no nivel 1 página principal
    $resultado_prod_dest = mysqli_query($conectar,"SELECT * FROM destaques_produtos WHERE nivel_um='1' ORDER BY ordem ASC ");
    $linhas_prod_dest = mysqli_num_rows($resultado_prod_dest);
    ?>

    <div class="container marketing">
        <h1 class="bg-red">EM DESTAQUE</h1>
<br>
        <div class="row">
            <?php
            while($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)){
            //id do produto na tabela produto em destaque
            $produto_id = $linhas_prod_dest['produto_id'];
            $produto_dest_id = $linhas_prod_dest['id'];

            //Selecionar os dados do produto no BD
            $resultado_prod=mysqli_query($conectar,"SELECT * FROM produtos WHERE id='$produto_id' LIMIT 1");
            $linhas_prod=mysqli_fetch_assoc($resultado_prod);
            $foto = pg.'/fotos/'.$linhas_prod['foto'];
            ?>
                <div class="col-lg-3 text-center">
                    <img class="img-rounded" src="<?php echo $foto; ?>" alt="Generic placeholder image" width="200" height="200">
                    <h2><?php echo $linhas_prod['nome']; ?></h2>
                    <p><?php echo $linhas_prod['descricao_curta']; ?></p>
                    <p itemprop="price" class="preco_produto"><?php echo $linhas_prod['preco'].' Kz'; ?></p>
                    <p><a class="btn btn-primary" href="<?php echo pg.'/detalhe_produto/'.$linhas_prod['id'].'/'.$linhas_prod['slug']; ?>" role="button"><i class="fa fa-shopping-cart"></i> Comprar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            <?php } ?>
        </div><!-- /.row -->
    </div> <!-- /container -->

    <?php
    include_once ("rodape.php");
    ?>

</div>