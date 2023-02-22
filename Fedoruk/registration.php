<?php

session_start();
require_once __DIR__ . "/database/pdo.php";

$loginError = $emailError = $passwordError = $roleError = "";
$login = $email = $password = $role = "";
$isPassed = true;

if (isset($_POST['registration'])) {
    if (empty($_POST["login"])) {
        $loginError = "Login is required";
        $isPassed = false;
    } else {
        $login = $_POST["login"];
        // Check if username only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $login)) {
            $loginError = "Only letters and white space allowed";
            $isPassed = false;
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailError = "Email is required";
        $isPassed = false;
    } else {
        $email = $_POST["email"];
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $isPassed = false;
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordError = "Password is required";
        $isPassed = false;
    } else {
        $password = $_POST["password"];
        // Check if password is strong enough
        if (strlen($password) < 4) {
            $passwordError = "Password must be at least 8 characters long";
            $isPassed = false;
        }
        $password = md5($password . "fv");
    }

    // Validate role
    if (empty($_POST["role"])) {
        $roleError = "Role is required";
        $isPassed = false;
    } else {
        $role = $_POST["role"];
        if ($role != "user" && $role != "admin") {
            $roleError = "Invalid role";
            $isPassed = false;
        }
    }

    if ($isPassed === true) {
        $query = "INSERT INTO Users (login, password, email, role) VALUES (:login, :password, :email, :role)";
        $params = [
            "login" => $login,
            "email" => $email,
            "password" => $password,
            "role" => $role,
        ];

        $prepare = $pdo->prepare($query);
        $prepare->execute($params);

        $toEmail = 'ПОШТА НА ЯКУ БУДУТЬ ПРИХОДИТИ МАЙЛИ';

        $mailHeaders = "Name: " . $login .
            "\r\n Role: " . $role .
            "\r\n Message: " . $login . " успішно зареєстровний\r\n";

        mail($toEmail, $login, $mailHeaders);

        $_SESSION['login'] = $login;
        $_SESSION['authTime'] = time();
        $_SESSION['status'] = 1;
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
    <title>Registration</title>
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
            <h2 class="text_style style-big">Реєстрація</h2>
            <form action="registration.php" method="POST">
                <div class="mb-3">
                    <label for="Input1" class="form-label">Login</label>
                    <input name="login" type="text" class="form-control" id="Input1">
                    <span class="error"><?php echo $loginError; ?></span>
                </div>
                <div class="mb3">
                    <label for="Input2" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="Input2">
                    <span class="error"><?php echo $passwordError; ?></span>
                </div>
                <div class="mb3">
                    <label for="Input3" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="Input3">
                    <span class="error"><?php echo $emailError; ?></span>
                </div>
                <div class="mb3">
                    <label for="Input4" class="form-label">Role</label>
                    <select name="role" class="form-select" id="Input4">
                        <option value="admin">ADMIN</option>
                        <option value="user">USER</option>
                    </select>
                    <span class="error"><?php echo $roleError; ?></span>
                </div>
                <br>
                <button name="registration" type="submit" class="btn btn-primary">Зареєструватися</button>
            </form>
        </div>
    </div>
</main>
</body>

</html>