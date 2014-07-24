<?php

// Inclui arquivos

include_once("../config/sis.cfg.php");
include_once("../model/MalaDiretaNewsletterModel.php");

// Define parâmetros GET

$codNews = isset($_GET["codNews"]) ? $_GET["codNews"] : 0;
$codNewsEnvio = isset($_GET["codNewsEnvio"]) ? $_GET["codNewsEnvio"] : 0;
$codCadastro = isset($_GET["codCadastro"]) ? $_GET["codCadastro"] : 0;
$email = isset($_GET["email"]) ? $_GET["email"] : NULL;
$url = isset($_GET["url"]) ? $_GET["url"] : SIS_URL;

// Grava LOG de leitura

$newsletter = new MalaDiretaNewsletterModel();
$newsletter->gravarLogLink($codNews, $codNewsEnvio, $codCadastro, $email, $url);
unset($newsletter);

header("location: " . $url . "");
?> 