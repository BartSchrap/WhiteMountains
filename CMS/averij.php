<?php
    //start sessie
    session_start();
    // als je ingelogd bent
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $cnx = mysqli_connect("localhost","root","root", "dewaai");
            if (!$cnx) {
                die("Can not Connect:" .mysql_error());
            }

        //selecteert alles van de ingelogde gebruiker
        $query = "SELECT * FROM users WHERE email = '$email'" ; 
        $result = mysqli_query($cnx, $query);
        $row = mysqli_fetch_array($result);
     
        //cursus_id vanuit de url
        $id = $_GET['id'];
        $sid = $_SESSION['id'];

        // als je een instructor bent
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Bekijk Averij</h4>
                            </div>
                            <div class="content">
                            <form name="" action=" " method="post">
<?php
                                // selecteert alles van course
                                $query = "SELECT * FROM boats WHERE averij = 'true'" ; 
                                $result_course = mysqli_query($cnx, $query);
?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Averij </label>
                                          
                                            <?php
                                                // loop door database
                                                while ($course = mysqli_fetch_array($result_course)) {
?>
                                                    <li><?php echo $course['id']; ?>  <?php echo $course['boat_name']; ?></li>
                                                <?php 
                                                } 
?>        
                                     
                                   
                           </form>
                                
     

                                
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
