<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <?php
              $role        = $_GET['showrole'];
              $other_role  = $role == 'admin' ? 'customer'   : 'admin';
              $role_title  = $role == 'admin' ? 'Beheerders' : 'Deelnemers';
              $other_title = $role == 'admin' ? 'Deelnemers' : 'Beheerders';
            ?>
            <h4 class="title"><?php echo $role_title;?></h4>
            <p class="category">De totale lijst met <?php echo $role_title;?></p>
            <div class="container">
              <?php if ($_SESSION['role'] == 'admin') { ?>
                <a id="add_user" href="dashboard.php?page=add_user">Voeg gebruiker toe</a><br>
                <a href="dashboard.php?page=users&showrole=<?php echo $other_role;?>">Switch naar de <?php echo $other_title;?></a>
              <?php }   // endif ?>
            </div>
          </div>
          <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
              <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Ervaring</th>
                <th>Rol</th>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
              </thead>
              <tbody>
                <a href="#">
                <?php
                  $uid    = $_SESSION['uid'];
                  $query  = "SELECT * FROM users WHERE role = '".$role."'" ; 
                  $result = mysqli_query($cnx, $query);
                  while ($select = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>'.$select['id'].'</td>';
                    echo '<td>'.$select['email'].'</td>';
                    echo '<td>'.$select['level'].'</td>';
                    echo '<td>'.$select['role'].'</td>';
                    echo '<td>'.$select['firstname'].'</td>';
                    echo '<td>'.$select['infix'].'</td>';
                  	echo '<td>'.$select['lastname'].'</td>';
                ?>
                    <td><a href="dashboard.php?page=change_user&id=<?php echo $select[id]; ?>">Wijzig</a> </td>
                    <td id="admin_delete_course">
                      <form onsubmit="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?');" id="formulier" action="dashboard.php?page=users&showrole=<?php echo $role; ?>&id=<?php echo $select['id'];?>" method="post">
                        <input type="submit" value="Verwijder" class="btn btn-info btn-fill">
                      </form>
                    </td>
                  </tr>
                <?php
                }
                ?>
                <?php 
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $del_u = "DELETE FROM users WHERE id = '".$_GET['id']."'";
                    mysqli_query($cnx, $del_u);
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>