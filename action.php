<?php

if ($_POST) {
    print_r($_POST['username']);
    echo "</br>";
    print_r($_POST['password']);
}
if ($_GET) {
    print_r($_GET['fid']);
    echo "</br>";
    print_r($_GET['tid']);
}


$conf = [
    'user' => 'root',
    'host' => 'localhost',
    'pass' => '',
    'dbname' => 'visit'
];



$conf = [
    'user' => 'root',
    'pass' => '',
    'host' => 'localhost',
    'dbname' => 'visit'
];
try {
    $pdo = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'], $conf['user'], $conf['pass']);
} catch (PDOException $e) {
    echo "Conncetion failed: " . $e->getmessage();
}
$sql = "select * from user where id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(2));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);