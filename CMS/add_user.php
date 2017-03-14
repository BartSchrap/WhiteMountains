<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Maak een nieuwe gebruiker aan</h4>
          </div>
          <div class="content">
            <form name="login" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Emailadres</label>
                  <input type="email" class="form-control" name="email" placeholder="EMAIL" required data-validation="email" data-validation-error-msg="Geen geldige Email">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Wachtwoord</label>
                  <input type="password" class="form-control" name="password" placeholder="PASSWORD" required data-validation="strength" data-validation-strength="2" data-validation-error-msg="Wachtwoord niet sterk genoeg">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Herhaal wachtwoord</label>
                  <input type="password" class="form-control" name="cpassword" placeholder="PASSWORD" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Wachtwoorden komen niet overeen">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Rol</label>
                  <select class="form-control" name="role">
                    <option value="customer">Deelnemer</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Niveau</label>
                  <select class="form-control" name="level">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Gemiddeld</option>
                    <option value="advanced">Gevorderd</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Voornaam</label>
                  <input type="text" name="firstname" placeholder="Voornaam..." class="form-control" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Voornaam is een verplicht veld" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tussenvoegsel</label>
                  <input type="text" name="infix" placeholder="Achternaam..." class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Achternaam</label>
                  <input type="text" name="lastname" placeholder="Achternaam..." class="form-control" data-validation="length alphanumeric"  data-validation-length="3-12"  data-validation-error-msg="Achternaam is een verplicht veld" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Adres</label>
                  <input type="text" name="address" placeholder="Adres..." class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Postcode</label>
                  <input type="text" name="postcode" placeholder="Postcode..." class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Plaats</label>
                  <input type="text" name="city" placeholder="Plaats..." class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Telefoon</label>
                  <input type="text" name="phone" placeholder="Telefoon..." class="form-control" >
                </div>
              </div>
              <input style="width:60%!important;" type="submit" class="form-control" value="ACCOUNT AANMAKEN" name="login" class="button" >
            </form>
            <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // get email from form input
                $email  = $_POST['email'];
                $select = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($cnx, $select);
                // if query was successful and not empty
                if ($result && mysqli_num_rows($result) > 0) {
                  echo "Deze gebruiker bestaat al";
                  exit;
                }
                $mdpassword = md5($_POST['password']);   //encrypt input password
                $insert = "INSERT INTO users (email,password,level,role,firstname,infix,lastname,address,postcode,city,phone,active) 
                           VALUES ('$email','$mdpassword','$_POST[level]','$_POST[role]','$_POST[firstname]','$_POST[infix]','$_POST[lastname]','$_POST[address]','$_POST[postcode]','$_POST[city]','$_POST[phone]','TRUE')";
                mysqli_query($cnx, $insert);
                echo mysqli_error($cnx);
                echo "User aangemaakt!";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>