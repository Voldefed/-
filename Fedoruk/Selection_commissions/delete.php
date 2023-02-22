<?php
require_once __DIR__ . "/../database/pdo.php";

$selectionCommissionMemberCode = $_GET["selection_commission_member_code"];


$sql = "DELETE FROM `selection_commissions` WHERE selection_commission_member_code= :selection_commission_member_code";

$params = [
    "selection_commission_member_code" => $selectionCommissionMemberCode,
];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);
header("Location: listSelectionCommissions.php");
