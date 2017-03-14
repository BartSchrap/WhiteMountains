<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Aangemelde cursisten voor de course: <?php echo $row_course['coursename'];?></h4>
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
                  $result = mysqli_query($cnx, $query);
	                  while ($roww = mysqli_fetch_array($result)) {
                ?>         
                      <td><?php echo $roww['email']; ?>    </td>                
                      <td><?php echo $roww['firstname'].' '.$roww['infix'].' '.$roww['lastname']; ?></td>
                      <td><?php echo $roww['address']; ?>  </td>
                      <td><?php echo $roww['postcode']; ?> </td>
                      <td><?php echo $roww['city']; ?>     </td>
                      <td><?php echo $roww['phone']; ?></td>                        
                      <?php 
                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $sdl = "DELETE FROM courses WHERE id = '$roww[id]'";
                        mysqli_query($cnx, $sdl);
                        $sdl3 = "DELETE FROM bookings WHERE course_id = '$roww[id]'";
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
  