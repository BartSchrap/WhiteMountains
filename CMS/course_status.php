<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <?php
              // get course from db
              $cid     = $_GET['id'];
              $cquery  = "SELECT * FROM courses WHERE id = '$cid'" ; 
              $cresult = mysqli_query($cnx, $cquery);
              $crow    = mysqli_fetch_array($cresult);
            ?>
            <h4 class="title">Aangemelde cursisten voor de course: <?php echo $crow['coursename'].' '.$crow['startdate'].' - '.$crow['enddate'] ;?></h4>
            <a href="print_page.php?id=<?php echo $crow['id'];?>">Print deze pagina</a>
          </div>
          <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
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
                  // select all users that booked this course
                  $query = "SELECT * FROM users INNER JOIN bookings ON users.id = user_id WHERE course_id = '$cid'" ; 
                  $result = mysqli_query($cnx, $query);
                  // loop through users that booked this course
                  while ($roww = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                      <td><?php echo $roww['email']; ?></td>                
                      <td><?php echo $roww['firstname'].' '.$roww['infix'].' '.$roww['lastname']; ?></td>
                      <td><?php echo $roww['address']; ?></td>
                      <td><?php echo $roww['postcode']; ?></td>
                      <td><?php echo $roww['city']; ?></td>
                      <td><?php echo $roww['phone']; ?></td>
                    </tr>
                  <?php 
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