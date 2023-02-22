<?php
require_once __DIR__ . '/../database/pdo.php';

$id = $_GET["id"];

$sql = "UPDATE Users SET isBanned = 1  WHERE id='$id'";

$prepare = $pdo->prepare($sql);
$prepare->execute();

header("location: ./adminpanel.php");
exit();
?>
