<?php 
include "inc/Mobile_Detect.php";
$detect = new Mobile_Detect();
$onlyMobile = ($detect->isMobile() && !$detect->isTablet()) ? true : false;
if($_SERVER['QUERY_STRING'] == 'phone'){
	$onlyMobile = true;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, width=device-width, minimum-scale=1.0,maximum-scale=10.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Conceito &gt; Contato</title>
	
	<meta name="description" content="">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="../assets/css/layout.css">
	
	<!-- @tip: scripts para ALL -->
	<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->
	
	<script src="../assets/js/jquery-1.8.2.min.js"></script>

	<script src="../assets/js/jquery.easing.min.js"></script>
	
	<!-- @tip: scripts para home|portfólio -->
	<!-- <script src="../assets/js/jquery.flexslider-min.js"></script> -->
	
	<!-- @tip: scripts para contato -->
	<?php if($onlyMobile):?>
	
	<script src="../assets/js/common-phone.js"></script>
	
	<?php else:?>
	
	<script src="../assets/js/jquery.validate.js"></script>
	<script src="../assets/js/common.js"></script>	

	
	<?php endif;?>
	
	<script>
		$(document).ready(function(e) {
	
			
	
		});
	</script>
</head>
<body class="page contato">
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->

<div id="main-container">


	<header id="header" class="clearfix">
	<div class="inner-row">
	
		<div class="row-fluid">
			
			<a href="javascript:history.back();" class="icon-back visible-phone ir">&lt;</a>
			
			<div class="logo">
				<a href="index.php" class="icon- logo-med ir" title="Conceito Comunicação Integrada">Conceito Comunicação Integrada</a>
			</div><!-- .logo -->
			
			<a class="menu-ctrl visible-phone" href="#"> <i class="icon-menu"></i> </a>
			
		</div><!-- .row-fluid -->
		
		
		<div class="menu">
			<ul class="unstyled">
				<li class="hidden-phone"><a href="index.php">Início</a></li>
				<li><a href="portfolio.php">Portfólio</a></li>
				<li class="active"><a href="contato.php">Contato</a></li>
				<?php //if(isset($_GET['d']) && $_GET['d'] == 'd'):?>
				<li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
				<?php //endif;?>
			</ul>
		</div><!-- .menu -->
		
	</div><!-- .inner-row -->
	</header><!-- #header -->	
	
	
	<div id="page">
		
		<!-- @ Box de Contato -->
		<div class="row-fluid contact">
		
			
				
		<div class="hd">

			<div class="inner-row">
		
				<h1>Contato</h1>

			</div>
			
		</div><!-- .hd -->
			
		<div class="ct">

			<div class="inner-row">
				
				<!-- @tip: grupo de links de compartilhamento -->
				<div class="share-sets">
					<ul class="unstyled">
						<li><a href="#" title="Facebook" class="share-link"> <i class="icon-facebook"></i>	</a></li>
						<li><a href="#" title="YouTube" class="share-link"> <i class="icon-youtube"></i> </a></li>
					</ul>
				</div><!-- .share-sets -->
				
			
				<!-- @tip: Grupo de botões na home dos smartphones -->
				<div class="button-sets centered visible-phone">
					
					<a href="#" class="btn-map"> <i class="icon-map-marker"></i> 
					<span class="text">Rua República do Líbano,<br>61 / sala 809, Centro, RJ</span> </a>

					<a href="tel:2125076167" class="btn-phone"> <i class="icon-phone"></i> 
						<span class="text middle">(21) 2507-6167</span> </a>

					<a href="mailto:conceito@conceito-online.com.br" class="btn-mail"> 
						<i class="icon-mail"></i> <span class="text middle">conceito@conceito-online.com.br</span> </a>
					
					
				</div><!-- .button-sets -->

				<!-- @tip: versão Tablet and up -->
				<!-- 3 grandes regiões -->
				<div class="reg-1 clearfix hidden-phone">

					<div class="text">
						<p>Você pode entrar em contato com a Conceito pelo telefone (21) 2507-6167 ou pelo e-mail <a href="mailto:conceito@conceito-online.com.br">conceito@conceito-online.com.br</a>.</p>
					</div>
					<!-- .text -->

					<div class="button visible-tablet">
						<a href="#" class="btn-ret-a"><i class="icon-bag"></i> Enviar currículo</a>
					</div>
					

				</div>
				<!-- .reg-1 -->

				<!-- @tip: Formulário -->
				<div class="reg-2 clearfix hidden-phone">
					
					<form action="#" class="contact-form clearfix">
						
						<div class="letter clearfix">
							
							<div class="control-group">
							    <label class="control-label" for="nome">Nome</label>
							    <div class="controls">
							    	<input type="text" id="nome" name="nome" value="" class="input-100 required">
								</div>
							</div>

							<div class="control-group">
							    <label class="control-label" for="email">E-mail</label>
							    <div class="controls">
							    	<input type="text" id="email" name="email" value="" class="input-100 required">
								</div>
							</div>

							<div class="control-group">
							    <label class="control-label" for="tel">Telefone</label>
							    <div class="controls">
							    	<input type="text" id="tel" name="tel" value="" class="input-50">
								</div>
							</div>

							<div class="control-group">
							    <label class="control-label" for="assunto">Assunto</label>
							    <div class="controls">
							    	<input type="text" id="assunto" name="assunto" value="" class="input-100">
								</div>
							</div>

							<div class="control-group job-only">
							    <label class="control-label" for="atuacao">Atuação</label>
							    <div class="controls">
							    	<input type="text" id="atuacao" name="atuacao" value="" class="input-100">
								</div>
							</div>

							<div class="control-group job-only">
							    <label class="control-label" for="curriculo">Currículo</label>
							    <div class="controls">
							    	<input type="file" id="curriculo" name="curriculo" value="" class="input-100">
								</div>
							</div>

							<div class="control-group textarea">
							    <label class="control-label" for="mensagem">Mensagem</label>
							    <div class="controls">
							    	<textarea name="mensagem" id="mensagem" cols="" rows="6" class="input-100"></textarea>
								</div>
							</div>

						</div>
						<!-- .letter -->

						<div class="form-controls clearfix">
							
							<button type="submit" class="btn-round-red"> <i class="icon-a5-r"></i> </button>

						</div>
						<!-- .form-controls -->

					</form>

				</div>
				<!-- .reg-2 -->

				<!-- @tip: informações laterais apenas para desktop -->
				<div class="reg-3 visible-desktop clearfix">
					
					<h3 class="cinza-dark">Trabalhe conosco</h3>

					<p>Temos vagas para:</p>

					<ul class="tags-group tags-ticket unstyled clearfix">
						<li class="tag"><a href="#">webdesigner</a></li>
						<li class="tag"><a href="#">jornalista</a></li>
					</ul>

					<p>Para trabalhar com a gente envie seu currículo clicando no botão abaixo.</p>

					<div class="button visible-desktop">
						<a href="#" class="btn-ret-a"><i class="icon-bag"></i> Enviar currículo</a>
							
							<br>
							<a href="#" class="btn-ret-a"><i class="icon-mail-w"></i> Apenas contato</a>
					</div>

				</div>
				<!-- .reg-3 -->

			</div><!-- .inner-row -->
			
		</div><!-- .ct -->
			
		
		</div><!-- .row-fluid.contact -->
		
	
		
	</div><!-- #page -->
	
	<?php if(! $onlyMobile):?>
	<!-- @tip: Não disponível em smartphones -->
	<footer id="footer" class="hidden-phone">
	<div class="inner-row">
		
		<a class="map-lnk" href="#" title="Veja no Google Maps"> </a>
		
		<!-- .map-lnk -->
		
		<div class="row-fluid">
			
			<div class="col-left">
				
				<div class="hd">
					<h2>Estamos aqui</h2>
				</div><!-- .hd -->
				
				<div class="ct">
					<address>					Rua República do Líbano, 61 / sala 809, Centro<br>
					Rio de Janeiro, RJ, 20061-030<br>
					(21) 2507-6167 / 2507-6168
					</address>
					
					<p><a href="#" class="google-maps" title="Google Maps"> <i class="icon-map-marker-w"></i> Google Maps </a></p>
				</div><!-- .ct -->
				
			</div><!-- .col-left-->
			
			<div class="col-right">
				
				<div class="hd">
					
					<i class="icon- logo-small"></i>
					
					<div class="menu">
					<ul class="unstyled">
						<li class="hidden-phone"><a href="index.php">Início</a></li>
						<li><a href="portfolio.php">Portfólio</a></li>
						<li><a href="contato.php">Contato</a></li>
						<li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
					</ul>
					</div><!-- .menu -->
					
				</div><!-- .ct -->
				
			</div><!-- .col-right-->
			
		</div><!-- .row-fluid -->
		
	</div><!-- .inner-row -->
	</footer><!-- #footer -->
	<?php endif;?>


</div><!-- #main-container -->

	
</body>
</html>
