<?php

include 'libs/connect.php';
    
if (isset($_COOKIE['auth'])) {
    header('Location: /');
    die();
}

if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $result = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'")->fetch_assoc();
    
    if ($result) {
        setcookie('auth', '1', time() + 3600, '/');
        setcookie('user', $result['login'], time() + 3600, '/');
        
        header('Location: /admin.php');
    }
}

include 'include/header.php';

?>

<section class="authorization py-5">
    <div class="container">
        <h1 class="text-center mb-5">Страница авторизации</h1>
        
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="inputLogin">Логин:</label>
                        <input name="login" type="text" class="form-control" id="inputLogin">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль:</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Авторизоваться</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>