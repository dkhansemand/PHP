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

    ##Add to cart 
    if(isset($_GET["addToCart"])){//If addTocart is available continue

        $cartCount = count($_SESSION["cart"]); //Count products in cart session array

        ##Create array with product info to add
        $produktArr = array(
                            'id' => $produkt["id"],
                            'produktNavn' => $produkt["produktnavn"],
                            'produktInfo' => $produkt["produktinfo"],
                            'produktPris' => $produkt["produktpris"]
                        );

        $productIdArr = array();//Create empty array before adding curretn products in cart

        ##Run thru Cart and add current produts to the above array
        for($i = 0; $i < $cartCount; $i++){
            array_push($productIdArr, $_SESSION["cart"][$i]["id"]);
        }

        ##Check if added product exists in cart and add only if it don't exist
        if(in_array($_GET["id"], $productIdArr)){
            $productAdded = 'Produkt er allerede i kurven';  
        }else{
            array_push($_SESSION["cart"], $produktArr); //Push to cart session array
            $productAdded = 'Produkt tilføjet til kurv.';        
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

