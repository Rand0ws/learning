<?php

include '../config/connect.php';

$result = $db->query("SELECT * FROM `news` ORDER BY `created_at` DESC");

?>

<?php include 'layouts/header.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список новостей</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/profile/">Главная</a></li>
                        <li class="breadcrumb-item active">Список новостей</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список новостей</h3>
            </div>
            
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 30%">
                                Заголовок
                            </th>
                            <th style="width: 20%">
                                Автор
                            </th>
                            <th style="width: 8%" class="text-center">
                                Активность
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($news = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <?= $news['id'] ?>
                            </td>
                            <td>
                                <a>
                                    <?= $news['title'] ?>
                                </a>
                                <br/>
                                <small>
                                    Создано <?= date('d.m.Y', strtotime($news['created_at'])) ?>
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="img/avatar5.png">
                                        Админ
                                    </li>
                                </ul>
                            </td>
                            <td class="project-state">
                                <?php if ($news['created_at']): ?>
                                    <span class="badge badge-success">Опубликовано</span>
                                <? else: ?>
                                    <span class="badge badge-danger">Не опубликовано</span>
                                <?php endif ?>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/news.php?id=<?= $news['id'] ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    Посмотреть
                                </a>
                                <a class="btn btn-info btn-sm" href="edit_news.php?id=<?= $news['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Изменить
                                </a>
                                <a class="btn btn-danger btn-sm" href="/vendor/news/delete.php?id=<?= $news['id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layouts/footer.php' ?>