<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'bd_blog';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Автор: " . $row['author'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Постов еще не добавлено!";
}

$conn->close();
?>