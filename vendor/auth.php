<?php

session_start();

if (isset($_COOKIE['auth'])) {
    header('Location: /profile/');
    die;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (!empty($email) && !empty($password)) {
    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);

    $stmt = $db->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = ? AND `password` = ?");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        setcookie('auth', true, time() + 3600, '/');
        setcookie('id', $row['id'], time() + 3600, '/');

        header('Location: /profile/');
        die;
    } else {
        echo 'Неверный email или пароль';
    }
} else {
    echo 'Вы не ввели все данные';
}
