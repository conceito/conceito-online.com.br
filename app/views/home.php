<?php 
/*
|=================================================================================
|	Template: homepage
|	Controller: inicio
|---------------------------------------------------------------------------------
*/
?>
<!-- @ Banner com trabalhos em destaque -->
<div class="row-fluid home">
<div class="inner-row slider">
	
	<ul class="unstyled slides ">

		<?php 
		/*
		|===========================================================================
		|	Looping pelos portfolios em destaque
		|---------------------------------------------------------------------------
		*/
		if($slides):
			foreach($slides as $port):

				$gal = $port['galeria'][0];
				$img = responsive_max($gal['nome']);
				$path = img($this->config->item('upl_imgs'));
		?>

    	<li> 
			<a href="<?php echo site_url($port['full_uri']); ?>" class="img-container"><img src="<?php echo $path . $img; ?>" /></a>
			<div class="slide-panel">
				<span class="jobdesc" <?php echo $port['adminbar']; ?>><span class="destaque"><?php echo $port['clienteNome']; ?></span> <br><?php echo $port['resumo']; ?></span>
				<a href="<?php echo site_url($port['full_uri']); ?>" class="lnk-go">ver projeto completo</a>
			</div><!-- .slide-panel -->
		</li>

		<?php 
			endforeach;
		endif;
		?>
    		
  	</ul>

</div><!-- .inner-row -->
</div><!-- .row-fluid.slider.home -->

<!-- @ Box com texto e depoimentos -->
<div class="row-fluid about">
<div class="inner-row clearfix">

	<i class="icon-3-b corner"></i>
	
	<div class="span7">
		
		<div class="hd">
		
			<h2 <?php echo $about['adminbar']; ?>>Sobre a Conceito</h2>	

			<div class="toggle-ctrl visible-phone"><i class="icon-a5-sd-b"></i></div>
							
			
		</div><!-- .hd -->
		
		<div class="ct">
			
			<div class="height-slider">
			
				<?php echo $about['txt']; ?>
				
				<div class="share-sets">
					<ul class="unstyled">
						<li><a href="<?php echo $this->config->item('link_facebook') ?>" title="Curta nossa página no Facebook" class="share-link" target="_blank"> 
						<i class="icon-facebook"></i>	</a></li>
						<li><a href="<?php echo $this->config->item('link_youtube') ?>" title="Nosso canal no YouTube" class="share-link" target="_blank">
						<i class="icon-youtube"></i> </a></li>
						<li><a href="<?php echo $this->config->item('link_linkedin') ?>" title="Nossa página no Linkedin" class="share-link" target="_blank">
						<i class="icon-linkedin"></i> </a></li>
						<li class="hidden-phone"><a href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-50f84e020ccaf2b3" title="Compartilhar" class="share-link share-link-label addthis_button"> 
						<i class="icon-plusshare"></i> <span>Compartilhe</span> </a></li>							
					</ul>
				</div><!-- .share-sets -->
			
			</div><!-- .height-slider-->
			
		</div><!-- .ct -->
		
	</div><!-- .span7 -->
	
	<?php 
	/*
	|=================================================================================
	|	* Não disponível para Smatphones *
	|---------------------------------------------------------------------------------
	*/
	if(! $is_mobile && ! empty($testimonial)):

	?>				
	<div class="testimonial">
		<i class="icon-quote-w"></i>
		<div class="quotes">
			
			<div class="cite cite-1" <?php echo $testimonial['adminbar']; ?>>
				<?php echo $testimonial['txt']; ?>
				
			</div><!-- .cite-1 -->
			
		</div><!-- .quotes -->
		
	</div><!-- .testimonial -->
	<?php endif;?>
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.about -->

<?php 
/*
|=================================================================================
|	Lista de clientes NÃO disponível para smartphones
|---------------------------------------------------------------------------------
*/
if (! $is_mobile):
?>
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
				<li><img src="<?php echo img(); ?>c_cocacola.png"/></li>
				<li><img src="<?php echo img(); ?>c_cultura.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_bn.png" alt=""></li>	
				<li><img src="<?php echo img(); ?>c_ibram.png" alt=""></li>	
				<li><img src="<?php echo img(); ?>c_eletrobras.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_crn4.png" alt=""></li>	
				<li><img src="<?php echo img(); ?>c_globosat.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_petrobras.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_unimed.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_biscoito.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_endomedical.png" alt=""></li>	
				<li><img src="<?php echo img(); ?>c_groupnet.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_inca.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_iphan.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_next.png" alt=""></li>	
				<li><img src="<?php echo img(); ?>c_networking.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_aiglp.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_pedeanjo.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_novario.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_museuin.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_rjmartins.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_previ.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_nd.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_sindgas.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_coletivogourget.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_intervisao.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_tecnoarte.png" alt=""></li>
				<li><img src="<?php echo img(); ?>c_uhsaude.png" alt="" style="margin-top:15px"></li>
				<li><img src="<?php echo img(); ?>c_aben.png" alt="" style="margin-top:15px"></li>
				<li><img src="<?php echo img(); ?>c_abtp.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_conrerp1.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_dosecerta.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_techmaster.png" alt="" style="margin-top:15px"></li>
				<li><img src="<?php echo img(); ?>c_dscon.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_inea.png" alt="" style="margin-top:6px"></li>
				<li><img src="<?php echo img(); ?>c_martinscastro.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_terrazul.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_sindsaude.png" alt="" style=""></li>
				<li><img src="<?php echo img(); ?>c_superville.png" alt="" style="margin-top:10px"></li>
				<!-- <li><img src="<?php echo img(); ?>c_ruibarbosa.png" width="248" alt=""></li> -->
					
			  </ul>
			</div>
			
		</div><!-- .slide-wrapper -->
		
	</div><!-- .ct -->
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.clients -->
<!-- <script src="<?php echo base_url() ?>assets/js/jquery.flexslider.js"></script> -->
<?php endif; ?>

<?php 
/*
|=================================================================================
|	Botões para versão mobile
|---------------------------------------------------------------------------------
*/
if($is_mobile):?>
<!-- @tip: Grupo de botões na home dos smartphones -->
<div class="button-sets">
	
	<a href="<?php echo $this->config->item('googlemaps'); ?>" class="btn-map"> <i class="icon-map-marker"></i> 
	<span class="text">Rua República do Líbano,<br>61 / sala 809, Centro, RJ</span> </a>
	
	<a href="tel:021-25076167" class="btn-phone"> <i class="icon-phone"></i> </a>
	
	<a href="mailto:conceito@conceito-online.com.br" class="btn-mail"> <i class="icon-mail"></i> </a>
	
</div><!-- .button-sets -->
<?php endif;?>