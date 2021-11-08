<?php require_once("site_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();

// Coleta os dados
$sql_noticia = "SELECT codigo_noticia, titulo, arquivo, resumo, data, status FROM noticia WHERE status = 'L' ORDER BY data DESC";
$query_noticia = $pdo->query($sql_noticia);
$noticias = $query_noticia->fetchAll( PDO::FETCH_ASSOC );
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
					<p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="blog.html">
							BLOG</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start Latest Blog Area ########-->
	<section class="latest-blog-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h1>BLOG</h1>
						<p>Novidades e dicas sobre decoração de interiores</p>
					</div>
				</div>
			</div>

			<div class="row">

				<?php foreach($noticias AS $noticia):?>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
					<a href="blog/<?php echo url_amigavel($noticia["titulo"]);?>-<?php echo $noticia["codigo_noticia"];?>"><img class="img-fluid w-100" src="conteudos/noticia/<?php echo $noticia["arquivo"];?>" alt=""></a>
					</div>
					<p class="date"><?php echo date('d', strtotime($noticia["data"]));?> de <?php echo mes_extenso(date('m', strtotime($noticia["data"])));?> de <?php echo date('Y', strtotime($noticia["data"]));?></p>
					<h4>
						<a href="blog/<?php echo url_amigavel($noticia["titulo"]);?>-<?php echo $noticia["codigo_noticia"];?>"><?php echo $noticia["titulo"];?></a>
					</h4>
					<p>
					<?php echo $noticia["resumo"];?>
					</p>
				</div>
				<?php endforeach;?> 
				
			</div>
		</div>
	</section>
	<!--######## End Latest Blog Area ########-->


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