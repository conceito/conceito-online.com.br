$(document).ready(function(e) {
	
	/*******************************************
	*	Controle do menu
	*/
	$('a.menu-ctrl').cssSlideToggle({
		icon:{
			target: null,
			normal_class: null,
			active_class: null	
		},
		target: $('div.menu', '#header')
	});
	
});


/*
 *  Project: Site Conceito
 *  Description: Slide Uo/Down usando transition CSS3
 *  Author: Bruno Barros
 *  License: free
 */

;(function ( $, window, undefined ) {    
    
    // Create the defaults once
    var pluginName = 'cssSlideToggle',
        document = window.document,
        defaults = {
            icon: {
				target: null,
				normal_class: null,
				active_class: null
			},
			target: null
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        
        this._defaults = defaults;
        this._name = pluginName;
        
        this.init();
    }

    Plugin.prototype.init = function () {
        // Place initialization logic here
        // You already have access to the DOM element and the options via the instance, 
        // e.g., this.element and this.options
		var self = this;
		// salva altura do container
		var height = this.options.target.outerHeight();
		this.options.target.data('h', height);
		
		// fecha container
		this.options.target.css('height', 0);
		
		// listener para abrir e fechar
		$(this.element).on('click', function(){
			$(this).toggleClass('active');
			
			if($(this).hasClass('active')){
				if(self.options.icon.target) self.options.icon.target.attr('class', self.options.icon.active_class);
				self.options.target.addClass('open').css('height', self.options.target.data('h'));				
				
			} else {
				if(self.options.icon.target) self.options.icon.target.attr('class', self.options.icon.normal_class);
				self.options.target.removeClass('open').css('height', 0);				
			}
			
		});
		
		//console.log(height);
    };

    // A really lightweight plugin wrapper around the constructor, 
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
            }
        });
    };

}(jQuery, window));