<?php
session_start();

if(!$_SESSION['isLoggedIn']){
    header('Location: ./login.php');
    die();
}

require './lib/class.mysql.php';

?>

<h1>Sider</h1>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Created @</th>
            <th>Updated @</th>
            <th>Is home</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $conn = new dbconnector();
            $query = $conn->newQuery("SELECT id, title, content, createdAt, updatedAt, isHome FROM pages ORDER BY createdAt DESC");
            if($query->execute()){
                while($result = $query->fetch(PDO::FETCH_ASSOC)){
         ?>
            <tr>
                <td><?=$result['title'];?></td>
                <td><?=$result['createdAt'];?></td>
                <td><?=$result['updatedAt'];?></td>
                <td><?=$result['isHome'];?></td>
                <td><a href="editPage.php?id=<?=$result['id'];?>">Redigér</a></td>
            </tr>
        <?php
                }
            }
            $conn = null;
        ?>
    </tbody>
</table>

