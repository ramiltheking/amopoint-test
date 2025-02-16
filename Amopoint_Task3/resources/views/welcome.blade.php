<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Дополнительное задание</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1>Дополнительное задание</h1>
        <p>
            Чтобы войти в админку:<br>
            <a href="/login">Авторизоваться</a><br>
            Данные для входа:<br>
            <i>Почта: admin@admin.mail</i><br>
            <i>Пароль: password</i><br>
        </p>

        <script src="{{ asset('js/user-counter.js') }}"></script>
    </body>
</html>
