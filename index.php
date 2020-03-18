<!DOCTYPE html>
<html>

    <head>
        <title>Registration form</title>
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
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <h3>Student Registration Form</h3><br>
                    <form action = "process.php" method = "post" id="studentForm">
                        <div class="form-group required">    
                            <label class="control-label">First name</label>
                            <input name = "first_name" required type = "text" class="form-control">
                        </div>
                        <div class="form-group required"> 
                            <label class="control-label">Last name</label>
                            <input name = "last_name" required type = "text" class="form-control"> 
                        </div>
                        <div class="form-group required">  
                            <label class="control-label">Gender</label>
                            <div class="radio">
                                <label><input name = "gender" type = "radio" value = "male" checked> Male</label>
                                <label><input name = "gender" type = "radio" value = "female"> Female</label>
                                <label><input name = "gender" type = "radio" value = "other"> Other</label><br>
                            </div>
                        </div>
                        <div class="form-group required"> 
                           <label class="control-label"> Qualification</label>
                            <select name = "qualification" class="form-control">
                                <option value="undergraduate">Undergraduate</option>
                                <option value="ms">Masters</option>
                                <option value="phd">PHD</option>
                            </select>
                        </div>
                        <div class="form-group required"> 
                            <label class="control-label">E-mail</label>
                            <input name="email" required type="email" class="form-control">
                        </div>
                        <div class="form-group required"> 
                            <label class="control-label">Password</label>
                            <input name = "password" required type = "password" class="form-control" id="password">
                        </div>
                        <div class="form-group required"> 
                            <label class="control-label">Confirm password</label>
                            <input name = "confirm_password" required type = "password" class="form-control">
                        </div>
                        <p>
                            <input type="checkbox" required name="terms">
                            I accept the <a href = "terms.php" target="_blank">Terms and Conditions</a>
                        </p>
                        <p>
                            <button type = "submit" name = "save" class="btn btn-primary submit"> Submit </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
