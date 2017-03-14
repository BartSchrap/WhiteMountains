<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">course toevoegen</h4>
          </div>
          <div class="content">
            <form name="" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Naam</label>
                  <input type="text" class="form-control" name="name" placeholder="Naam van de course..." required data-validation="required"   data-validation-error-msg="Dit veld is verplicht">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Beschrijving</label>
                  <textarea class="form-control" name="description" placeholder="Beschrijving van de course..." required data-validation="required"  data-validation-error-msg="Dit veld is verplicht">
                  </textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Prijs</label>
                  <input type="number" class="form-control" name="price" step="0.01" data-validation="required" data-validation-error-msg="Prijs kloptniet" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Startdatum vanaf april:</label>
                  <input type="date" name="startdate" class="form-control" placeholder="startdatum van de course..." required  data-validation="date"  data-validation-help="yyyy-mm-dd" data-validation-error-msg="begindatum klopt niet">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Einddatum tot oktober</label>
                  <input type="date" name="enddate" class="form-control" placeholder="einddatum van de course..." required  data-validation="date"  data-validation-help="yyyy-mm-dd" data-validation-error-msg="einddatum is verplicht">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Niveau</label>
                  <select class="form-control" name="level">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Gemiddeld</option>
                    <option value="advanced">Ervaren</option>
                  </select>
                </div>
              </div>
              <input style="width:60%!important;" type="submit" class="form-control" value="course aanmaken" name="login" class="button" >
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
              $gear      = $_POST['gear'];
          
              // get course data from db based on form data
              $query = "SELECT * FROM course WHERE coursename = '$name'" ; 
              $result = mysqli_query($cnx, $query);
              $course = mysqli_fetch_array($result);
              
              // add check: Does course have data, is startdate eq. to db startdate, then course already exists. Show error and retry
            
              // als er geen fouten zijn
              //if($error === false){
                $sql = "INSERT INTO courses (coursename,description,level,price,startdate,enddate) 
                    VALUES ('$_POST[name]','$_POST[description]','$_POST[level]','$_POST[price]','$_POST[startdate]','$_POST[enddate]')"; 
                mysqli_query($cnx, $sql);
                echo mysqli_error($cnx);
                echo "course aangemaakt!";
            }  
            ?> 
      </div>
    </div>
  </div>
</div>
