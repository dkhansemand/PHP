<?php
/*
* Project: Dynamic site
* Coded by: Andreas Hansson
* Git: https://github.com/dkhansemand
* Date: 31-01-2017
* version: 0.0.1
*/

    ##Check if "side" is set in url, and if the pge exists. If not set page to "default" forside.php
    if($_GET){
        if(file_exists($_GET["side"] . '.php')){ ##Check if the page file exsists
            $page = $_GET["side"] . '.php';
        }else{
            $page = 'forside.php';
        }
    }else{
        $page = 'forside.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP | Dynamisk</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header>
            <?php require './menu.php'; ?>
        </header>
        <main>
            <?php require $page; ?>
        </main>
    </body>
</html>