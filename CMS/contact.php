<?php require_once('../lib/header.php'); ?>
<body>
  <?php require_once('../lib/jsassets.php'); ?>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../assets/img/trees1.jpg">
    	<div class="sidebar-wrapper">
        <div class="logo">
          <img style="height: 60px;" src="../assets/img/logo.png" alt="logo" />
        </div>
        <ul class="nav">
          <li >
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
          <li class="active">
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
            <a class="navbar-brand" href="#">Contact</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
 
      <div class="content">
        <div class="container-fluid" style="text-align:center; padding:20px;">
          <h2>Contact</h2>
          <li><b>Adres:</b></li>
          <li>White Mountains Winter Sports </li>
          <li>Bergdijk 21 </li>
          <li>8581 KG Alpenland </li>
          <br>
          <li><b>Telefoonnummer:</b></li>
          <li>0514 692 727 </li><br>
          <li><b>E-mailadres:</b></li>
          <li>info@snow.nl</li><br>
        </div>
      </div>

      <?php require_once('../lib/copyright.php'); ?>
    <?php require_once('../lib/footer.php'); ?>