<?php
  session_start();
  // Define constant to prevent direct access to lib files
  define('_INC_ACCESS', true);
  //session_destroy();
  // if session exists (already logged in) redirect to 
  if (isset($_SESSION['email'])) {
    echo "Session already exists";
    sleep(2);
    echo('<script>window.location = "./dashboard.php?page=courses"; </script>');
    exit;
  }     // else proceed with login
?>
<?php require_once('../lib/header.php'); ?>
<body>
  <?php require_once('../lib/jsassets.php'); ?>
  <div id="content">
		<div id="login">
			<h1>LOG IN MET JE ACCOUNT</h1>
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
		    <a href="register.php" style="width:48%!important; float:right" type="button" value="REGISTREREN" name="register" class="button">Registreer</a>
    	</form>
			<?php
       	// if form was submitted check form info with data from database
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $email    = $_POST['email'];
          $password = md5($_POST['password']);

          require_once('../lib/connect_db.php');

            // check if form data can be found in db
          $query = "SELECT * FROM users WHERE email = '$email' AND password ='$password'" ; 
          $result = mysqli_query($cnx, $query);
          // if user data is found in database
          if ($result) {
            $user        = mysqli_fetch_array($result);
            $dbEmail    = $user['email'];
            $dbPassword = $user['password'];
          }
          // if email and password match
          if ($email == $dbEmail & $password == $dbPassword) {
            echo session_id();
            //$_SESSION['id']    = $dbId;
            $_SESSION['time']      = time();
            $_SESSION['uid']       = $user['id'];
            $_SESSION['email']     = $dbEmail;
            $_SESSION['role']      = $user['role'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['infix']     = $user['infix'];
            $_SESSION['lastname']  = $user['lastname'];

            echo '<script>window.location = "./dashboard.php?page=courses"; </script>';
            exit();
          }
          else{
           echo "Gebruikersnaam & Wachtwoord komen niet overeen.";
          }
				}
			?>
<?php require_once('../lib/footer.php'); ?>