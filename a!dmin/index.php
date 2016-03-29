<?php
require_once("modules/db.php");
require_once("modules/Paginator.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">mby Logout</a></li>
            <li><a href="#">Home</a></li>
          </ul>
        </div>
      </div>
</div>
<div class="container-fluid" style="margin-top: 60px">
	<div class="row ">
		<div class="col-sm-3 col-md-2 sidebar" >
		<ul class="nav nav-sidebar">
            <li><a href="#">Orders</a>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a data-toggle="collapse" href="#collapseLineageFree" aria-expanded="false" aria-controls="collapseLineageFree">Lineage II Free</a>
            <div class="collapse" id="collapseLineageFree">
            	<ul>
            	<li><a href="#">Адена</a></li>
            	<li><a href="#">Колы</a></li>
            	<li><a href="#">Вещи</a></li>
            	<li><a href="#">Персонажи</a></li>
            </ul>	
            </div>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a data-toggle="collapse" href="#collapseLineageRuoff" aria-expanded="false" aria-controls="collapseLineageRuoff">Lineage II RuOff</a>
            <div class="collapse" id="collapseLineageRuoff">
            <ul>
            	<li><a href="#">Адена</a></li>
            	<li><a href="#">Вещи</a></li>
            	<li><a href="#">Персонажи</a></li>
            </ul>
            </div>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a data-toggle="collapse" href="#collapseLineageClassic" aria-expanded="false" aria-controls="collapseLineageClassic">Lineage II Classic</a>
            <div class="collapse" id="collapseLineageClassic">
            <ul>
            	<li><a href="/">Адена</a></li>
            	<li><a href="#">Вещи</a></li>
            	<li><a href="#">Персонажи</a></li>
            </ul>
            </div>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">ArcheAge (gold)</a>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">Tera (gold)</a>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="/dota2">Dota2</a>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="/cs_go">CS GO</a>
            </li>
          </ul>
		</div>
		<div class="col-sm-9 col-md-10  main">
		<?php
            $game = $_GET['game'];
            $page = $_GET['page'];
            if(isset($game)) {
                    if(isset($page)) {
                            include getPage($page);
                    } else {
                            include 'views/orders.php';
                    }
                }
                    ?>
		</div>
	</div>
</div>
    <script type="text/javascript" src="style/jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="style/bootstrap.min.js"></script>    
</body>
</html>