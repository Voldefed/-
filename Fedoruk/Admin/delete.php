<?php
require_once __DIR__ . '/../database/pdo.php';

$id = $_GET["id"];

$sql = "DELETE FROM Users WHERE id='$id'";

$prepare = $pdo->prepare($sql);
$prepare->execute();

header("location: ./adminpanel.php");
?>
