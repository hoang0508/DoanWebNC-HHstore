<?php
  if(isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
  }
  else {
    $dangxuat = '';
  }
  if($dangxuat=='dangxuat') {
    unset($_SESSION['dangnhap_home']);
    header('Location: ./index.php');
  }
?>