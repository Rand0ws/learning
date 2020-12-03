<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'Наш сайт' ?></title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div id="site">
    <header class="header">
        <div class="container">
            <a href="/" class="header__logo">Наш сайт</a>

            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news.php">Новости</a></li>
                </ul>
            </nav>

            <div class="header__profile">
                <?php if (isset($_COOKIE['auth'])): ?>
                    <a href="/profile/index.php"><img src="../profile/img/profile/1.jpg" alt=""></a>
                    <a href="/vendor/logout.php">Выйти</a>
                <?php else: ?>
                    <a href="/profile/authorization.php">Авторизация</a>
                    <a href="/profile/registration.php">Регистрация</a>
                <?php endif ?>
            </div>
        </div>
    </header>

    <main class="main">