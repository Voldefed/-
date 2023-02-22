<?php
require_once __DIR__ . '/../database/pdo.php';
session_start();

$idpass = $_GET['id'];

$query = "SELECT * FROM Users WHERE id='$idpass'";
$fetchUser = $pdo->prepare($query);
$fetchUser->execute();
$user = $fetchUser->fetch();

if (isset($_POST['updateProfile'])) {
    $id = $_POST['id'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $isBanned = $_POST['isBanned'];

    if ($isBanned <= 0) {
        $isBanned = 0;
    } else {
        $isBanned = 1;
    }

    if (empty($password)) {
        $query = "UPDATE Users SET login = :login, email = :email, role = :role, isBanned=:isBanned, status= :status WHERE id='$id'";
        $params = [
            "login" => $login,
            "email" => $email,
            "role" => $role,
            "status" => $status,
            "isBanned" => $isBanned,
        ];
    } else {
        $password = md5($password . 'fv');
        $query = "UPDATE Users SET login = :login, email = :email, role = :role, password= :password, isBanned=:isBanned, status= :status WHERE id='$id'";
        $params = [
            "login" => $login,
            "password" => $password,
            "email" => $email,
            "role" => $role,
            "status" => $status,
            "isBanned" => $isBanned,
        ];
    }

    $prepare = $pdo->prepare($query);
    $prepare->execute($params);
    $_SESSION['login'] = $login;
    header('location: ./adminPanel.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style1.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.js"></script>
    <title>Login Page</title>
</head>
<body>
    <main>
    <div class="item add">
        
        <a href="adminpanel.php" >Повернутись</a>
    </div>
       
<div class="form__wrapper m-5">
    <form action="update.php" method="post">
        <div class="mb-3">
            <input value="<?php echo $user['id'] ?>" name="id" type="text" style="display: none"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label for="Input1" class="form-label">Логін</label>
            <input value="<?php echo $user['login'] ?>" name="login" type="text" id="Input1" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input2" class="form-label">Пароль</label>
            <input name="password" class="form-control" id="Input2">
        </div>
        <div class="mb3">
            <label for="Input3" class="form-label">Email</label>
            <input value="<?php echo $user['email'] ?>" name="email" id="Input3" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input3" class="form-label">isBanned</label>
            <input value="<?php echo $user['isBanned'] ?>" name="isBanned" id="Input3" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input4" class="form-label">Status</label>
            <input value="<?php echo $user['status'] ?>" name="status" id="Input4" type="text" class="form-control">
        </div>
        <div class="mb3">
            <label for="Input4" class="form-label">Роль</label>
            <input value="<?php echo $user['role'] ?>" name="role" id="Input4" type="text" class="form-control">
        </div>
        <button class="btn btn-outline-secondary m-1" name="updateProfile" type="submit" id="button-addon2">Update
        </button>
    </form>
</div>
    </main>
</body>
</html>