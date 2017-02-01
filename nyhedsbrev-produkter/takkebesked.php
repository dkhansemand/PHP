<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Takkebesked</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <section>
        <?php
            if($_POST){
                echo '<p>Hej ' . $_POST["navn"] . '</p>';
                echo '<p>Du er nu tilmeldt nyhedsbrev på e-mail: ' . $_POST["email"] . '</p>';
                echo '<p>Følgende produkter valgt: </p>';
                
                if(!empty($_POST["produkter"])){
                    foreach($_POST["produkt"] as $value){
                        echo '<p>- ' . $value . '</p>';
                    }
                }else{
                    echo '<p>Ingen valgt</p>';
                }
            }
        ?>    
    </section>
    </body>
</html>