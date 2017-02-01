<?php
session_start();
require './lib/class.mysql.php';

if(isset($_SESSION['isLoggedIn'])){
    session_destroy();
}

if($_POST){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        try{
            $conn = new dbconnector();
            $query = $conn->newQuery("SELECT id, password FROM users WHERE username = :username");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount()){
                $result = $query->fetch(PDO::FETCH_ASSOC);

                if(password_verify($password, $result['password'])){
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['isLoggedIn'] = true;
                    $conn = null;
                    header('Location: ./users.php');
                }else{
                    $conn = null;
                    $errorMsg = "Forker password!";
                }
            }else{
                $errorMsg = "Brugernavn forket.";
            }
        }catch(PDOExecption $err){
            $errorMsg = $err->getMessage();
        }
    }else{
        $errorMsg = "Alle felter skal udfyldes!";
    }
}

?>

<form action="" method="POST">
<h2>Login:</h2>
<input type="text" name="username" placeholder="Brugernavn">
<input type="password" name="password" placeholder="password">
<button type="submit">Login</button>
<p style="color: red"><?=@$errorMsg;?></p>
</form>
