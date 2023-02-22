<?php
require_once __DIR__ . "/../database/pdo.php";

$membersName = $_POST["members_name"];
$workSchedule = $_POST["work_schedule"];
$whatDoes = $_POST["what_does"] ?: null;

$sql = "INSERT INTO `selection_commissions` (`members_name` , `work_schedule`, `what_does`) 
VALUES (:members_name, :work_schedule, :what_does)";

$params = [
    "members_name" => $membersName,
    "work_schedule" => $workSchedule,
    "what_does" => $whatDoes,

];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);

header("Location: listSelectionCommissions.php");
