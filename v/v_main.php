<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="data/style.css">
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <div id="header">
        <h1><?= $title ?></h1>
    </div>

    <div id="menu">
        <a class="menu_link" href="index.php">Каталог</a>
        <a class="menu_link" href="index.php?c=cart&act=show">Корзина</a>
        <?php
        if ($user) {
            echo '<a class="menu_link"  href="index.php?c=user&act=logout">Выйти</a>';
            if ($user == 'admin') {
                echo '<a class="menu_link"  href="index.php?c=admin&act=orders">Заказы</a>';
            }
        } else {
            echo '<a class="menu_link"  href="index.php?c=user&act=login">Войти</a> <a class="menu_link" href="index.php?c=user&act=reg">Зарегистрироваться</a>';
        }
        ?>
    </div>

    <div id="content">
        <?= $content ?>
    </div>

    <div id="footer">
        Все права защищены. Адрес. Телефон.
    </div>
</div>
</body>
</html>
