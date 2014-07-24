<?php 
/*
|==========================================================================
|		Modelo para email.
|--------------------------------------------------------------------------
*/
$bu = base_url(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Email</title>
</head>

<body>

<table width="600" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img src="<?php echo $bu; ?>assets/img/email-header.jpg" width="600" height="128" alt="Conceito"></td>
	</tr>
	<tr>
		<td>
		
		<p>&nbsp;</p>
		<h2 style="font-family:Arial, Helvetica, sans-serif;color:#9b0818;"><?php if(isset($titulo)) echo $titulo; ?></h2>
			
		<?php if(isset($corpo)) echo $corpo; ?>		
		
		
		</td>
	</tr>
	<tr>
		<td align="center">
		<br>
		<img src="<?php echo $bu; ?>assets/img/email-plus.jpg" alt="">
		<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#9b0818;"><a href="http://www.conceito-online.com.br" style="color:#9b0818;">www.conceito-online.com.br</a> |  <a href="mailto:conceito@conceito-online.com.br" style="color:#9b0818;">conceito@conceito-online.com.br</a> |  21 2507-6167</p></td>
	</tr>
</table>


</body>
</html>
