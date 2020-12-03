<?php

error_reporting(-1);
ini_set('display_errors', 1);

include 'libreries/functions.php';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
}

$db = new mysqli("localhost", 'f90675u5_bd', 'Admin!1', 'f90675u5_bd');

$result = $db->query("SELECT * FROM users");

if (isset($_POST['registration'])) {
    $result = $db->query("INSERT INTO `users` (login, password, name, surname, birthday) VALUES ('$login', '$password', '$name', '$surname', '$birthday')");
}

if (isset($result)) {
    echo 'Вы успешно зарегистрировались';
} elseif (!empty($_POST)) {
    echo 'Упс... Что-то пошло не так';
}

if ($db->connect_error) {
    die('Ошибка подключения (' . $db->connect_errno . ') '
            . $db->connect_error);
}

$title = 'Это наш сайт';

include 'include/header.php';

while ($row = $result->fetch_assoc()) {
    echo $row['login'] . '<br>';
}

?>

<main class="main">
    <section class="s1 bg-warning">
        <div class="container">
            
        <?php if (isset($_GET['login'])): ?>
            <form action="" method="post">
                <div class="form-group">
                    <label>
                        Логин:
                        <input name="login" type="text" class="form-control">
                    </label>
                    
                    <label>
                        Пароль:
                        <input name="password" type="password" class="form-control">
                    </label>
                    
                    <label>
                        Подвердите пароль:
                        <input name="confirm_password" type="password" class="form-control">
                    </label>
                </div>
                
                <div class="form-group">
                    <label>
                        Имя:
                        <input name="name" type="text" class="form-control">
                    </label>
                    
                    <label>
                        Фамилия:
                        <input name="surname" type="text" class="form-control">
                    </label>
                    
                    <label>
                        Дата рождения:
                        <input name="birthday" type="date" class="form-control">
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary mr-3" name="authorization">Войти</button>
                <button type="submit" class="btn btn-primary" name="registration">Зарегистрироваться</button>
            </form>
        <?php else: ?>
            <a href="?login">Показать форму авторизации</a>
        <?php endif; ?>
            
        <?php if (isset($login) && isset($password)) : ?>
            <p>Login: <?= $login; ?></p>
            <p>Password: <?= $password; ?></p>
        <?php endif; ?>
        </div>
    </section>
</main>

<?php include 'include/footer.php'; ?>