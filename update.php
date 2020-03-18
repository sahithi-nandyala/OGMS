<?php
include "database.php";

$sql = "SELECT * FROM student WHERE id = " . $_GET["id"];
$results = mysqli_query($conn, $sql);
$updaterecords = mysqli_fetch_all($results, MYSQLI_ASSOC);

$sql2 = "DELETE FROM student WHERE id = " . $_GET["id"];
$results2 = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
		<style>
		.error {
			color: #a94442;
		}
		.form-group.required .control-label:after {
			  content:" *";
			  color:#a94442;
			}
		</style>
		<script type="text/javascript">
		$.validator.setDefaults( {
			submitHandler: function () {
				return true;
			}
		} );

		$( document ).ready( function () {
			$( "#studentForm" ).validate( {
				rules: {
					first_name: "required",
					last_name: "required",
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					first_name: "Please enter your firstname",
					last_name: "Please enter your lastname",
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );
			
		} );
	</script>
        <meta charset = "utf-8"></meta>
    </head>

    <body>
        <div class="container">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <h3>Student Update Form</h3><br>
        <form action = "process.php" method = "post" id="studentForm">
            <?php foreach ($updaterecords as $record) : ?>
            <div class="form-group required">    
            <label class="control-label">First name</label>
                <input name = "first_name" required type = "text" class="form-control" value = "<?php echo $record["first_name"]; ?>"> </label>
            </div>
            <div class="form-group required">   
                <label class="control-label">Last name</label>
                <input name = "last_name" required type = "text" class="form-control" value = "<?php echo $record["last_name"]; ?>"> 
            </div>
            <div class="form-group required"> 
                <label class="control-label">Gender</label>
                <div class="radio">
                    <label><input name = "gender" type = "radio" value = "male" checked> Male</label>
                    <label><input name = "gender" type = "radio" value = "female"> Female</label>
                    <label><input name = "gender" type = "radio" value = "other"> Other</label>
                </div>
            </div>
            <div class="form-group required">
                <label class="control-label">Qualification</label>
                <select name = "qualification" value = "<?php echo $record["qualification"]; ?>" class="form-control">
                    <option value="undergraduate">Undergraduate</option>
                    <option value="ms">Masters</option>
                    <option value="phd">PHD</option>
                </select>
            </div>
            <div class="form-group required">
                <label class="control-label">E-mail</label>
                <input name="email" required type="email" value = "<?php echo $record["email"]; ?>"  class="form-control"> 
            </div>    
            <div class="form-group required">
                <label class="control-label">Password</label>
                <input name = "password" required type = "password" value = "<?php echo $record["password"]; ?>"  class="form-control" id="password">
            </div>
            <?php endforeach; ?>
            <div class="form-group required">
                <label class="control-label">Confirm password</label>
            <input name = "confirm_password" required type = "password" class="form-control">
            </div>
            <p>
                <button type = "submit" name = "save" class="btn btn-primary"> Submit </button>
            </p>
            <input type="hidden" name="student_id" value="<?php echo $_GET['id'];?>">
        </form>
            </div>
            </div>
            </div>
    </body>
</html>