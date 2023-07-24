<!DOCTYPE html>
<html>

<head>
<style>
        body {
            font-family: 'Futura New', Arial, sans-serif;
            text-align: center;
        }
        .button {
            background-color: orange;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php

    $host = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'bd_blog';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ошибка соединения: " . $conn->connect_error);
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];

    $sql = "INSERT INTO news (title, description, author) VALUES ('$title', '$description', '$author')";

    if ($conn->query($sql) === TRUE) {
        echo "Пост успешно добавлен!";
    } else {
        echo "Ошибка добавления поста: " . $conn->error;
    }
    ?>

    <?php
    $conn->close();
    ?>
    <form action="http://localhost:3000/templates/index.php">
    <input type="submit" value="Вернуться к постам" class="button"/>
</form>
</body>

</html>