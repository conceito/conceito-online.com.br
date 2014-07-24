<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Para sites multilingues sobrepõe função original.
 * @param type $uri
 * @return type
 */
function site_url($uri = '') {

    $CI = & get_instance();

    if (is_array($uri)) {
        $uri = implode('/', $uri);
    }

    if (function_exists('get_instance')) {

//            $uri = $CI->my_lang->localized($uri);
        $langSeg = $CI->uri->segment(1);
        if (strlen($langSeg) != 2) {
            $langSeg = 'pt';
        }
        $uri = $langSeg . '/' . $uri;
    }

    $index = ($CI->config->item('index_page') == '') ? '' : $CI->config->item('index_page') . '/';


    // @todo: remover index.php
    return base_url() . $index . trim($uri, '/');
}
