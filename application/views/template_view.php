
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Система поверок</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		
		<script type='text/javascript' src='js/validator/lib/jquery.js'></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
		<script type="text/javascript" src="js/jquery.json-2.2.min.js"></script>
		
		

		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					
				</div>
				<div id="menu">
				
					<ul>
						<li class="first active"><a href="/">Главная</a></li>
						<li><a href="/services">Ожидающие поверки</a></li>
						<li><a href="#">Внесение данных</a>
							 <ul class="submenu">
            					<li><a href="/editlocations">Добавить город</a></li>
            					<li><a href="/editposts">Добавить пост</a></li>
            					<li><a href="#">Добавить направление</a></li>
	            				<li><a href="#">Добавить прибор</a></li>
	        				</ul>
	        			</li>
						<li class="last"><a href="/contacts">Информация</a></li>
					</ul>
					
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
						<!--
						<h2>Welcome to Accumen</h2>
						<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
						<p>
							This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
						</p>
						-->
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			
		</div>
		<div id="footer">
			<a href="/">Областное государственное казенное учреждение Челябинской области "Центр обработки вызовов системы 112-Безопасный регион"</a> &copy; 2017</a>
		</div>
		
			
		<script type='text/javascript' src='js/validator/dist/jquery.validate.js'></script>
		<script type='text/javascript' src='js/form.validate.js'></script>
		
	</body>
</html>