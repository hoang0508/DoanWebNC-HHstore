<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php
  if(isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];

    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET trangthai = '$xuly' WHERE mahang = '$mahang'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET tinhtrangdon = '$xuly' WHERE magiaodich = '$mahang'");
  }
?>
<?php
    if(isset($_GET['xoa'])) {
      $id = $_GET['xoa'];

      $sql_delete_donhang = mysqli_query($con, "DELETE FROM tbl_donhang WHERE donhang_id = '$id'");
    }
    if(isset($_GET['xacnhanhuy']) && $_GET['mahang']) {
      $huydon = $_GET['xacnhanhuy'];
      $magiaodich = $_GET['mahang'];
    }
    else {
      $huydon = "";
      $magiaodich = "";
    }
    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon = '$huydon' WHERE mahang= '$magiaodich'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon = '$huydon' WHERE magiaodich= '$magiaodich'");
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
        if(isset($_GET['quanly'])=='xemdonhang') {
          $mahang = $_GET['mahang'];
          $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id AND tbl_donhang.mahang = '$mahang' group by donhang_id DESC");
        ?> 
        <div class="col-md-12 mb-3">
          <p style="font-size: 20px;">Xem chi tiết đơn hàng</p>
                <form action="" method="POST">
            <table class="table table-bordered">
            <tr style="text-align:center">
              <th>STT</th>
              <th>Mã hàng</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
              <th>Ngày tháng đặt</th>
              <!-- <th>Quản lý</th> -->
            </tr>
            <?php
            $i= 0;
              while($row_donhang = mysqli_fetch_array($sql_chitiet)){
                $i++;
            ?>
              <tr style="text-align:center">
                <td><?php echo $i ?></td>
                <td><?php echo $row_donhang['mahang'] ?></td>
                <td><?php echo $row_donhang['sanpham_name'] ?></td>
                <td><?php echo $row_donhang['soluong'] ?></td>
                <td><?php echo number_format($row_donhang['sanpham_giakhuyenmai']).'vnđ' ?></td>
                <td><?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_giakhuyenmai']).'vnđ'?></td>
                <td><?php echo $row_donhang['ngaythang'] ?></td>
                <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
              </tr>
              <?php
              }
              ?>
                  </table>
                  <select name="xuly" id="" class="form-control">
              <option value="1">Đã xử lý</option>
              <option value="0">Chưa xử lý</option>
            </select>
            <br>
            <input type="submit" value="Cập nhật đơn hàng" class="btn btn-success" name="capnhatdonhang">
          </form>
        </div>
        <?php
        } else {
         ?> 
         
        <?php
        }
        ?>
      <div class="col-md-12">
      <h4>Danh sách đơn hàng</h4>
      <?php
        $sql_select = mysqli_query($con, "SELECT *, SUM(tbl_donhang.soluong*tbl_sanpham.sanpham_giakhuyenmai) AS 'tongtien'  FROM tbl_donhang, tbl_sanpham, tbl_khachhang WHERE tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id AND tbl_khachhang.khachhang_id = tbl_donhang.khachhang_id  GROUP BY tbl_donhang.mahang DESC");
      ?>
        <table class="table table-bordered">
          <tr style="text-align:center">
            <th>STT</th>
            <th>Mã hàng</th>
            <th>Trạng thái đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày tháng đặt</th>
            <th>Tiền thanh toán</th>
            <th>Ghi chú</th>
            <th>Hủy đơn hàng</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i= 0;
            while($row_donhang = mysqli_fetch_array($sql_select)){
              $i++;
          ?>
            <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_donhang['mahang'] ?></td>
              <td><?php 
                if($row_donhang['trangthai'] == 0) {
                  echo 'Chưa xử lý';
                }
                else {
                  echo 'Đã xử lý';
                }
               ?>
               </td>
              <td><?php echo $row_donhang['name'] ?></td>
              <td><?php echo $row_donhang['ngaythang'] ?></td>
              <td><?php echo number_format($row_donhang['tongtien']).'vnđ' ?></td>
              <td><?php echo $row_donhang['note'] ?></td>
              <td><?php 
              if($row_donhang['huydon'] == 0) {
              }
              else if($row_donhang['huydon']==1) {
                echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang='.$row_donhang['mahang'].'&xacnhanhuy=2">Xác nhân hủy đơn</a>';
              }
              else {
                echo 'Đã hủy đơn';
              }
              ?></td>
              <td style="text-align: center;"><a style="font-size: 14px;display:block;" href="?xoa=<?php echo $row_donhang['donhang_id'] ?>" class="btn btn-danger mb-2"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>" style="font-size: 14px;display:block" class="btn btn-primary">Xem đơn hàng</a></td>
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
