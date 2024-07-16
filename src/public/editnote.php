<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Note</title>
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

        input[type="date"], input[name="title"] {
            width: fit-content(100%);
            text-align: center;
        }

        input[type="submit"] {
            margin: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1><b>EDIT NOTE</b></h1>
        <p class="text-muted">Edit your note as you like</p>
    </div>
    <div class="row">

        <?php
        global $conn;
        require_once "../app/database/connection.php";
        $id = $_GET['id'];
        $query = "SELECT * FROM diary WHERE id = '$id'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
        ?>
        <form action="../app/database/edit-data.php" method="post">
            <input type="text" class="form-control .d-none" name="data_id" value="<?php echo $row['id']?>">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Title</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="date" class="form-control" name="date" id="date" value="<?php echo $row['date'];?>" required></td>
                    <td><input type="text" class="form-control" name="title" id="title" value="<?php echo $row['name'];?>" required></td>
                </tr>
                <tr>
                    <th class="text-center" colspan="2">Description</th>
                </tr>
                <tr>
                    <td colspan="2"><textarea class="form-control" id="description" name="description" rows="4" cols="50"><?php echo $row['description'];?> </textarea></td>
                </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form>

    </div>


</div>
</body>
</html>
