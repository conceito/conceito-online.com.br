$(document).ready(function(e) {
	
	/*******************************************
	*	Slider de trabalhos
	*/	
	$('.slider').flexslider({
		animation: "slide",
		slideshowSpeed: 3000,
		start: function(slider){
		  
		}
	});
	
	
	
	/*******************************************
	*	Controle conteudo about
	*/	
	$('div.hd', '.about').cssSlideToggle({
		icon:{
			target: $('i', '.about .toggle-ctrl'),
			normal_class: 'icon-a5-sd-b',
			active_class: 'icon-a5-sd-t'	
		},
		target: $('.height-slider')
	});

});