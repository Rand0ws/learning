<?php

if (isset($_COOKIE['auth'])) {
    header('Location: /');
    die();
}

include 'libs/connect.php';

if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    
    $login_query = $db->query("SELECT `login` FROM `users` WHERE `login` = '$login'")->fetch_assoc();

    $alert = [];
    
    if (!$login_query) {
        if (!empty($password) && $password === $password_confirm) {
            $result = $db->query("INSERT INTO `users` (`login`, `password`, `name`, `surname`, `birthday`) VALUES ('$login', '$password', '$name', '$surname', '$birthday')");
            
            setcookie('auth', 1, time() + 3600, '/');
            setcookie('user', $login, time() + 3600, '/');
            
            header('Location: /admin.php');
        } else {
            $alert['password'] = 'Пароль не введён или они не совпадают!';
        }
    } else {
        $alert['login'] = 'Имя пользователя уже занято!';
    }
    
}

include 'include/header.php';

?>

<section class="registration py-5">
    <div class="container">
        <h1 class="text-center mb-5">Страница регистрации</h1>
        
        <div class="row justify-content-center">
            <div class="col-6">
            <?php if (!empty($alert)): ?>
                <div class="alert alert-danger">
                    <ul class="nav ">
                <?php foreach ($alert as $k => $v): ?>
                        <li><?= $alert[$k]; ?></li>
                <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
                
                <form action="" method="post">
                    <div class="form-group">
                        <label for="inputLogin">Логин:</label>
                        <input name="login" type="text" class="form-control" id="inputLogin" value="<?= $_POST['login'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword1">Пароль:</label>
                        <input name="password" type="password" class="form-control" id="inputPassword1">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword2">Подтвердите пароль:</label>
                        <input name="password_confirm" type="password" class="form-control" id="inputPassword2">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Ваше имя:</label>
                        <input name="name" type="text" class="form-control" id="inputName" value="<?= $_POST['name'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSurname">Ваша фамилия:</label>
                        <input name="surname" type="text" class="form-control" id="inputSurname" value="<?= $_POST['surname'] ?? ''; ?>"
                    </div>
                    
                    <div class="form-group">
                        <label for="inputBirthday">Дата рождения:</label>
                        <input name="birthday" type="date" class="form-control" id="inputBirthday" value="<?= $_POST['birthday'] ?? ''; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>