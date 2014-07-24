<?php

class Contato extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('contato_model', 'contato');
    }

    public function index()
    {

        $view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
        $view['msg']      = $this->phpsess->flashget('msg');

        $this->pagina['resumo'] = '(21) 2507-6167. Rua República do Líbano, 61 / sala 809, Centro - Rio de Janeiro, RJ, 20061-030';
        $this->pagina['tags']   = '';

        if (is_mobile()) {
            $this->setNewScript(array('common-phone'));
        } else {
            $this->setNewPlugin(array('backbone'));
            $this->setNewScript(array('jquery.validate', 'common', 'contato-app'));
        }

        $view['is_mobile'] = is_mobile();

        $this->title = 'Contato';
        $this->corpo = $this->load->view('contato', $view, true);

        $this->templateRender();

    }

    public function envia()
    {

        $this->load->library(array('form_validation'));
        $this->load->model(array('contato_model'));

        //        mybug($_FILES);
        //        mybug($this->input->post());
        /*
         * Validação
         */
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');
        $this->form_validation->set_rules('tel', 'Telefone', 'trim');
        $this->form_validation->set_rules('assunto', 'Assunto', 'trim');
        $this->form_validation->set_rules('atuacao', 'Atuação', 'trim');

        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

        /*
         * Não validou
         */
        if ($this->form_validation->run() == false) {

            // salva erro na session
            $this->phpsess->flashsave('msg_tipo', 'error');
            $this->phpsess->flashsave('msg', 'Existem campos incompletos.');
            $this->index();
        } /*
         * OK, validou
         */
        else {

            $ret = $this->contato->envia_contato();

            if ($ret === true) {
                $this->phpsess->flashsave('msg_tipo', 'success');
                $this->phpsess->flashsave('msg', 'Mensagem enviada com sucesso.');
            } else {
                $this->phpsess->flashsave('msg_tipo', 'error');
                $this->phpsess->flashsave('msg', $ret);
            }

            redirect('contato');
        }
    }

}