<?php
// Prevent unauthorized direct acces.
//if (!defined('INC_ACCESS')) die ('Bad boy, unauthorized access!');
// Start session
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $cnx   = mysqli_connect("localhost","root","root","snow");
  if (!$cnx) {
    die("Can not Connect:" .mysqli_connect_error());
  }
  $query  = "SELECT * FROM users WHERE email = '$email'" ; 
  $result = mysqli_query($cnx, $query);
  $row    = mysqli_fetch_array($result);

  //course_id for url
  $id  = $_GET['id'];
  $sid = $_SESSION['id'];

  if ($row['role'] == 'admin'){
?>
    <style>
      #customer_intake_course{
        display:none;
      }
      #my_course_nav{
        display:none;
      }      
    </style>

<?php 
  }
}    
else{
  //  no admin, redirect to index page
  echo 'redirecting to index page....';
  newt_delay(2000);
  echo '<script>window.location = "./login.php";</script>'; 
}

// if you're logged in as customer and trying to access this page
// if ($row['role'] == 'customer'){
//   echo '<script>window.location = "../CMS/dashboard.php";</script>'; 
// }
?>
