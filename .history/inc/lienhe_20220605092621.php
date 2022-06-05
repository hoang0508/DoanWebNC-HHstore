<?php
  include './db/conect.php';
?>
<?php
  if(isset($_POST['submit-contact'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address= $_POST['adress'];
    $note = $_POST['write'];

    $sql_lienhe = mysqli_query($con, "INSERT INTO `tbl_lienhe`(`name`, `email`, `sdt`, `diachi`, `ghichu`) VALUES ('$name','$email','$phone','$address','$note')");
  }
?>
