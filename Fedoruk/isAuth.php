<?php
session_start();
if (isset($_SESSION['login'])) {
    if ((time() - $_SESSION['authTime']) > 1000) {
        session_destroy();
    } else {
        $isAuth = $_SESSION['login'];
    }
} else {
    session_destroy();
}
?>