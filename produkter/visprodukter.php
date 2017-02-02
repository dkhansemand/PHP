<?php
    ## Import class for mysql connection (via PDO)
    require_once './class.mysql.php';

    $conn = new dbconnector(); //Create an instance to connect
    $query = $conn->newQuery("SELECT id, produktnavn, produktinfo, produktpris FROM produkter");//Define SELECT query
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | Produkter</title>
</head>
<body>
<h1>Produkter i database</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID#</th>
            <th>Navn</th>
            <th>Info</th>
            <th>Pris</th>
            <th>Vis</th>
        </tr>
    </thead>
    <tbody> 
        <?php
            if($query->execute()){ //If statement can be executed
                while($produkter = $query->fetch(PDO::FETCH_ASSOC)){ //Store fetched rows in variable products as ASSOC Array
        ?>
                    <tr>
                    <td><?=$produkter["id"];?></td>
                    <td><?=$produkter["produktnavn"];?></td>
                    <td><?=$produkter["produktinfo"];?></td>
                    <td><?=$produkter["produktpris"];?> kr.</td>
                    <td><a href="visprodukt.php?id=<?=$produkter['id'];?>" title="">Vis produkt</a></td>
                    </tr>
        <?php
                }
                $conn = null; //Close connection on success
            }else{
                ##If state is not able to be executed
                $conn = null; //Close connection on error
                echo 'Fejl';
            }
        ?>
    </tbody>
</table>
    
</body>
</html>