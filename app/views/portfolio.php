<?php 
/*
|=================================================================================
|	Template: principal do portfolio
|	Controller: portfolio
|---------------------------------------------------------------------------------
*/
?>
<!-- @ Box de portfolio -->
<div class="row-fluid portfolio">
<div class="inner-row">
	
		
	<div class="hd">
	
		<div class="tags-group hidden-phone">
			<ul class="unstyled">


				<li class="<?php echo ($tag_ativa=='')?'active':''; ?>"><a href="<?php echo site_url('portfolio'); ?>">todos</a></li>
				<?php 
				if($tags):
					foreach ($tags as $tag):

						$class = '';
						if($tag_ativa == $tag['nick']){
							$class = 'active';
							echo '<input type="hidden" name="tag_ativa" value="'.$tag['nick'].'">';
						}
				?>
				<li class="<?php echo $class; ?>"><a href="<?php echo site_url('portfolio/index/tag:'.$tag['nick']); ?>"><?php echo $tag['nome']; ?></a></li>
				<?php 
					endforeach;
				endif; 
				?>
				
			</ul>
		</div><!-- .tags-group -->
	
		<h2>Portfólio</h2>
		
		
		
	</div><!-- .hd -->
	
	<div id="mainApp" class="ct">
		
		<!-- @ Container dos trabalhos para Masonry -->
		<div id="port-container" class="clearfix port-boxes">
			
			<?php 
			if($works):
				foreach ($works as $key => $port):					
			?>

			<div class="box <?php echo $port['class']; ?>">
				
				<?php 
				// se NÃO for placeholder
				if(strlen($port['full_uri']) > 0): 

//					$gal = $port['galeria'][0];
					$gal = get_portfolio_thumb($port['galeria']);
					$img = responsive_thumb($gal['nome']);
					$path = img($this->config->item('upl_imgs'));
				?>
				
				
			
				<a href="<?php echo site_url($port['full_uri']); ?>">
					<div class="img-limit">
						<img src="<?php echo $path . $img; ?>" alt="">
					</div>
					<div class="hover">
						<span class="destaque"><?php echo $port['clienteNome']; ?></span>
							<span class="hidden-phone"><?php echo $port['resumo']; ?></span>
						<i></i>
					</div><!-- .hover -->
				</a>
				
				<?php endif; ?>
				
			</div><!-- .box -->

			<?php 
				endforeach;
			endif;
			?>
			
		</div><!-- #port-container -->
		
		<div class="port-ctrls">
			
			<?php if($pagination && strlen($pagination)>0) echo $pagination; ?>

			<div class="loading-bar hidden">
				<div class="loading-text"><img src="<?php echo img(); ?>loading.gif" alt=" "> carregando projetos...</div> 
			</div><!-- .loading-bar-->
			
			<?php // Se existe paginação, exibe botão para carregamento
			if($pagination && strlen($pagination)>0): ?>			
			<a href="#" class="btn-ret-a hidden" id="get-more"><i class="icon-plus-w"></i> carregar mais projetos</a>
			<?php endif; ?>
		
		</div><!-- .port-ctrls -->
		
		
	</div><!-- .ct -->
		
	
</div><!-- .inner-row -->
</div><!-- .row-fluid.portfolio -->