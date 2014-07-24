<header id="header" class="clearfix">
<div class="inner-row">

	<div class="row-fluid">
		
		<?php if($is_mobile && strstr($this->body_class,'home') === false): ?>
			<a href="javascript:history.back();" class="icon-back visible-phone ir">&lt;</a>
		<?php endif; ?>
		
		<div class="logo">
			<a href="<?php echo site_url(); ?>" class="icon- logo-med ir" title="Conceito Comunicação Integrada">Conceito Comunicação Integrada</a>
		</div><!-- .logo -->
		
		<a class="menu-ctrl visible-phone" href="#"> <i class="icon-menu"></i> </a>
		
	</div><!-- .row-fluid -->
	
	
	<div class="menu">
		<ul class="unstyled">

			
			<li class="<?php echo (strstr($this->body_class,'home') !== false)?'active':'';?>"><a href="<?php echo site_url(); ?>">Início</a></li>
			

			<li class="<?php echo ($this->uri_seg[1] == 'portfolio')?'active':''; ?>"><a href="<?php echo site_url('portfolio'); ?>">Portfólio</a></li>

			<li class="<?php echo ($this->uri_seg[1] == 'contato')?'active':''; ?>"><a href="<?php echo site_url('contato'); ?>">Contato</a></li>
			
			<?php if(! $is_mobile): ?>
			<!-- <li class="hidden-phone"><a href="<?php echo site_url('areaCliente'); ?>">Área do cliente</a></li> -->
			<?php endif; ?>
			
		</ul>
	</div><!-- .menu -->
	
</div><!-- .inner-row -->
</header><!-- #header -->