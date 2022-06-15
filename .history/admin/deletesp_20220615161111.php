<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php
if (isset($_GET['xoa'])) {
  $id = $_GET['xoa'];
  $sql_delete_sp = mysqli_query($con, "DELETE FROM tbl_sanpham WHERE sanpham_id = '$id'");
  
}
header('Location: xulysanpham?m=1')
?>