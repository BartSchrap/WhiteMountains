<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Courses</h4>
						<p class="category">De totale lijst met courses</p>
						<div class="container">
							<?php if ($_SESSION['role'] == 'admin') { ?>
              	<a id="admin_add_course" href="dashboard.php?page=add_course">Voeg course toe</a><br>
								<a id="admin_view_income" href="dashboard.php?page=income">Bekijk de inkomsten</a>
              <?php }   // endif ?>
						</div>
					</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped">
							<thead>
								<th>Naam</th>
								<th>Beschrijving</th>
								<th>Prijs</th>
								<th>Begindatum</th>
								<th>Einddatum</th>
								<th>Aanmeldingen</th>
							</thead>
							<tbody> 
								<?php
									$query = "SELECT * FROM courses WHERE startdate >= CURDATE()"; 
									$result = mysqli_query($cnx, $query);
									while ($select = mysqli_fetch_array($result)) {
								?> 
										<tr>
											<?php
												echo '<td>'.$select['coursename'].'</td>';
												echo '<td>'.$select['description'].'</td>';
												echo '<td>'.$select['price'].'</td>';
												echo '<td>'.$select['startdate'].'</td>';
												echo '<td>'.$select['enddate'].'</td>';
												$countq 	= "SELECT COUNT(*) FROM bookings WHERE course_id = '".$select['id']."'";
												$countres	= mysqli_query($cnx, $countq);
												$count 		= mysqli_fetch_array($countres);
												echo '<td>'.$count[0].'</td>';
												// user is admin, show detail, edit and delete controls
											if ($_SESSION['role'] == 'admin') {
											?>
												<td id="admin_course_status">
													<a href="dashboard.php?page=course_status&id=<?php echo $select['id']; ?>">Detail</a>
												</td>
												<td id="admin_change_course">
													<a href="dashboard.php?page=change_course&id=<?php echo $select['id'];?>">Wijzig</a>
												</td>
												<td id="admin_delete_course">
													<form onsubmit="return confirm('Weet u zeker dat u deze course wil verwijderen?');" id="delete_course" action="dashboard.php?page=courses&id=<?php echo $select['id'];?>" method="post">
														<input type="submit" value="Verwijder">
													</form>
												</td>
												<?php
											}
											if ($_SESSION['role'] == 'customer') {
												?>
													<td id="customer_book_course">
														<form onsubmit="return confirm('Weet je zeker dat je je wilt aanmelden voor deze course?');" id="book_course" action="dashboard.php?page=courses&id=<?php echo $select['id'];?>" method="post">
							          			<input type="submit" name="Aanmelden" class="right_setting"  value="Aanmelden">
														</form>
													</td>
												<?php
											}
										echo '</tr>';
									}			// endwhile
									// Check and delete selected courses and corresponding gear assignments
									if ($_SESSION['role'] == 'admin') {
										if ($_SERVER["REQUEST_METHOD"] == "POST") {
											$queryyy 	 = "SELECT * FROM bookings WHERE course_id = '".$course_id."'" ; 
											$course_id = $_GET['id'];
											$resulttt	 = mysqli_query($cnx, $queryyy);
											$delcourse = mysqli_fetch_array($resulttt);
											if($delcourse['course_id'] == $course_id) { 
												echo "Course kan niet worden verwijderd; er zijn cursisten ingeschreven";
											}
											else{
												$del_g 	= "DELETE FROM gear_assignments WHERE course_id = '".$_GET['id']."'";
												mysqli_query($cnx, $del_g);
												$del_c 	= "DELETE FROM courses WHERE id = '".$_GET['id']."'";
												mysqli_query($cnx, $del_c);
												echo '<script>window.location = "dashboard.php?page=courses";</script>'; 
											}
										}
									}
									// Check if booking already exists; if not, add it
									if ($_SESSION['role'] == 'customer') {
										if ($_SERVER["REQUEST_METHOD"] == "POST") {
											$select = "SELECT * FROM bookings WHERE
											  user_id = '".$_SESSION['uid']."' AND course_id = '".$_GET['id']."';";
    									$result = mysqli_query($cnx, $select);
			                // if query was successful and not empty
      			          if ($result && mysqli_num_rows($result) > 0) {
            			      echo "Je bent al ingeschreven voor deze course!";
            				  }
               				else {
               					$insert = "INSERT INTO bookings (user_id, course_id)
               					 VALUES (".$_SESSION['uid'].", ".$_GET['id'].");";

					              mysqli_query($cnx, $insert);
					              echo $insert;
					              echo mysqli_error($cnx);
					              echo 'Top! Je bent ingeschreven'; 
					            }			// endif query successful
                		}			// endif request posted
				          }			// endif role = customer
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>