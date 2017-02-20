 <?php
      //connect met de database
      $cnx = mysqli_connect("localhost","root","root", "dewaai");						
      if (!$cnx) {
         die("Can not Connect:" .mysql_error());
      }
      //selecteert alle cursussen vanaf startdatum nu
     $query = "SELECT * FROM courses WHERE start_date >= CURDATE()" ; 
     $result = mysqli_query($cnx, $query);
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

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <img style="height: 60px;" src="assets/img/logo.png" alt="logo" />
            </div>

            <ul class="nav">
                <li>
                    <a href="home.html">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="active">
                    <a href="cursussen.php">
                        <i class="pe-7s-note2"></i>
                        <p>Cursussen</p>
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Contact</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header" style= "margin-left: 45%;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Cursussen</a>
                </div>
                <div class="collapse navbar-collapse">
                 

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="../login/index.php">
                               Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
        
                </div>
                <div class="col-md-12" id="red_bg">
                    <h2>Informatie Cursussen</h2>
                    <p>Ben jij een toerzeiler? Beginnend of gevorderd? En vind je het leuk om in groepsverband tochten te zeilen? Sluit je dan aan bij de vereniging. Met een groter ledenaantal en hulp van leden kunnen we gezamenlijk meer organiseren. Dit kunnen we gezamenlijk organiseren:<br> 
                    - Beginnerscursussen <br>
                    - Waddentochten <br>
                    - Gevorderdencursussen <br>
                    <br><br>
                    Onze huidige cursussen zijn momenteel:<br>
                   
                        <ul>
                        <?php    while ($roww = mysqli_fetch_array($result)) { ?>
                            <li> <?php echo $roww['course_name'];?></li>
                        <?php  } ?>
                        </ul>
                    </p>
                </div>
                <div class="row" style="clear: both;">

                   

                    </div>
             
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
