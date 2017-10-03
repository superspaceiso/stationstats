<?php

include_once 'db.php';
 
$dsn = 'mysql:host=localhost;dbname=station_usage;charset=utf8';
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $password, $opt);

$search = $_GET['s'];

$station = $search;

$stmt = $pdo->prepare('SELECT stations.NLC, stations.Station_Name, usage_1415.Entries_Exits, usage_1314.Entries_Exits FROM stations INNER JOIN usage_1415 ON stations.NLC=usage_1415.NLC INNER JOIN usage_1314 ON stations.NLC=usage_1314.NLC WHERE stations.Station_Name LIKE ? ');

$stmt->execute([$station]);

foreach($stmt as $row) {
	echo $row['Station_Name'],'<br>';
	echo '2013/14: ', $row[3],'<br>','2014/15: ',$row[2],'<br>';

}

?>