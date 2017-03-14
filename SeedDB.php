<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>White Mountains Winter Sports</title>
  </head>

  <body>
	<div id="content">
		<div id="login">
			<h1>Creating accounts</h1>
      <h4>User    : admin@mail.nl</h4>
      <h4>Password: admin123</h4></br>
      <h4>User    : user@mail.nl</h4>
      <h4>Password: user123</h4></br>
			<form name="login" action=" " method="post">
			  
			 <input style="width:25%!important;" type="submit" value="ACCOUNT AANMAKEN" name="login" class="button" >
       </br>
			 <a href="" style="width:25%!important;" type="button" value="REGISTREREN" name="register" class="button">TERUG</a>
			</form>
 		</div>
  </div>
  
  </body>
 
      <?php
        // connect to db
        $cnx = mysqli_connect("localhost", "root", "root", "snow");
        if (!$cnx) {
          die("Cannot Connect:" .mysqli_connect_error());
        }

        // initialize admin account
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $email       = 'admin@mail.nl';
          $mdPassword  = md5('admin123');
          $level       = 'advanced';
          $role        = 'admin';
          $firstname   = 'admin';
          $lastname    = 'lastAdmin';
            
         $sql = "INSERT INTO users (email, password, level, role, firstname, lastname) 
                 VALUES ('$email','$mdPassword','$level','$role','$firstname','$lastname')";

         mysqli_query($cnx, $sql);
         echo mysqli_error($cnx);

          // initialize user account
          $email       = 'user@mail.nl';
          $mdPassword  = md5('user123');
          $level       = 'beginner';
          $role        = 'customer';
          $firstname   = 'user';
          $lastname    = 'lastUser';
          
         $sql = "INSERT INTO users (email, password, level, role, firstname, lastname) 
                 VALUES ('$email','$mdPassword','$level','$role','$firstname','$lastname')";
         mysqli_query($cnx, $sql);
         echo mysqli_error($cnx);
        }
 
        // disconnect from db 
 //       mysqli_close($cnx);
      ?>
    

</html>