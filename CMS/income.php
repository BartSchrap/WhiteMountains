<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Inkomsten</h4>
          </div>
          <div class="content">
            <form name="" action=" " method="post">
              <div class="form-group">
                <div class="col-md-6">
                  <label>Begindatum</label>
                  <input type="date" name="startdate" class="form-control" placeholder="Begindatum van de periode..." required  data-validation="date"  data-validation-help="yyyy-mm-dd">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Einddatum</label>
                    <input type="date" name="enddate" class="form-control" placeholder="Einddatum van de periode..." required  data-validation="date"  data-validation-help="yyyy-mm-dd">
                  </div>
                </div>
                <input style="width:25%!important;" type="submit" class="form-control" value="Inkomsten opvragen" name="login" class="button" >
              </div>
            </form>
            <table>
            <?php 
             	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // get form inputs
                $startdate = $_POST['startdate'];
                $enddate   = $_POST['enddate'];
                //select courses from input startdate to input enddate
                $query2   = "SELECT * FROM courses WHERE startdate > '$startdate' AND enddate < '$enddate'" ; 
                $result2  = mysqli_query($cnx, $query2);
                while ($roww2 = mysqli_fetch_array($result2)) {
                  ?>
                  <tr>
                    <td><?php echo $roww2['coursename'];?> </td>
                    <td>&nbsp; &euro; <?php echo $roww2['price'];?> </td>
                  </tr>
                  <?php
                }
                // select sum of course prices within date range
                $query  = "SELECT SUM(price) AS value_sum FROM courses WHERE startdate > '$startdate' AND enddate < '$enddate'" ; 
                $result = mysqli_query($cnx, $query);
                $roww   = mysqli_fetch_array($result);
                //output total price
                ?>
            <h3>Totaal: &euro;<?php echo $roww['value_sum'];?>,-<h3>
                <?php
              }     // endif
            ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>