<?php
/*
 * CONFIGURAÇÕES GERAIS
 */
$config['title'] = "Conceito Comunicação Integrada";
$config['email1'] = "conceito@conceito-online.com.br";// comunicação oficial
$config['email_debug'] = "dev@conceito-online.com.br";// para debug do sistema
$config['description'] = ''; // descrição para as metatags
$config['keywords'] = 'palavras, chaves'; // palavras-chave pata metatags
$config['googlemaps'] = 'https://maps.google.com.br/maps?q=R.+Rep%C3%BAblica+do+L%C3%ADbano,+61+-+Centro,+Rio+de+Janeiro+-+RJ&hl=pt-BR&ie=UTF8&ll=-22.906189,-43.186099&spn=0.008153,0.013937&sll=-22.066441,-42.924029&sspn=4.199221,7.13562&t=v&hnear=R.+Rep%C3%BAblica+do+L%C3%ADbano,+61+-+Centro,+Rio+de+Janeiro,+20061-030&z=17&iwloc=r0';
$config['instalation_folder'] = '';
$config['link_facebook'] = 'http://www.facebook.com/conceito.online';
$config['link_youtube'] = 'http://www.youtube.com/user/conceitocomunica';
$config['link_linkedin'] = 'http://www.linkedin.com/company/3070715?trk=tyah';

/*
 * DADOS DE AUTENTICAÇÃO DE EMAIL
 */
if(ENVIRONMENT == 'development'){
    $config['smtp_host'] = "smtp.conceito-online.com.br";// em branco desativa
    $config['smtp_user'] = 'dev@conceito-online.com.br';
    $config['smtp_pass'] = "conceito";
    $config['smtp_erro'] = 'dev@conceito-online.com.br'; // receberá retorno de erros
    $config['smtp_encr'] = "";// TLS (google), SSL, "" (locaweb)
    $config['smtp_port'] = 587; // 25 (default) || 587
} else {
    $config['smtp_host'] = "smtp.conceito-online.com.br";// em branco desativa
    $config['smtp_user'] = 'dev@conceito-online.com.br';
    $config['smtp_pass'] = "conceito";
    $config['smtp_erro'] = 'dev@conceito-online.com.br'; // receberá retorno de erros
    $config['smtp_encr'] = "";// TLS (google), SSL, "" (locaweb)
    $config['smtp_port'] = 587; // 25 (default) || 587
}


/*
 * CONFIGURAÇÕES DO CMS
 */
$config['cms_ver'] = '4.38';
$config['upl_imgs'] = $config['instalation_folder'] . 'upl/imgs';
$config['upl_arqs'] = $config['instalation_folder'] . 'upl/arqs';



/***************************************
 * configurações dinâmicas dos módulos *
 **************************************/
include_once APPPATH . "cache/config/modulos.php";
?>