<?php
  // session_start();
  // if(!isset($_SESSION['dangnhap'])) {
  //   header('Location: indexLogin.php');
  // }
?>
<?php
  // if(isset($_GET['login'])) {
  //   $dangxuat = $_GET['login'];
  // }
  // else {
  //   $dangxuat = '';
  // }
  // if($dangxuat=='dangxuat') {
  //   unset($_SESSION['dangnhap']);
  //   header('Location: indexLogin.php');
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Admin</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <p>Xin chào <?php echo $_SESSION['dangnhap']?> <a href="?login=dangxuat">Đăng xuất</a></p>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Khách hàng</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>