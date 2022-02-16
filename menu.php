<?php

    include_once ("admin/conexao.php");

    $resultado = mysqli_query($conectar, "SELECT * FROM categorias ORDER BY 'id'");
    $linhas = mysqli_num_rows($resultado);

?>
<nav class="navbar navbar-inverse navbar-fixed-top bg-red">
<div class="container">
<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="<?php echo pg.'/home'; ?>">HCommerce</a>
</div>

<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
		<li><a href="<?php echo pg.'/home'; ?>"><i class="fa fa-home"></i>HOME</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-bars"></i> PRODUTOS<span class="caret"></span></a>
			<ul class="dropdown-menu">
                <?php
                //lista as categorias de produto
                while($linhas = mysqli_fetch_array($resultado)){
                    ?><li><a href="<?php echo pg.'/produto/'.$linhas['id'].'/'.$linhas['slug']; ?>"><?php echo $linhas['nome']; ?></a></li>
                <?php } //fim lista categorias de produto?>
            </ul>			
		</li>

		<li><a href="<?php echo pg; ?>/novidades"><i class="fa fa-star"></i>NOVIDADES</a></li>
		<li><a href="<?php echo pg; ?>/top_venda"><i class="fa fa-trophy"></i>TOP VENDA</a></li>
		<li><a href="<?php echo pg; ?>/promocoes"><i class="fa fa-tags"></i>PROMOÇÕES</a></li>
		<li id="admin"><a href="admin/administrativo.php"><span class="fa fa-user-circle"></span> LOGIN</a></li>
	</ul>
</div><!--/.nav-collapse -->
</div>
</nav>

