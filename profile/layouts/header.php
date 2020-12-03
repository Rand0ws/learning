<?php

$menuList = [
    'main' => [
        'title' => 'Главная',
        'link' => '/profile/',
        'icon' => 'fas fa-home'
    ],
    
    'news' => [
        'title' => 'Новости',
        'link' => [
            '/profile/add_news.php',
            '/profile/news.php',
            '/profile/edit_news.php'
        ],
        'icon' => 'fas fa-newspaper',
        'child' => [
            'add_news' => [
                'title' => 'Добавить новость',
                'link' => '/profile/add_news.php',
                'icon' => 'fas fa-plus'
            ],
            
            'list_news' => [
                'title' => 'Список новостей',
                'link' => '/profile/news.php',
                'icon' => 'far fa-list-alt'
            ],
        ]
    ],
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?? 'Профиль' ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/profile/css/main.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-white">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/profile/" class="nav-link">Главная</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Поиск" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="img/avatar5.png" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">Админ</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            
                        <p>
                            Админ - Веб-разработчик
                            <small>Занимается разработкой с 2016</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Профиль</a>
                        <a href="/vendor/logout.php" class="btn btn-default btn-flat float-right">Выйти</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-info">
        <!-- Brand Logo -->
        <a href="/" target="_blank" class="brand-link">
            <img src="/profile/img/AdminLTELogo.png"
                 alt="Наш сайт Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Наш сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent nav-legacy" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <?php foreach ($menuList as $id => $properties): ?>
                        <?php if (!empty($properties['child'])): ?>
                            <li class="nav-item has-treeview<?= array_search($_SERVER['REQUEST_URI'], $properties['link']) !== false ? ' menu-open' : '' ?>">
                                <a href="#" class="nav-link<?= array_search($_SERVER['REQUEST_URI'], $properties['link']) !== false ? ' active' : '' ?>">
                                    <i class="nav-icon <?= $properties['icon'] ?>"></i>
                                    <p>
                                        <?= $properties['title'] ?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($properties['child'] as $k => $v): ?>
                                        <li class="nav-item">
                                            <a href="<?= $v['link'] ?>" class="nav-link<?= $_SERVER['REQUEST_URI'] == $v['link'] ? ' active' : '' ?>">
                                                <i class="<?= $v['icon'] ?> nav-icon"></i>
                                                <p><?= $v['title'] ?></p>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= $properties['link'] ?>" class="nav-link<?= $_SERVER['REQUEST_URI'] == $properties['link'] ? ' active' : '' ?>">
                                    <i class="nav-icon <?= $properties['icon'] ?>"></i>
                                    <p><?= $properties['title'] ?></p>
                                </a>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>