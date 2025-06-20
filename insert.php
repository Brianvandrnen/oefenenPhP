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
    $query = $db->prepare("SELECT * FROM `film`");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    die('Error! '. $e->getMessage());
}



?>
<form action="" method="post">
    <label for="titel">
        <input type="text" name="titel" required placeholder="Titel"> <br>
    </label>
    <label for="genre">
        <input type="text" name="genre" required placeholder="Genre"> <br>
    </label>
    <input type="submit">
</form>
<?php




if($_SERVER["REQUEST_METHOD"] === "POST") {

    $titel = ($_POST['titel']);
    $genre = ($_POST['genre']);

    echo "<h1>Ingevulde gegevens</h2>";
    echo "<p>Naam: $titel</p>";
    echo "<p>Leeftijd: $genre</p>";

    $query = $db->prepare("INSERT INTO film (titel, genre) VALUES (:titel, :genre)");
    $query->bindParam(':titel', $titel);
    $query->bindParam(':genre', $genre);
    $query->execute();
}


?>
</body>
</html>