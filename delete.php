<?php
include "database.php";

$sql = "DELETE FROM student WHERE id = " . $_GET["id"];

$results = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Record deleted</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-4 text-success">
                    <h3> The student record was successfully deleted </h3><br>
                 <form action = "process.php">
                            <button type = "submit" name = "back" class="btn btn-primary"> Go back </button>
                        </form>
                </div>
            </div>
        </div>
    
</body>
</html>
