<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="jumbotron text-center">
    <h1>My Private Diary</h1>
    <p class="text-muted"><small>Only sensitive information here</small></p>
</div>

<div class="container">
    <?php
    if (isset($_GET['record-delete'])) {
        ?>
        <div class="alert alert-danger">
            <strong>Success!</strong> Record successfully deleted!
        </div>
    <?php } ?>
    <div class="row">
        <form action="../app/Router.php" method="get">
            <input type="submit" name="addnote" id="addnote" class="btn btn-primary" value="Add Note">
            <input type="submit" name="logout" id="logout" class="btn btn-warning" value="Logout">
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Date</th>
                <th class="text-center">Title</th>
                <th class="text-center">Description</th>
                <th class="text-center" style="width: 10px">Edit</th>
                <th class="text-center" style="width: 10px">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php

            global $conn;
            require_once "../app/database/connection.php";

            $sql = "SELECT * FROM diary ORDER BY date ASC";
            $run = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($run)){

            ?>
            <tr>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['description'];?></td>
                <td style="text-align: center"><a href="../app/database/edit-data.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a> </td>
                <td style="text-align: center"><a href="../app/database/delete-data.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
            </tr>
           <?php
           } //while ending
           ?>
            </tbody>
        </table>
    </div>

    <br/>

</div>


</body>
</html>
