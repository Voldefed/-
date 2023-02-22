<?php
session_start();
require_once __DIR__ . "/database/pdo.php";

$loginError = $passwordError = "";
$login = $password = $status = "";
$isPassed = true;
$isBanned = false;
$userPassword = "";

if (isset($_POST['log'])) {
    if (empty($_POST['login'])) {
        $loginError = "Будь ласка, введіть логін";
        $isPassed = false;
    } else {
        $login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
        if (mb_strlen($login) < 5 || mb_strlen($login) > 50) {
            $loginError = "Недопустима довжина логіна";
            $isPassed = false;
        }
        $query2 = "SELECT * FROM Users WHERE login='$login'";

        $fetchUser = $pdo->prepare($query2);
        $fetchUser->execute();
        $user = $fetchUser->fetch();

        if ($user == NULL) {
            $isPassed = false;
            $loginError = "Користувача з таким логіном не існує";
        } else {
            $userPassword = $user['password'];
            $status = $user['status'];
            if ($user['isBanned']) {
                $isPassed = false;
                $isBanned = true;
            }
        }
    }

    if (empty($_POST['password'])) {
        $passwordError = "Будь ласка, введіть пароль";
        $isPassed = false;
    } else {
        $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);

        if (mb_strlen($password) < 5 || mb_strlen($password) > 100) {
            $passwordError = "Недопустима довжина пароля";
            $isPassed = false;
        }

        $password = md5($password . "fv");

        if ($userPassword !== $password) {
            $isPassed = false;
            $passwordError = "Невірний пароль";
        }
    }

    if ($isPassed === true) {
        $_SESSION['login'] = $login;
        $_SESSION['status'] = $status;
        $_SESSION['authTime'] = time();
        header('location: ./index.php');
    }

}
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
    <title>Login</title>
</head>
<style>
    .error {
        color: red;
    }
</style>
<body>
<main>
    <div class="edit_center text_style">
        <div class="col-6">
            <h2 class="text_style style-big">Авторизація</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="Input1" class="form-label">Login</label>
                    <input name="login" type="text" class="form-control" id="Input1">
                    <strong class="error"><?php echo $loginError ?></strong>
                </div>
                <div class="mb3">
                    <label for="Input2" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="Input2">
                    <strong class="error"><?php echo $passwordError ?></strong>
                </div>
                <br>
                <button name="log" type="submit" class="btn btn-primary">Уввійти</button>
            </form>
        </div>
    </div>
</main>
</body>

</html>