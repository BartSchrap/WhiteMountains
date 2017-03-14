<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Gear toevoegen</h4>
          </div>
          <div class="content">
            <form name="" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Naam</label>
                  <input type="text" class="form-control" name="name" placeholder="Naam van de gear..." required data-validation="required" data-validation-error-msg="Dit veld is verplicht">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Omschrijving </label>
                  <select class="form-control" name="description">
                  <input type="text" class="form-control" name="description" placeholder="Naam van de gear..." required data-validation="required" data-validation-error-msg="Dit veld is verplicht">
                   </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Categorie </label>
                  <select class="form-control" name="category">
                    <option value="Snowboard">Snowboard</option>
                    <option value="Skis">Ski's</option>
                    <option value="Tourskis">Tourski's</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Aantal</label>
                  <input type="text" class="form-control" name="number" placeholder="capaciteit van de gear..." required data-validation="number"  data-validation-error-msg="Dit veld is niet goed ingevuld">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kapot</label>
                  <select class="form-control" name="broken">
                    <option value="false">Nee</option>
                    <option value="true">Ja</option>
                  </select>
                </div>
              </div>
              <input style="width:60%!important;" type="submit" class="form-control" value="gear aanmaken" name="login" class="button" >
            </form>
            <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                $sql = "INSERT INTO gear (name,description,category,number,broken) 
  //                      VALUES ('$_POST['name']','$_POST['description']','$_POST['category']','$_POST['number']','$_POST['broken']')"; 
                mysqli_query($cnx, $sql);
                echo mysqli_error($cnx);
                echo "Gear added";
                sleep(3);
                echo '<meta http-equiv="refresh" content="0" />';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

