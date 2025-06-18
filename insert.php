<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
</head>
<body>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub","root","");
    $query = $db->prepare("INSERT INTO film (title, genre) VALUES (:titel, :genre)");
}catch(PDOException $e){
    die('Error! '. $e->getMessage());
}


if($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = ($_POST['title']);
    $genre = ($_POST['genre']);

    echo "<h1>Ingevulde gegevens</h2>";
    echo "<p>Naam: $title</p>";
    echo "<p>Leeftijd: $genre</p>";
}


?>
<form action="" method="post">
    <label for="title">
        <input type="text" name="title" required placeholder="Title"> <br>
    </label>
    <label for="genre">
        <input type="text" name="genre" required placeholder="Genre"> <br>
    </label>
    <input type="submit">
</form>
</body>
</html>