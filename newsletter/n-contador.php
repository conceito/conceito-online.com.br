<?php

// Inclui arquivos

include_once("../config/sis.cfg.php");
include_once("../model/MalaDiretaNewsletterModel.php");

// Define parâmetros GET

$codNews = isset($_GET["codNews"]) ? $_GET["codNews"] : 0;
$codNewsEnvio = isset($_GET["codNewsEnvio"]) ? $_GET["codNewsEnvio"] : 0;
$codCadastro = isset($_GET["codCadastro"]) ? $_GET["codCadastro"] : 0;
$email = isset($_GET["email"]) ? $_GET["email"] : NULL;

// Grava LOG de leitura

$newsletter = new MalaDiretaNewsletterModel();
$newsletter->gravarLogLeitura($codNews, $codNewsEnvio, $codCadastro, $email);
unset($newsletter);

// Monta e entrega imagem

$sImagem  = file_get_contents(SIS_PATH . "newsletter/img/giftrans.gif");

// Carrega a imagem

$img = NULL;
$img = imagecreatefromstring($sImagem);

// Mostra a imagem

header('Content-type: image/jpeg');
imagejpeg($img);

?> 