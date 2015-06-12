<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * CONTROLLER RESERVADO PARA FRONT-END
 * Sites em português: extends MX_Controller
 * Sites multiligue: extends Multilang_Controller (Ler configurações no controller)
 */

class Frontend_Controller extends MY_Controller {

    private $JSfixo = array('jquery-1.8.2.min', 'jquery.easing.min');     // assets précarregados
    private $CSSfixo = array('bootstrap', 'bootstrap-responsive', 'layout');// assets précarregados
    public $JS = array();     // JS na pasta assets/js
    public $JSlibs = array(); // JS na pasta libs/jquery
    public $json_vars = array();  // JSON variaveis
    public $CSS = array();    // CSS na pasta assets/css
    public $body_class = '';  // classe na tag body
    public $title = '';       // title intetado nos metadados
    public $corpo = '';       // view do corpo da página    
    public $tmp = array();   // array de dados do template principal
    public $uri_seg = array(); // guardará todos os segmentos da uri
    public $modulo = NULL;     // dados do módulo (CMS)
    public $pagina = NULL;     // dados da pagina (cms_conteudo)

    /**
     * assets version
     * @var int
     */
    public $ver = 6;


    function __construct() {
        parent::__construct();

        if(ENVIRONMENT == 'development' && !IS_AJAX){
//            $this->output->enable_profiler(TRUE);
            
        } else {
         
            // admin logado não faz cache            
            if($this->phpsess->get('logado', 'cms') != true){
                // ativa cache
//                $this->output->cache(60);
            }
            
        }
        /*
         * Carrega classes para todos os controller */
        $this->load->library(array('site_utils', 'cms_conteudo', 'cms_posts', 'cms_adminbar', 'Mobiledetect'));

        

        /*
         * Identifica o controller usado */
        $this->uri_seg = $this->uri->segment_array();
  
        /*
         * Instancia configurações sobre o ambiente para os conteúdos
         */
        $this->cms_posts->config(array(
            'lang' => (isset($this->lng)) ? $this->lng : 'pt'
        ));
        
        /*
         * Se NÃO for home já incrementa breadcrumb
         */
//        if(isset($this->uri_seg[1]) && $this->uri_seg[1] != 'inicio'){
//            $this->breadcrumb->add('Início', '/');
//        }
        
    }

    /**
     * Gera dados e monta o template
     */
    public function templateRender($template = 'template/main') {

        
        /*
         * Seta a classe CSS para a tag BODY no template
         */
        if ($this->uri_seg == false || $this->uri_seg[1] == 'inicio') {
            $this->uri_seg[1] = 'inicio';
            $this->body_class = 'home';
        } else {
            $this->body_class = 'page';
            
            // não pode exibir 'portfolio' no body
            if($this->uri_seg[1] != 'portfolio'){
                $this->body_class .= ' ' . implode(' ', $this->uri_seg);
            }
        }
        
        if (is_mobile()) {
            $this->body_class .= ' is-mobile';
        } else {
            $this->body_class .= ' is-desktop';
           
        }
        

        /*
         * MONTA AS PARTES DO TEMPLATE
         */
         // título
        $this->tmp['title'] = ($this->title != '') ? $this->title . ' &gt; ' . $this->config->item('title') : $this->config->item('title');
        // conteúdo principal
        $this->tmp['corpo'] = $this->corpo;
        // menu
        $this->tmp['menu'] = $this->generate_menu();
        // header
        $this->tmp['header'] = $this->partialHeader();
        // footer
        $this->tmp['footer'] = $this->partialFooter();
        // scripts adicionais
        $this->tmp['page_scripts'] = (isset($this->pagina['scripts'])) ? $this->pagina['scripts'] : '';

        /*
         * Dados para SEO
         */        
        $this->tmp['metatags'] = $this->metatags($this->tmp['title'], $this->pagina['resumo'], $this->pagina['tags'], '');


        /*
         * COMBINA ARRAYS
         */
        $JS = array_merge($this->JSfixo, $this->JS);
        $CSS = array_merge($this->CSSfixo, $this->CSS);
        $this->json_vars(null, array(
            'base_url' => base_url(),
            'site_url' => trim(site_url(), '/').'/'
        ));
        $this->tmp['json_vars'] = json_encode($this->json_vars);

        if(ENVIRONMENT == 'development'){
            $this->tmp['scripts'] = $this->scripts($JS, 'assets/js');
            $this->tmp['scripts'] .= $this->scripts($this->JSlibs, 'libs/jquery');
            $this->tmp['estilos'] = $this->estilos($CSS, 'assets/css');
            
//            $this->tmp['scripts'] .= minify('js', $JS, 'assets/js');
//            $this->tmp['scripts'] .= minify('js', $this->JSlibs, 'libs/jquery');
//            $this->tmp['estilos'] = minify('css', $CSS, 'assets/css');
        } else {   
            $this->tmp['scripts'] = $this->scripts($JS, 'assets/js');
            $this->tmp['scripts'] .= $this->scripts($this->JSlibs, 'libs/jquery');
            $this->tmp['estilos'] = $this->estilos($CSS, 'assets/css');
            
//            $this->tmp['scripts'] = minify('js', $JS, 'assets/js');
//            $this->tmp['scripts'] .= minify('js', $this->JSlibs, 'libs/jquery');
//            $this->tmp['estilos'] = minify('css', $CSS, 'assets/css');
        }
        
        


        /*
         * DESCARREGA NO TEMPLATE
         */
        $this->load->view($template, $this->tmp);
    }
    
    // ------------------------------------------------------------------------
    /**
     * Método personalizado para saber se é dispositivo Mobile;
     * @return type
     */
    public function isMobile() {
        return $this->agent->is_mobile();
    }

    // -------------------------------------------------------------------------
    /**
     * Método de exemplo do como gerar menu do módulo de páginas.
     * @return type 
     */
    public function generate_menu(){
        
        $config['overload'] = true;
        $config['modulo_id'] = 6;
        $config['html'] = true;
        $config['child_pages'] = true;
        $config['main_controller'] = '';
        $config['append'] = array(
            array(
                'titulo' => 'Contato', 'uri' => 'contato'
            ),
            array(
                'titulo' => 'Notícias', 'uri' => 'noticias'
            ),
            array(
                'titulo' => 'Cursos', 'uri' => 'cursos'
            ),
            array(
                'titulo' => 'Loja', 'uri' => 'loja'
            ),
            array(
                'titulo' => 'Pesquisar', 'uri' => 'pesquisa'
            ),
            array(
                'titulo' => 'Files', 'uri' => 'file/index'
            )
        );

        return $this->cms_conteudo->generate_menu($config);
    }
    
    
    // ------------------------------------------------------------------------
    /**
     * Monta e retorna o header.
     * @return string
     */
    private function partialHeader() {
//        mybug($this->uri_seg);
        $view['is_mobile'] = is_mobile();
        
        return $this->load->view('partial/header', $view, true);
        
    }
    
    // ------------------------------------------------------------------------
    /**
     * Monta e retorna o footer.
     * @return string
     */
    private function partialFooter() {
        
        $view['is_mobile'] = is_mobile();
        
        return $this->load->view('partial/footer', $view, true);
        
    }

    

    /**
     * Adiciona as metatags no head.
     *
     * @param string $pagina : nome do arquivo com metatags sem extenção (php)
     * @param string $local : pasta padrão [site/metatags]
     * @return string
     */
    public function metatags($title = '', $description = '', $keywords = '', $local = '') {
                
        $dadosPag['title'] = ($title != '') ? $title : $this->config->item('title');
        $dadosPag['description'] = (isset($description) && $description != '') ? $description : $this->config->item('description'); 
        $dadosPag['keywords'] = (isset($keywords) && $keywords != '') ? $keywords : $this->config->item('keywords');
        $saida = $this->load->view($local . '/metatags', $dadosPag, true);
        return $saida;
    }


    /**
     * Se acionada carrega scripts JS dentro da pasta "js" na raiz do site,
     * ou outro local passado na variavel '$local'.
     *
     * @param array $lista : nome dos scripts sem extenção (js)
     * @param string $local : pasta padrão [js]
     * @return string
     */
    function scripts($lista, $local = 'js') {
        if (!is_array($lista)) {
            $lista = array($lista); // se não for, transforma em array
        }
        if (count($lista) == 0) {
            return '';
        }
        
        $lista = array_unique($lista);
        
        // $pasta = site_url('js');
        $pasta = base_url() . $local;

        $saida = '';
        foreach ($lista as $nomejs) {
            $saida .= "<script type=\"text/javascript\" src=\"" . $pasta . "/" . $nomejs . ".js?v={$this->ver}\"></script>\n";
        }

        return $saida;
    }
    
    // -----------------------------------------------------------------------
    /**
     * Combina os arrays e converte em JSON na view.
     * São variáveis globais para serem usadas via JS nas views.
     * @param       array       $array
     * @return      array
     */
    public function json_vars($namespace = NULL, $array = NULL){

        
        if($namespace !== NULL){
            
            if(is_array($namespace)){
                $array = $namespace;
                $namespace = 'conteudo';
            } 
            else if(!is_array($array)){
                $array = explode(',', $array);
            }    
            
            $array_in = $array;
            unset($array);
            $array[$namespace] = $array_in;
        }
        
        $this->json_vars = array_merge($this->json_vars, $array);
        
    }

    /**
     * Se acionada carrega estilos CSS dentro da pasta "css" na raiz do site,
     * ou outro local passado na variavel '$local'.
     *
     * @param array $lista : nome dos estilos sem extenção (css)
     * @param string $local : pasta padrão [css]
     * @param string $media : tipo de css, 'screen' é o padrão
     * @return string
     */
    function estilos($lista, $local = 'css', $media = 'screen') {
        $ver = $this->ver;

        if (!is_array($lista)) {
            $lista = array($lista); // se não for, transforma em array
        }
        if (count($lista) == 0) {
            return '';
        }
        $lista = array_unique($lista);
        $pasta = base_url() . $local;
        $saida = '';
        foreach ($lista as $nomes) {
            $saida .= "<link href=\"" . $pasta . "/" . $nomes . ".css?v={$ver}\" rel=\"stylesheet\" type=\"text/css\"
            media=\"$media\" />\n";
        }

        return $saida;
    }

    /*
     * ACRESCENTA SCRIPTS PARA SEREM ENVIADOS AO TEMPLATE
     */

    function setNewScript($array = null, $where = 'assets') {
        if ($array == null){
            return false;
        }
        else if (!is_array($array)){
            $array = explode(',', $array);
        }
        
        if($where == 'assets'){
            $this->JS = array_merge($this->JS, $array);
        } else if($where == 'libs') {
            $this->JSlibs = array_merge($this->JSlibs, $array);
        }        
    }

    /*
     * ACRESCENTA CSSs PARA SEREM ENVIADOS AO TEMPLATE
     */

    function setNewEstyle($array = null) {
        if ($array == null)
            return false;
        else if (!is_array($array))
            $array = explode(',', $array);
        
        $this->CSS = array_merge($this->CSS, $array);
    }
    
    /**
     * Plugins são conjuntos de JS e CSS que são injetados.
     * @param type $pluginName 
     */
    public function setNewPlugin($pluginName){
        
        if(! is_array($pluginName)){
            $pluginName = explode(',', $pluginName);
        } 
        
        foreach($pluginName as $plugin){
            
            if($plugin == 'backbone'){
                $this->setNewScript(array('underscore-min','backbone-min', 'appConfig', 'tools'));           
                
            }             
        }        
    }
    
    

  

}

?>