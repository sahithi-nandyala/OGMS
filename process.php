<?php
include "database.php";

if (isset($_POST['student_id'])) {
   $query = "UPdate `student` SET first_name= '" . $_POST["first_name"] . "', last_name = '" . $_POST["last_name"] . "', gender = '" . $_POST["gender"] . "', qualification = '" . $_POST["qualification"] . "', email = '" . $_POST["email"] . "', password = '" . $_POST["password"] . "' WHERE id=".$_POST['student_id'];
    mysqli_query($conn, $query);
}

if (isset($_POST['save']) && !isset($_POST['student_id'])) {
    $sql1 = "INSERT INTO
  student(first_name, last_name, gender, qualification, email, password)

   VALUES (
     '" . $_POST["first_name"] . "', '" . $_POST["last_name"] . "', '" . $_POST["gender"] . "', '" . $_POST["qualification"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "'
   )

   ";
//running the query to insert the data into database
    $result1 = mysqli_query($conn, $sql1);
}
//sql query to store id and first_name of student from database
$sql2 = "SELECT first_name, id FROM student;";

//executing the query
$result2 = mysqli_query($conn, $sql2);

//storing the retrieved data into a variable as array
$records = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Registered students</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>

        <h2 align = "center">Registered Students</h2>

<?php if (empty($records)) : ?>
            <p>None of the students have registered</p>

<?php else : ?>
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Student id</th>
                            <th>  </th>
                            <th>First name</th>
                            <th>          </th>
                            <th>  </th>
                            <th>          </th>
                        </tr>
                    </thead>
    <?php foreach ($records as $record) : ?>

                        <tr>
                            <td> <?php echo $record["id"]; ?> </td>
                            <td>  </td>
                            <td> <?php echo $record["first_name"]; ?> </td>
                            <td> <a href = "individual.php?id=<?= $record["id"] ?>"><i class="glyphicon glyphicon-info-sign"></i> Details </a> </td>
                            <td>  </td>
                            <td> <a href = "delete.php?id=<?= $record["id"] ?>" class="text-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Delete </a> </td>
                            <td> <a href = "update.php?id=<?= $record["id"] ?>" class="text-success"><i class="glyphicon glyphicon-edit"></i> Edit </a> </td>
                        </tr>

    <?php endforeach; ?>

                </table>
            </div>
            <form action = "index.php">
                <p>
                <center>
                    <button type = "submit" name = "add" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
                </center>
            </p>
        </form>

<?php endif; ?>
</body>
</html>