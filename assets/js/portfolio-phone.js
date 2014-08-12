/*
|=================================================================================
|	Global vars - phone
|---------------------------------------------------------------------------------
*/
var Port = {};

$(document).ready(function(e) {

	
	
	/********************************
	*	Troca classe para logo maior
	*/
	Port = {
		
		ctx: $('#port-container'),
		proporcao: 57, // 57%
		
		init: function(){
			
			var self = this;
			self.keepProportion();
				
		},
		
		keepProportion: function(){
			
			var self = this,
				mod = $('.img-limit', self.ctx).first(),
				height = 0;
			
			//console.log(mod.innerWidth());
			height = (self.proporcao * (mod.width() - 10) ) / 100;
			
			$('.img-limit', self.ctx).height(height);
		}
			
	};
	
	Port.init();

	/*
	|==========================================================================
	|		Atualiza proporção das imagens ao girar dispositivo
	|--------------------------------------------------------------------------
	*/
	$(window).on('resize', function(){
		Port.keepProportion();
	});


	/*******************************************
	*	Slider de trabalhos
	*/
	/*$('.portfolio.slider').flexslider({
		animation: "slide",
		slideshowSpeed: 3000,
		start: function(slider){

		}
	});*/

	jQuery('.portfolio.slider')
	.fitVids()
	.flexslider({
		animation: "slide",
		animationLoop: true,
		slideshowSpeed: 3000,
		video: true,
		// smoothHeight: true,
		slideshow: true,
		useCSS: false,
		after: function(slider){
			if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
				playVideoAndPauseOthers($('.play3 iframe')[0]);
		}
	});


    function playVideoAndPauseOthers(frame) {
        $('iframe').each(function(i) {
            var func = this === frame ? 'playVideo' : 'pauseVideo';
            this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
        });
    }
});