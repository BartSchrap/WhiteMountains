<?php
  // start sessie
  session_start();
    // als er is ingelogd
    if (isset($_SESSION['email'])) {
  ?>  
        
        <script>window.location = "../CMS/dashboard.php";</script>
  <?php
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
	<div id="content">
		<div id="login">

			<h1>LOGIN MET JE ACCOUNT</h1>
			<form name="login" action=" " method="post">
			   <p>
			        E-mail
			        <input type="email" name="email" data-validation="email">
			   </p>
		       <p>
		        	Password
		        	<input type="password" name="password" >
		       </p>
			   <input style="width:50%!important;" type="submit" value="LOGIN" name="login" class="button" >
		       <a href="register.php" style="width:48%!important; float:right" type="button" value="REGISTREREN" name="register" class="button">Registeren</a>
    	</form>
			<?php
       	// als je een formulier submit
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					        // getting the form inputs
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    	// connects to db
                        $cnx = mysqli_connect("localhost","root","root", "dewaai");
                        if (!$cnx) {
                        die("Can not Connect:" .mysql_error());
                        }
                        // getting the data from database whats equel to the form data
                        $query = "SELECT * FROM users WHERE email = '$email' AND password ='$password'" ; 
                        $result = mysqli_query($cnx, $query);
                        
                        // als er data gevonden is in de database
                        if ($result) {
                        $row = mysqli_fetch_array($result);
                        $dbId = $row[0];
                        $dbEmail = $row[1];
                        $dbPassword = $row[2];
                        }
                        // als email en wachtwoord kloppen
                        if ($email == $dbEmail & $password == $dbPassword) {
                          // maak sessie
                          $_SESSION['id'] = $dbId;
                          $_SESSION['email'] = $email;
                          $_SESSION['time']   = time();
                          mysqli_query($cnx, $sdl);
                        ?>
                        <script>window.location = "../CMS/dashboard.php";</script>
                        <?php
                        exit();
                        }
                        // anders
                        else{
                            echo "Gebruikersnaam & Wachtwoord komen niet overeen.";
                        }
				}
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