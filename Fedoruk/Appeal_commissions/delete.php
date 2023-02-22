<?php
require_once __DIR__ . "/../database/pdo.php";

$appealCommissionMemberCode = $_GET["appeal_commission_member_code"];


$sql = "DELETE FROM `appeal_commissions` WHERE appeal_commission_member_code= :appeal_commission_member_code";

$params = [
    "appeal_commission_member_code" => $appealCommissionMemberCode,
];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);
header("Location: listAppealCommissions.php");
