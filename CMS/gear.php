<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Gear</h4>
            <p class="category">De totale lijst met gear</p>
            <div class="container">
              <?php if ($_SESSION['role'] == 'admin') { ?>
                <a id="admin_add_gear" href="dashboard.php?page=add_gear">Voeg gear toe</a><br>
                <a id="admin_view_broken" href="dashboard.php?page=broken">Bekijk de kapotte gear</a>
              <?php }   // endif ?>
            </div>
          </div>
<!-- Build table -->
          <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
              <thead>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Categorie</th>
                <th>Aantal</th>
              	<th>Kapot</th>                   
              </thead>
              <?php
                // select gear
                $select = "SELECT * FROM gear;" ; 
                $result = mysqli_query($cnx, $select);
              ?>
              <tbody>
              <?php
                // list table results
                while ($gear = mysqli_fetch_array($result)) {
                  echo '<tr>';
                    echo '<td>'.$gear['name'].'</td>';
                    echo '<td>'.$gear['description'].'</td>';
                    echo '<td>'.$gear['category'].'</td>';
                    echo '<td>'.$gear['number'].'</td>';
                    $br = $gear['broken'] ? 'ja' : 'nee';
                    echo '<td>'.$br.'</td>';
                    // user is admin, show edit and delete controls
                    if ($_SESSION['role'] == 'admin') {
              ?>
                    <td id="admin_change_gear"><a href="dashboard.php?page=change_gear&id=<?php echo $gear['id']; ?>">Wijzig</a></td>
                    <td id="admin_delete_gear">
                      <form onsubmit="return confirm('Weet u zeker dat u deze gear wilt verwijderen?');" id="formulier" action="dashboard.php?page=gear&id=<?php echo $gear['id'];?>" method="post">
                        <input type="submit" value="Verwijder">
                      </form>
                    </td>
                    <?php 
                    }     // endif 
                  echo '</tr>';
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sdl2 = "DELETE FROM gear WHERE id = '".$_GET['id']."'";
                    $delete = mysqli_query($cnx, $sdl2);
                  }
                }   // endwhile
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>