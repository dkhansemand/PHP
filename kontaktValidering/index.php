<?php
$fejl = 0;
$success = 'Indtast dine kontakt oplysninger herunder';

if($_POST){
    if(!empty($_POST["navn"])){
        $navn = $_POST["navn"];
        if(is_numeric($navn)){
            $fejlNavn = 'Navn må kun indholde bogstaver!';
            $fejl++;
        }
    }else{
        $fejlNavn = 'Feltet navn skal udfyldes!';
        $fejl++;
    }

    if(!empty($_POST["email"])){
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $email = $_POST["email"];
        }else{
            $fejlEmail = 'Email er ikke i korrekt format';
            $fejl++;
        }
    }else{
        $fejlEmail = 'Feltet E-mail skal udfyldes!';
        $fejl++;
    }

    if(!empty($_POST["emne"])){
        $emne = $_POST["emne"];
        if(is_numeric($emne)){
            $fejlEmne = 'Emne feltet må kun indholde bogstaver og ikke tal!';
        }
    }else{
        $fejlEmne = 'Emne feltet skal udfyldes!';
        $fejl++;
    }

    if(empty($_POST["besked"])){
        $fejlBesked = 'Besked feltet må ikke være tomt';
        $fejl++;
    }

    if($fejl === 0){
        $navn = '';
        $email = '';
        $emne = '';
        $success = 'Kontaktformularen er udfyldt korrekt';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP | Validering</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?=@$success;?>
    <form action="" method="POST">
        <label>Navn:</label>
        <input type="text" name="navn" placeholder="Navn" value="<?=@$navn;?>">
        <p><?=@$fejlNavn;?></p>
        <label>E-mail:</label>
        <input type="text" name="email" placeholder="email" value="<?=@$email;?>">
        <p><?=@$fejlEmail;?></p>
        <label>Emne:</label>
        <input type="text" name="emne" placeholder="Emne" value="<?=@$emne;?>">
        <p><?=@$fejlEmne;?></p>
        <label>Besked</label>
        <textarea name="besked" id="" cols="30" rows="10"></textarea>
        <p><?=@$fejlBesked;?></p>
        <button type="submit">Send</button>
    </form>
</body>
</html>