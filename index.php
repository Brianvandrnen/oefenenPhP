<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=filmclub", "root", "");
} catch (PDOException $e) {
    die('Error! ' . $e->getMessage());
}
$query = $db->prepare("SELECT * FROM `film`");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data) {
    echo '<a href="detail.php?id=' . $data['id'] . '"><h2>' . $data['titel'] . '</h2></a>';
}
?>
<a href="insert.php">Add a film</a>
</body>
</html>