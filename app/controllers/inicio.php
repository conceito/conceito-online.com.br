<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller principal INDEX
 */

class Inicio extends Frontend_Controller {

    function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(true);

        /*
         * Ativar função em caso de site multilingue
         * Ver core/Multilang_Controller.
         */
//        $this->setLang();
    }

    function index() {
//        $v = $this->uri->to_array('id, op');
//        $s = $this->uri->to_string($v);
//        $lingua = $this->lng;

//        mybug($this->cms_conteudo->get_url_page());
       
        $this->setNewScript(array('jquery.flexslider.min'));
        
        if(is_mobile()){
            $this->setNewScript(array('common-phone', 'home-phone'));
        } else {
            $this->setNewScript(array('common', 'home-desktop'));
        }
        
        $this->load->model('portfolio_model', 'portfolio');
        $this->load->model('depoimentos_model', 'depoimentos');
      
        $view['is_mobile'] = is_mobile();
        $view['slides'] = $this->portfolio->getDestaques();
        $view['about'] = $this->cms_conteudo->get_page('sobre-a-conceito');
        $view['testimonial'] = $this->depoimentos->getRand();
        
        $this->pagina['resumo'] = 'Desde 1992, a Conceito atua nos segmentos de comunicação, design, web, propaganda e marketing, com propostas personalizadas de acordo com a demanda de cada cliente.';
        $this->pagina['tags'] = '';
        
        $this->corpo = $this->load->view('home', $view, true);

        $this->templateRender();
    }

    
    // -------------------------------------------------------------------------
    /**
     * Redireciona para endereço do banner e soma 1 click.
     * Caso não exita, redireciona para home.
     * @param int $banner_id
     */
    public function redirect($banner_id){
        
        $this->load->library('cms_banner');
        if(!$this->cms_banner->redirect($banner_id)){
            redirect('');
        }
        
    }
    
    //--------------------------------------------------------------------------
    
    /**
     * Método redirecionado pelo routers.php para urls perdidas no Google.
     */
    public function redirecionamento(){
        
        $uri = trim($this->uri->uri_string(), '/');
        
//        mybug($uri);
        
        header( "HTTP/1.1 301 Moved Permanently" );
        
        if($uri == 'contato.php'){
            redirect('contato');
        }
        else if($uri == 'portifolio-inca.php'){
            redirect('portfolio/house-organ-informe-inca');
        } else if($uri == 'portifolio-nutclinic.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-zapp.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-crn4.php'){
            redirect('portfolio/website-do-crn-4');
        } else if($uri == 'portifolio-sesc-gentil.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-eletrobras-relatorio.php' 
                || $uri == 'portifolio-kit-eletrobras-2009.php' 
                || $uri == 'portifolio-kit-eletrobras-2010.php'){
            redirect('portfolio/kit-2012-da-eletrobras');
        } else if($uri == 'portifolio-quinta-bacalhau.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-mariana-baltar.php' || $uri == 'portifolio-mariana-baltar-1.php'){
            redirect('portfolio/cd-cantora-mariana-baltar-biscoito-fino');
        } else if($uri == 'portifolio-heitor-prazeres.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-ons-calendario.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-ibeu-60.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-bolsa-conceito.php'){
            redirect('portfolio/bolsa-ecologica-da-conceito-comunicacao');
        } else if($uri == 'portifolio-pe-anjo.php'){
            redirect('portfolio/catalogo-de-produtos-loja-pe-de-anjo');
        } else if($uri == 'portifolio-cartilha-transito.php'){
            redirect('portfolio/cartilha-educativa-aventuras-de-teca-e-tuco-detranrj');
        } else if($uri == 'portifolio-dom-joao.php'){
            redirect('portfolio/livro-dom-joao-vi-biblioteca-nacional-um-legado-em-papel');
        } else if($uri == 'portifolio-ta-limpo.php'){
            redirect('portfolio');
        } else if($uri == 'portifolio-furnas-relatorio.php'){
            redirect('portfolio/anuario-estatistico-de-furnas-de-2009');
        } else if($uri == 'portifolio-eletrobras-energia-acoes.php'){
            redirect('portfolio/kit-2012-da-eletrobras');
        } else if($uri == 'website/index.htm'){
            redirect();
        } else {
            redirect();
        }
        
        
        
    }

    
    
 

}