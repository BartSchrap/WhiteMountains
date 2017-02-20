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
    <title>Zeilschool De Waai</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
	<div id="content">
		<div id="login">

			<h1>MAAK JE ACCOUNT</h1>
			<form name="login" action=" " method="post">
			   <p>
          E-mail
          <input type="email" name="email" data-validation="email" data-validation-error-msg="Geen juist emailadres ingevuld">
        </p>
          <p>
            Wachtwoord
            <input type="password" name="password" data-validation="strength" data-validation-strength="2" data-validation-error-msg="Wachtwoord is niet sterk genoeg">
          </p>
			    <p>
            Herhaal wachtwoord
           <input type="password" name="cpassword" data-validation-confirm="password" data-validation-error-msg="Wachtwoorden komen niet overeen">
          </p>
        <p>
          Voornaam
          <input type="text" name="firstname" data-validation="length alphanumeric" data-validation-length="3-12" data-validation-error-msg="Dit veld is verplicht">
        </p>
        <p>
          Achternaam
          <input type="text" name="lastname" data-validation="length alphanumeric" 
          data-validation-length="3-12" 
          data-validation-error-msg="Dit veld is verplicht">
        </p>
        <label>Ervaring</label>
            <select class="form-control" name="level">
                <option value="beginner">Beginner</option>
                <option value="advanced">Ervaren</option>
            </select>
        
       
			 <input style="width:60%!important;" type="submit" value="ACCOUNT AANMAKEN" name="login" class="button" >
			 <a href="index.php" style="width:38%!important; float:right" type="button" value="REGISTREREN" name="register" class="button">GA TERUG</a>
			</form>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // getting the form inputs
          $email     = $_POST['email'];
          $password  = md5($_POST['password']);
          $firstname = $_POST['firstname'];
          $lastname  = $_POST['lastname'];
          
          	  // connects to db
              $cnx = mysqli_connect("localhost","root","root", "dewaai");
              if (!$cnx) {
              die("Cannot Connect:" .mysql_error());
              }
              
              // getting the data from database whats equel to the form data
              $query = "SELECT * FROM users WHERE email = '$email'" ; 
              $result = mysqli_query($cnx, $query);
              
              // Als er resultaat is gevonden
              if ($result) {
              $row = mysqli_fetch_array($result);
              $dbId = $row[0];
              $dbEmail = $row[1];
              $dbPassword = $row[2];
              }
              
              //all errors
              $error = false; 
              $emailError = "";
              $passwordError = "";
              $firstnameError = "";
              $lastnameError = "";
                //bestaat de gebruiker ja / nee
                if ($email == $dbEmail) {
                    $emailError = "Deze gebruiker bestaat al";
                    $error = true;
                }
                //wachtwoorden hetzelfde
                  $pass1 = ($_POST['password']);
                  $pass2 = ($_POST['cpassword']);
                if ($pass1 != $pass2) {
                  echo "Wachtwoorden zijn niet hetzelfde";
                  $error = true;
                }
                //decrypt wachtwoord
                else{
                  $mdpassword = md5($_POST['cpassword']);
                }
                //geen errors voeg gebruiker toe
               if(false === $error){
                  $sql = "INSERT INTO users (email,password,first_name,last_name,level) 
                               VALUES ('$_POST[email]','$mdpassword','$_POST[firstname]','$_POST[lastname]','$_POST[level]')";
                  mysqli_query($cnx, $sql);
                  echo mysqli_error($cnx);
                  echo "Account is aangemaakt!";
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