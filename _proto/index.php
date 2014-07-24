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
	
	<title>Conceito &gt; Início</title>
	
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
	
	<!-- @tip: scripts para home -->
	<?php if($onlyMobile):?>
	
	<script src="../assets/js/common-phone.js"></script>
	<script src="../assets/js/home-phone.js"></script>
	
	<?php else:?>
	<script src="../assets/js/common.js"></script>
	<script src="../assets/js/home-desktop.js"></script>
	
	<?php endif;?>
	
	<script>
	$(document).ready(function(e) {
		
		
		
	});
	</script>
</head>
<body class="home">
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->

<div id="main-container">


	<header id="header" class="clearfix">
	<div class="inner-row">
	
		<div class="row-fluid">
			
			<!--<a href="#" class="icon-back visible-phone ir">&lt;</a>-->
			
			<div class="logo">
				<a href="index.php" class="icon- logo-med ir" title="Conceito Comunicação Integrada">Conceito Comunicação Integrada</a>
			</div><!-- .logo -->
			
			<a class="menu-ctrl visible-phone" href="#"> <i class="icon-menu"></i> </a>
			
		</div><!-- .row-fluid -->
		
		
		<div class="menu">
			<ul class="unstyled">
				<li class="hidden-phone active"><a href="index.php">Início</a></li>
				<li><a href="portfolio.php">Portfólio</a></li>
				<li><a href="contato.php">Contato</a></li>
				<?php if(! $onlyMobile):?>
				<li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
				<?php endif;?>
			</ul>
		</div><!-- .menu -->
		
	</div><!-- .inner-row -->
	</header><!-- #header -->	
	
	
	<div id="page">
		
		<!-- @ Banner com trabalhos em destaque -->
		<div class="row-fluid home">
		<div class="inner-row slider">
			
			<ul class="unstyled slides ">
            	<li> 
					<a href="#" class="img-container"><img src="../assets/img/__port.jpg" /></a>
					<div class="slide-panel">
						<span class="jobdesc">Nome do trabalho e algumas informações. Se for site pode ter o link. Slideshow com os três últimos projetos.</span>
						<a href="#" class="lnk-go">ver projeto completo</a>
					</div><!-- .slide-panel -->
				</li>
				
  	    		<li> 
				<a href="#" class="img-container"><img src="../assets/img/__port2.jpg" /></a>
				<div class="slide-panel">
					<span class="jobdesc">Nome do trabalho e algumas informações. Se for site pode ter o link. Slideshow com os três últimos projetos.</span>
					<a href="#" class="lnk-go">ver projeto completo</a>
				</div><!-- .slide-panel -->
				</li>
				
  	    		<li> 
				<a href="#" class="img-container"><img src="../assets/img/__port3.jpg" /></a>
				<div class="slide-panel">
					<span class="jobdesc">Nome do trabalho e algumas informações. Se for site pode ter o link. Slideshow com os três últimos projetos.</span>
					<a href="#" class="lnk-go">ver projeto completo</a>
				</div><!-- .slide-panel -->
				</li>
  	    		
          	</ul>
		
		</div><!-- .inner-row -->
		</div><!-- .row-fluid.slider.home -->
		
		<!-- @ Box com texto e depoimentos -->
		<div class="row-fluid about">
		<div class="inner-row">
		
			<i class="icon-3-b corner"></i>
			
			<div class="span7">
				
				<div class="hd">
				
					<h2>Sobre a Conceito</h2>	

					<div class="toggle-ctrl visible-phone"><i class="icon-a5-sd-b"></i></div>
									
					
				</div><!-- .hd -->
				
				<div class="ct">
					
					<div class="height-slider">
					
						<p>Desde 1992, a Conceito atua nos segmentos de comunicação, design, web, propaganda e marketing, com propostas personalizadas de acordo com a demanda de cada cliente.</p>
						<p>Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa.</p>
						<p>Somos uma empresa inovadora, mas experiente, formada por profissionais qualificados das áreas de Comunicação e Tecnologia. Investimos nas mais modernas ferramentas de gestão empresarial sem abrir mão do conhecimento humano e do bom relacionamento interpessoal. Mais do que clientes, a Conceito busca parceiros.</p>
					
					</div><!-- .height-slider-->
					
				</div><!-- .ct -->
				
			</div><!-- .span7 -->
			
			<?php if(! $onlyMobile):?>				
			<div class="testimonial">
				<i class="icon-quote-w"></i>
				<div class="quotes">
					
					<div class="cite cite-1">
						<p>Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa. Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa.
<cite>Fulano de Tal</cite></p>
					</div><!-- .cite-1 -->
					
				</div><!-- .quotes -->
				
			</div><!-- .testimonial -->
			<?php endif;?>
			
		</div><!-- .inner-row -->
		</div><!-- .row-fluid.about -->
		
		<!-- @ Box de clientes -->
		<!-- @tip: Não disponível em smartphones -->
		<div class="row-fluid clients hidden-phone">
		<div class="inner-row">
		
			<i class="icon-3-c corner"></i>
			
			<div class="hd">
				
				<h2>Clientes</h2>
				
			</div><!-- .hd -->
			
			<div class="ct">
				
				<div class="slide-wrapper">
					
					<div class="flexslider-clients">
					  <ul class="slides">
						<li><img src="../assets/img/c_cocacola.png"/></li>
						<li><img src="../assets/img/c_cultura.png" alt=""></li>
						<li><img src="../assets/img/c_bn.png" alt=""></li>	
						<li><img src="../assets/img/c_furnas.png" alt=""></li>
						<li><img src="../assets/img/c_ibram.png" alt=""></li>	
						<li><img src="../assets/img/c_eletrobras.png" alt=""></li>
						<li><img src="../assets/img/c_crn4.png" alt=""></li>	
						<li><img src="../assets/img/c_globosat.png" alt=""></li>
						<li><img src="../assets/img/c_petrobras.png" alt=""></li>
						<li><img src="../assets/img/c_unimed.png" alt=""></li>
						<li><img src="../assets/img/c_biscoito.png" alt=""></li>
						<li><img src="../assets/img/c_endomedical.png" alt=""></li>	
						<li><img src="../assets/img/c_groupnet.png" alt=""></li>
						<li><img src="../assets/img/c_inca.png" alt=""></li>
						<li><img src="../assets/img/c_iphan.png" alt=""></li>
						<li><img src="../assets/img/c_next.png" alt=""></li>	
						<li><img src="../assets/img/c_networking.png" alt=""></li>
						<li><img src="../assets/img/c_aiglp.png" alt=""></li>
						<li><img src="../assets/img/c_pedeanjo.png" alt=""></li>
						<li><img src="../assets/img/c_novario.png" alt=""></li>
						<li><img src="../assets/img/c_museuin.png" alt=""></li>
						<li><img src="../assets/img/c_rjmartins.png" alt=""></li>
						<li><img src="../assets/img/c_previ.png" alt=""></li>
						<li><img src="../assets/img/c_nd.png" alt=""></li>
						<li><img src="../assets/img/c_sindgas.png" alt=""></li>
						<li><img src="../assets/img/c_ruibarbosa.png" width="248" alt=""></li>
							
					  </ul>
					</div>
					
				</div><!-- .slide-wrapper -->
				
			</div><!-- .ct -->
			
		</div><!-- .inner-row -->
		</div><!-- .row-fluid.clients -->
		
		<?php if($onlyMobile):?>
		<!-- @tip: Grupo de botões na home dos smartphones -->
		<div class="button-sets">
			
			<a href="#" class="btn-map"> <i class="icon-map-marker"></i> 
			<span class="text">Rua República do Líbano,<br>61 / sala 809, Centro, RJ</span> </a>
			
			<a href="tel:2125076167" class="btn-phone"> <i class="icon-phone"></i> </a>
			
			<a href="mailto:conceito@conceito-online.com.br" class="btn-mail"> <i class="icon-mail"></i> </a>
			
		</div><!-- .button-sets -->
		<?php endif;?>
		
		
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
