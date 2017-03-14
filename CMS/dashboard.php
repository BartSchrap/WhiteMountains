<?php
	session_start();
	if (isset($_SESSION['email'])) {
		$email 	= $_SESSION['email'];
		require_once("../lib/connect_db.php");		// connect db
		// $query	= "SELECT * FROM users WHERE email = '$email'" ; 
		// $result = mysqli_query($cnx, $query);
		// $row		= mysqli_fetch_array($result);
		
	}
	else{
		//echo '<script>window.location = "./login.php";</script>'; 
	}

/****************************************
 * Different page through Same PHP script using URL Variables by GET method
*****************************************/
?>
<?php require_once('../lib/header.php'); ?>
	<body>
		<?php require_once('../lib/jsassets.php'); ?>
		<div class="wrapper">
<!-- Build sidebar -->
			<div class="sidebar" data-color="purple" data-image="../assets/img/trees1.jpg">
				<!-- you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
				<div class="sidebar-wrapper">
					<div class="logo">
						<a href="dashboard.php?page=courses" class="simple-text">
						<img src="../assets/img/logo.png" alt="logo">
						</a>
					</div>
					<ul class="nav">
						<li>
							<a href="dashboard.php?page=courses">
							<i class="pe-7s-note2"></i>
							<p>Courses</p>
							</a>
						</li>
						<li id="gear_nav">
							<a href="dashboard.php?page=gear">
							<i class="pe-7s-tools"></i>
							<p>Gear</p>
							</a>
						</li>
						<?php
							if ($_SESSION['role'] == 'admin') {
						?>
								<li id="Co-Workers_nav">
									<a href="dashboard.php?page=users&showrole=admin">
									<i class="pe-7s-users"></i>
									<p>Administrators</p>
									</a>
								</li>
								<li id="Users_nav">
									<a href="dashboard.php?page=users&showrole=customer">
									<i class="pe-7s-users"></i>
									<p>Participants</p>
									</a>
								</li>
								<li id="Revenue_nav">
									<a href="dashboard.php?page=income">
									<i class="pe-7s-piggy"></i>
									<p>Revenues</p>
									</a>
								</li>
						<?php
							}
							if ($_SESSION['role'] == 'customer') {
						?>
								<li id="my_course_nav">
									<a href="dashboard.php?page=my_courses">
									<i class="pe-7s-photo-gallery"></i>
									<p>My Courses</p>
									</a>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
<!-- Build Main Panel -->
			<div class="main-panel">
<!-- Build Navigation Bar -->
				<nav class="navbar navbar-default navbar-fixed">
					<div class="container-fluid">
						<div class="navbar-header" style="margin-left: 40%;">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="">White Mountains</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							 			<span> Welkom, <?php echo $_SESSION['firstname']; ?></span>
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<li><a href="dashboard.php?page=change_user&id=<?php echo $_SESSION['uid'];?>">my Account</a></li>
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				
<!-- Build Page Content -->
				<?php
					// $allowedPages = array('gear', 'courses', 'users', 'coworkers','course_status','change_course');
					// $page = in_array($_GET['page'], $allowedPages) ? $_GET['page'] : 'login';
					//mainPanel($page);					// Build and fill main panel
					$page = $_GET['page'];
					//$cid = $_GET['id'];
					require_once($page.'.php');
					require_once('../lib/copyright.php');
					require_once('../lib/footer.php');
				?>
