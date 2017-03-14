<div class="content">
  <div class="container-fluid">
    <div class="row">
    <?php
      // retrieve course info
      $query = "SELECT * FROM courses WHERE id = '$id'" ; 
    	$result = mysqli_query($cnx, $query);

      //telt alle rows in de database 
      //$counterquery = "SELECT COUNT(user_id) AS counter_id FROM bookings WHERE course_id = 2 " ; 
    	//$counter = mysqli_query($cnx, $counterquery);
      //echo $counter['counter_id'];
      
      //loop through query results
  	  while ($course = mysqli_fetch_array($result)) {
    ?>
        <h4><?php echo $course['coursename']; ?></h4>
        <div class="decscription">
          <b>Beschrijving </b><?php echo $course['description']; ?>
        </div>
        <li><b>Niveau </b><?php echo $course['level']; ?></li>
        <li><b>Prijs </b>&euro; <?php echo $course['price']; ?>,-</li>
        <li><b>Startdatum </b><?php echo $course['startdate']; ?> t/m <?php echo $course['enddate']; ?></li>
        <form id="formulier" onsubmit="return confirm('Weet je zeker dat je je wil inschrijven voor deze course?');" action=" " method="post">
          <br><input type="submit" name="Inschrijven" class="right_setting"  value="Inschrijven">
        </form>
        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // kijkt of je niet al ingeschreven bent
            if ($sid == $roww['user_id']& $id == $roww['course_id']) {
              echo "al ingeschreven";  
            }   
            else{
              $sql = "INSERT INTO bookings (user_id,course_id) VALUES ('$sid','$id')";
              mysqli_query($cnx, $sql);
              echo mysqli_error($cnx);
              echo 'ingeschreven'; 
            }
          }
        }     // endwhile
        ?>
    </div>
  </div>
</div>