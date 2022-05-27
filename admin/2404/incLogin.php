<?php
  session_start();
  if(!isset($_SESSION['dangnhap'])) {
    header('Location: ./index.php');
  }
?>
<?php
  if(isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
  }
  else {
    $dangxuat = '';
  }
  if($dangxuat=='dangxuat') {
    unset($_SESSION['dangnhap']);
    header('Location: index.php');
  }
?>