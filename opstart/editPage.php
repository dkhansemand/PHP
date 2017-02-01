<?php
session_start();

if(!$_SESSION['isLoggedIn']){
    header('Location: ./login.php');
    die();
}

require './lib/class.mysql.php';

$conn = new dbconnector();

if(!empty($_GET['id'])){
    $query = $conn->newQuery("SELECT id, title, content FROM pages WHERE id = :ID");
    $query->bindParam(':ID', $_GET['id'], PDO::PARAM_INT);
    if($query->execute() && $query->rowCount()){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $title = $result['title'];
        $content = $result['content'];

    }else{

        header('Location: ./pages.php');
    }
}else{
    header('Location: ./pages.php');
    die();
}

if($_POST){
    if(!empty($_GET['id']) && !empty($_POST['title']) && !empty($_POST['content'])){
        $query = $conn->newQuery("UPDATE pages SET title = :title, content = :content WHERE id = :ID");
        $query->bindParam(':ID', $_GET['id'], PDO::PARAM_INT);
        $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $query->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
        if($query->execute()){
      
            header('Location: ./');
        }else{
           
            $errorMsg = "Kunne ikke opdatere data.";
        }
    }else{
        $errorMsg = "Der må ikke være tomme felter.";
    }
}

?>

<h1>Redigér side</h1>
<form action="editPage.php?id=<?=$_GET['id'];?>" method="POST">
    <input type="text" name="title" value="<?=$title;?>"><br />
    <textarea cols="100" rows="20" name="content">
        <?=$content;?>
    </textarea>
    <br />
    <button type="submit">Gem</button>
    <p style="color: red"><?=@$errorMsg;?></p>
</form>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>

<?php
$conn = null;
