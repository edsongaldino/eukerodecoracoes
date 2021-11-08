<?php 
include("site_mod_include.php"); 

//Abre a conexão
$pdo = Database::conexao();

//consulta banners index Principal
$sql_consulta_banner_principal = "SELECT codigo_banner, titulo_banner, link_banner, arquivo FROM banner WHERE status = 'L' AND codigo_tipo_banner = 1 ORDER BY ordem_banner ASC";
$query_banner_p = $pdo->query( $sql_consulta_banner_principal );
$total_banners = $query_banner_p->rowCount();
$banners_principal = $query_banner_p->fetchAll( PDO::FETCH_ASSOC );

//consulta banners index
$sql_consulta_banner_bottom = "SELECT codigo_banner, titulo_banner, link_banner, descricao_banner, arquivo FROM banner WHERE status = 'L' AND codigo_tipo_banner = 2 ORDER BY RAND() LIMIT 2";
$query_banner_bot = $pdo->query( $sql_consulta_banner_bottom );
$banners_bottom = $query_banner_bot->fetchAll( PDO::FETCH_ASSOC );

// Coleta os dados
$sql_noticia = "SELECT codigo_noticia, titulo, arquivo, resumo, autor, data, status FROM noticia WHERE status = 'L' ORDER BY data DESC LIMIT 3";
$query_noticia = $pdo->query($sql_noticia);
$noticias = $query_noticia->fetchAll( PDO::FETCH_ASSOC );

?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">

<head>
	<?php include "site_mod_head.php";?>
</head>

<body>
	<!--################ Start Header Area ########-->
	<header id="header" id="home">
        <?php include "site_mod_topo.php";?>
	</header>
	<!--######## End Header Area ########-->

	<!--######## start banner Area ########-->
	<section class="banner" id="home">

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php $i=0; foreach($banners_principal AS $banner_pri):?>
			<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" <?php if($i==0): echo 'class="active"';endif;?>></li>
			<?php $i=$i+1; endforeach;?>
		</ol>
		<div class="carousel-inner">
			<?php $i=0; foreach($banners_principal AS $banner_pri):?>
			<div class="carousel-item <?php if($i==0): echo "active";endif;?>">
			<a href="<?php echo $banner_pri["link_banner"];?>"><img class="d-block w-100" src="conteudos/banner/<?php echo $banner_pri["arquivo"];?>" alt="First slide"></a>
			</div>
			<?php $i=$i+1; endforeach;?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start top-category-widget Area ########-->
	<section class="top-category-widget-area pt-90 pb-90 ">
		<div class="container">
			<div class="row">
				<?php foreach($banners_bottom AS $banner_bottom):?>
				<div class="col-lg-6">
					<div class="single-cat-widget">
						<div class="content relative">
							<!--<div class="overlay overlay-bg"></div>-->
							
								<div class="thumb">
								<a href="<?php echo $banner_bottom["link_banner"];?>" target="_blank"><img class="content-image img-fluid d-block mx-auto" src="conteudos/banner/<?php echo $banner_bottom["arquivo"];?>" alt=""></a>
								</div>
								<!--
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase"><?php echo $banner_bottom["titulo_banner"];?></h4>
									<span></span>
									<p><?php echo $banner_bottom["descricao_banner"];?></p>
								</div>-->
							
						</div>
					</div>
				</div>
				<?php endforeach;?>				
			</div>
		</div>
	</section>
	<!--######## End top-category-widget Area ########-->

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