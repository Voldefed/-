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
     <title>Appeal commissions list</title>
</head>

<body>
<header>
<div class="logo">
        <img src="/img/logo.png" alt="" class="img_logo">
    </div>
        <ul class="nav_menu">
            <li class="nav_menu item">
                <a class="nav-link active" aria-current="page" href="/index.php">На головну</a>
            </li>
        </ul>
    
</header>
<main class="text_style">
        <div class="row ">
            <?php
            $appealCommissions = $pdo->query("SELECT * FROM appeal_commissions")->FETCHALL(PDO::FETCH_ASSOC);
            foreach ($appealCommissions as $appealCommission) {
            ?>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $appealCommission["members_name"] ?></h5>
                            <a href="appealСommission.php?appeal_commission_member_code=<?= $appealCommission["appeal_commission_member_code"] ?>" class="btn btn-primary">Детально</a>
                            <a href="edit.php?appeal_commission_member_code=<?= $appealCommission["appeal_commission_member_code"] ?>" class="btn btn-success">Редагувати</a>
                            <a href="delete.php?appeal_commission_member_code=<?= $appealCommission["appeal_commission_member_code"] ?>" class="btn btn-danger">Видалити</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
           
        </div> 
        <div class="item add">
            <a href="create.php">Додати комісіанта</a>
            </div>
   
    </main>
<footer>
<img src="/img/pngwing.com (3).png" alt="" srcset="" class="social">
<img src="/img/pngwing.com (4).png" alt="" srcset="" class="social">
<img src="/img/pngwing.com (5).png" alt="" srcset="" class="social">
</footer>
</body>

</body>
</html>