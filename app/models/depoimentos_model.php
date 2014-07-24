<?php

class Depoimentos_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    //----------------------------------------------------------------------
    /**
     * Retorna um depoimento aleatório que esteja destacado
     */
    public function getRand() {
                
        $posts = $this->cms_posts->get(array(
            'modulo_id' => 61,
            'per_page' => 1,
            'base_url' => 'inicio/index',
            'destaque' => 1,
            'ordem'    => 'rand()',
            'campos'   => 'id, nick, titulo, resumo, dt_ini, txt, modulo_id, galeria, full_uri'
        ));
//mybug($posts[0]);
        return $posts[0];
        
    }
}