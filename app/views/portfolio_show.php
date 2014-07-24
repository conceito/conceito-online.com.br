<?php 
/*
|=================================================================================
|	Template: exibe o projeto
|	Controller: portfolio/show/(:any)
|---------------------------------------------------------------------------------
*/
?>
<script type="text/javascript">
	$(document).ready(function(e) {

		$('#myTab').tabs({
            collapsible: true,
            active: false,
            fx: { 
            	height: 'toggle', 
            	duration: 'slow' 
            }
        });

	});
</script>
<!-- @ Box de portfolio -->
<div class="row-fluid portfolio slider">
<div class="inner-row">
	
		
	<div class="hd">			
	
		<h1 class="cinza"><a href="<?php echo site_url('portfolio') ?>" class="no-lnk-style">Portfólio</a> <i class="icon-a3c-r"> </i> <span class="job-title" <?php echo $job['adminbar']; ?>><?php echo $job['titulo']; ?></span> </h1>
		
	</div><!-- .hd -->
	
	<div class="ct">

		<?php 
		/*
		|============================================================================
		|	Conteúdo exclusivo para tables e desktop
		|----------------------------------------------------------------------------
		*/
		if(! $is_mobile):
		?>
		<!-- @ Abas de conteúdo -->
		<!-- @tip: Não carregar em smartphones!!! -->
		<div class="about-job hidden-phone" id="myTab">
			<ul class="nav-tabs">
				<li class=""><a href="#detalhes"><i class="icon-plus"></i> Detalhes</a></li>
				<li><a href="#share"><i class="icon-heart"></i></a></li>
			</ul>

			<div class="tab-content">

				<div id="detalhes">
					<div class="tab-pane">

						<?php 
						/*
						|============================================================
						|	Se existe testemunho
						|------------------------------------------------------------
						*/
						if(isset($job['rel']) && is_array($job['rel'])):
						?>
						<div class="testimonial">
							<i class="icon-quote-w"></i>
							<div class="quotes">
								
								<div class="cite cite-1">
									<?php echo $job['rel']['txt']; ?>									
								</div><!-- .cite-1 -->
								
							</div><!-- .quotes -->
							
						</div><!-- .testimonial -->
						<?php endif; ?>

						<?php echo $job['txt']; ?>

					</div>
				</div><!-- tab-content -->

				
				<div id="share">

					<div class="tab-pane">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
						<a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript">
							var addthis_config = {"data_track_addressbar":true};
							var addthis_share = {
								title: <?php echo '"Conceito Comunicação Integrada - '.$job['titulo'].'"'; ?>
								, description: <?php echo '"Conceito Comunicação Integrada - '.$job['titulo'].'  '.site_url($job['full_uri']).'"'; ?>
								, url: <?php echo '"'.site_url($job['full_uri']).'"'; ?>
							};
						</script>
						
						<!-- AddThis Button END -->
					</div>

				</div><!-- tab-content -->

			</div>

		</div><!-- .about-job -->
		<?php endif; ?>
		
		<!-- @ Container dos trabalhos -->
		<div class="port-slider-container">
			<ul class="unstyled slides ">
				
				<?php 
				foreach ($job['galeria'] as $gal):

					$img = responsive_max($gal['nome']);
					$path = img($this->config->item('upl_imgs'));
				?>
				<li> 
				<div class="img-container"><img src="<?php echo $path . $img; ?>" /></div>						
				</li>
				<?php endforeach; ?>
				
				
			</ul>
		</div><!-- .port-slider-container -->
		<!-- .slides -->
		
	</div><!-- .ct -->
		
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.portfolio.slider -->


<?php 
/*
|=================================================================================
|	Trabalos relacionados... exclusivo para tablets e desktops
|---------------------------------------------------------------------------------
*/
if(! $is_mobile && ! empty($bytags)): ?>
<!-- @ Box de relacionados -->
<!-- @tip: Não carregar em smartphones!!! -->
<div class="row-fluid related hidden-phone">
<div class="inner-row">
	
	<i class="icon-3-c corner"></i>
		
	<div class="hd">
	
		<h3 class="cinza">Projetos relacionados</h3>

		<div class="tags-group disabled hidden-phone">
			<ul class="unstyled">

				<?php 
				/*
				|====================================================================
				|	Tags do trabalho ativo
				|--------------------------------------------------------------------
				*/
				foreach ($job['tags'] as $tag):
				?>
				<li><a href="#"><?php echo $tag['nome'] ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div><!-- .tags-group -->
		
	</div><!-- .hd -->
	
	<div class="ct  clearfix">
		
		<div class="port-boxes">			
			
			<?php 
			/*
			|========================================================================
			|	Trabalhos relacionados
			|------------------------------------------------------------------------
			*/
			foreach ($bytags as $port):

				$gal = $port['galeria'][0];
				$img = responsive_thumb($gal['nome']);
				$path = img($this->config->item('upl_imgs'));
			?>

			<div class="box <?php echo $port['class']; ?>">
				<a href="<?php echo site_url($port['full_uri']); ?>">
					<div class="img-limit">
						<img src="<?php echo $path . $img; ?>" alt="">
					</div>
					<div class="hover">
						<span class="destaque"><?php echo $port['clienteNome']; ?></span>
							<?php echo $port['resumo']; ?>
						<i></i>
					</div><!-- .hover -->
				</a>
			</div><!-- .box -->

			<?php endforeach; ?>			
			

		</div>
		<!-- .port-boxes -->

		<script type="text/javascript">
		$(document).ready(function(){
			// para ter certeza que os boxes vão se encaixar
			Port.keepProportion(false);
		});
		</script>
		
		
	</div><!-- .ct -->
		
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.related -->
<?php endif; ?>


<?php 
/*
|=================================================================================
|	Conteúdo exclusivo para smartphones
|---------------------------------------------------------------------------------
*/
if($is_mobile):
?>
<!-- @ Box com texto do trabalho para PHONE -->
<div class="row-fluid about-job visible-phone">
<div class="inner-row">

	<i class="icon-a3-b middle"></i>
	
		
	<div class="hd">
	
		<h2>Sobre o projeto</h2>					
		
	</div><!-- .hd -->
	
	<div class="ct">
		
		
		<?php echo $job['txt']; ?>
		
		
		
	</div><!-- .ct -->
	
	
	<div class="button-sets">
	
		<a href="<?php echo site_url($bytags[0]['full_uri']); ?>" class="btn-map"> <i class="icon-a10-r"></i> <span class="text middle"><strong>Próximo</strong></span> </a>
		
	</div><!-- .button-sets -->
	
	
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.about-job -->
<?php endif; ?>