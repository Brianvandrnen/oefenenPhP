<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub","root","");
}catch(PDOException $e){
    die('Error! '. $e->getMessage());
}
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM film WHERE id= :id");
$query->bindParam(":id",  $id);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data) {
    echo '<h1>' . $data["titel"] . '</h1>';
}
?>
<h3>Reviews</h3>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub","root","");
}catch(PDOException $e){
    die('Error! '. $e->getMessage());
}
$id=$_GET['id'];
$query = $db->prepare("SELECT * FROM beoordeling WHERE film_id = :id");

$query->bindParam(":id",  $id);
$query->execute();
$count = 0;
$som = 0;
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data) {
    echo '<p>Cijfer: ' . $data["cijfer"] . '</p>';
    echo '<p>Opmerking: ' . $data["opmerking"] .  '</p>';
    $nieuw = $data["cijfer"];
    $som += $nieuw;
    $count++;
}
echo '<h3>Gemiddelde:</h3>' . $som / $count;
?>


</body>
</html>