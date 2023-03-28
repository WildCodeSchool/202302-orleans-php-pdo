<?php

require 'connec.php';
$pdo = new PDO(DSN, USER, PASS);

$statement = $pdo->query("SELECT * FROM story");
$stories = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PDO Workshop</title>
</head>

<body>
    <main>
        <h1>Mes histoires</h1>
        <a href="create.php">Ajouter une histoire</a>
        <div class="stories">
            <?php foreach ($stories as $story) : ?>
                <article>
                    <h1><?= htmlentities($story['title']) ?></h1>
                    <p><?= htmlentities($story['id']) ?></p>
                    <p><?= htmlentities($story['author']) ?></p>
                    <a href="show.php?id=<?= htmlentities($story['id']) ?>">Voir toute l'histoire</a>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>