<?php

if (!isset($_COOKIE['auth'])) {
    header('Location: /');
    die();
}

include 'libs/connect.php';

$query = $db->query("SELECT * FROM `users`
                        WHERE `login` = '{$_COOKIE['user']}'")->fetch_assoc();

if (!empty($_POST) && !isset($_POST['logout'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    
    $add_query = "UPDATE `users`
                    SET `login` = '$login',
                        `name` = '$name',
                        `surname` = '$surname',
                        `birthday` = '$birthday'";
    
    if (!empty($_FILES['avatar'])) {
        $file = $_FILES['avatar'];
        $path = $file['tmp_name'];
        $user = $_COOKIE['user'];
        
        $avatar = $file['name'];
        $avatar = explode('.', $avatar);
        $avatar = array_pop($avatar);
        $avatar = "$user.$avatar";
        
        move_uploaded_file($path, "img/avatar/$avatar");
        
        $add_query .= ", `avatar` = '$avatar'";
    }
    
    $add_query .= " WHERE `login` = '{$_COOKIE['user']}'";
    
    $result = $db->query($add_query);

    setcookie('auth', 1, time() + 3600, '/');
    setcookie('user', $login, time() + 3600, '/');
    
    header('Location: /admin.php');
}

include 'include/header.php';

?>

<section class="admin-panel py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group avatar">
                        <img src="/img/avatar/<?= $query['avatar'] ?: 'no_photo.png'; ?>" alt="Аватарка" class="img-thumbnail">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputLogin">Логин:</label>
                        <input name="login" type="text" class="form-control" id="inputLogin" value="<?= $_POST['login'] ?? $query['login']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Ваше имя:</label>
                        <input name="name" type="text" class="form-control" id="inputName" value="<?= $_POST['name'] ?? $query['name']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSurname">Ваша фамилия:</label>
                        <input name="surname" type="text" class="form-control" id="inputSurname" value="<?= $_POST['surname'] ?? $query['surname']; ?>"
                    </div>
                    
                    <div class="form-group">
                        <label for="inputBirthday">Дата рождения:</label>
                        <input name="birthday" type="date" class="form-control" id="inputBirthday" value="<?= $_POST['birthday'] ?? $query['birthday']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="formControlFile">Выберите изображение</label>
                        <input name="avatar" type="file" class="form-control-file" id="formControlFile">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>