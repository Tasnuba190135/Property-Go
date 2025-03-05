<?php
include_once 'DbConnector.php';
include_once 'User.php';


// session 1
$db = new DbConnector();
$db->createDatabase();
echo "Database created successfully";
echo "<br><br><br>";

$user = new User();
$user->createTableMinimal();
$user->alterTableAddColumns();
echo "Table created successfully";
echo "<br><br><br>";



?>