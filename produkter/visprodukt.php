<?php

## Import class for mysql connection (via PDO)
require_once './class.mysql.php';

##Check if GET is available 
if($_GET){
    if(!empty($_GET["id"]) && is_numeric($_GET["id"])){ //check id ID is not empty and is numeric
        $conn = new dbconnector(); //Create an instance to connect
        $query = $conn->newQuery("SELECT id, produktnavn, produktinfo, produktpris FROM produkter WHERE id = :ID");//Prepare SQL statement befor input
        $query->bindParam(":ID", $_GET["id"], PDO::PARAM_INT);//Get input fomr URL and check param type is INT
        $query->execute();
        $produkt = $query->fetch(PDO::FETCH_ASSOC); //Create array with row
    }else{
        header('Location: ./'); //IF id is null/empty set or type of INT - redirect
    }

    if(isset($_GET["addToCart"])){
        $cartCount = count($_SESSION["cart"]);
        $produktArr = array(
                    'id' => $produkt["id"],
                    'produktNavn' => $produkt["produktnavn"],
                    'produktInfo' => $produkt["produktinfo"],
                    'produktPris' => $produkt["produktpris"]
                );
            
        if($cartCount > 0){

            for($i = 0; $i < $cartCount; $i++){
                if(!array_search($_GET["id"], $_SESSION["cart"][$i])){
                    
                    if(array_push($_SESSION["cart"], $produktArr)){
                        $productAdded = 'Produkt tilføjet til kurv.';
                    }
                    break;
                }else{
                    $productAdded = 'Produkt er allerede i kurven';
                }
            }
        }else{
             if(array_push($_SESSION["cart"], $produktArr)){
                    $productAdded = 'Produkt tilføjet til kurv.';
                }
        }
    }

}else{
    header('Location: ./');//If GET is not set - redirect
}

?>
    <h3><?=@$productAdded;?></h3>
    <table border=1>
        <thead>
            <tr>
                <th>Produkt navn</th>
                <th>Produkt info</th>
                <th>Produkt pris</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$produkt["produktnavn"];?></td>
            <td><?=$produkt["produktinfo"];?></td>
            <td><?=$produkt["produktpris"];?></td>
            <td><a href="?side=visprodukt&id=<?=$_GET["id"];?>&addToCart">Føj til kurv</a></td>
        </tr>
        </tbody>
    </table>

