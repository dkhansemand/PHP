<?php

if($_GET){
        if(file_exists($_GET["side"] . '.php')){ ##Check if the page file exsists
            $page = $_GET["side"] . '.php';
        }else{
            $page = 'visprodukter.php';
        }
    }else{
        $page = 'visprodukter.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | Produkter</title>
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