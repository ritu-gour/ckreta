
<?php
error_reporting(0);
?>


<?php

session_start();
 include('conn/config.php');
// include 'common/dbcon.php';


  if (isset($_POST['submit'])) {
    $admin_mail= $_POST['admin_mail'];
    $admin_pass = $_POST['admin_pass'];
    $email_search = "SELECT * FROM admin_login WHERE admin_mail='$admin_mail' AND admin_pass='$admin_pass'";
  
    $query = mysqli_query($conn, $email_search);
    $result1 = mysqli_fetch_assoc($query);
    $adm_id = $result1['adm_id'];
    $admin_mail = $result1['admin_mail'];
    $admin_pass = $result1['admin_pass'];
    // $role = $result1['role'];

  if ($adm_id == $adm_id && $admin_pass == $admin_pass) {

    $_SESSION['admin_mail'] =$admin_mail;
    $_SESSION['adm_id'] = $adm_id;
    // $_SESSION['role'] = $role;
   
    echo '<script type="text/javascript">';
    // echo 'alert("Login Sucess Fully");';
    echo 'window.location = "client/dashboard.php";';
    echo '</script>';
   
  } else {
    // echo '<script type="text/javascript">';
    // echo 'alert("User Name And Password Not Matched");';
    echo 'window.location = "index.php";';
    // echo '</script>';

    echo ' not Login';

  }
}
?>
