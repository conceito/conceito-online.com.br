/*
|---------------------------------------------------------------------------------
|	App Contato
|---------------------------------------------------------------------------------
*/
Contato.Router = Backbone.Router.extend({

	routes: {
		"" : "index"
	},

	/**
	 * Todas as inicializações devem vir aqui
	 */
	initialize: function(){

		// Inicializa coleção principal
		// window.portfolioCollectionsBoxes = new Portfolio.Collections.Boxes();

		// Inicializa View principal
		window.contatoViewsPage = new Contato.Views.Page();
	},


	/**
	 * Página inicial
	 */
	index: function(){
		// Disparando um evento personalizado
		// Aceita argumentos como segundo parâmetro
		// App.Events.trigger('myPersonalEvent');
		// console.log('app running');
	}

});


/*
|=================================================================================
|	Model do box de portfolio
|---------------------------------------------------------------------------------
*/


/*
|=================================================================================
|	Coleção do Model Box
|---------------------------------------------------------------------------------
*/



/*
|=================================================================================
|	View para a página de contato
|---------------------------------------------------------------------------------
*/
Contato.Views.Page = Backbone.View.extend({

	el: '#page',

	events:{
		"click .do-curriculo" : "preparaCurriculo",
		"click .tag" : "preparaCurriculo",
		"click #do-submit" : "submit",
		"focus #mensagem" : "openLetter",
		"blur #mensagem" : "closeLetter",
		"click button.close" : "closeMsgs"
	},

	initialize: function(){
		$('#nome').focus();
//		$('#tel').mask('(99)9999-9999');
		this.checkAlert();
	},

	preparaCurriculo: function(e){
		// console.log(e);
		// console.log(e.target.className);
		e.preventDefault();
		// só transforma em contato se o clique for no botão específico
		if(this.isType == 'job' && e.target.className !== 'tag'){
			this.setTypeContact(e);
		} else {
			this.setTypeJob(e);
		}
		// this.validaForm(e);

	},

	submit: function(e){
		e.preventDefault();
		var isvalid = this.validaForm(e);

		if(isvalid){
			$('.letter').animate({'marginTop':0}, 500, function(){
				$('.form-validate').submit();
			});
		}
	},

	validaForm: function(e){

		var assunto = $('#assunto').val();

		if(assunto.length === 0){
			var msg = '';
			if(this.isType === 'job'){
				msg = 'Envio de currículo';

				if(e.target.className === 'tag'){
					msg = msg + ' ['+e.target.innerText+']';
				}
			} else {
				msg = 'Contato pelo site';
			}
			$('#assunto').val(msg);
		}

		var valid = $('.form-validate').valid();

		$('label.error').addClass('animated shake');

		return valid;
	},

	openLetter: function(){
		var mt;
		if(this.isType==='contact'){
			mt = -41;
		} else {
			mt = -110;
		}
		$('.letter').animate({'marginTop':mt}, 500);
	},

	closeLetter: function(){
		var mb;
		if(this.isType==='contact'){
			mb = 0;
		} else {
			mb = -41;
		}
		var n = $('#nome').val(),
			e = $('#email').val(),
			m = $('#mensagem').val();

		if(n.length === 0 && e.length === 0 && m.length === 0){
			$('.letter').stop(false).animate({'marginTop':mb}, 500);
		}
	},

	setTypeJob: function(e){
		this.isType = "job";
		$('.letter').stop(false).animate({'marginTop':-41}, 500, function(){
			$('.job-only').show().addClass('animated highlight');
		});
		$('.do-curriculo').find('i[class*=icon-]').attr('class', 'icon-mail-w')
		.end().find('.innerTxt').text('Apenas contato');

	},

	setTypeContact: function(args){
		this.isType = "contact";
		$('.job-only').removeClass('animated highlight').hide();

		$('.letter').stop(false).animate({'marginTop':0}, 500);
		$('.do-curriculo').find('i[class*=icon-]').attr('class', 'icon-bag')
		.end().find('.innerTxt').text('Enviar currículo');

	},

	closeMsgs: function(){
		$('.alert').removeClass('error').removeClass('success');
	},

	checkAlert: function(){
		if($('input[name=form_msg]').length){
			var msg_tipo = $('input[name=form_msg]').val();
			$('.alert').addClass(msg_tipo);
		}
	},

	isType: "contact"

});

$(document).ready(function(){

	/**
	 * Carrega os templates necessários... inicia APP
	 */
	window.tpl.loadTemplates(['portfolio-box'], function(){

		// init
		window.contatoRouter = new Contato.Router();
		Backbone.history.start();

	});

});