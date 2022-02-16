<?php
    //Recuperar o id passado pela url
    $url = (isset($_GET['url'])) ? $_GET['url']:'';
    $explode = explode('/',$url);
    $categoria = $explode[1];

    //Consultar a categoria o conforme o id
    $resultado_cat = mysqli_query($conectar,"SELECT * FROM categorias WHERE id='$categoria' LIMIT 1");
    $linhas_cat = mysqli_fetch_assoc($resultado_cat);

    //Consultar os produtos conforme a categoria
    $resultado_prod = mysqli_query($conectar, "SELECT * FROM produtos WHERE id_categoria = '$categoria' ORDER BY 'id'");
    $linhas_prod = mysqli_num_rows($resultado_prod);

?>
<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
     <br>
    <div class="container marketing">
        <h1><?php echo $linhas_cat['nome']; ?></h1>
      <div class="row">
          <?php
          while($linhas_prod = mysqli_fetch_array($resultado_prod)){
              $foto = pg.'/fotos/'.$linhas_prod['foto'];
          ?>

        <div class="col-lg-4 text-center">
          <img class="img-rounded" src="<?php echo $foto; ?>" alt="Generic placeholder image" width="200" height="200">
          <h3><?php echo $linhas_prod['nome']; ?></h3>
            <p><?php echo $linhas_prod['descricao_curta']; ?></p>
            <p itemprop="price" class="preco_produto"><?php echo $linhas_prod['preco'].' Kz'; ?></p>

          <p><a class="btn btn-primary" href="<?php echo pg.'/detalhe_produto/'.$linhas_prod['id'].'/'.$linhas_prod['slug']; ?>" role="button"><i class="fa fa-shopping-cart"></i> Comprar &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
          <?php  }?>
      </div><!-- /.row -->
    </div>


<!------------------------START THE FEATURES------------------------------------>
<?PHP
//Consultar os produtos conforme a categoria
$resultado_prod_baix = mysqli_query($conectar, "SELECT * FROM produtos WHERE id_categoria = '$categoria' ORDER BY 'id' LIMIT 4");
$linhas_prod_baix = mysqli_num_rows($resultado_prod_baix);
?>

<hr class="featurette-divider">

<?php
//Imprime produtos lista baixa destaque
$controle = 0;
while($linhas_prod = mysqli_fetch_array($resultado_prod_baix)){
$foto = pg.'/fotos/'.$linhas_prod['foto'];
if ($controle == 0){
?>
<div class="container marketing">

    <div class="row featurette">
        <div class="col-md-5">
            <h3 class="featurette-heading text-center"><?php echo $linhas_prod['nome']; ?></h3>
            <p class="lead"><?php echo $linhas_prod['descricao_curta']; ?></p>
        </div>
        <div class="col-md-7">
            <img class="featurette-image img-responsive center-block" src="<?php echo $foto; ?>" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">
    <?php $controle = 1;
    }else{ ?>

        <div class="row featurette">
            <div class="col-md-7 col-md-push-5">
                <h3 class="featurette-heading text-center"><?php echo $linhas_prod['nome']; ?></h3>
                <p class="lead"><?php echo $linhas_prod['descricao_curta']; ?></p>
            </div>
            <div class="col-md-5 col-md-pull-7">
                <img class="featurette-image img-responsive center-block" src="<?php echo $foto; ?>" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">
        <?php $controle = 0;} ?>
    <?php  } ?>

    <!------- /END THE FEATURES --->


    <?php
    include_once ("rodape.php");
    ?>
</div> <!-- /container -->