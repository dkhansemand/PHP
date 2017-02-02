<?php

## Import class for mysql connection (via PDO)
require_once './class.mysql.php';

##Check if GET is available 
if($_GET){
    if(!empty($_GET["id"]) && gettype($_GET["id"]) === 'int'){ //check id ID is not empty and is type of INT
        $conn = new dbconnector(); //Create an instance to connect
        $query = $conn->newQuery("SELECT id, produktnavn, produktinfo, produktpris FROM produkter WHERE id = :ID");//Prepare SQL statement befor input
        $query->bindParam(":ID", $_GET["id"], PDO::PARAM_INT);//Get input fomr URL and check param type is INT
        $query->execute();
        $produkt = $query->fetch(PDO::FETCH_ASSOC); //Create array with row
    }else{
        header('Location: ./visprodukter.php'); //IF id is null/empty set or type of INT - redirect
    }
}else{
    header('Location: ./visprodukter.php');//If GET is not set - redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | Produkt </title>
</head>
<body>

    <table border=1>
        <thead>
            <tr>
                <th>Produkt navn</th>
                <th>Produkt info</th>
                <th>Produkt pris</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$produkt["produktnavn"];?></td>
            <td><?=$produkt["produktinfo"];?></td>
            <td><?=$produkt["produktpris"];?></td>
        </tr>
        </tbody>
    </table>
    <a href="visprodukter.php">Tilbage</a>
</body>
</html>