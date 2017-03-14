<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">course wijzigen</h4>
          </div>
          <div class="content">
            <?php
              $cid    = $_GET['id'];
              $query  = "SELECT * FROM courses WHERE id = '$cid'" ; 
              $result = mysqli_query($cnx, $query);
              $course = mysqli_fetch_array($result);
            ?>
            <form name="" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Naam</label>
                  <input type="text" value="<?php echo $course['coursename']; ?>" class="form-control" name="name" placeholder="Naam van de course..." required data-validation="required" data-validation-length="3-12"  data-validation-error-msg="Dit veld is verplicht">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Beschrijving</label>
                  <textarea class="form-control"  name="description" placeholder="Beschrijving van de course..." required data-validation="required" data-validation-length="3-12" data-validation-error-msg="Dit veld is verplicht"><?php echo $course['description']; ?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Prijs</label>
                  <input type="number" value="<?php echo $course['price']; ?>" class="form-control" name="price" step="0.01" data-validation="required" data-validation-error-msg="Dit is geen geldig bedrag"  />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Startdatum</label>
                  <input type="date" value="<?php echo $course['startdate']; ?>" name="startdate" class="form-control" placeholder="startdatum van de course..." required  data-validation="date"  data-validation-help="yyyy-mm-dd" data-validation-error-msg="Geen geldige invoer">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Einddatum</label>
                  <input type="date" value="<?php echo $course['enddate']; ?>" name="enddate" class="form-control" placeholder="einddatum van de course..." required data-validation="date"  data-validation-help="yyyy-mm-dd" data-validation-error-msg="Geen geldige invoer">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Niveau op dit moment: <?php echo $course['level']; ?></label>
                  <select class="form-control" name="level">
                    <option value="beginner">Beginner</option>
                    <option value="advanced">Ervaren</option>
                  </select>
                </div>
              </div>
              <input style="width:60%!important;" type="submit" class="form-control" value="course veranderen" name="login" class="button" >
            </form>
            <?php 
             	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // get form inputs
                $name      = $_POST['name'];
                $desc      = $_POST['description'];
                $price     = $_POST['price'];
                $startdate = $_POST['startdate'];
                $enddate   = $_POST['enddate'];
                $level     = $_POST['level'];
                $sql = "UPDATE courses SET coursename='$name', description='$desc', price='$price', startdate='$startdate', enddate='$enddate', level='$level' WHERE id = '$cid'"; 
                mysqli_query($cnx, $sql);
                echo '<script>window.location = "dashboard.php?page=change_course&id='.$cid.'";</script>';
                echo mysqli_error($cnx);
                echo "Course bijgewerkt";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>