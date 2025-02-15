<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание №1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="file" class="form-file">
            <input accept=".txt" type="file" name="file" required id="file">
            <svg fill="#FFF2F2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px"><path d="M 7 2 L 7 48 L 43 48 L 43 14.59375 L 42.71875 14.28125 L 30.71875 2.28125 L 30.40625 2 Z M 9 4 L 29 4 L 29 16 L 41 16 L 41 46 L 9 46 Z M 31 5.4375 L 39.5625 14 L 31 14 Z"/></svg>
            <p>Выберите файл</p>
        </label>
        <input type="text" required placeholder="Разделитель" class="separator" name="separator">
        <button type="submit">Загрузить файл</button>
    </form>
    <div class="status">
        <div></div>
        <p class="success">Выполнено</p>
    </div>
    <div id="output"></div>
    <script type="text/javascript" src="logic-1.js"></script>
</body>
</html>