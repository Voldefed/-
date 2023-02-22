<?php
require_once __DIR__ . "/../database/pdo.php";

$selectionCommissionMemberCode = $_POST["selection_commission_member_code"];
$membersName = $_POST["members_name"];
$workSchedule = $_POST["work_schedule"];
$whatDoes = $_POST["what_does"] ?: null;

$sql = "UPDATE `selection_commissions` SET members_name= :members_name, work_schedule= :work_schedule, what_does= :what_does
WHERE selection_commission_member_code= :selection_commission_member_code";

$params = [
    "selection_commission_member_code" => $selectionCommissionMemberCode,
    "members_name" => $membersName,
    "work_schedule" => $workSchedule,
    "what_does" => $whatDoes,

];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);
header("Location: listSelectionCommissions.php");
