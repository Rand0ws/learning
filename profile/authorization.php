<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Авторизация</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/main.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Войти и начать сессию</p>

      <form action="/vendor/auth.php" method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Запомнить меня
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="#">Я забыл свой пароль</a>
      </p>
      <p class="mb-0">
        <a href="registration.php" class="text-center">Зарегистрировать нового пользователя</a>
      </p>
      
      <p class="alert alert-danger"></p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="js/main.js"></script>
<script>
    let form = document.querySelector('form');
    
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        
        let email = form.getElementsByTagName('input')[0],
            password = form.getElementsByTagName('input')[1];
            
        let query = email.name + '=' + email.value + '&' + password.name + '=' + password.value;
        let xhr = new XMLHttpRequest();
        
        xhr.open(form.method, form.action);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.querySelector('.alert').innerHTML = xhr.responseText;
            }
        }
        
        xhr.send(query);
        
        /*location.href = form.action + '?' + query;
        https://good-code.ru/ajax-zapros/
        */
    });
</script>
</body>
</html>
