<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php
  if(isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    $sql_insert_product = mysqli_query($con, "INSERT INTO `tbl_baiviet`( `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES ('$tenbaiviet','$mota','$chitiet','$danhmuc','$hinhanh')");
    move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
  }
  else if(isset($_POST['capnhatbaiviet'])) {
    $id_update = $_POST['capnhat_id'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    if($hinhanh=='') {
      $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet = '$tenbaiviet',noidung = '$chitiet',tomtat = '$mota', danhmuctin_id= '$danhmuc'  WHERE baiviet_id = '$id_update'";
    }
    else {
      move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
      $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet = '$tenbaiviet',noidung = '$chitiet',tomtat = '$mota', danhmuctin_id= '$danhmuc',baiviet_image ='$hinhanh' WHERE baiviet_id = '$id_update'";
    }
    mysqli_query($con, $sql_update_image);
  }
?>
<?php 
  if(isset($_GET['xoa'])) {
    $id = $_GET['xoa'];

    $sql_delete_sp = mysqli_query($con, "DELETE FROM tbl_baiviet WHERE baiviet_id = '$id'");
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

    <title>bài viết</title>

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
        if(isset($_GET['quanly'])=='capnhat') {
          $id_capnhat = $_GET['capnhat_id'];
          $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id = '$id_capnhat'");
          $row_capnhat = mysqli_fetch_array($sql_capnhat);
          $id_category_1 = $row_capnhat['danhmuctin_id'];
          ?>
           <div class="col-md-4">
            <h4>Cập nhật bài viết</h4>
            <form action="" method="POST" enctype='multipart/form-data'>
             <label for="">Tên bài viết</label>
              <input type="text" name="tenbaiviet" class="form-control" value="<?php echo $row_capnhat['tenbaiviet'] ?>">
              <br>
              <input type="hidden" name="capnhat_id" class="form-control" value="<?php echo $row_capnhat['baiviet_id'] ?>">
              <br>
              <label for="">Hình ảnh</label>
              <input type="file" name="hinhanh" class="form-control">
              <br>
              <img src="../uploads/<?php echo $row_capnhat['baiviet_image'] ?>" width="80" height="80" alt="">
              <br><br> 
              <label for="">Mô tả</label>
              <textarea name="mota" class="form-control"><?php echo $row_capnhat['tomtat'] ?></textarea>
              <br>
              <label for="">Chi tiết</label>
              <textarea name="chitiet" class="form-control"><?php echo $row_capnhat['noidung'] ?></textarea>
              <br>
              <label for="">Danh mục</label>
              <?php
                $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC ")
              ?>
              <select name="danhmuc" id="" class="form-control">
                <option value="0">----Chọn danh mục----</option>
                <?php 
                  while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                      if($id_category_1==$row_danhmuc['danhmuctin_id']){
                ?>
                <option selected value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                  } else{
                      ?>
                    <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                 <?php 
                }
            }
                ?>
              </select>
              <br>
              <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success">
            </form>
          </div>
        <?php
        } else {
          ?>
              <div class="col-md-4">
            <h4>Thêm bài viết</h4>
            <form action="" method="POST" enctype='multipart/form-data'>
             <label for="">Tên bài viết</label>
              <input type="text" name="tenbaiviet" class="form-control" placeholder="Tên bài viết...">
              <br>
              <label for="">Hình ảnh</label>
              <input type="file" name="hinhanh" class="form-control">
              <br>
              <label for="">Mô tả</label>
              <textarea name="mota" class="form-control"></textarea>
              <br>
              <label for="">Chi tiết</label>
              <textarea name="chitiet" class="form-control"></textarea>
              <br>
              <label for="">Danh mục</label>
              <?php
                $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC ")
              ?>
              <select name="danhmuc"  class="form-control">
                <option value="0">----Chọn danh mục----</option>
                <?php 
                  while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                ?>
                <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                  }
                ?>
              </select>
              <br>
              <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success">
            </form>
          </div>
          <?php
        }
      ?>
      <div class="col-md-8">
      <h4>Danh sách bài viết</h4>
      <?php
        $sql_select_bv = mysqli_query($con, "SELECT * FROM tbl_baiviet, tbl_danhmuc_tin WHERE tbl_baiviet.danhmuctin_id = tbl_danhmuc_tin.danhmuctin_id  ORDER BY tbl_baiviet.baiviet_id DESC");
      ?>
      <table class="table table-bordered">
        <tr style="text-align:center">
          <th>STT</th>
          <th>Tên bài viết</th>
          <th>Hình ảnh</th>
          
          <th>Danh mục</th>
    
          <th>Quản lý</th>
        </tr>
        <?php
        $i= 0;
          while($row_bv = mysqli_fetch_array($sql_select_bv)){
            $i++;
        ?>
          <tr style="text-align:center">
            <td><?php echo $i ?></td>
            <td><?php echo $row_bv['tenbaiviet']?></td>
            <td><img src="../uploads/<?php echo $row_bv['baiviet_image']?>" width="80" height="80" alt=""></td>
            <td><?php echo $row_bv['tendanhmuc']?></td>
            <td style="text-align: center;"><a style="font-size: 14px;width: 100px;" href="?xoa=<?php echo $row_bv['baiviet_id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>" style="width: 100px; font-size: 14px" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
