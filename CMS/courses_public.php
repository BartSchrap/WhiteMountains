 <?php
      //connect met de database
      $cnx = mysqli_connect("localhost","root","root", "snow");						
      if (!$cnx) {
         die("Can not Connect:" .mysqli_connect_error());
      }
      //selecteert alle Courses vanaf startdatum nu
     $query = "SELECT * FROM courses WHERE startdate >= CURDATE()" ; 
     $result = mysqli_query($cnx, $query);
?>
<!doctype html>
<html lang="en">
<head>

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/trees1.jpg">
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
                    <a href="Courses.php">
                        <i class="pe-7s-note2"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
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
                    <a class="navbar-brand" href="#">Courses</a>
                </div>
                <div class="collapse navbar-collapse">
                 

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="./login.php">
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
                    <h2>Informatie Courses</h2>
                    <p>Ben jij een toerskier? Beginnend of gevorderd? En vind je het leuk om in groepsverband tochten te skien? Sluit je dan aan bij de vereniging. Met een groter ledenaantal en hulp van leden kunnen we gezamenlijk meer organiseren. Dit kunnen we gezamenlijk organiseren:<br> 
                    - Skiing Coursesen <br>
                    - Cross Country Toursen <br>
                    - Snowboarding Coursesen <br>
                    <br><br>
                    Onze huidige Courses zijn momenteel:<br>
                   
                        <ul>
                        <?php    while ($roww = mysqli_fetch_array($result)) { ?>
                            <li> <?php echo $roww['coursename'].' '.$roww['startdate'];?></li>
                        <?php  } ?>
                        </ul>
                    </p>
                </div>
                <div class="row" style="clear: both;">

                   

                    </div>
             
                </div>
                
            </div>
        </div>
        <?php require_once('../lib/footer.php'); ?>
    </div>
</div>
</body>
</html>
