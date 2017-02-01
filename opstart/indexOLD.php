<?php

require './lib/class.mysql.php';

$connect = new MySQL();

if(isset($_GET['page']) && $_GET['page'] != ''){
    $page = $_GET["page"] . '.php';
}else{
    $page = 'index.php';
}

require './pages/head.php';
require './pages/primaryMenu.php';

if(file_exists("./pages/$page")){
    require "./pages/$page";
}else{
    require './pages/404.php';
}

require './pages/footer.php';

$connect->testConnection();
