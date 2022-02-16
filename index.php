<?php
   session_start();
   define('pg', 'http://localhost/lojaHc');
   include_once ("admin/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Loja de materiais informáticos">
    <meta name="author" content="Hermano">
      <link rel="icon" href="<?php echo pg; ?>/imagens/favicon.JPG.ico">

      <title>HCommerce</title>

    <link href="<?php echo pg; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo pg; ?>/css/jumbotron.css" rel="stylesheet">
    <script src="<?php echo pg; ?>/js/ie-emulation-modes-warning.js"></script>
    <link href="<?php echo pg; ?>/font-awesome-4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
      <link href="<?php echo pg; ?>/css/carousel.css" rel="stylesheet">
      <link href="<?php echo pg; ?>/css/rodape.css" rel="stylesheet">

  </head>
  <body>

  <div class="container">
  <?php
  include_once ("menu.php");
  ?>
  </div>
  
  <div>


     <!-- Marketing messaging and featurettes ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
	 
	<?php

    $url = (isset($_GET['url'])) ? $_GET['url']:'';
    $explode = explode('/',$url);

			$paginas = array('home','produto','novidades', 'top_venda', 'promocoes','detalhe_produto');

    if(isset($explode[0])&& $explode[0] == ''){
        include "home.php";
    }elseif($explode[0]!=''){
        if(isset($explode[0]) && in_array($explode[0],$paginas)){
            include $explode[0].".php";
        }else{
            include "home.php";
        }
    }

    ?>

      <!-- Bootstrap core JavaScript --->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo pg; ?>/js/jquery.min.js"></script>
    <script src="<?php echo pg; ?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo pg; ?>/js/ie10-viewport-bug-workaround.js"></script>
    </div>
  </body>
</html>
