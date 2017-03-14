<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Mijn Courses</h4>
            <p class="category">Lijst met Courses waarvoor ik me heb opgegeven</p>
          </div>
          <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
              <thead>
                <th>Naam</th>
              	<th>Beschrijving</th>
              	<th>Prijs</th>
              	<th>Begindatum</th>
              	<th>Einddatum</th>
              </thead>
              <?php
                $query = "SELECT * FROM courses INNER JOIN bookings ON courses.id = course_id WHERE user_id = ".$_SESSION['uid']; ; 
                $result = mysqli_query($cnx, $query);
                while ($select = mysqli_fetch_array($result)) {
                  echo '<tbody>';
                    echo '<td>'.$select['coursename'].'</td>';
                    echo '<td>'.$select['description'].'</td>';
                    echo '<td> €'.$select['price'].'</td>';
                    echo '<td>'.$select['startdate'].'</td>';
                    echo '<td>'.$select['enddate'].'</td>';
                  echo '</tbody>';
                }     // endwhile
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>