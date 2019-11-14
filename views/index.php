<html>

<body>

<h1>Главная страница</h1>


<?php

if (isset($user)) {
    ?>

    <h2>Вы авторизовались как <?= htmlspecialchars($user['login']) ?> </h2>
    <form method="post" action="/logout">
        <button type="submit">Выйти</button>
    </form>


    <p>Можно изменить свои данные</p>

    <form method="post" action="/save">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

        <div>Пароль</div>
        <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" placeholder="Пароль"
               required>
        <div>ФИО</div>
        <input type="text" name="name" placeholder="ФИО" value="<?= htmlspecialchars($user['name']) ?>">

        <button type="submit">Сохранить</button>
    </form>


    <?php
} else {
    ?>
    <h2>Форма регистрации</h2>
    <form method="post" action="/register">

        <input type="email" name="email" placeholder="Email">

        <input type="text" name="login" placeholder="Логин">

        <input type="password" name="password" placeholder="Пароль">

        <input type="text" name="name" placeholder="ФИО">

        <button type="submit">Зарегистрироваться</button>
    </form>


    <h2>Форма авторизации</h2>
    <form method="post" action="/auth">

        <input type="text" name="login" placeholder="Логин">

        <input type="password" name="password" placeholder="Пароль">

        <button type="submit">Вход</button>
    </form>

    <?php
}
?>


</body>

</html>