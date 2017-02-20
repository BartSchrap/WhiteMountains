<?php
  // start session
  session_start();
  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $cnx = mysqli_connect("localhost","root","root", "dewaai");
    if (!$cnx) {
      die("Can not Connect:" .mysql_error());
    }
    $query  = "SELECT * FROM users WHERE email = '$email'" ; 
    $result = mysqli_query($cnx, $query);
    $row    = mysqli_fetch_array($result);
     
    //course_id form url
    $id  = $_GET['id'];
    $sid = $_SESSION['id'];
        
    if ($row['role'] == 'instructor'){
?>
      <style>
        #customer_intake_course{
          display:none;
        }
        #mijn_cursus_nav{
          display:none;
        }      
      </style>
<?php
    }
    if($row['role'] == 'customer'){
?>
      <style>
        #admin_change_course{
          display:none;
        }
        #admin_delete_course{
          display:none;
        }
        #medewerkers_nav{
          display:none;
        }
        #admin_add_course{
          display:none;
        }
        #boats_nav{
          display:none;
        }
        #admin_course_status{
          display:none;
        }
      </style>
<?php 
    }
  }              
                        
  else{
    echo '<script>window.location = "../login/index.php";</script>'; 
  }

  // als je ingelogd bent als gebruiker en op deze pagina probeert te komen
  if ($row['role'] == 'customer'){
    echo '<script>window.location = "dashboard.php";</script>'; 
  }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Zeilschool De Waai</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <img src="assets/img/logo.png" alt="logo">
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-note2"></i>
                        <p>Cursussen</p>
                    </a>
                </li>
                <li id="boats_nav">
                    <a href="boats.php">
                        <i class="pe-7s-helm"></i>
                        <p>Schepen</p>
                    </a>
                </li>
 
                <li id="medewerkers_nav" class="active">
                    <a href="admin_list.php">
                        <i class="pe-7s-users"></i>
                        <p>Medewerkers</p>
                    </a>
                </li>
                <li id="mijn_cursus_nav">
                    <a href="mijn_cursussen.php">
                        <i class="pe-7s-photo-gallery"></i>
                        <p>Mijn Cursussen</p>
                    </a>
                </li>
    
            </ul>
    	</div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header" style="    margin-left: 45%;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Medewerkers</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">  
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <span>Welkom, <?php echo $row['first_name']; ?></span>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user.php">Mijn Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Maak een beheerder aan</h4>
                            </div>
                            <div class="content">
                            <form name="login" action=" " method="post">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Emailadres</label>
                                    <input type="email" class="form-control" name="email" placeholder="EMAIL" required data-validation="email" data-validation-error-msg="Geen geldige Email">
                                </div>
                              </div>
                                  <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Wachtwoord</label>
                                                 <input type="password" class="form-control" name="password" placeholder="PASSWORD" required data-validation="strength" data-validation-strength="2" data-validation-error-msg="Wachtwoord niet sterk genoeg">
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Herhaal wachtwoord</label>
                                                  <input type="password" name="cpassword" class="form-control" placeholder="PASSWORD" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Wachtwoorden komen niet overeen">
                                                 
                                            </div>
                                        </div>
                                   <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Voornaam</label>
                                                <input type="text" name="firstname" placeholder="Voornaam..." class="form-control" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Voornaam is een verplicht veld" >
                                            </div>
                                        </div>
                                
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Achternaam</label>
                                            <input type="text" name="lastname" placeholder="Achternaam..." class="form-control" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Achternaam is een verplicht veld" >
                                        </div>
                                    </div>

     
                               
                                <input style="width:60%!important;" type="submit" class="form-control" value="ACCOUNT AANMAKEN" name="login" class="button" >
                               
                           </form>
                                
                            <?php 
                              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                
                                // get form inputs
                                $email     = $_POST['email'];
                                $password  = md5($_POST['password']);
                                $firstname = $_POST['firstname'];
                                $lastname  = $_POST['lastname'];
                    
                                // connect to db
                                $cnx = mysqli_connect("localhost","root","root", "dewaai");
                                if (!$cnx) {
                                  die("Can not Connect:" .mysql_error());
                                }
                                    
                                // get data from database that's equal to the form data
                                $query  = "SELECT * FROM users WHERE email = '$email'";
                                $result = mysqli_query($cnx, $query);

                                if ($result) {
                                  $row        = mysqli_fetch_array($result);
                                  $dbId       = $row[0];
                                  $dbEmail    = $row[1];
                                  $dbPassword = $row[2];
                                }
                                    
                                //reset error
                                $error = false; 
                            
                                //encrypt
                                $mdpassword = md5($_POST['cpassword']);
                                               
                                if ($email == $dbEmail) {
                                  echo "Deze gebruiker bestaat al";
                                  $error = true;
                                }
                                   
                                if ($error === false){
                                  $sql = "INSERT INTO users (email,password,role,first_name,last_name) 
                                                VALUES ('$_POST[email]','$mdpassword','instructor','$_POST[firstname]','$_POST[lastname]')";
                                  mysqli_query($cnx, $sql);
                                  echo mysqli_error($cnx);
                                  echo "beheerder aangemaakt!";
                                }
                              }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="#">FastDevelopment</a>
                </p>
            </div>
        </footer>
    </div>
</div>
</body>

 <div include-html="./assets/coreJS.html"></div>

</html>
