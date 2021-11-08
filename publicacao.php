<?php require_once("site_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();
$codigo_noticia = protege($_GET["id"]);

// Coleta os dados
$sql_noticia = "SELECT codigo_noticia, titulo, arquivo, autor, resumo, data, texto, status FROM noticia WHERE codigo_noticia = '".$codigo_noticia."'";
$query_noticia = $pdo->query($sql_noticia);
$noticia = $query_noticia->fetch( PDO::FETCH_ASSOC );

// Coleta os dados
$sql_noticias = "SELECT codigo_noticia, titulo, arquivo, resumo, data, status FROM noticia WHERE status = 'L' ORDER BY data DESC";
$query_noticias = $pdo->query($sql_noticias);
$ultimas_noticias = $query_noticias->fetchAll( PDO::FETCH_ASSOC );
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
					BLOG</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start post-content Area ########-->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<img class="img-fluid" src="conteudos/noticia/<?php echo $noticia["arquivo"];?>" alt="">
							</div>
						</div>
						<div class="col-lg-3  col-md-3 meta-details">
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $noticia["autor"];?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo date('d', strtotime($noticia["data"]));?> de <?php echo mes_extenso_abreviado(date('m', strtotime($noticia["data"])));?> de <?php echo date('Y', strtotime($noticia["data"]));?></a> <span class="lnr lnr-calendar-full"></span></p>
								<ul class="social-links col-lg-12 col-md-12 col-6">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
									<li><a href="#"><i class="fa fa-behance"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<a class="posts-title" href="#"><h3><?php echo $noticia["titulo"];?></h3></a>
							<p class="excert">
							<?php echo $noticia["resumo"];?>
							</p>
							<p>
							<?php echo $noticia["texto"];?>
							</p>
							
						</div>
					</div>
					
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">					
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Publicações Recentes</h4>
							<div class="popular-post-list">
								<?php foreach($ultimas_noticias AS $ultimas):?>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="conteudos/noticia/<?php echo $ultimas["arquivo"];?>" alt="">
									</div>
									<div class="details">
										<a href="blog/<?php echo url_amigavel($ultimas["titulo"]);?>-<?php echo $ultimas["codigo_noticia"];?>"><?php echo $ultimas["titulo"];?></a>
										<p><?php echo date('d', strtotime($ultimas["data"]));?> de <?php echo mes_extenso_abreviado(date('m', strtotime($ultimas["data"])));?> de <?php echo date('Y', strtotime($ultimas["data"]));?></p>
									</div>
								</div>
								<?php endforeach;?> 
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--######## End post-content Area ########-->


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