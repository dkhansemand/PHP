<?php
require_once './class.mysql.php';

if($_POST){

    $errCount = 0;

    if(!empty($_POST["produktNavn"])){
        if(preg_match('/\d/', $_POST["produktNavn"])){
            $navn = $_POST["produktNavn"];
        }else{
            $errorMsgNavn = 'Produkt navn må ikke indholde tal';
            ++$errCount;
        }
    }else{
        $errorMsgNavn = "Produkt navn skal udfyldes.";
        ++$errCount;
    }

    if(!empty($_POST["produktInfo"])){
        $info = $_POST["produktInfo"];
    }else{
        $errorMsgInfo = "Produkt info skal udfyldes.";
        ++$errCount;
    }

    if(!empty($_POST["produktPris"]) && is_numeric($_POST["produktPris"])){
        $pris = $_POST["produktPris"];
    }else{
        $errorMsgPris = "Produkt pris skal udfyldes og kun være tal";
        ++$errCount;
    }

    if($errCount === 0){
        $conn = new dbconnector();
        $query = $conn->newQuery("INSERT INTO `produkter` (produktnavn, produktinfo, produktpris)VALUES(:produktNavn, :produktInfo, :produktPris)");
        $query->bindParam(":produktNavn", $navn, PDO::PARAM_STR);
        $query->bindParam(":produktInfo", $info, PDO::PARAM_STR);
        $query->bindParam(":produktPris", $pris, PDO::PARAM_INT);
        if($query->execute()){
            $conn = null;
            echo "Produkt er nu tilføjet til databasen.";
        }else{
            echo "Fejl. kunne ikke eksekvere SQL forspørgelsen";
        }
    }else{
        $errorMsg = '<p>Mega meget fejl, prøv igen</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | Produkter - opret</title>
</head>
<body>
<h2>Tilføj produkt</h2>
        <form action="" method="POST">
        <label for="">Produkt navn</label><input type="text" name="produktNavn" placeholder="Navn"><p><?=@$errorMsgNavn;?></p>
        <label for="">produkt info</label><input type="text" name="produktInfo" placeholder="Info"><p><?=@$errorMsgInfo;?></p>
        <label for="">produkt pris</label><input type="text" name="produktPris" placeholder="Pris"><p><?=@$errorMsgPris;?></p>
        <button type="submit">Tilføj</button>
        </form>
        <?=@$errorMsg;?>
</body>
</html>