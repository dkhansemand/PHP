<?php

require_once './class.mysql.php';

if($_GET){
    if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
        $conn = new dbconnector();
        $query = $conn->newQuery("SELECT id, produktnavn, produktinfo, produktpris FROM produkter WHERE id = :ID");
        $query->bindParam(":ID", $_GET["id"], PDO::PARAM_INT);
        $query->execute();
        $produkt = $query->fetch(PDO::FETCH_ASSOC);
    }else{
        header('Location: ./visprodukter.php');
    }
}else{
    header('Location: ./visprodukter.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | Produkt </title>
</head>
<body>
    <h1>Produkt: <?=$produkt["produktnavn"];?></h1>
    <h2>Produkt info:</h2>
    <p><?=$produkt["produktinfo"];?></p>
    <h3>Produkt pris</h3>
    <p><strong><?=$produkt["produktpris"];?></strong> kr.</p>
</body>
</html>