<?php

require './lib/class.mysql.php';

$conn = new dbconnector();

if(isset($_GET['page']) && $_GET['page'] != ''){
    $page = $_GET["page"];
}else{
    $page = 'home';
}

if($page === 'home'){
    try{
        $query = $conn->newQuery("SELECT id, title, content FROM pages WHERE isHome = 1");
        $query->bindParam(":page", $page);

        if($query->execute()){
            $pages = $query->fetch(PDO::FETCH_ASSOC);
            $query = null;
            require './pages/pageView.php';
        }

    }catch(Execption $err){
        echo $err;
    }
}else{
    try{
        $query = $conn->newQuery("SELECT id, title, content FROM pages WHERE title = :page");
        $query->bindParam(":page", $page, PDO::PARAM_STR);

        if($query->execute() && $query->rowCount()){
            $pages = $query->fetch(PDO::FETCH_ASSOC);
            $query = null;
            require './pages/pageView.php';
        }else{
            require './pages/404.php';
        }
    }catch(PDOExecption $err){
        echo $err->getMessage();
    }
}

$conn = null;
