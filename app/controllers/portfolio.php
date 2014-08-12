<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portfolio extends Frontend_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {

        $uri = $this->uri->to_array(array('tag'));
        
        $this->setNewScript(array('jquery.fitvids.min', 'jquery.flexslider.min'));
        $this->setNewPlugin(array('backbone'));
        
        if(is_mobile()){
            $this->setNewScript(array('common-phone', 'portfolio-phone', 'portfolio-app'));
        } else {
            $this->setNewScript(array('common', 'portfolio-desktop', 'portfolio-app'));
        }
        
        $this->load->model('portfolio_model', 'portfolio');
        
        $view['is_mobile'] = is_mobile();
        $view['works'] = $this->portfolio->get();       
        $view['pagination'] = $this->portfolio->pagination;
        $view['total'] = $this->portfolio->total;
        $view['tags'] = $this->cms_posts->get_modulo_tags(7);
        $view['tag_ativa'] = $uri['tag'];
        
//        mybug($this->uri->to_array(array('tag')));
        
        $this->pagina['resumo'] = 'Portfólio > identidade, internet, impresso, evento, editorial';
        $this->pagina['tags'] = '';
        $this->title = 'Portfólio';
        $this->corpo = $this->load->view('portfolio', $view, true);
        
        $this->templateRender();        
        
    }
    
    //-------------------------------------------------------------------------
    
    /**
     * Retorna os resultados paginados como JSON
     * @param   int     $page
     */
    public function getmore() {
        
        $uri = $this->uri->to_array(array('page'));
        
        $this->load->model('portfolio_model', 'portfolio');
        
        $posts = $this->portfolio->get(array(
            'start_page' => $uri['page']
        ));
        
        echo json_encode($posts);
        
    }
    
    
    // -----------------------------------------------------------------------
    /**
     * Exibe o cliente.
     * @param string $job Nick do portfolio
     */
    public function show($job) {



//        mybug('stop');
        
        $this->setNewScript(array('jquery.flexslider.min', 'jquery.fitvids.min'));
        $this->setNewPlugin(array('backbone'));
        
        if(is_mobile()){
            $this->setNewScript(array('common-phone', 'portfolio-phone'));
        } else {
            $this->setNewScript(array('jquery.ui.core.all', 'jquery.ui.tabs.min', 'common', 'portfolio-desktop'));
       
        }
        
        $this->load->model('portfolio_model', 'portfolio');
      
        $view['is_mobile'] = is_mobile();
        $view['job'] = $this->portfolio->getJob($job);





//	    dd($view['job']);

        if($view['job'] === false){
            redirect('portfolio');
        }
        
        $view['bytags'] = $this->portfolio->getJobsByTags($view['job']['tags']);
//        mybug($view['bytags']);
        $this->pagina['resumo'] = strip_tags($view['job']['resumo']);
        $this->pagina['tags'] = '';
        $this->title = $view['job']['titulo'] . ' &gt; Portfólio';
        
        $this->corpo = $this->load->view('portfolio_show', $view, true);

        $this->templateRender();
        
    }
    
}