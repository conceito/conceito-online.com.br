<?php 
/*
|=================================================================================
|	Template: página de contato
|	Controller: contato/index
|---------------------------------------------------------------------------------
*/
?>
<!-- @ Box de Contato -->
<div class="row-fluid contact">

	
		
<div class="hd">

	<div class="inner-row">

		<h1>Contato</h1>

	</div>
	
</div><!-- .hd -->
	
<div class="ct">

	<div class="inner-row">
		
		<?php 
		/*
		|============================================================================
		|	Botões para smatrphones
		|----------------------------------------------------------------------------
		*/
		if($is_mobile):
		?>
		
		<div class="share-sets">
			<ul class="unstyled">
				<li><a href="<?php echo $this->config->item('link_facebook') ?>" title="Facebook" class="share-link"> <i class="icon-facebook"></i>	</a></li>
				<li><a href="<?php echo $this->config->item('link_youtube') ?>" title="YouTube" class="share-link"> <i class="icon-youtube"></i> </a></li>
					<li><a href="<?php echo $this->config->item('link_linkedin') ?>" title="Nossa página no Linkedin" class="share-link" target="_blank">
						<i class="icon-linkedin"></i> </a></li>
			</ul>
		</div><!-- .share-sets -->
		
		<!-- @tip: Grupo de botões na home dos smartphones -->
		<div class="button-sets centered visible-phone">
			
			<a href="#" class="btn-map"> <i class="icon-map-marker"></i> 
			<span class="text">Rua República do Líbano,<br>61 / sala 809, Centro, RJ</span> </a>

			<a href="tel:021-25076167" class="btn-phone"> <i class="icon-phone"></i> 
				<span class="text middle">(21) 2507-6167</span> </a>

			<a href="mailto:conceito@conceito-online.com.br" class="btn-mail"> 
				<i class="icon-mail"></i> <span class="text middle">conceito@conceito-online.com.br</span> </a>
			
			
		</div><!-- .button-sets -->
		<?php endif;?>

		<?php 
		/*
		|============================================================================
		|	Formulário - tablet e desktop
		|----------------------------------------------------------------------------
		*/
		if(! $is_mobile):
		?>
		<!-- @tip: versão Tablet and up -->
		<!-- 3 grandes regiões -->
		<div class="reg-1 clearfix hidden-phone">

			<div class="text">
				<p>Você pode entrar em contato com a Conceito pelo telefone (21) 2507-6167 ou pelo e-mail <a href="mailto:conceito@conceito-online.com.br" class="no-lnk-style">conceito@conceito-online.com.br</a>.</p>
			</div>
			<!-- .text -->

			<div class="button visible-tablet">
				<a href="#" class="btn-ret-a do-curriculo"><i class="icon-bag"></i> Enviar currículo</a>
			</div>
			

		</div>
		<!-- .reg-1 -->

		<!-- @tip: Formulário -->
		<div class="reg-2 clearfix hidden-phone">
			
			
			<?php echo form_open_multipart('contato/envia', array(
				'class' => 'contact-form clearfix form-validate'
			)); ?>

				<?php if(isset($msg_tipo) && $msg_tipo): ?>
				<input type="hidden" name="form_msg" value="<?php echo $msg_tipo; ?>">
				<div class="msgs">
					
					<div class="alert ">
						
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><strong><?php echo $msg; ?></strong></p>
					</div>

				</div>
				<!-- .msgs -->
				<?php endif; ?>
				
				<div class="letter clearfix">
					
					<div class="control-group">
					    <label class="control-label" for="nome">Nome</label>
					    <div class="controls">
					    	<input type="text" id="nome" name="nome" value="<?php echo set_value('nome'); ?>" class="input-100 required">
					    	<?php echo form_error('nome'); ?>
						</div>
					</div>

					<div class="control-group">
					    <label class="control-label" for="email">E-mail</label>
					    <div class="controls">
					    	<input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="input-100 required">
					    	<?php echo form_error('email'); ?>
						</div>
					</div>

					<div class="control-group">
					    <label class="control-label" for="tel">Telefone</label>
					    <div class="controls">
					    	<input type="text" id="tel" name="tel" value="<?php echo set_value('tel'); ?>" class="input-50">
						</div>
					</div>

					<div class="control-group">
					    <label class="control-label" for="assunto">Assunto</label>
					    <div class="controls">
					    	<input type="text" id="assunto" name="assunto" value="<?php echo set_value('assunto'); ?>" class="input-100 required">
						</div>
					</div>

					<div class="control-group job-only">
					    <label class="control-label" for="atuacao">Atuação</label>
					    <div class="controls">
					    	<input type="text" id="atuacao" name="atuacao" value="<?php echo set_value('atuacao'); ?>" class="input-100">
						</div>
					</div>

					<div class="control-group job-only">
					    <label class="control-label" for="curriculo">Currículo</label>
					    <div class="controls">
					    	<input type="file" id="curriculo" name="curriculo" value="" class="input-100">
						</div>
						<div class="tooltip"></div>
					</div>

					<div class="control-group textarea">
					    <label class="control-label" for="mensagem">Mensagem</label>
					    <div class="controls">
					    	<textarea name="mensagem" id="mensagem" cols="" rows="6" class="input-100 required"><?php echo set_value('mensagem'); ?></textarea>
					    	<?php echo form_error('mensagem'); ?>
						</div>
					</div>

				</div>
				<!-- .letter -->

				<div class="form-controls clearfix">
					
					<button id="do-submit" type="submit" class="btn-round-red"> <i class="icon-a5-r"></i> </button>

				</div>
				<!-- .form-controls -->

		
			<?php echo form_close(); ?>

		</div>
		<!-- .reg-2 -->

		<!-- @tip: informações laterais apenas para desktop -->
		<div class="reg-3 visible-desktop clearfix">
			
			<h3 class="cinza-dark">Trabalhe conosco</h3>

			<p>Temos vagas para:</p>

			<ul class="tags-group tags-ticket unstyled clearfix">
				<li><a href="#" class="tag">webdesigner</a></li>
				<!-- <li><a href="#" class="tag">jornalista</a></li> -->
			</ul>
			

			<div class="button visible-desktop">
				<a href="#" class="btn-ret-a do-curriculo"><i class="icon-bag"></i> <span class="innerTxt">Enviar currículo</span></a>					
			</div>

		</div>
		<!-- .reg-3 -->
		<?php endif; ?>

	</div><!-- .inner-row -->
	
</div><!-- .ct -->
	

</div><!-- .row-fluid.contact -->