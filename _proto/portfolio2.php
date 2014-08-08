<?php
include "inc/Mobile_Detect.php";
$detect = new Mobile_Detect();
$onlyMobile = ($detect->isMobile() && !$detect->isTablet()) ? true : false;
if($_SERVER['QUERY_STRING'] == 'phone'){
    $onlyMobile = true;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width, minimum-scale=1.0,maximum-scale=10.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Conceito &gt; Portfólio</title>

    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="../assets/css/layout.css">

    <!-- @tip: scripts para ALL -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <script src="../assets/js/jquery-1.8.2.min.js"></script>

    <script src="../assets/js/jquery.easing.min.js"></script>

    <!-- @tip: scripts para home|portfólio -->
    <script src="../assets/js/jquery.flexslider.min.js"></script>
    <script src="../assets/js/jquery.fitvids.min.js"></script>

    <!-- @tip: scripts para portfolio -->
    <?php if($onlyMobile):?>

        <script src="../assets/js/common-phone.js"></script>
        <script src="../assets/js/portfolio-phone.js"></script>

    <?php else:?>

        <!-- <script src="../assets/js/jquery.ui.effect-slide.min.js"></script> -->

        <script src="../assets/js/jquery.ui.core.all.js"></script>
        <script src="../assets/js/jquery.masonry.min.js"></script>
        <script src="../assets/js/jquery.ui.tabs.min.js"></script>

        <script src="../assets/js/common.js"></script>
        <script src="../assets/js/portfolio-desktop.js"></script>


    <?php endif;?>

    <script type="text/javascript">
        $(document).ready(function(e) {

            $('#myTab').tabs({
                collapsible: true,
                active: false,
                fx: {
                    height: 'toggle',
                    duration: 'slow'
                }
            });

        });
    </script>
</head>
<body class="page">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<div id="main-container">


<header id="header" class="clearfix">
    <div class="inner-row">

        <div class="row-fluid">

            <a href="javascript:history.back();" class="icon-back visible-phone ir">&lt;</a>

            <div class="logo">
                <a href="index.php" class="icon- logo-med ir" title="Conceito Comunicação Integrada">Conceito Comunicação Integrada</a>
            </div><!-- .logo -->

            <a class="menu-ctrl visible-phone" href="#"> <i class="icon-menu"></i> </a>

        </div><!-- .row-fluid -->


        <div class="menu">
            <ul class="unstyled">
                <li class="hidden-phone"><a href="index.php">Início</a></li>
                <li class="active"><a href="portfolio.php">Portfólio</a></li>
                <li><a href="contato.php">Contato</a></li>
                <?php //if(isset($_GET['d']) && $_GET['d'] == 'd'):?>
                <li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
                <?php //endif;?>
            </ul>
        </div><!-- .menu -->

    </div><!-- .inner-row -->
</header><!-- #header -->


<div id="page">

<!-- @ Box de portfolio -->
<div class="row-fluid portfolio slider">
    <div class="inner-row">


        <div class="hd">

            <h1 class="cinza">Portfólio <i class="icon-a3c-r"> </i> <span class="job-title">Nome do trabalho / cliente</span> </h1>

        </div><!-- .hd -->

        <div class="ct">

            <!-- @ Abas de conteúdo -->
            <!-- @tip: Não carregar em smartphones!!! -->
            <div class="about-job hidden-phone" id="myTab">
                <ul class="nav-tabs">
                    <li class=""><a href="#detalhes"><i class="icon-plus"></i> Detalhes</a></li>
                    <li><a href="#share"><i class="icon-heart"></i></a></li>
                </ul>

                <div class="tab-content">

                    <div id="detalhes">
                        <div class="tab-pane">

                            <div class="testimonial">
                                <i class="icon-quote-w"></i>
                                <div class="quotes">

                                    <div class="cite cite-1">
                                        <p>Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa. Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa.
                                            <cite>Fulano de Tal</cite></p>
                                    </div><!-- .cite-1 -->

                                </div><!-- .quotes -->

                            </div><!-- .testimonial -->

                            <p>Desde 1992, a Conceito atua nos segmentos de comunicação, design, web, propaganda e marketing, com propostas personalizadas de acordo com a demanda de cada cliente.</p>

                            <p>Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa. Somos uma empresa inovadora, mas experiente, formada por profissionais bom relacionamento interpessoal. Mais do que clientes, a Conceito busca parceiros.</p>

                            <p>Desde 1992, a Conceito atua nos segmentos de comunicação, design, web, propaganda e marketing, com propostas personalizadas de acordo com a demanda de cada cliente.</p>

                            <p>Para nós, da Conceito, comunicar-se é agir de maneira integrada, agregando diferentes soluções para atender às necessidades de sua empresa.</p>

                            <p><br><a href="#" class="lnk-white"><i class="icon-a10w-r"></i> <strong>Visitar site</strong></a></p>





                        </div>
                    </div><!-- tab-content -->


                    <div id="share">

                        <div class="tab-pane">
                            <p>Share</p>
                        </div>

                    </div><!-- tab-content -->

                </div>

            </div><!-- .about-job -->

            <!-- @ Container dos trabalhos -->
            <div class="port-slider-container">
                <ul class="unstyled slides ">
                    <li>
                        <a href="#" class="img-container"><img src="../upl/imgs/__port.jpg" /></a>
                    </li>

                    <li>
                        <a href="#" class="img-container"><img src="../upl/imgs/__port-b.jpg" /></a>
                    </li>

                    <li>
                        <a href="#" class="img-container"><img src="../upl/imgs/__port-c.jpg" /></a>
                    </li>

                    <li>
                        <iframe class="play3" width="1280" height="720" src="http://www.youtube.com/embed/apWsYZL16d0?showinfo=0" frameborder="0" allowfullscreen ></iframe>
                    </li>
                </ul>
            </div><!-- .port-slider-container -->
            <!-- .slides -->

        </div><!-- .ct -->


    </div><!-- .inner-row -->
</div><!-- .row-fluid.portfolio.slider -->



<!-- @ Box de relacionados -->
<!-- @tip: Não carregar em smartphones!!! -->
<div class="row-fluid related hidden-phone">
    <div class="inner-row">

        <i class="icon-3-c corner"></i>

        <div class="hd">

            <h3 class="cinza">Projetos relacionados</h3>

            <div class="tags-group disabled hidden-phone">
                <ul class="unstyled">
                    <li><a href="#">relatório</a></li>
                    <li><a href="#">editorial</a></li>
                </ul>
            </div><!-- .tags-group -->

        </div><!-- .hd -->

        <div class="ct  clearfix">

            <div class="port-boxes">


                <div class="box size-2">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port.jpg" alt="">
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

                <div class="box size-1">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port2.jpg" alt="" >
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

                <div class="box size-2">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port.jpg" alt="">
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

                <div class="box size-1">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port2.jpg" alt="" >
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

                <div class="box size-2 up-fix">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port.jpg" alt="">
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

                <div class="box size-1">
                    <a href="portfolio2.php?d=d">
                        <div class="img-limit">
                            <img src="../upl/imgs/__port2.jpg" alt="" >
                        </div>
                        <div class="hover">
                            <p>Marca, embalagens e papelaria desenvolvidas <span class="hidden-phone">para a Zapp Acessórios.</span></p>
                            <i></i>
                        </div><!-- .hover -->
                    </a>
                </div><!-- .box -->

            </div>
            <!-- .port-boxes -->


        </div><!-- .ct -->


    </div><!-- .inner-row -->
</div><!-- .row-fluid.related -->




<!-- @ Box com texto do trabalho para PHONE -->
<div class="row-fluid about-job visible-phone">
    <div class="inner-row">

        <i class="icon-a3-b middle"></i>


        <div class="hd">

            <h2>Sobre o projeto</h2>

        </div><!-- .hd -->

        <div class="ct">


            <p>Informativo Energia em Ações, desenvolvido para a Eletrobrás. Dirigido aos investidores da empresa, possui versões em português, inglês e espanhol. Informativo Energia em Ações, desenvolvido para a Eletrobrás. Dirigido aos investidores da empresa, possui versões em português, inglês e espanhol.</p>



        </div><!-- .ct -->


        <div class="button-sets">

            <a href="#" class="btn-map"> <i class="icon-a10-r"></i> <span class="text middle"><strong>Próximo</strong></span> </a>

        </div><!-- .button-sets -->



    </div><!-- .inner-row -->
</div><!-- .row-fluid.about-job -->




</div><!-- #page -->

<?php if(! $onlyMobile):?>
    <!-- @tip: Não disponível em smartphones -->
    <footer id="footer" class="hidden-phone">
        <div class="inner-row">

            <a class="map-lnk" href="#" title="Veja no Google Maps"> </a>

            <!-- .map-lnk -->

            <div class="row-fluid">

                <div class="col-left">

                    <div class="hd">
                        <h2>Estamos aqui</h2>
                    </div><!-- .hd -->

                    <div class="ct">
                        <address>
                            Rua República do Líbano, 61 / sala 809, Centro<br>
                            Rio de Janeiro, RJ, 20061-030<br>
                            (21) 2507-6167 / 2507-6168
                        </address>

                        <p><a href="#" class="google-maps" title="Google Maps"> <i class="icon-map-marker-w"></i> Google Maps </a></p>
                    </div><!-- .ct -->

                </div><!-- .col-left-->

                <div class="col-right">

                    <div class="hd">

                        <i class="icon- logo-small"></i>

                        <div class="menu">
                            <ul class="unstyled">
                                <li class="hidden-phone"><a href="index.php">Início</a></li>
                                <li><a href="portfolio.php">Portfólio</a></li>
                                <li><a href="contato.php">Contato</a></li>
                                <li class="hidden-phone"><a href="areacliente.php">Área do cliente</a></li>
                            </ul>
                        </div><!-- .menu -->

                    </div><!-- .ct -->

                </div><!-- .col-right-->

            </div><!-- .row-fluid -->

        </div><!-- .inner-row -->
    </footer><!-- #footer -->
<?php endif;?>


</div><!-- #main-container -->


</body>
</html>