<?php
require_once __DIR__ . "/../database/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style1.css">
    <title>Edit</title>
</head>

<body>
<main>
        <?php
        $appealCommissionMemberCode = $_GET["appeal_commission_member_code"];

        $query = $pdo->prepare("SELECT * FROM `appeal_commissions` WHERE appeal_commission_member_code = :appeal_commission_member_code");

        $query->execute(["appeal_commission_member_code" => $appealCommissionMemberCode]);
        $appealCommission = $query->FETCH(PDO::FETCH_ASSOC);

        if (!$appealCommission) {
            echo '<h5 class="card-title">Запис не знайдено</h5>';
            die();
        }
        ?>
        
        
        <div class="edit_center text_style">
        <ul class="nav_menu" style="padding-left: 0!important; ">
            <li class="nav_menu item">
                <a class="nav-link active" aria-current="page" href="/index.php">На головну</a>
            </li>
        </ul>
            <h2 class="text_style style-big">Редагувати запис про - <?= $appealCommission["members_name"] ?></h2>
            <div class="col-6">
                <form action="update.php" method="POST">
                    <input type="hidden" name="appeal_commission_member_code" value="<?= $appealCommission["appeal_commission_member_code"] ?>">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Член апеляційної комісії</label>
                        <input type="text" name="members_name" class="form-control" id="Input1">
                    </div>
                    <div class="mb3">
                        <label for="Input2" class="form-label">Графік роботи</label>
                        <input type="text" name="work_schedule" class="form-control" id="Input2">
                    </div>
                    <div class="mb3">
                        <label for="Input3" class="form-label">Кіл-сть заяв на одну особу</label>
                        <input type="text" name="number_of_applications" class="form-control" id="Input3">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Редагувати</button>
                </form>
            </div>
        
    </div>
    </main>
</body>

</html>