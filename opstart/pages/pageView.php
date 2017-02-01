<!DOCTYPE html>
<html lang="da">
    <head>
        <title><?= $pages['title']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
    </head>
    <body>
        <header>
            <?php require './pages/OLD/primaryMenu.php'; ?>
        </header>
        <main>
            <section>
                <h2><?= utf8_encode($pages['title']); ?></h2>
                <p>
                    <?= utf8_encode($pages['content']); ?>
                </p>
            </section>
        </main>
    </body>
</html>