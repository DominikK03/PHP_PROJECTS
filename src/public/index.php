<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Enter Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
        }
        input[type="password"], input[type="submit"] {
            margin: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
    <h1>Welcome to my Diary </h1>
        <p class="text-muted">Type correct password to enter</p>
    </div>
    <form action="../app/validate.php" method="post">
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Incorrect password, please try again.</p>";
    }
    ?>
</div>
</body>
</html>
