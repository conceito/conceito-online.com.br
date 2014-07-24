<?php

class Contato_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Verifica se a string inicia com [debug]
     *
     * @param string $str
     * @return boolean
     */
    function debugMode($str = '') {

        if (strlen($str) == 0) {
            $d = false;
        } else if (strtolower(substr($str, 0, 7)) == '[debug]') {
            $d = true;
        } else {
            $d = false;
        }
        return $d;
    }

    function envia_contato() {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $assunto = $this->input->post('assunto');
        $atuacao = $this->input->post('atuacao');
        $mensagem = $this->input->post('mensagem');

//        mybug($_FILES['curriculo']);
        if(isset($_FILES['curriculo']) && 
                strlen($_FILES['curriculo']['name']) > 4 && 
                $_FILES['curriculo']['size'] > 0){
            
            $validou = $this->validaArq($_FILES['curriculo']);

            // se não validou
            if (!$validou) {
                return 'O arquivo anexo está foras dos padrões.';
            }

            // arquivo
            $name = $_FILES['curriculo']['name'];
            $tmp = $_FILES['curriculo']['tmp_name'];
            $anexo['file'] = $tmp;
            $anexo['name'] = $name;
        } else {
            $anexo = false;
        }
        


        /*
         * monta html
         */
        $text = "Nome: " . $nome . "<br>" . PHP_EOL;
        $text .= "E-mail: " . $email . "<br>" . PHP_EOL;
        $text .= "Telefone: " . $tel . "<br>" . PHP_EOL;
        $text .= "Mensagem: " . nl2br($mensagem) . "<br>" . PHP_EOL;
        
        $view['titulo'] = 'Contato pelo site';
        $view['corpo'] = '<table width="100%" border="0" cellspacing="5" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;color:#33343a; font-size:14px; line-height:22px;">
        <tr>
        <th align="left" valign="top" scope="row">Nome</th>
        <td align="left" valign="top">'.$nome.'</td>
        </tr>
        <tr>
        <th align="left" valign="top" scope="row">E-mail</th>
        <td align="left" valign="top">'.$email.'</td>
        </tr>
        <tr>
        <th align="left" valign="top" scope="row">Telefone</th>
        <td align="left" valign="top">'.$tel.'</td>
        </tr>
        <tr>
        <th align="left" valign="top" scope="row">Mensagem</th>
        <td align="left" valign="top">'.$mensagem.'</td>
        </tr>
        </table>';
        
        $html = $this->emailTemplate($view);

        /*
         * instancia library
         */
        $this->load->library('e_mail');

        if ($this->debug) {
            $emailDes = $this->config->item('email_debug');
            $assunto = '[debug] ' . $assunto;
        } else {
            $emailDes = $this->config->item('email1');
        }

        $nomeDes = $this->config->item('title');
        $menHTML = $html;
        $menTXT = $text;
        $emailRem = $email;
        $nomeRem = $nome;

        $ret = $this->e_mail->envia($emailDes, $nomeDes, $assunto, $menHTML, $menTXT, $emailRem, $nomeRem, $anexo);
        return ($ret === true) ? true : 'Erro ao enviar mensagem. Tente novamente.';
    }

    function envia_curriculo() {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $mensagem = $this->input->post('obs');
        $assunto = 'Trabalhe Conosco';



        $validou = $this->validaArq($_FILES['arquivo']);

        // se não validou
        if (!$validou) {
            return false;
            exit;
        }

        // arquivo
        $name = $_FILES['arquivo']['name'];
        $tmp = $_FILES['arquivo']['tmp_name'];
        $anexo['file'] = $tmp;
        $anexo['name'] = $name;



//        echo "<pre>";
//        var_dump($_FILES['arquivo']);
//        exit;

        /*
         * monta html
         */
        $html = "Nome: " . $nome . "<br>" . PHP_EOL;
        $html .= "E-mail: " . $email . "<br>" . PHP_EOL;
        $html .= "Telefone: " . $tel . "<br>" . PHP_EOL;
        $html .= "Observações: " . nl2br($mensagem) . "<br>" . PHP_EOL;

        /*
         * instancia library
         */
        $this->load->library('e_mail');

        $emailDes = $this->config->item('email1');
        $nomeDes = $this->config->item('title');
        $menHTML = $html;
        $menTXT = $html;
        $emailRem = $email;
        $nomeRem = $nome;

        $ret = $this->e_mail->envia($emailDes, $nomeDes, $assunto, $menHTML, $menTXT, $emailRem, $nomeRem, $anexo);
        return $ret;
    }
    
    //-------------------------------------------------------------------------
    
    /**
     * Carrega template de email para inserir título e corpo.
     * 
     * @param   array     $params
     * @return  string
     */
    public function emailTemplate($params)
    {
        $view = $params;
        return $this->load->view('template/email', $view, true);
    }

    /**
     * VALIDA ARQUIVO SUBMETIDO
     * http://www.beesky.com/newsite/bit_byte.htm << conversão
     *
     * @param array $files
     */
    protected function validaArq($files) {

        $erro = 0;
        $ext1 = explode('.', $files['name']);
        $ext = strtolower($ext1[count($ext1) - 1]);


        // erro do servidor
        if ($files['error'] != 0) {
            $erro = 1;
        } else if ($files['size'] > 2097152) {// 2Mb
            $erro = 2;
        } else if ($ext != 'doc' && $ext != 'pdf' && $ext != 'docx') {
            $erro = 3;
        }
//        echo $ext;
//        exit;

        if ($erro == 0
            )return true;
        else
            return false;
    }

}