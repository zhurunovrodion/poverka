<?php
$title="Главная";
$current_http_query = explode('/', $_SERVER['REQUEST_URI']);
if ($current_http_query[1]=="editlocations"){
	$title="Внесение данных";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $title?></title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
 

  <script type='text/javascript' src='js/validator/lib/jquery.js'></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
  <script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
  <script type="text/javascript" src="js/jquery.json-2.2.min.js"></script>
 <script type='text/javascript' src='js/validator/dist/jquery.validate.js'></script>
		<script type='text/javascript' src='js/form.validate.js'></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container-fluid">
    <header>
      <nav>
        <div class="navbar navbar-default">
          <div class="navbar-header col-lg-4">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu"> <span class="sr-only">Открыть навигацию</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#"> <img src="images/logo1.png"> </a>
          </div>
          <div class="collapse navbar-collapse col-lg-4 " id="responsive-menu">
            <ul class=" nav navbar-nav">
              <li class="active-link"><a href="http://localhost"><i class="glyphicon glyphicon-home "></i>Главная</a></li>
              <li><a href="http://localhost/waiting"><i class="glyphicon glyphicon-time"></i>Оживающие поверки <span class="badge">14</span></a></li>
              <li><a href="http://localhost/editlocations"><i class="glyphicon glyphicon-pencil"></i>Редактирование данных </a></li>
              <li><a href="http://vk.com"><i class="glyphicon glyphicon-edit"></i>Информация</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <content>
    <div class="panel panel-info">
  <div class="panel-heading">
    <h1 class="panel-title" align="center"><?php echo $title?></h1>
  </div>
  <div class="panel-body">
     <div class="container-fluid " id="main_content_block">

        <div class="container-fluid">
        	<?php include 'application/views/'.$content_view; ?>
        	
        </div>
      </div>
  </div>
</div>
      


    
    </content>
  
  </div>
  <footer>
    <div class="container">
      <p id="copyright">Областное государственное казенное учреждение Челябинской области "Центр обработки вызовов системы 112-Безопасный регион" © 2017 </p>
    </div>
  </footer>
</body>

</html>