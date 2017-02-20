<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zeilschool De Waai</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
	<div id="content">
		<div id="login">

			<h1>Creating Admin account</h1>
      <h2>Password: admin123</h2>
			<form name="login" action=" " method="post">
			  <p>
          E-mail
          <input type="email" name="email" data-validation="email" data-validation-error-msg="Geen juist emailadres ingevuld">
        </p>
        
			 <input style="width:60%!important;" type="submit" value="ACCOUNT AANMAKEN" name="login" class="button" >
			 <a href="index.php" style="width:38%!important; float:right" type="button" value="REGISTREREN" name="register" class="button">GA TERUG</a>
			</form>
 
			<?php
				//if ($_SERVER["REQUEST_METHOD"] == "POST") {
           // connects to db
           $cnx = mysqli_connect("localhost", "root", "root", "dewaai");
           if (!$cnx) {
             die("Cannot Connect:" .mysql_error());
           }

           // initialize admin account
  				 if (isset($_POST['login'])) {
	         	 $email       = 'admin@mail.nl';
	         	 $mdPassword  = md5('admin123');
	           $firstname   = 'admin';
	           $lastname    = 'lastAdmin';
	           $role        = 'instructor';
           }
              
           $sql = "INSERT INTO users (email, password, first_name, last_name, role) 
                   VALUES ('$email','$mdPassword','$firstname','$lastname','$rolelevel')";
           mysqli_query($cnx, $sql);
           echo mysqli_error($cnx);
           // initialize admin account
  				 if (isset($_POST['login'])) {
	         	 $email       = 'user@mail.nl';
	         	 $mdPassword  = md5('user123');
	           $firstname   = 'user';
	           $lastname    = 'lastUser';
	           $role        = 'instructor';
           }
              
           $sql = "INSERT INTO users (email, password, first_name, last_name, role) 
                   VALUES ('$email','$mdPassword','$firstname','$lastname','$rolelevel')";
           mysqli_query($cnx, $sql);
           echo mysqli_error($cnx);
      //  }
			?>
		

 		</div>
    </div>
   <script src="js/jquery-1.12.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
	 <script src="js/parallax.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
   <script src="js/script.js"></script>
   <script>
      $.validate({
        modules : 'location, date, security, file',
        onModulesLoaded : function() {
          $('#country').suggestCountry();
        }
      });

      // Restrict presentation length
      $('#presentation').restrictLength( $('#pres-max-length') );
  </script>
  </body>
</html>