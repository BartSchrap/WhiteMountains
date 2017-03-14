<?php
// Prevent unauthorized direct acces.
//if (!defined('INC_ACCESS')) die ('Bad boy, unauthorized access!');

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $cnx   = mysqli_connect("localhost","root","root","snow");
  if (!$cnx) {
    die("Cannot connect:" .mysqli_connect_error());
  }
  $query  = "SELECT * FROM users WHERE email = '$email'" ; 
  $result = mysqli_query($cnx, $query);
  $row    = mysqli_fetch_array($result);

  //course_id for url
  $id  = $_GET['id'];
  $sid = $_SESSION['id'];

  if($row['role'] == 'customer'){
?>
<!--     <style>
      #admin_change_course{
        display:none;
      }
      #admin_delete_course{
        display:none;
      }
      #Co-Workers_nav{
        display:none;
      }
      #admin_add_course{
        display:none;
      }
      #gear_nav{
        display:none;
      }
      #admin_course_status{
        display:none;
      }
    </style> -->
<?php 
  }
}    
else{
  echo '<script>window.location = "./login.php";</script>'; 
}

?>
