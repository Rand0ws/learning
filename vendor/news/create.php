<?php

include '../../config/connect.php';

$title = $_POST['title'];
$content = $_POST['content'];
$file = $_FILES['img'];

$path = 'news/' . time() . '_' . $file['name'];
move_uploaded_file($file['tmp_name'], '../../img/' . $path);

$db->query("INSERT INTO `news` SET `title` = '$title', `content` = '$content', `img` = '$path'");

header('Location: /profile/news.php');
die;