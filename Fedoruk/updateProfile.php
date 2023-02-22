<?php
require_once __DIR__ . '/./database/pdo.php';
session_start();

$userLogin = $_SESSION['login'];

$query = "SELECT * FROM Users WHERE login='$userLogin'";

$fetchUser = $pdo->prepare($query);
$fetchUser->execute();
$user = $fetchUser->fetch();

if (isset($_POST['updateProfile'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($password)) {
        $query = "UPDATE Users SET login = :login, email = :email, role = :role WHERE login='$userLogin'";
        $params = [
            "login" => $login,
            "email" => $email,
            "role" => $role,
        ];
    } else {
        $password = md5($password . 'fv');
        $query = "UPDATE Users SET login=:login, email=:email, role=:role, password=:password WHERE login='$userLogin'";
        $params = [
            "login" => $login,
            "password" => $password,
            "email" => $email,
            "role" => $role,
        ];
    }
    $prepare = $pdo->prepare($query);
    $prepare->execute($params);
    $_SESSION['login'] = $login;
    header('location: ./profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style1.css">
    <title>Login Page</title>
</head>
<body>
    <main>
    <div class="edit_center text_style">
<div class="form__wrapper update_wrapper">
    <form action="updateProfile.php" method="post">
        <div class="mb-3">
            <label for="Input1" class="form-label">Login</label>
            <input value="<?php echo $user['login'] ?>" name="login" type="text" id="Input1" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input2" class="form-label">Password</label>
            <input name="password" class="form-control" id="Input2">
        </div>
        <div class="mb3">
            <label for="Input3" class="form-label">Email</label>
            <input value="<?php echo $user['email'] ?>" name="email" id="Input3" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input4" class="form-label">Role</label>
            <input value="<?php echo $user['role'] ?>" name="role" id="Input4" type="text" class="form-control">
        </div>
        <button class="btn btn-outline-secondary m-1" name="updateProfile" type="submit" id="button-addon2">Update
        </button>
    </form>
</div>
</main>
</div>
</body>
</html>