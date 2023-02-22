<?php
require_once __DIR__ . "/../database/pdo.php";

$membersName = $_POST["members_name"];
$workSchedule = $_POST["work_schedule"];
$numberOfApplications = $_POST["number_of_applications"] ?: null;

$sql = "INSERT INTO `appeal_commissions` (`members_name` , `work_schedule`, `number_of_applications`) 
VALUES (:members_name, :work_schedule, :number_of_applications)";

$params = [
    "members_name" => $membersName,
    "work_schedule" => $workSchedule,
    "number_of_applications" => $numberOfApplications,

];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);

header("Location: listAppealCommissions.php");
