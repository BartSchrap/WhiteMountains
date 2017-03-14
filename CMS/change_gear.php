<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">gear wijzigen</h4>
          </div>
          <div class="content">
            <?php
              $gid    = $_GET['id'];
              $query  = "SELECT * FROM courses INNER JOIN gear ON courses.id=course_id WHERE gear.id = '$gid'" ; 
              $result = mysqli_query($cnx, $query);
              $course = mysqli_fetch_array($result);
            ?>
            <form name="" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Naam</label>
                  <input type="text" value="<?php echo $course['gearname']; ?>" class="form-control" name="name" placeholder="Naam van de geartype..." required data-validation="required" data-validation-length="3-12"  data-validation-error-msg="Dit veld is verplicht">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>broken op dit moment: <?php echo $course['broken']; ?></label>
                  <select class="form-control" name="broken">
                    <option value="false">Nee</option>
                    <option value="true">Ja</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Capaciteit</label>
                  <input type="text" class="form-control" value="<?php echo $course['capacity']; ?>" name="capacity" placeholder="Aantal..." required data-validation="number"  data-validation-error-msg="Dit veld is niet goed ingevuld">
                </div>
              </div>
              <?php
                // selecteert alles van course
                $query = "SELECT * FROM courses"; 
                $result_course = mysqli_query($cnx, $query);
              ?>
              <div class="col-md-12">
                <div class="form-group">
                  <label>course</label>
                  <select class="form-control" name="gear_course">
                  <?php
                    // loop through query results
                    while ($course = mysqli_fetch_array($result_course)) {
                  ?>
                      <option value="<?php echo $course['id']; ?>"><?php echo $course['coursename'].' '.$course['startdate']; ?></option>
                      <?php 
                    } 
                      ?>    
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>geartype </label>
                  <select class="form-control" name="gear_type">
                    <option value="Snowboard">Snowboard</option>
                    <option value="Ski's">Ski's</option>
                    <option value="Tourski's">Tourski's</option>
                  </select>
                </div>
              </div>
              <input style="width:60%!important;" type="submit" class="form-control" value="course wijzigen" name="login" class="button" >
            </form>
            <?php 
             	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // get form input
                $name       = $_POST['name'];
                $broken     = $_POST['broken'];
                $gearcourse = $_POST['gear_course'];
                $capacity   = $_POST['capacity'];
                $geartype   = $_POST['gear_type'];
                $sql = "UPDATE gear SET course_id='$gearcourse', gearname='$name', geartype='$geartype', capacity='$capacity', broken='$broken' WHERE id = '$gid'"; 
                mysqli_query($cnx, $sql);
                echo mysqli_error($cnx);
                echo "Gear bijgewerkt";
              }                 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
