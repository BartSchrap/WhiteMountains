<?php
    //start sessie
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sid = $_SESSION['id'];
      
        //cursus_id vanuit de url
        $id = $_GET['id'];
        
        // verbind met database
        $cnx = mysqli_connect("localhost","root","root", "dewaai");
            if (!$cnx) {
                die("Can not Connect:" .mysql_error());
            }
            

        //haal alles op van cursist (info)
        $query = "SELECT * FROM users WHERE email = '$email'" ; 
        $result = mysqli_query($cnx, $query);
        $row = mysqli_fetch_array($result); 
        
        
        // haal de cursist + cursus op (Check)
        $queryy = "SELECT * FROM course_user WHERE user_id = '$sid'" ; 
        $resultt = mysqli_query($cnx, $queryy);
        $roww = mysqli_fetch_array($resultt); 
    }
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
  
            <div class="container-fluid">
                <div class="row">
           <?php
                // connect met database
                $cnx = mysqli_connect("localhost","root","root", "dewaai");						
                if (!$cnx) {
                    die("Can not Connect:" .mysql_error());
                }

                // haalt de cursus + boot op (info)
		        $query = "SELECT * FROM courses INNER JOIN boats ON courses.id=courses_id WHERE courses.id = '$id'" ; 
	        	$result = mysqli_query($cnx, $query);

                //telt alle rows in de database 
                //$counterquery = "SELECT COUNT(user_id) AS counter_id FROM course_user WHERE course_id = 2 " ; 
	        	//$counter = mysqli_query($cnx, $counterquery);
                //echo $counter['counter_id'];

                
                //loop door database
			    while ($course = mysqli_fetch_array($result)) {
            ?>
                    <h4>
                        <?php echo $course['course_name']; ?>
                    </h4>
                    <div class="decscription">
                        <b>beschrijving </b><?php echo $course['description']; ?>
                    </div>
                    <li><b>Moeilijkheid </b><?php echo $course['level']; ?></li>
                    <li><b>Prijs </b>&euro; <?php echo $course['price']; ?>,-</li>
                    <li><b>Startdatum </b><?php echo $course['start_date']; ?> t/m <?php echo $course['end_date']; ?></li>
                    <li><b>bootnaam </b> <?php echo $course['boat_name']; ?></li>
                        <form id="formulier" onsubmit="return confirm('Weet je zeker dat je je wil inschrijven voor deze cursus?');" action=" " method="post">
                            <br><input type="submit" name="Inschrijven" class="right_setting"  value="Inschrijven">
                        </form>
                        <?php
                       
                  
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // kijkt of je niet al ingeschreven bent
                                if ($sid == $roww['user_id']& $id == $roww['course_id']) {
                                            echo "al ingeschreven";  
                                        }   
                                else{
                                        // als je role niet advanced is mag je niet meedoen 
                                       if($row['level'] == 'beginner' & $course['level'] == 'advanced' ){
                                            echo "Je bent niet ervaren genoeg om aan deze cursus mee te doen.";
                                        }

                                        else{
                                        
                                            $sql = "INSERT INTO course_user (user_id,course_id) 
                                            VALUES ('$sid','$id')";
                                            mysqli_query($cnx, $sql);
                                            echo mysqli_error($cnx);
                                            echo 'ingeschreven'; 
                                        }   
                                }

                            }

                        }   
                        ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">

                <p class="copyright pull-right">
                    &copy; 2016 FastDevelopment
                </p>
            </div>
        </footer>

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


</html>
