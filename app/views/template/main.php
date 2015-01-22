<?php $bs = base_url();?>
<!DOCTYPE html>  
<!--[if lt IE 7 ]> <html lang="pt-BR" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="pt-BR" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="pt-BR" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="pt-BR" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="pt-BR" class="no-js"> <!--<![endif]-->
<head>

  <!-- Conceito Comunicação Integrada | 16/10/2014 -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1.0, width=device-width, minimum-scale=1.0,maximum-scale=10.0">
  
  <title><?php if(isset($title))echo $title;?></title>
  
  <?php if(isset($metatags))echo $metatags;?>

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="<?php echo $bs;?>favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo $bs;?>apple-touch-icon.png">

  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <?php if(isset($estilos)) echo $estilos;	?>
  
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <!--[if lt IE 9]>
    <script src="<?php echo $bs;?>assets/js/html5shiv.js"></script>
    <script src="<?php echo $bs;?>assets/js/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript">
  //variavel global para os JS
  <?php if(isset($json_vars)) echo 'var CMS = '.json_indent($json_vars).';'; ?>
  </script>	

  <?php if(isset($scripts)) echo $scripts; ?>

  <?php if(isset($page_scripts)) echo $page_scripts; ?>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-12814212-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
</head>



<body class="<?php echo $this->body_class;?>">
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->

<div id="main-container">

<?php if(isset($header)){ echo $header;} ?>
  
  <div id="page">
    <?php if(isset($corpo)){ echo $corpo;} ?>
  </div>

<?php if(isset($footer)){ echo $footer;} ?>

</div><!-- #main-container -->

<?php if(!$is_mobile): ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f84e020ccaf2b3"></script>
<?php endif; ?>

<?php $this->cms_adminbar->generate();?>
</body>
</html>