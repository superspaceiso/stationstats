<?php

include_once 'db.php';

$dsn = 'mysql:host=localhost;dbname=station_usage;charset=utf8';
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $password, $opt);

$stmt = $pdo->query('SELECT stations.NLC, stations.Station_Name, usage_1415.Entries_Exits, usage_1314.Entries_Exits FROM stations INNER JOIN usage_1415 ON stations.NLC=usage_1415.NLC INNER JOIN usage_1314 ON stations.NLC=usage_1314.NLC LIMIT 1');

foreach($stmt as $row) {
	$json_data = array(
	'nlc' => $row['NLC'],		
	'station_name' => $row['Station_Name'],
	'usage_1415' => $row[2],
	'usage_1314' => $row[3]
	);

	echo json_encode($json_data);
}

?>