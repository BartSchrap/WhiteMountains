<?php
  // start or resume session
  session_start();
  // Define constant to prevent direct access to lib files
  define('_INC_ACCESS', true);
  // if already logged in redirect to 
  if (isset($_SESSION['email'])) {
    header("location: ./dashboard.php?page=courses");
    exit;
  }
  $sid = session_id();
?>

<?php require_once('../lib/header.php'); ?>
  <body>
    <?php require_once('../lib/jsassets.php'); ?>  	
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
            Tussenvoegsel
            <input type="text" name="infix" data-validation="length alphanumeric" data-validation-length="0-8">
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
            <option value="intermediate">Gemiddeld</option>
            <option value="advanced">Ervaren</option>
          </select>
          <input style="width:60%!important;" type="submit" value="ACCOUNT AANMAKEN" name="login" class="button" >
          <a href="login.php" style="width:38%!important; float:right" type="button" value="REGISTREREN" name="register" class="button">GA TERUG</a>
  			</form>

  			<?php
  				if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            require_once('../lib/connect_db.php');
            // get data from database based on form data
            $query   = "SELECT * FROM users WHERE email = '$email'" ; 
            $result  = mysqli_query($cnx, $query);
            $exists  = false;                      //reset error flag
            $pwdDiff = false;                      //reset error flag
            // If query was successful and not empty
            if ($result && mysqli_num_rows($result) > 0) {
              $exists = true;
            }
            else{
              if ($_POST['password'] != $_POST['cpassword']) {
                $pwdDiff = true;
              }
            }
            // no errors, add user
            if(!$exists && !$pwdDiff) {
              $mdpassword = md5($_POST['password']);   //encrypt entered password
              $level      = $_POST['level'];
              $role       = 'customer';
              $firstname  = $_POST['firstname'];
              $infix      = $_POST['infix'];
              $lastname   = $_POST['lastname'];
              $insert     = "INSERT INTO users (email,password,level,role,firstname,infix,lastname) VALUES ('$email','$mdpassword','$level','$role','$firstname','$infix','$lastname');";
              $result = mysqli_query($cnx, $insert);
              if ($result) {
                $_SESSION['time']      = time();
                $_SESSION['email']     = $email;
                $_SESSION['role']      = $role;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['infix']     = $infix;
                $_SESSION['lastname']  = $lastname;
                $select = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($cnx, $select);
                if ($result) {
                  $user = mysqli_fetch_array($result);
                  $_SESSION['uid'] = $user['id'];
                }
                echo "Account created successfully. Redirecting to user ...";
                sleep(10);
                echo '<script>window.location = "dashboard.php?page=courses"</script>';
                exit;
              }
              session_destroy();
              die("Query failed: ".mysqli_error());
            }
            else{
              if ($exists)  echo 'User already exists!';
              if ($pwdDiff) echo "Passwords do not match!";
              echo $_SESSION['email'];
              session_destroy();
              echo '<script>window.location = "register.php"</script>';
              exit;
            }
          }
  			?>
      </div>
    </div>
    <?php require_once('../lib/copyright.php'); ?>
<?php require_once('../lib/footer.php'); ?>
