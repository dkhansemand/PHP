<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form action="takkebesked.php" method="POST">
            <label for="Navn">Navn: </label><input type="text" name="navn" placeholder="Navn" id="Navn">
            <label for="email">E-mail:</label><input type="email" name="email" id="email">
            <label for="">Hatte</label><input type="checkbox" name="produkt[]" value="Hatte">
            <label for="">Sko</label><input type="checkbox" name="produkt[]" value="Sko">
            <label for="">Tasker</label><input type="checkbox" name="produkt[]" value="Tasker">
            <button type="submit">Tilmeld</button>
        </form>
    </body>
</html>