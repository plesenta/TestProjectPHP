<!DOCTYPE html>
<html>

<head>
    <title>Блог</title>
    <style>
        body {
            font-family: 'Futura New', Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            text-align: left;
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

        .form-field {
            margin-bottom: 10px;
        }

        .form-field label {
            display: block;
        }

        .form-field input[type="text"],
        .form-field textarea {
            width: 100%;
            padding: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            
            function updateFeed() {
                $.ajax({
                    type: "GET",
                    url: "get_posts.php",
                    success: function(data) {
                        $("#feed").html(data); 
                    }
                });
            }

            
            setInterval(updateFeed, 2000);
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Блог</h1>

        <h2>Добавить пост</h2>
        <form action="add_post.php" method="POST">
            <div class="form-field">
                <label for="title">Заголовок:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-field">
                <label for="description">Описание:</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <div class="form-field">
                <label for="author">Автор:</label>
                <input type="text" name="author" id="author" required>
            </div>
            <input type="submit" value="Добавить" class="button">
        </form>

        <h2>Лента постов</h2>
        <div id="feed">
            
        </div>
    </div>
</body>

</html>