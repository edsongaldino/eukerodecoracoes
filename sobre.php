<?php require_once("site_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();
$codigo_texto = protege($_GET["codigo_texto"]);

//consulta textos do produto
$sql_consulta_texto = "SELECT codigo_texto, titulo, subtitulo, banner, arquivo, texto, status FROM texto WHERE codigo_texto = '".$codigo_texto."'";
$result = $pdo->query( $sql_consulta_texto );
$texto = $result->fetch( PDO::FETCH_ASSOC );
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
					<p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="eukero-decoracoes.html">
							Sobre</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Portfolio Details Area ########-->
	<section class="portfolio_details_area section-gap">
		<div class="container">
			<div class="portfolio_details_inner">
				<div class="row">
					<div class="col-md-6">
						<div class="left_img">
							<img class="img-fluid" src="conteudos/texto/<?php echo $texto["arquivo"];?>" alt="">
						</div>
					</div>
					<div class="col-md-5">
						<div class="portfolio_right_text">
						<p><?php echo $texto["texto"];?></p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--######## End Portfolio Details Area ########-->


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