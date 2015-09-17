<footer id="footer" class="hidden-phone">
	<div class="inner-row">
		
		<a class="map-lnk" href="<?php echo $this->config->item('googlemaps'); ?>" title="Veja no Google Maps" target="_blank"> </a>
		
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
					
					<p><a href="<?php echo $this->config->item('googlemaps'); ?>" class="google-maps" title="Google Maps" target="_blank"> <i class="icon-map-marker-w"></i> Google Maps </a></p>
				</div><!-- .ct -->
				
			</div><!-- .col-left-->
			
			<div class="col-right">
				
				<div class="hd">
					
					<i class="icon- logo-small"></i>
					
					<div class="menu">
					<ul class="unstyled">
						<li class="<?php echo (strstr($this->body_class,'home') !== false)?'active':'';?>"><a href="<?php echo site_url(); ?>">Início</a></li>
						<li class="<?php echo ($this->uri_seg[1] == 'portfolio' && !isset($this->uri_seg[2]))?'active':''; ?>"><a href="<?php echo site_url('portfolio'); ?>">Portfólio</a></li>
						<li class="<?php echo ($this->uri_seg[1] == 'servicos' && !isset($this->uri_seg[2]))?'active':''; ?>"><a href="<?php echo site_url('servicos'); ?>">Serviços</a></li>
						<li class="<?php echo ($this->uri_seg[1] == 'contato')?'active':''; ?>"><a href="<?php echo site_url('contato'); ?>">Contato</a></li>
						<!-- <li class="hidden-phone"><a href="<?php echo site_url('areaCliente'); ?>">Área do cliente</a></li> -->
					</ul>

						<a href="http://umbrella.wiki.br" class="umbrella" title="Membros do Coletivo Umbrella">
							<img src="<?php echo img()?>umbrella.png"
								 alt="Coletivo
						Umbrella"/>
						</a>

					</div><!-- .menu -->
					
				</div><!-- .ct -->
				
			</div><!-- .col-right-->
			
		</div><!-- .row-fluid -->
		
	</div><!-- .inner-row -->
</footer><!-- #footer -->
