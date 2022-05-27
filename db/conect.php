<!-- kết nối cơ sở dữ liệu -->
<?php
// $con = mysqli_connect("localhost","username","password","db_name");

// // Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }
?>

<?php
$con = mysqli_connect("localhost","root","","bando_dienmay");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>