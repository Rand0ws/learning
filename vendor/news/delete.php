<?php

include '../../config/connect.php';

$id = $_GET['id'];

$db->query("DELETE FROM `news` WHERE id = '$id'");

header('Location: /profile/news.php');