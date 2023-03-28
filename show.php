<?php

$id = $_GET['id'];

require 'connec.php';
$pdo = new PDO(DSN, USER, PASS);

$statement = $pdo->prepare("SELECT * FROM story WHERE id=:id");
$statement->bindValue(':id', $id);
$statement->execute();
$story = $statement->fetch(PDO::FETCH_ASSOC);

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
        <h1><?= htmlentities($story['id']) . '-' . htmlentities($story['title']) ?></h1>
        <p><?= htmlentities($story['author']) ?></p>
        <p><?= nl2br(htmlentities($story['content'])) ?></p>
        <a href="index.php">Retour</a>

    </main>
</body>

</html>