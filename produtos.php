<?php require_once("site_mod_include.php");?>
<?php
    //Abre a conexão
	$pdo = Database::conexao();
	
	$codigo_texto = protege($_GET["codigo_texto"]);

	//consulta textos do produto
	$sql_consulta_texto = "SELECT codigo_texto, titulo, subtitulo, banner, arquivo, texto, status FROM texto WHERE codigo_texto = '".$codigo_texto."'";
	$result = $pdo->query( $sql_consulta_texto );
	$texto = $result->fetch( PDO::FETCH_ASSOC );
    
	//consulta categorias
    $sql_consulta_categorias = "SELECT codigo_categoria, nome_categoria, status FROM categoria WHERE status = 'L' ORDER BY nome_categoria ASC";
    $result = $pdo->query( $sql_consulta_categorias );
	$categorias = $result->fetchAll( PDO::FETCH_ASSOC );

	//consulta produtos
    $sql_consulta_produto = "SELECT produto.codigo_produto, produto.nome_produto, produto.valor_produto, produto.estoque_produto, produto.situacao_produto, produto.referencia_produto, foto_produto.arquivo_foto
								FROM foto_produto
								LEFT JOIN produto ON foto_produto.codigo_produto = produto.codigo_produto
								LEFT JOIN produto_categoria ON produto.codigo_produto = produto_categoria.codigo_produto
								LEFT JOIN produto_subcategoria ON produto.codigo_produto = produto_subcategoria.codigo_produto
								WHERE produto.situacao_produto = 'L' GROUP BY foto_produto.codigo_foto ORDER BY produto.nome_produto ASC";
								$result = $pdo->query($sql_consulta_produto);
								$produtos = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">

<head>
	<?php include "site_mod_head.php";?>
	<?php if($texto["banner"]):?>
	<link rel="stylesheet" href="css/estilo.php?banner=<?php echo $texto["banner"];?>" type="text/css" />
	<?php endif;?>
</head>

<body>
	<!--################ Start Header Area ########-->
	<header id="header" id="home">
        <?php include "site_mod_topo.php";?>
	</header>
	<!--######## End Header Area ########-->

	<!--######## start banner Area ########-->
	<section class="banner-area relative" id="home">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white text-uppercase">
					<?php echo $texto["titulo"];?>
					</h1>
					<p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="produtos.html">
							Produtos</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start Recent Completed Project Area ########-->
	<section class="recent-completed-project section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h1><?php echo $texto["subtitulo"];?></h1>
						<p><?php echo $texto["texto"];?></p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="filters project-filter">
						<ul>
							<li class="active" data-filter=".all">Todas as Categorias</li>
							<?php foreach($categorias as $categoria):?>
							<li data-filter=".<?php echo url_amigavel($categoria["nome_categoria"]);?>"><?php echo $categoria["nome_categoria"];?></li>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="projects_inner row" id="lightgallery">
						<?php 
						foreach($produtos as $produto):
						//consulta categorias
						$sql_consulta_categorias = "SELECT categoria.nome_categoria FROM categoria 
													JOIN produto_categoria ON produto_categoria.codigo_categoria = categoria.codigo_categoria
													WHERE produto_categoria.codigo_produto = '".$produto["codigo_produto"]."'";
						$result = $pdo->query( $sql_consulta_categorias );
						$categorias = $result->fetchAll( PDO::FETCH_ASSOC );
						?>
						<div class="col-lg-4 col-sm-6 <?php foreach($categorias as $categoria): echo url_amigavel($categoria["nome_categoria"])." ";endforeach;?>all" data-src="conteudos/produto/<?php echo $produto["codigo_produto"];?>/<?php echo $produto["arquivo_foto"];?>">
							<div class="projects_item">
								<img class="img-fluid w-100" src="conteudos/produto/<?php echo $produto["codigo_produto"];?>/<?php echo $produto["arquivo_foto"];?>" alt="">
								<div class="icon">
									<img class="img-fluid" src="img/icon.png" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="produto.php"><?php echo $produto["nome_produto"];?></a>
								</h4>
								<p><?php echo $produto["resumo_produto"];?></p>
							</div>
						</div>
						<?php $result->closeCursor(); endforeach;?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--######## End Recent Completed Project Area ########-->


	<!--######## start footer Area ########-->
	<footer class="footer-area section-gap">
        <?php include "site_mod_footer.php";?>
	</footer>
	<!--######## End footer Area ########-->

	<script src="js/vendor/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.lightbox.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
</body>

</html>