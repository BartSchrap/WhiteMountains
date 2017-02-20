<?php
    //start sessie
    session_start();
    // als je ingelogd bent
    if (isset($_SESSION['email'])) {
        // haalt sessie op van ingelogde gebruiker
        $email = $_SESSION['email'];
        // connect met database
        $cnx = mysqli_connect("localhost","root","root", "dewaai");
        // haalt id uit url
        $id = $_GET['id'];
            if (!$cnx) {
                die("Can not Connect:" .mysql_error());
            }
        // selecteerd alles van de gebruiker
        $query = "SELECT * FROM users WHERE email = '$email'" ; 
        $result = mysqli_query($cnx, $query);
        $row = mysqli_fetch_array($result);
        
        // haalt de cursus op
        $query_course = "SELECT * FROM courses WHERE id = '$id'" ; 
        $result_course = mysqli_query($cnx, $query_course);
        $row_course = mysqli_fetch_array($result_course);
        
     
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

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Aangemelde cursisten voor de cursus: <?php echo $row_course['course_name'];?></h4>
                                     
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                <a
                                    <thead>
                                        <th>Email</th>
                                    	<th>Naam</th>
                                    	<th>Adres</th>
                                    	<th>Postcode</th>
                                    	<th>Woonplaats</th>
                                        <th>Telefoon</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $cnx = mysqli_connect("localhost","root","root", "dewaai");						
                                            if (!$cnx) {
                                                die("Can not Connect:" .mysql_error());
                                            }

                                            $query = "SELECT * FROM users JOIN course_user ON id = user_id WHERE course_id = '$id'" ; 
                                            $result = mysqli_query($cnx, $query);

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
			                                    while ($roww = mysqli_fetch_array($result)) {
                                        ?>                 
                                                    <td> <?php echo $roww['email']; ?></td>                                
                                                    <td> <?php echo $roww['first_name']; ?> <?php echo $roww['insertion']; ?> <?php echo $roww['last_name']; ?></td>
                                                    <td> <?php echo $roww['address']; ?></td>
                                                    <td> <?php echo $roww['postal_code']; ?></td>
                                                    <td><?php echo $roww['city']; ?></td>
                                                    <td><?php echo $roww['telephone']; ?></td>                                                
                                        <?php 
                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            $sdl="DELETE FROM courses WHERE id = '$roww[id]'";
                                                            mysqli_query($cnx, $sdl);
                                                   
                                                            $sdl3="DELETE FROM course_user WHERE course_id = '$roww[id]'";
                                                            mysqli_query($cnx, $sdl3);
                                                        }
                                                }
                                        ?>
                                    </tbody>
                                </table>
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
    <script type="text/javascript">
       window.onload = function() { window.print(); }
    </script>

</html>
