<?php
/**
 * API para manipular Portfolio
 */
class Portfolio_model extends CI_Model{
    
    
    public $config = array();
    public $pagination = false;
    public $total = 0;
    public $perPage = 12;


    public $boxes_sz_class = array('size-2', 'size-1','size-2', 'size-2', 
                                    'size-2', 'size-1', 'size-1', 'size-1', 
                                    'size-1', 'size-2', 'size-2', 'size-1');


    public function __construct() {
        parent::__construct();
    }
    
    
    // ------------------------------------------------------------------------
    /**
     * Retorna um grupo de trabalhos.
     * Pode ser paginado.
     * 
     * @param   array   $config
     * @return  array
     */
    public function get($config = array()) {
        
        
        $posts = $this->cms_posts->get(array(
            'modulo_id' => 7,
            'per_page' => $this->perPage, // 12
            'base_url' => 'portfolio/index',
            'start_page' => (isset($config['start_page'])) ? $config['start_page'] : false,
            'destaque' => false,
            'gallery_tag' => false,
            'campos'      => 'id, nick, full_uri, titulo, resumo, dt_ini, galeria, modulo_id, tags'
        ));
        
        $this->pagination = $this->cms_posts->pagination();
        $this->total = $this->cms_posts->get_total();
        
        return $this->portfolioParser($posts);
    }

    // ------------------------------------------------------------------------
    /**
     * Retorna os 3 últimos destaques para slider home
     * @param array $params
     */
    public function getDestaques($params = false) {
        
        $posts = $this->cms_posts->get(array(
            'modulo_id' => 7,
            'per_page' => 3,
            'base_url' => 'inicio/index',
            'destaque' => 1,
            'gallery_tag' => false,
            'ordem'  => 'rand()',
            'campos'      => 'id, nick, full_uri, titulo, resumo, dt_ini, galeria, modulo_id, tags'
        ));
        
        /*
         * Se não retornar nada, tenta posts sem destaque
         */
        if($posts === false){
            $posts = $this->cms_posts->get(array(
                'modulo_id' => 7,
                'per_page' => 3,
                'base_url' => 'inicio/index',
                'destaque' => 0,
                'gallery_tag' => false,
                'campos'      => 'id, nick, full_uri, titulo, resumo, dt_ini, galeria, modulo_id, tags'
            ));
        }
        
        return $this->portfolioParser($posts);
    }
    
    
    // ------------------------------------------------------------------------
    /**
     * Método para parsear portfólios.
     * @param   array     $portfolios
     * @return  array
     */
    public function portfolioParser($portfolios) {
        
        if(empty($portfolios)){
            return false;
        }
        else if(isset($portfolios[0]) && is_array($portfolios[0])){
            $isSingle = false;
        } 
        else {
            $portfolios = array($portfolios);
            $isSingle = true;
        }
        
        $return = array();

        $moduloDe3 = count($portfolios)%3;
        // quantos placeholders no fim
        $placeholders = ($moduloDe3 > 0) ? 3 - $moduloDe3 : 0;

        $ci = &get_instance();
        $img_path = img($ci->config->item('upl_imgs'));
        
        foreach ($portfolios as $port){
            
            // coloca imagem thumbnail disponível para as requisições AJAX
            if(!empty($port['galeria'])){
                $img = $port['galeria'][0]['nome'];
                $port['responsive_thumb'] =  $img_path . responsive_thumb($img);                
            }
            
            // ajusta nome cliente
            if(isset($port['tags'])){
                $port['clienteNome'] = $port['tags'];
                unset($port['tags']);
            }
            
            // na unha
            $port['class'] = 'size-2';
            $return[] = $port;            
            
        }
        
        /*
         * Adiciona placeholders
         */
        if($placeholders > 0){
            for ($x = 0; $x < $placeholders; $x++)
            {
                $return[] = array(
                    'class' => 'placeholder size-2',
                    'titulo' => 'placeholder',
                    'resumo' => 'placeholder',
                    'nick' => 'placeholder',
                    'id' => 'placeholder-'.  rand(999, 9999),
                    'full_uri' => '',
                    'responsive_thumb' => 'placeholder',
                    'galeria' => array()
                );
            }
        }
        
        if($isSingle){
            $return = $return[0];
        }
        
        return $return;
    }
    
    // ----------------------------------------------------------------------
    
    /**
     * Retorna tudo sobre o trabalho.
     * @param type $nick
     */
    public function getJob($nick) {
        
//        $this->cms_conteudo->set();
        $post = $this->cms_conteudo->get_page($nick);
        if($post === false){
            return false;
        }
        
        $post['galeria'] = $this->cms_conteudo->get_page_gallery();
        
        $rel = $this->cms_conteudo->get_page_related();
        
        if($rel){
            $key = array_rand($rel, 1);
            $post['rel'] = $rel[$key];
        }
        
        $post['tags'] = $this->cms_posts->get_post_tags($post['id'], $post['modulo_id']);
        $post
//        mybug($post);
        return $post;
       
        
    }
    
    
    // ---------------------------------------------------------------------
    /**
     * Retorna os portfolios que tem tags iguais... e mistura.
     * @param type $tags
     * @return array
     */
    public function getJobsByTags($tags) {
        
        if($tags == false){
            return false;
        }
        $ids = array();
        foreach ($tags as $value) {
            $ids[] = $value['id'];
        }
        
        
        $posts = $this->cms_posts->get(array(
            'modulo_id' => 7,
            'per_page' => 7, 
            'tags' => $ids,
            'gallery_tag' => false,
            'campos'      => 'id, nick, full_uri, titulo, resumo, dt_ini, galeria, modulo_id, tags'
        ));
        
        shuffle($posts);
        
        $classes = array('size-2', 'size-1', 'size-2', 'size-1', 'size-2 up-fix', 'size-1');
        
        $return = array();
        $i = 0;
        foreach ($posts as $post) {
            
            // remove o trabalho já aberto
            $opened = $this->uri->segment(2);
            
            if($opened == $post['nick']){
                continue;
            }
            
            // ajusta nome cliente
            if(isset($post['tags'])){
                $post['clienteNome'] = $post['tags'];
                unset($post['tags']);
            }
            
            $post['class'] = 'size-2';
            $return[] = $post;
            
            $i++;
        }
//        mybug($return);
        
        return array_slice($return, 0, 6);
    }
    
}