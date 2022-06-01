<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php
  if(isset($_POST['capnhattaikhoan'])) {
    $xuly = $_POST['xuly'];
    $id = $_POST['capquyen_id'];

    $sql_update_taikhoan = mysqli_query($con, "UPDATE tbl_admin SET capquyen = '$xuly' WHERE admin_id = '$id'");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Đơn hàng</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
             <?php
              include("2404/menu.php");
              include("2404/top.php");
              ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
          <div class="container">
    <div class="row">
       <?php
        if(isset($_GET['quanly'])=='xemtaikhoan') {
          $id = $_GET['id'];
          $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_admin WHERE admin_id = '$id'");
        ?> 
        <div class="col-md-12 mb-3">
          <p style="font-size: 20px;">Xem chi tiết tài khoản</p>
                <form action="" method="POST">
            <table class="table table-bordered">
            <tr style="text-align:center">
              <th>STT</th>
              <th>Email</th>
              <th>Password</th>
              <th>Tên tài khoản</th>
            </tr>
            <?php
            $i= 0;
              while($row_taikhoan = mysqli_fetch_array($sql_chitiet)){
                $i++;
            ?>
               <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_taikhoan['email'] ?></td>
              <td><?php echo $row_taikhoan['password'] ?></td>
              <td><?php echo $row_taikhoan['admin_name'] ?></td>
              <input type="hidden" name="capquyen_id" value="<?php echo $row_taikhoan['admin_id'] ?>">
              </tr>
              <?php
              }
              ?>
                  </table>
                  <select name="xuly" id="" class="form-control">
              <option value="1">Đã cấp quyền</option>
              <option value="0">Chưa cấp quyền</option>
            </select>
            <br>
            <input type="submit" value="Cấp quyền tài khoản" class="btn btn-success" name="capnhattaikhoan">
          </form>
        </div>
        <?php
        } else {
         ?> 
         
        <?php
        }
        ?>
      <div class="col-md-12">
      <h4>Danh sách tài khoản</h4>
      <?php
        $sql_select = mysqli_query($con, "SELECT * FROM tbl_admin");
      ?>
        <table class="table table-bordered">
          <tr style="text-align:center">
            <th>STT</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Tên tài khoản</th>
            <th>Cấp quyền</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i= 0;
            while($row_taikhoan = mysqli_fetch_array($sql_select)){
              $i++;
          ?>
            <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_taikhoan['email'] ?></td>
              <td><?php echo $row_taikhoan['password'] ?></td>
              <td><?php echo $row_taikhoan['admin_name'] ?></td>
              <td><?php 
                if($row_taikhoan['capquyen'] == 0) {
                  echo 'Chưa cấp quyền';
                }
                else {
                  echo 'Đã cấp quyền';
                }
               ?>
               </td>
              <td style="text-align: center;"><a style="font-size: 14px;display:block;" href="?xoa=<?php echo $row_taikhoan['admin_id'] ?>" class="btn btn-danger mb-2">Xóa</a> <a href="?quanly=xemtaikhoan&id=<?php echo $row_taikhoan['admin_id'] ?>" style="font-size: 14px;display:block" class="btn btn-primary">Xem tài khoản</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
      </div>
    </div>
  </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @coppyright Bản quyền thuộc by <a href="https://colorlib.com">Huy Hoàng</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
