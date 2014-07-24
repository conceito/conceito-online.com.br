/**
 * Objetos uteis para manipular portfólio.
 * @type {Object}
 */
var Port = Port || {};
/*
|---------------------------------------------------------------------------------
|	App Portfolio
|---------------------------------------------------------------------------------
*/
Portfolio.Router = Backbone.Router.extend({

	routes: {
		"" : "index",
		"pag/:id" : "goToPage"
	},

	/**
	 * Todas as inicializações devem vir aqui
	 */
	initialize: function(){

		// Inicializa coleção principal
		window.portfolioCollectionsBoxes = new Portfolio.Collections.Boxes();

		// Inicializa View principal
		window.portfolioViewsPage = new Portfolio.Views.Page({
			collection: portfolioCollectionsBoxes
		});
	},


	/**
	 * Página inicial
	 */
	index: function(){
		// Disparando um evento personalizado
		// Aceita argumentos como segundo parâmetro
		// App.Events.trigger('myPersonalEvent');
		// console.log('app running');
	},

	goToPage: function(pageId){
		Portfolio.Events.trigger('goToPage', pageId);
	}

});


/*
|=================================================================================
|	Model do box de portfolio
|---------------------------------------------------------------------------------
*/
Portfolio.Models.Box = Backbone.Model.extend({

	defaults:{
		classe: '',
		titulo: '',
		clienteNome: '',
		full_uri: '',
		img: '',
		resumo: ''
	},

	parse: function(attrs){

		// se for retornado 'placeholder' remove botão para adicionar trabalhos
		if(attrs.titulo === 'placeholder'){
			portfolioViewsPage.desactivateButton();
		}
		
		return {
			id: attrs.id,
			titulo: attrs.titulo,
			clienteNome: attrs.clienteNome,
			classe: attrs.class,
			full_uri: CMS.site_url + attrs.full_uri,
			img: attrs.responsive_thumb,
			resumo: attrs.resumo
		};
	}

});

/*
|=================================================================================
|	Coleção do Model Box
|---------------------------------------------------------------------------------
*/
Portfolio.Collections.Boxes = Backbone.Collection.extend({

	model: Portfolio.Models.Box,

	url: function(){
		var ttl = portfolioViewsPage.totalBoxes();
		var page = (Math.ceil(ttl / portfolioViewsPage.perPage)) + 1;
		var tag = portfolioViewsPage.tagAtiva;

		portfolioViewsPage.actualPage = page;

		var uri = CMS.site_url + 'portfolio/getmore';
			uri = uri + '/page:'+page;
			uri = uri + '/tag:'+tag;
			uri = uri + '/rand:'+Math.random()*999;

		return uri;
	}

});

/*
|=================================================================================
|	View para cada Box
|---------------------------------------------------------------------------------
*/
Portfolio.Views.Box = Backbone.View.extend({

	// el: '.box',
	className: 'box',
	tagName: 'div',

	initialize: function(){
		this.template = _.template( tpl.get('portfolio-box') );
		this.tmplPlaceholder = _.template( tpl.get('portfolio-placeholder') );
	},

	render: function(eventName){

		if(this.model.get('titulo') == 'placeholder'){

			this.$el.html( this.tmplPlaceholder( this.model.toJSON() ) );

		} else {

			this.$el.html( this.template( this.model.toJSON() ) );

		}
		this.$el.addClass(this.model.toJSON().classe);
		return this;
	}

});


/*
|=================================================================================
|	View para a página de portfolio
|---------------------------------------------------------------------------------
*/
Portfolio.Views.Page = Backbone.View.extend({

	el: '#mainApp',

	events:{
		"click #get-more" : "getMore"
	},

	initialize: function(){
		$('.pagination').remove();
		$('#get-more').removeClass('hidden');

		// estabelece a quantidade de boxes por página
		this.perPage = this.totalBoxes();

		// deixa saber se tem tag ativa
		this.setActiveTag();

		this.collection.on('reset', this.addAll, this);

		Portfolio.Events.on('goToPage', this.updateToPage, this);

	},

	totalBoxes: function(){
		var ttl = $('.box', this.el).length;
		// console.log('total: ' + ttl);
		return ttl;
	},

	/**
	 * Faz requisição por mais trabalhos
	 * @return {[type]} [description]
	 */
	getMore: function(e){
		e.preventDefault();
		this.setLoading();
		this.collection.fetch();
	},

	addAll: function(event){

		var html = [];
		this.desactivateButton();
		portfolioRouter.navigate('pag/'+this.actualPage);

		this.collection.each(function(model){
			var box = new Portfolio.Views.Box({model: model});
			html.push( box.render().el );
		});
		// console.log(html);
		var $html = $(html);

		// se Masonry estiver instanciado é desktop
		if(Port.isDesktop){
			// parseia HTML para setar a altura dos boxes
			Port.setBoxHeight($html);
			$('#port-container').append($html);
		}
		// senão, é acesso mobile
		else {
			$('#port-container').append($html);
		}

		this.unsetLoading();
	},

	/**
	 * @todo
	 * @param  {[type]} pageId [description]
	 * @return {[type]}        [description]
	 */
	updateToPage: function(pageId){
		// console.log('fazer isso - updateToPage: ' + pageId);
	},

	/**
	 * Remove botão se o retorno for menor que a quantidade de itens
	 * por página.
	 */
	desactivateButton: function(anyway){
		if(this.collection.length < this.perPage || anyway === true){
			$('#get-more').fadeOut(function(){$(this).remove();});
		}
	},

	setLoading: function(){
		$('.loading-bar').removeClass('hidden');
		$('#get-more').addClass('hidden');
	},

	unsetLoading: function(){
		$('.loading-bar').addClass('hidden');
		$('#get-more').removeClass('hidden');
	},

	setActiveTag: function(){
		if($('input[name=tag_ativa]').length){
			this.tagAtiva = $('input[name=tag_ativa]').val();
		}
	},

	// é redefinido no initialize()
	perPage: 0,

	actualPage: 1,

	tagAtiva: false

});

$(document).ready(function(){

	/**
	 * Carrega os templates necessários... inicia APP
	 */
	window.tpl.loadTemplates(['portfolio-box', 'portfolio-placeholder'], function(){

		// init
		window.portfolioRouter = new Portfolio.Router();
		Backbone.history.start();

	});

});