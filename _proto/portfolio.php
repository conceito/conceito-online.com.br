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
	
	<title>Conceito &gt; Portfólio</title>
	
	<meta name="description" content="">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="../assets/css/layout.css">
	
	<!-- @tip: scripts para ALL -->
	<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->
	<script src="../assets/js/jquery-1.8.0.min.js"></script>
	<script src="../assets/js/jquery.easing.min.js"></script>
	
	<!-- @tip: scripts para home|portfólio -->
	<script src="../assets/js/jquery.flexslider-min.js"></script>
	
	<!-- @tip: scripts para portfolio -->
	<?php if($onlyMobile):?>
	
	<script src="../assets/js/common-phone.js"></script>
	<script src="../assets/js/portfolio-phone.js"></script>
	
	<?php else:?>
	
	<script src="../assets/js/common.js"></script>
	<script src="../assets/js/jquery.masonry.min.js"></script>
	<script src="../assets/js/portfolio-desktop.js"></script>
	
	<?php endif;?>
	

</head>
<body class="page">
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
				<li class="active"><a href="portfolio.php">Portfólio</a></li>
				<li><a href="contato.php">Contato</a></li>
				<?php //if(isset($_GET['d']) && $_GET['d'] == 'd'):?>
				<li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
				<?php //endif;?>
			</ul>
		</div><!-- .menu -->
		
	</div><!-- .inner-row -->
	</header><!-- #header -->	
	
	
	<div id="page">
		
		<!-- @ Box de portfolio -->
		<div class="row-fluid portfolio">
		<div class="inner-row">
			
				
			<div class="hd">
			
				<div class="tags-group hidden-phone">
					<ul class="unstyled">
						<li class="active"><a href="#">todos</a></li>
						<li><a href="#">identidade</a></li>
						<li><a href="#">internet</a></li>
						<li><a href="#">relatório</a></li>
						<li><a href="#">editorial</a></li>
					</ul>
				</div><!-- .tags-group -->
			
				<h2>Portfólio</h2>
				
				
				
			</div><!-- .hd -->
			
			<div class="ct">
				
				<!-- @ Container dos trabalhos para Mansory -->
				<div id="port-container" class="clearfix port-boxes">
					
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port.jpg" alt="">
							</div>
							<div class="hover">
								<p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="" >
							</div>
							<div class="hover">
								<p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/map-lnk.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port.jpg" alt="">
							</div>
							<div class="hover">
								<p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
										
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port.jpg" alt="">
							</div>
							<div class="hover">
								<p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
										
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					<div class="box size-2">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
										
					<div class="box size-1">
						<a href="portfolio2.php">
							<div class="img-limit">
								<img src="../assets/img/__port2.jpg" alt="">
							</div>
							<div class="hover">
								<p>Relatório Anual do INCA.</p>
								<i></i>
							</div><!-- .hover -->
						</a>
					</div><!-- .box -->
					
					
				</div><!-- #port-container -->
				
				<div class="port-ctrls">
				
					<div class="pagination pagination-centered clearfix">
					  <ul>
						<li class="disabled"><a href="#">&laquo;</a></li>
						<li class="active"><a href="#">1</a></li>
						<li class=""><a href="#">2</a></li>
						<li class=""><a href="#">3</a></li>
						<li class=""><a href="#">4</a></li>
						<li class=""><a href="#">5</a></li>
						<li class=""><a href="#">&raquo;</a></li>
					  </ul>
					</div>
					
					<div class="loading-bar">
						<div class="loading-text"><img src="../assets/img/loading.gif" alt=" "> carregando projetos...</div> 
					</div><!-- .loading-bar-->
					
					
					<a href="#" class="btn-ret-a"><i class="icon-plus-w"></i> carregar mais projetos</a>
				
				</div><!-- .port-ctrls -->
				
				
			</div><!-- .ct -->
				
			
		</div><!-- .inner-row -->
		</div><!-- .row-fluid.portfolio -->
		
		
		
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
					<address>
					Rua República do Líbano, 61 / sala 809, Centro<br>
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
