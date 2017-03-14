<div class="content">
  <?php
    // selecteer alles van user where id uit de url is
    if ($_SESSION[role] == 'customer') {
      $uid = $_SESSION[uid];
    }
    else {
      $uid = $_GET['id'];
    }
    $query  = "SELECT * FROM users WHERE id = '$uid'" ; 
    $select = mysqli_query($cnx, $query);
    $user   = mysqli_fetch_array($select);
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Profielgegegevens <?php echo $user[email]; ?></h4>
          </div>
          <div class="content">
            <form name="login" action=" " method="post">
              <div class="row" style="padding-left: 20px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Emailadres</label>
                    <input type="text" class="form-control" placeholder="Email" value="<?php echo $user[email]; ?>" readonly>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rol</label>
                      <select class="form-control" name="role">
                        <option value="customer" <?php if($user[role] == 'customer') echo "selected='selected'";?> >Deelnemer</option>
                        <option value="admin"    <?php if($user[role] == 'admin')    echo "selected";?> >Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Niveau</label>
                      <select class="form-control" name="level">
                        <option value="beginner"     <?php if($user[level] == 'beginner')     echo "selected='selected'";?> >Beginner</option>
                        <option value="intermediate" <?php if($user[level] == 'intermediate') echo "selected='selected'";?> >Gemiddeld</option>
                        <option value="advanced"     <?php if($user[level] == 'advanced')     echo "selected='selected'";?> >Gevorderd</option>
                      </select>
                    </div>
                  </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Voornaam</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Voornaam" value="<?php echo $user[firstname]; ?>" data-validation="length alphanumeric" data-validation-length="3-12"  data-validation-error-msg="Voornaam is een verplicht veld">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tussenvoegsel</label>
                    <input type="text" class="form-control"  name="infix" placeholder="Tussenvoegsel" value="<?php echo $user[infix]; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Achternaam</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $user[lastname]; ?>" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Achternaam is een verplicht veld">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="address" placeholder="Adres" value="<?php echo $user[address]; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $user[postcode]?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Plaats</label>
                    <input type="text" class="form-control" name="city" placeholder="Plaatsnaam" value="<?php echo $user[city]; ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $user[phone]; ?>">
                  </div>
                </div>
              </div>
              <a href="dashboard.php?page=users&showrole=<?php echo $user[role]; ?>" class="btn btn-info btn-fill pull-left">Back</a>
              <button type="submit" name="changeprofile" class="btn btn-info btn-fill pull-right">Update Profiel</button>
              <div class="clearfix"></div>
            </form>
            <?php 
           	if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // update database
              $sql = "UPDATE users SET role='$_POST[role]', level='$_POST[level]', firstname='$_POST[firstname]', infix='$_POST[infix]', lastname='$_POST[lastname]', address='$_POST[address]', postcode='$_POST[postcode]', city='$_POST[city]', phone='$_POST[phone]' WHERE id= '$uid'";
              mysqli_query($cnx, $sql);
              echo mysqli_error($cnx);
              echo '<script>window.location = "dashboard.php?page=users&showrole='.$_SESSION[role].'";</script>';
              echo "User bijgwerkt!";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>