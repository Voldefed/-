<?php
include './isAuth.php';
session_start();
require_once __DIR__ . "/database/pdo.php";

$login = $_SESSION["login"];
$query2 = "SELECT * FROM Users WHERE login='$login'";

$fetchUser = $pdo->prepare($query2);
$fetchUser->execute();
$user = $fetchUser->fetch();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style1.css">
    <title>Profile Page</title>
</head>
<body>

       

    <main> 
    <div class="edit_center text_style"> 
        <ul class="nav_menu" style="padding-left: 0!important; ">
            <li class="nav_menu item">
                <a class="nav-link active" aria-current="page" href="/index.php">На головну</a>
            </li>
        </ul>
<h1 class="text_style style-big">Ваш профіль</h1>
<p>Ім'я користувача: <?php echo $_SESSION["login"]; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
<a href="updateProfile.php">edit profile</a>
    </div>
</main>
</body>
</html>
