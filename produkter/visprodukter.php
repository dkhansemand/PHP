<?php
    require_once './class.mysql.php';

    $conn = new dbconnector();
    $query = $conn->newQuery("SELECT id, produktnavn, produktinfo, produktpris FROM produkter");
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
            if($query->execute()){
                while($produkter = $query->fetch(PDO::FETCH_ASSOC)){
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
            }else{
                $conn = null;
                echo 'Fejl';
            }
            $conn = null;
        ?>
    </tbody>
</table>
    
</body>
</html>