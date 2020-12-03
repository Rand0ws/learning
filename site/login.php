<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Админ панель</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Мой сайт</a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Имя</span>
                            <span class="caret"></span>
                        </a>

                        <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                            <a href="logout.php"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="dropdown-item">Выйти</a>

                            <form id="logout-form" action="logout.php" method="POST"
                                  style="display: none;">
                                <input type="hidden" name="_token"
                                       value="5PUVkcKQpoa9rxFdTBjWfayoJhPeZkWb7G1wBEFF">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="card form-signin">
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item">
                <a data-toggle="tab" href="#auth" role="tab" class="btn-lg nav-link active"
                   aria-selected="true">Авторизация</a>
            </li>

            <li class="nav-item">
                <a data-toggle="tab" href="#registration" role="tab" class="btn-lg nav-link"
                   aria-selected="false">Регистрация</a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content">
            <div id="auth" role="tabpanel" class="tab-pane active">
                <form action="auth.php" method="POST">
                    <div class="form-label-group">
                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                               autofocus>
                        <label for="inputEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Пароль</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input name="remember_me" type="checkbox" value="remember-me"> Запомнить меня
                        </label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
                </form>
            </div>

            <div id="registration" role="tabpanel" class="tab-pane">
                <form action="registration.php" method="POST">
                    <div class="form-label-group">
                        <input name="name" type="text" id="name" class="form-control" placeholder="Введите имя" required
                               autofocus>
                        <label for="name">Ваше имя</label>
                    </div>

                    <div class="form-label-group">
                        <input name="email" type="email" id="regInputEmail" class="form-control" placeholder="Email адрес" required
                               autofocus>
                        <label for="regInputEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
                        <label for="inputPassword">Пароль</label>
                    </div>

                    <div class="form-label-group">
                        <input name="confirm_password" type="password" id="confirmPassword" class="form-control" placeholder="Пароль" required>
                        <label for="confirmPassword">Подтвердите пароль</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-footer">

        <p class="mb-0 text-muted text-center">Админ панель &copy; 2020</p>
    </div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>
