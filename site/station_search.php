<?php

include_once 'db.php';
 
$dsn = 'mysql:host=localhost;dbname=station_usage;charset=utf8';
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $password, $opt);

$search = $_GET['s'];

$station = $search.'%';

$stmt = $pdo->prepare('SELECT stations.Station_Name FROM stations WHERE stations.Station_Name LIKE ? ');

$stmt->execute([$station]);

foreach($stmt as $row) {
	echo '<a href=stations.php?s=',urlencode($row['Station_Name']),'>',$row['Station_Name'],'</a><br>';
}

?>