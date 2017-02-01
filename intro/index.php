<!DOCTYPE html>
<html lang="da">
    <head>
        <title><?='PHP | Intro'?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <?php include './menu.php'; ?>
        <section>
            <h1><?='Overskrift 1'?></h1>
            <p><?php echo 'Et afsnit'; /* Blok kommentar */ ?></p>
            <?php echo "<p>Et afsnit</p>"; //Kommentar ?>
        </section>

        <?php include './footer.php'; ?>
    </body>
</html>