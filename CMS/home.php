<?php require_once('../lib/header.php'); ?>
<body>
  <div class="wrapper">
<!-- Build sidebar -->
    <div class="sidebar" data-color="purple" data-image="assets/img/trees1.jpg">
    	<div class="sidebar-wrapper">
        <div class="logo">
          <img style="height: 60px;" src="../assets/img/logo.png" alt="logo" />
        </div>
        <ul class="nav">
          <li>
            <a href="home.php">
              <i class="pe-7s-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="courses_public.php">
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
<!-- Build Main Panel -->
    <div class="main-panel">
<!-- Build Navigation Bar -->
      <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
          <div class="navbar-header" style= "margin-left: 45%;">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Home</a>
          </div>
          <div class="collapse navbar-collapse">
           

            <ul class="nav navbar-nav navbar-right">
              <li>
                 <a href="login.php">
                   Login
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- Build Page Content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 header_banner" style="background-size:cover; background-image:url('../assets/img/office.jpg');"> 
              <div class="header_title">
                <h1>White Mountains Winter Sports</h1>
                <p style="width:60%; display:block; margin:0 auto;">  
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                De actieve Wintersportvereniging White Mountains Winter Sports organiseert verschillende wintersportevenementen. De vereniging wil meer evenementen verzorgen en ondersteunen voor alle doelgroepen. Dus ook voor toerskiërs!</p>
              </div>
            </div>
          </div>
          <div class="col-md-12" id="red_bg">
            <h2>Welkom bij White Mountains Winter Sports!</h2>
            <p>Ben jij een toerskiër? Beginnend of gevorderd? En vind je het leuk om in groepsverband tochten te skiën? Sluit je dan aan bij onze vereniging. </br>Met een groter ledenaantal en hulp van leden kunnen we gezamenlijk meer tochten organiseren: </br>
            - Skiing Courses</br>
            - Cross Country Tours</br>
            - Snowboarding Courses</br> </p>
          </div>
          <div class="row" style="clear: both;">
            <div class="col-md-12 home_gear" style="background-size:cover; background-image:url('../assets/img/ski1.jpg')">
            </div>
          </div>
        </div>
      </div>
      <?php require_once('../lib/copyright.php'); ?>
    </div>
  </div>
</body>

</html>
