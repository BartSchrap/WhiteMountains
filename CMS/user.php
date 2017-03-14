<!-- input of new user data -->

<!-- Build list in main panel -->
<div class="content">
  <?php
    //selecteert alles van de ingelogde gebruiker met de sessie id
    $query = "SELECT * FROM users WHERE id = '$sid'" ; 
    $result2 = mysqli_query($cnx, $query);
    $roww = mysqli_fetch_array($result2);
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Profielgegegevens <?php echo $_SESSION['email'];   ?></h4>
          </div>
          <div class="content">
            <form name="login" action=" " method="post">
              <div class="row" style="padding-left: 15px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>emailadres</label>
                    <input type="text" class="form-control" placeholder="Emailadres" value="<?php echo $roww['email']; ?>" readonly>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Voornaam</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Roepnaam" value="<?php echo $roww['firstname']; ?>" data-validation="length alphanumeric" data-validation-length="3-12"  data-validation-error-msg="Voornaam is een verplicht veld">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tussenvoegsel</label>
                    <input type="text" class="form-control"  name="infix" placeholder="Tussenvoegsel" value="<?php echo $roww['infix']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Achternaam</label>
                    <input type="text" class="form-control" name="lastname" placeholder="achternaam" value="<?php echo $roww['lastname']; ?>" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Achternaam is een verplicht veld">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="address" placeholder="Adres" value="<?php echo $roww['address']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $roww['postcode']?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Woonplaats</label>
                    <input type="text" class="form-control" name="city" placeholder="Woonplaats" value="<?php echo $roww['city']; ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" class="form-control" name="telefoon" value="<?php echo $roww['phone']; ?>">
                  </div>
                </div>
              </div>
              <button type="submit" name="changeprofile" class="btn btn-info btn-fill pull-right">Update Profiel</button>
              <a id="admin_create" href="dashboard.php?page=add_user" style="margin:0px 10px;" class="btn btn-info btn-fill pull-right">Beheerder aanmaken</a>
              <a id="admin_list" href="dashboard.php?page=users" class="btn btn-info btn-fill pull-right">Bekijk beheerders</a>
              <div class="clearfix">
              </div>
            </form>
            <?php 
             	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // get form data
                $new_firstname = $_POST['firstname'];
                $new_infix     = $_POST['infix'];
                $new_lastname  = $_POST['lastname'];
                $new_address   = $_POST['address'];
                $new_postcode  = $_POST['postcode'];
                $new_city    = $_POST['city'];
                $new_phone = $_POST['phone'];
                // update user
                $sql = "UPDATE users SET firstname='$new_firstname',lastname='$new_lastname',infix='$new_infix', address='$new_address', postcode='$new_postcode', city='$new_city', phone='$new_phone' WHERE id= '$sid'";
                mysqli_query($cnx, $sql);
                echo mysqli_error($cnx);  
                echo '<script>window.location = "user.php";</script>';
              }
            ?>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>