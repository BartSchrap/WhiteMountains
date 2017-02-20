<?php
    //start sessie
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        //connect met de database
        $cnx = mysqli_connect("localhost","root","root", "dewaai");
            if (!$cnx) {
                die("Can not Connect:" .mysql_error());
            }
        // selecteert alles van de ingelogde gebruiker
        $query = "SELECT * FROM users WHERE email = '$email'" ; 
        $result = mysqli_query($cnx, $query);
        $row = mysqli_fetch_array($result);
     
        //cursus_id vanuit de url
        $id = $_GET['id'];
        $sid = $_SESSION['id'];

        // als je instructor bent
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
                <li class="active">
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
 
                <li id="medewerkers_nav">
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
                    <a class="navbar-brand" href="">Cursussen</a>
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
               <?php
               //selecteert alles van de ingelogde gebruiker met de sessie id 
                 $query = "SELECT * FROM users WHERE id = '$sid'" ; 
                 $result2 = mysqli_query($cnx, $query);
                 $roww = mysqli_fetch_array($result2);
                ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profiel gegegevens <?php echo $roww['email'];   ?></h4>
                            </div>
                            <div class="content">
                       
                                <form name="login" action=" " method="post">
                                     <div class="row" style="padding-left: 15px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>emailadres</label>
                                                <input type="text" class="form-control" placeholder="Roepnaam" value="<?php echo $roww['email']; ?>" readonly>

                                            </div>
                                      
                                        
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Roepnaam</label>
                                                <input type="text" class="form-control" name="firstname" placeholder="Roepnaam" value="<?php echo $roww['first_name']; ?>" data-validation="length alphanumeric" data-validation-length="3-12"  data-validation-error-msg="Voornaam is een verplicht veld">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tussenvoegsel</label>
                                                <input type="text" class="form-control"  name="insertion" placeholder="Tussenvoegsel" value="<?php echo $roww['insertion']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Achternaam</label>
                                                <input type="text" class="form-control" name="lastname" placeholder="achternaam" value="<?php echo $roww['last_name']; ?>" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Achternaam is een verplicht veld">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input type="text" class="form-control" name="address" placeholder="Adres" value="<?php echo $roww['address']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $roww['postal_code']?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Woonplaats</label>
                                                <input type="text" class="form-control" name="city" placeholder="Woonplaats" value="<?php echo $roww['city']; ?>" >
                                            </div>
                                        </div>
 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telefoon</label>
                                                <input type="text" class="form-control" name="telefoon" value="<?php echo $roww['telephone']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <?php 
                                        // als je ingelod bent als cursist
                                        if($row['role'] == "customer" ){
                                          ?>
                                            <style>
                                            #admin_create{
                                                display:none;
                                              
                                            }

                                            #admin_list{
                                                display:none;
                                                
                                            }
                                            </style>
                                          <?php
                                        }
                                    ?>
                                    <button type="submit" name="changeprofile" class="btn btn-info btn-fill pull-right">Update Profiel</button>
                                    <a id="admin_create" href="admin_register.php" style="margin:0px 10px;" class="btn btn-info btn-fill pull-right">Beheerder aanmaken</a>
                                    <a id="admin_list" href="admin_list.php" class="btn btn-info btn-fill pull-right">Bekijk beheerders</a>
                                    <div class="clearfix"></div>
                                </form>
                                
                                <?php 
                                // als je een form submit
                             	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                
                                    // haalt alle form data op
                                    $new_firstname = $_POST['firstname'];
                                    $new_insertion = $_POST['insertion'];
                                    $new_lastname = $_POST['lastname'];
                                    $new_address = $_POST['address'];
                                    $new_postcode = $_POST['postcode'];
                                    $new_city = $_POST['city'];
                                    $new_telephone = $_POST['telephone'];

                                    // wijzigd de gebruiker
                                    $sql = "UPDATE users SET first_name='$new_firstname',last_name='$new_lastname',insertion='$new_insertion', address='$new_address', postal_code='$new_postcode', city='$new_city', telephone='$new_telephone' WHERE id= '$sid'";
                                    mysqli_query($cnx, $sql);
                                    echo mysqli_error($cnx);  
                                    echo '<script>window.location = "user.php";</script>';                                            
                                }
                                ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
  
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

</html>
