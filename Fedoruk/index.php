<?php
include './isAuth.php';
error_reporting(E_ERROR);
session_start();
if ($_SESSION['login'] && $_SESSION['status'] <= 4) {
    $letter =
        "
        <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='./profile.php'>Profile</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='./logout.php'>Logout</a>
        </li>";
} else if ($_SESSION['login'] && $_SESSION['status'] >= 5) {
    $letter =
    "
    <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='./profile.php'>Profile</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='./logout.php'>Logout</a>
    </li>
    <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='./Admin/adminPanel.php'>Адмін-панель</a>
          </li>
          ";
}
      else {
    $letter = "
      <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='./login.php'>Вхід</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='./registration.php'>Реєстрація</a>
    </li>";
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles\style1.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
    
    <title>Index</title>
   
</head>

<body>
<header>
   
    <nav class="nav">
         <div class="logo">
        <img src="img\logo.png" alt="" class="img_logo">
    </div>
        <ul class="nav_menu">
            <li class="nav_menu item">
                <a class="nav-link active" aria-current="page" href="/Appeal_commissions/listAppealCommissions.php">Апеляційна
                    комісія</a>
            </li>
            <li class="nav_menu item">
                <a class="nav-link active" aria-current="page" href="/Selection_commissions/listSelectionCommissions.php">Вибіркова
                    комісія</a>
            </li>
            <?php echo $letter; ?>
        </ul>
    </nav>
</header>
<main>
    <div class="main_block block1">
        <p dir="ltr" class="block_about" style="text-align: center;">
            <span class="text_style style-big">
            <strong>ПРО НАС</strong>
            </span>
        </p>
            <p dir="ltr" class="block_text1" style="line-height: 1.2; text-align: center;">
            <span class="text_style" >Вінницький технічний фаховий коледж - це базовий навчальний заклад</span>
            <span class="text_style" > фахової передвищої освіти</span>
            <span class="text_style"> Вінницької області. </span>
        </p>
            <p dir="ltr" class="block_text2" style="line-height: 1.2; text-align: center;">
            <span class="text_style" >Сьогодні коледж є одним з найбільших і найавторитетніших закладів в області, де готують висококваліфікованих фахівців із </span>
            <span class="text_style" >8</span>
            <span class="text_style "> спеціальностей</span>
        </p>
    </div>
    <div class="main_block block2 ">
    <p class="text_style" >
    <span>
        АДРЕСА: 21021, Україна, м. Вінниця,вул. Хмельницьке шосе, 91/2
    </span>
    </p>
    <p class="text_style">
    <span>
        Електорнна адреса: pk@vtc.vn.ua
    </span>
    </p>
    <p class="text_style"> 
    <span>
       Контактні телефони:  (0352) 52-13-72, 25-76-49, 0969475994, 0684023821 Факс: (0352) 25-76-49
    </span>
    </p>
    </div>

    <div class="main_block block3 ">
    <p class="text_style" >
    <a href="https://docs.google.com/presentation/d/1RRjJrtODLi4_ATAGZNlVNfXvVXFbNtuR/edit#slide=id.p4">Відповіді на запитання</a>
    </p>
    <p class="text_style">
    <p class="text_style style-big">Умови прийому:</a>
    <div>
                        <div class="main-description capital_letter">
                            <div class="main-text">
                                <pre style="text-align: justify;"></pre>

<ul>
	<li class="text_style"><strong>Наказ МОН "Про внесення змін до деяких нормативно-правових актів Міністерства освіти і науки України"</strong> <strong>(Скачати:&nbsp;</strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/05.05.2022/Nakaz.MON.vnesennya.zmin.400-02.05.2022.pdf">.pdf</a><strong> )</strong></strong>
	</li>
	<li class="text_style" ><strong>Порядок прийому на навчання для здобуття вищої освіти в 2022 році</strong> <strong>(Скачати:&nbsp;</strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/05.05.2022/Poryadok.pryyomu.VO.392-400.05.05.2022.docx">.docx</a><strong>,&nbsp;</strong></strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/05.05.2022/Poryadok.pryyomu.VO.392-400.05.05.2022.pdf">.pdf</a><strong>)</strong></strong>
	</li>
</ul>

<ul>
	<li class="text_style"><strong>Наказ МОН "Про затвердження Порядку прийому на навчання для здобуття вищої освіти в 2022 році"</strong> <strong>(Скачати:&nbsp;</strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/05.05.2022/Nakaz.MON.Pro.zatv.Poryadku.pryyomu.VO.2022-392-27.04.2022.pdf">.pdf</a><strong> )</strong></strong>
	</li>
</ul>

<ul>
	<li class="text_style" ><strong>Наказ МОН "Про затвердження Умов прийому на навчання для здобуття вищої освіти в 2022 році" (Скачати:&nbsp;</strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/11/30/Nakaz.MON-1098.Umovy.pryyomu.VO.2022.docx"><strong>.</strong><strong>docx</strong></a>,&nbsp;</strong>формат<strong><a href="https://mon.gov.ua/storage/app/media/vishcha-osvita/vstup-2022/11/30/Nakaz.MON-1098.Umovy.pryyomu.VO.2022.pdf"><strong>.pdf</strong></a>)</strong>
	</li>
</ul>
                            </div>
                        </div>
                    </div>
    </p>
    </div>

</main>
<footer>
<img src="img\pngwing.com (3).png" alt="" srcset="" class="social">
<img src="img\pngwing.com (4).png" alt="" srcset="" class="social">
<img src="img\pngwing.com (5).png" alt="" srcset="" class="social">
</footer>
</body>

</html>