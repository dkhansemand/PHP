<?php

require './lib/class.mysql.php';

$conn = new dbconnector();

if($_POST){
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email    = $_POST['email'];

        $options  = array('cost' => 9);

        $hash     = password_hash($password, PASSWORD_BCRYPT, $options);

        try{
            $query = $conn->newQuery("INSERT INTO users (username, password, email) VALUES (:username, '$hash', :email)");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);

            if($query->execute()){
                header('Location: ./users.php');
            }

            $conn = null;
        }catch (PDOExecption $err){
            $errorMsg = $err->getMessage();
        }

    }else{
        $errorMsg = "Alle felter skal udfyldes!";
    }
}

?>

<h1>
    Opret bruger
</h1>
<form action="" method="POST">
    <input type="text" name="username" placeholder="Brugernavn" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <button type="submit">Opret bruger</button>
    <p style="color:red"><?=@$errorMsg;?></p>
</form>