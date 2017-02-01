<?php
session_start();

if(!$_SESSION['isLoggedIn']){
    header('Location: ./login.php');
    die();
}

require './lib/class.mysql.php';

?>

<h1>Brugere</h1>
<table>
    <thead>
        <tr>
            <th>Brugere</th>
            <th colspan="2">E-mail</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $conn = new dbconnector();
            $query = $conn->newQuery("SELECT id, username, email FROM users ORDER BY username ASC");
            if($query->execute()){
                while($result = $query->fetch(PDO::FETCH_ASSOC)){
         ?>
            <tr>
                <td><?=$result['username'];?></td>
                <td><?=$result['email'];?></td>
                <td><button>Slet</button></td>
            </tr>
        <?php
                }
            }
            $conn = null;
        ?>
    </tbody>
</table>

