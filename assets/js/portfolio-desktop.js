/*
|=================================================================================
|	Global vars - desktop
|---------------------------------------------------------------------------------
*/
var Port = Port || {};

$(document).ready(function(e) {

	/*
	|=================================================================================
	|	Keep traking window width
	|---------------------------------------------------------------------------------
	*/
	var windowWidth = $(window).width();
	$(window).on('resize', function(){
		windowWidth = $(window).width();
	});


	/*
	|=================================================================================
	|	FAZ AJUSTES DA PROPOSÇÃO DOS BOXES
	|---------------------------------------------------------------------------------
	*/
	Port = {

		isDesktop: true,
		ctx: $('.port-boxes'),
		prop_box_1: 57, // 57%
		prop_box_2: 73,

		init: function(){

			var self = this;
			// atraza a execução na primeira vez
			setTimeout(function(){
				self.keepProportion(false);
			}, 10);


			$(window).on('resize', function(){
				if(windowWidth > 768){
					self.keepProportion(false);
				} else {
					self.keepProportion(true);
				}
			});

		},

		/**
		 * Faz tratamento das alturas durante resize
		 * @param  {[type]} equals [description]
		 * @return {[type]}        [description]
		 */
		keepProportion: function(equals){

			var self = this,
				mod = $('.box', self.ctx).first(),
				modWidth = mod.width(),
				height = 0,
				prop_1 = self.prop_box_1,
				prop_2 = self.prop_box_2;

				// .box-2 é sempre o primeiro
				$('.img-limit', self.ctx).css('height', 'auto');

				if(equals){
					prop_2 = prop_1;
				}

				// console.log('height: ' + (prop_1 * (modWidth - 10) ) / 100);
				$('.size-1', self.ctx).height((prop_1 * (modWidth - 10) ) / 100);
				$('.size-2', self.ctx).height((prop_2 * (modWidth - 10) ) / 100);

		},

		/**
		 * Faz tratamento na altura dos boxes que chegam via AJAX
		 * @param {[type]} boxes [description]
		 */
		setBoxHeight: function(boxes){

			var self = this,
				mod = $('.box', self.ctx).first(),// .box-2 é sempre o primeiro
				modWidth = mod.width(),
				height = 0;

				boxes.each(function(index, element){

					var $el = $(element);

					// anula altura anterior
					$el.find('.img-limit').css('height', 'auto');

					if($el.hasClass('size-1')){
						height = (self.prop_box_1 * (modWidth - 10) ) / 100;
					} else {
						height = (self.prop_box_2 * (modWidth - 10) ) / 100;
					}

					$el.height(height);
				});
		}
	};

	Port.init();

	/*
	|=================================================================================
	|	Slider de trabalhos
	|---------------------------------------------------------------------------------
	*/
	jQuery('.port-slider-container', '.portfolio.slider')
	.fitVids()
	.flexslider({
		animation: "slide",
		animationLoop: true,
		slideshowSpeed: 3000,
		video: true,
		slideshow: true,
		useCSS: false,
		after: function(slider){
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