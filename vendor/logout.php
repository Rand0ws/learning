<?php

setcookie('auth', 0, time() - 3600, '/');
setcookie('id', 0, time() - 3600, '/');

$previous = $_SERVER['HTTP_REFERER'] ?? "/index.php";

header("Location: $previous");
die;