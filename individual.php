<?php

include "database.php";

$sql = "SELECT * FROM student WHERE id = " . $_GET["id"];

$results = mysqli_query($conn, $sql);

/*
 if ($results3 === false) {
   echo mysqli_error();
 }
*/
// else {
   $record = mysqli_fetch_assoc($results);
   //var_dump($articles);
 //}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details of the student</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>


    <?php if($record === null ) : ?>
      <p>No details were found</p>
    <?php else : ?>
      <h2 align = "center"><?php echo $record["first_name"] ." ". $record["last_name"]; ?></h2>
      <div class="container">
                <table class="table table-striped">

        <tr>
          <th>Student id</th>
          <th>  </th>
          <th>First name</th>
          <th>  </th>
          <th>Last name</th>
          <th>  </th>
          <th>Gender</th>
          <th>  </th>
          <th>Qualification</th>
          <th>  </th>
          <th>Email</th>
        </tr>
    <!-- put your code below this line -->
        <tr>
          <td> <?php echo $record["id"]; ?> </td>
          <td>  </td>
          <td> <?php echo $record["first_name"]; ?> </td>
          <td>  </td>
          <td> <?php echo $record["last_name"]; ?> </td>
          <td>  </td>
          <td> <?php echo $record["gender"]; ?> </td>
          <td>  </td>
          <td> <?php echo $record["qualification"]; ?> </td>
          <td>  </td>
          <td> <?php echo $record["email"]; ?> </td>
        </tr>
                </table>
      </div>
  <?php endif; ?>

        <form action = "process.php">
          <p>
            <center>
              <button type = "submit" name = "back"> Go back </button>
            </center>
          </p>
        </form>


    </body>
</html>
