<?php

include 'functions.php';

if ($_GET['login'] == 'admin' && $_GET['password'] == '1234') {
    echo 'Вы авторизовались';
} else {
    echo 'Вы не авторизованы';
}

file_put_contents("baza_dannih.txt", "email: $a, password: $b, name: $d, surname: $e, date: $f", FILE_APPEND);

debug($_GET);