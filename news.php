<?php

include 'config/connect.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $article = $db->query("SELECT * FROM `news` WHERE id = '$id'")->fetch_assoc();
}
     
if (!$article) {
    $result = $db->query("SELECT * FROM `news` ORDER BY `created_at` DESC");
}

?>

<?php include 'layouts/header.php' ?>

    <section class="news">
        <div class="container">
            <?php if ($article): ?>
                <img src="<?= $article['img'] ?>" alt="">

                <h1><?= $article['title'] ?></h1>

                <p><?= nl2br($article['content']) ?></p>
            <?php else: ?>
                <h1>Новости</h1>

                <div class="row">
                    <?php while ($article = $result->fetch_assoc()): ?>
                        <div class="wrap">
                            <div class="card">
                                <img src="img/<?= $article['img'] ?>" alt="">

                                <div class="card__body">
                                    <h2><?= $article['title'] ?></h2>

                                    <p><?= nl2br($article['content']) ?></p>
                                </div>

                                <div class="card__footer">
                                    <a href="news.php?id=<?= $article['id'] ?>">Читать далее</a>
                                    <small><?= date('d-m-Y', strtotime($article['created_at'])) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            <?php endif ?>
        </div>
    </section>

<?php include 'layouts/footer.php' ?>