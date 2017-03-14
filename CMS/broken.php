<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Bekijk kapotte gear</h4>
          </div>
          <div class="content">
            <form name="" action=" " method="post">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Broken Gear</label>
                  <?php
                    $query = "SELECT * FROM gear WHERE broken = 'true'" ; 
                    $gear  = mysqli_query($cnx, $query);
                    while ($gear = mysqli_fetch_array($result_course)) {
                  ?>
                      <li><?php echo $gear['id']; echo $gear['gearname']; ?></li>
                    <?php 
                    } 
                    ?> 
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

