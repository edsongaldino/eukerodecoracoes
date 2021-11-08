<?php
include("site_mod_include.php");
$status_envio = protege($_GET["envio"]); // id_empreendimento
// Gera recaptcha
$numeros_recaptcha = substr(str_shuffle("0123456789"), 0, 3);
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
	<section class="banner-area relative" id="home">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white text-uppercase">
						Formulário de Contato
					</h1>
					<p class="text-white link-nav"><a href="index.html">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="contato.html">
							Contato</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start contact-page Area ########-->
	<section class="contact-page-area section-gap">
		<div class="container">
			<?php if($status_envio == "erro"){?>
			<div class="mensagem alert-danger">
				<strong>Ops!</strong> Algo deu errado com sua solicitação. Pedimos desculpas! Tente novamente mais tarde.
			</div>
			<?php }?>

			<?php if($status_envio == "sucesso"){?>
			<div class="mensagem alert-success">
				<strong>OK!</strong> Sua solicitação foi enviada. <br/>Aguarde nosso contato em até 48h.
			</div>
			<?php }?>
			<div class="row contact-wrap">
				<div class="map-wrap" style="width:100%; height: 445px;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15370.383036892654!2d-56.1038328!3d-15.6132323!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x56fabce648cd7b93!2zRVVLRVJPIERFQ09SQcOHw5VFUw!5e0!3m2!1spt-BR!2sbr!4v1552487939090" width="100%" height="445" frameborder="0" style="border:0" allowfullscreen></iframe></div>
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Av. XV de Novembro, 901 - Porto</h5>
							<p>Cuiabá - MT, 78020-280</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>(65) 3028-2980</h5>
							<p>Seg-Sexta: 08h às 17:30h / Sáb: 08h às 12h</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>sac@eukerodecoracoes.com.br</h5>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form class="form-area contact-form text-right" action="envia-contato.php" method="post">
						<div class="row">
							<div class="col-lg-6">
								<input name="nome" placeholder="Nome completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome completo'" class="common-input mb-20 form-control" required="" type="text">
								<input name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="common-input mb-20 form-control" required="" type="email">
								<input name="telefone" placeholder="Telefone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefone'" class="common-input mb-20 form-control" required="" type="text">
								<input name="assunto" placeholder="Assunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Assunto'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-6">
								<textarea class="common-textarea form-control" name="mensagem" placeholder="Mensagem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensagem'" required=""></textarea>
							</div>
							<div class="col-lg-12 mt-30">
								<div class="alert-msg" style="text-align: left;"></div>
								<input type="hidden" name="acao"  value="envia-form-contato">
								<input class="primary-btn primary" style="float: right;" type="submit" value="Enviar">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--######## End contact-page Area ########-->


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
	<script src="js/main.js"></script>
</body>

</html>