<?php
require_once __DIR__ . "/../database/pdo.php";

$appealCommissionMemberCode = $_POST["appeal_commission_member_code"];
$membersName = $_POST["members_name"];
$workSchedule = $_POST["work_schedule"];
$numberOfApplications = $_POST["number_of_applications"] ?: null;

$sql = "UPDATE `appeal_commissions` SET members_name= :members_name, work_schedule= :work_schedule
, number_of_applications= :number_of_applications
WHERE appeal_commission_member_code= :appeal_commission_member_code";

$params = [
    "appeal_commission_member_code" => $appealCommissionMemberCode,
    "members_name" => $membersName,
    "work_schedule" => $workSchedule,
    "number_of_applications" => $numberOfApplications,

];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);
header("Location: listAppealCommissions.php");
