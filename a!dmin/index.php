<?php
//require_once("modules/db.php");
require_once("./modules/Paginator.php");
require_once("./services/main.php");
$link = db_connect();
$games = games_all($link);
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
    <div class="col-sm-3 col-md-2 sidebar" style="margin-bottom: 20px">
      <ul class="nav nav-sidebar">
        <li><a href="?page=orders">Orders</a>
        </li>
      </ul>
      <?php foreach($games as $game): ?>
        <ul class="nav nav-sidebar">
          <li><a><?=$game['game_name']?></a>
           <ul>
            <?php $pages = get_pages($link, $game['alias']);
            $pages = explode(",", $pages[0]['pages']);
            ?>
            <?php foreach ($pages as $page): ?>
            	<li><a href="/?page=<?=$page?>&game=<?=$game['alias']?>"><?=$page?></a></li>
            <?php endforeach ?>
          </ul>	
        </li>
      </ul>
    <?php endforeach ?>

  </div>
  <div class="col-sm-9 col-md-10  main">
    <?php   
    if (isset($_GET['game'])) {
      $game = $_GET['game'];
    }
    if (isset($_GET['page'])) {
     $page = $_GET['page'];
   } else {

    $page = 'orders';
  }
  if(isset($game)) {
    if(isset($page)) {
        include "./services/".$page.".php";
    } 
  }else {
    include "./services/orders.php";
  } 
  ?>
</div>
</div>
</div>

<script type="text/javascript" src="/style/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="/style/bootstrap.min.js"></script>
<script type="text/javascript" src="/scripts/main.js"></script>     
</body>
</html>