<?php

/*$req_uri = $_SERVER['REQUEST_URI'];
$path = substr($req_uri, 0, strrpos($req_uri, '/'));
echo $req_uri;*/

if (isset($_POST['logout'])) {
    setcookie('auth', '1', time() - 3600, '/');
    setcookie('user', $result['login'], time() - 3600, '/');
    
    header('Location: /');
    die;
}

if (!isset($_COOKIE['visits'])) {
  $visited = 0;
} else {
  $visited = $_COOKIE['visits'] + 1;
}

setcookie('visits', $visited, time() + 3600, "/");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Наш сайт'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div id="app">
    <header class="header bg-warning">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-3">
                    <a href="/" class="header__logo">Наш сайт</a>
                </div>
                
            <?php if ($_SERVER['REQUEST_URI'] == '/admin.php'): ?>
                <div class="col-3">
                    <?= isset($_COOKIE['user']) ? '<b>' . $_COOKIE['user'] . '</b>, добро пожаловать' : ''; ?>
                </div>
            <?php endif; ?>
                
            <?php if (isset($_COOKIE['auth'])): ?>
                <div class="col-4 d-flex justify-content-end">
                <?php if ($_SERVER['REQUEST_URI'] != '/admin.php'): ?>
                    <a href="admin.php" class="btn btn-primary">Админ панель</a>
                <?php endif; ?>
                    <form action="" method="post">
                        <button class="ml-3 btn btn-primary" type="submit" name="logout">Выйти</button>
                    </form>
                </div>
                
                
            <?php else: ?>
                <div class="col-3 d-flex justify-content-between">
                    <a href="auth.php" class="btn btn-primary">Авторизация</a>
                    <a href="reg.php" class="btn btn-primary">Регистрация</a>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </header>
    
    <main class="main">