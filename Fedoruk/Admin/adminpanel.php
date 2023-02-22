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
    <title>Maker List</title>
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
    <h2 class="mt mb-3 member">Користувачі</h2>
    <div class="row">
        <?php
        $users = $pdo->query("SELECT * FROM Users")->FETCHALL(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            ?>
           
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user["login"] ?></h5>
                        <p class="card-text">Role: <?php echo $user['role'] ?></p>
                        <p class="card-text">Email: <?php echo $user['email'] ?></p>
                        <p class="card-text">Status: <?php echo $user['status'] ?></p>
                        <p class="card-text">isBanned:
                            <?php
                            if ($user['isBanned'] <= 0) {
                                echo "No";
                            } else {
                                echo "Yes";
                            }
                            ?>
                        </p>
                        <a href="ban.php?id=<?= $user["id"] ?>" class="btn btn-primary">Ban</a>
                        <a href="delete.php?id=<?= $user["id"] ?>" class="btn btn-success">Delete</a>
                        <a href="update.php?id=<?= $user["id"] ?>" class="btn btn-danger">Update</a>
                    </div>
                </div>
            
            <?php
        }
        ?>
    </div>
   
    </main>

</body>
</html>