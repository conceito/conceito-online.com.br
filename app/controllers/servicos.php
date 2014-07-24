<?php

class Servicos extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();

//        $this->load->model('contato_model', 'contato');
    }

    public function index()
    {

        $view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
        $view['msg']      = $this->phpsess->flashget('msg');

        $this->pagina['resumo'] = 'Serviços';
        $this->pagina['tags']   = '';

//        if (is_mobile()) {
//            $this->setNewScript(array('common-phone'));
//        } else {
//            $this->setNewPlugin(array('backbone'));
//            $this->setNewScript(array('jquery.validate', 'common', 'contato-app'));
//        }

        $view['is_mobile'] = is_mobile();

        $this->title = 'Serviços';
        $this->corpo = $this->load->view('servicos', $view, true);

        $this->templateRender();

    }

}