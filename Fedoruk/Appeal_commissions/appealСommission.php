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
    <title>Appeal commission</title>
</head>

<body>
    <main>
    <div class="item add">
        
        <a href="listAppealCommissions.php" >Повернутись</a>
    </div>
       
        <?php
        $appealCommissionMemberCode = $_GET["appeal_commission_member_code"];

        $query = $pdo->prepare("SELECT * FROM `appeal_commissions` 
        WHERE appeal_commission_member_code = :appeal_commission_member_code");

        $query->execute(["appeal_commission_member_code" => $appealCommissionMemberCode]);
        $appealCommission = $query->FETCH(PDO::FETCH_ASSOC);

        if (!$appealCommission) {
            echo '<h5 class="card-title">Запис не знайдено</h5>';
            die();
        }
        ?>
        <div class="member_block">
        <h2 class="mt-3 mb-3 member">Член апеляційної комісії</h2>
        
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $appealCommission["members_name"] ?></h5>
                        <h6 class="card-text">Графік роботи: <?= $appealCommission["work_schedule"] ?></h6>
                        <h6 class="card-text">Кіл-сть заяв на одну особу: <?= $appealCommission["number_of_applications"] ?></h6>
                    </div>
                </div>
        </div>
    </main>
    <footer>
<img src="/img/pngwing.com (3).png" alt="" srcset="" class="social">
<img src="/img/pngwing.com (4).png" alt="" srcset="" class="social">
<img src="/img/pngwing.com (5).png" alt="" srcset="" class="social">
</footer>
</body>

</html>