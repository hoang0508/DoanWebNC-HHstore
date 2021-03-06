<?php
include '../db/conect.php';
include '../admin/2404/incLogin.php'
?>
<?php
if (isset($_POST['themsanpham'])) {
  $tensanpham = $_POST['tensanpham'];
  $hinhanh1 = $_FILES['hinhanh1']['name'];
  $hinhanh_tmp1 = $_FILES['hinhanh1']['tmp_name'];
  $hinhanh2 = $_FILES['hinhanh2']['name'];
  $hinhanh_tmp2 = $_FILES['hinhanh2']['tmp_name'];
  $hinhanh3 = $_FILES['hinhanh3']['name'];
  $hinhanh_tmp3 = $_FILES['hinhanh3']['tmp_name'];
  $soluong = $_POST['soluong'];
  $gia = $_POST['giasanpham'];
  $giakhuyenmai = $_POST['giakhuyenmai'];
  $danhmuc = $_POST['danhmuc'];
  $chitiet = $_POST['chitiet'];
  $mota = $_POST['mota'];
  $path = '../uploads/';
  $active = $_POST['active-hot'];
  $sql_insert_product = mysqli_query($con, "INSERT INTO `tbl_sanpham`(`sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`,`sanpham_soluong`, `sanpham_image`, `sanpham_img1`, `sanpham_img2`, `category_id`, `sanpham_noibat_hot`) VALUES ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh1', '$hinhanh2', '$hinhanh3','$danhmuc', $active)");
  move_uploaded_file($hinhanh_tmp1, $path . $hinhanh1);
  move_uploaded_file($hinhanh_tmp2, $path . $hinhanh2);
  move_uploaded_file($hinhanh_tmp3, $path . $hinhanh3);
} else if (isset($_POST['capnhatsanpham'])) {
  $id_update = $_POST['capnhat_id'];
  $tensanpham = $_POST['tensanpham'];
  $hinhanh1 = $_FILES['hinhanh1']['name'];
  $hinhanh_tmp1 = $_FILES['hinhanh1']['tmp_name'];
  $hinhanh2 = $_FILES['hinhanh2']['name'];
  $hinhanh_tmp2 = $_FILES['hinhanh2']['tmp_name'];
  $hinhanh3 = $_FILES['hinhanh3']['name'];
  $hinhanh_tmp3 = $_FILES['hinhanh3']['tmp_name'];
  $soluong = $_POST['soluong'];
  $gia = $_POST['giasanpham'];
  $giakhuyenmai = $_POST['giakhuyenmai'];
  $danhmuc = $_POST['danhmuc'];
  $chitiet = $_POST['chitiet'];
  $mota = $_POST['mota'];
  $path = '../uploads/';
  if ($hinhanh1 == '') {
    $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name = '$tensanpham',sanpham_chitiet = '$chitiet',sanpham_mota = '$mota',sanpham_gia = '$gia',sanpham_giakhuyenmai = '$giakhuyenmai',sanpham_soluong = '$soluong', category_id= '$danhmuc'  WHERE sanpham_id = '$id_update'";
  } else {
    move_uploaded_file($hinhanh_tmp1, $path . $hinhanh1);
    move_uploaded_file($hinhanh_tmp2, $path . $hinhanh2);
    move_uploaded_file($hinhanh_tmp3, $path . $hinhanh3);
    $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name = '$tensanpham',sanpham_chitiet = '$chitiet',sanpham_mota = '$mota',sanpham_gia = '$gia',sanpham_giakhuyenmai = '$giakhuyenmai',sanpham_soluong = '$soluong', sanpham_image = '$hinhanh1', sanpham_img1 = '$hinhanh2', sanpham_img2 = '$hinhanh3' ,category_id= '$danhmuc'  WHERE sanpham_id = '$id_update'";
  }
  mysqli_query($con, $sql_update_image);
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

  <title>S???n ph???m</title>

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
  <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">

  <script src="https://cdn.tiny.cloud/1/po3oq8g18rn7fc8keswxmb7hpg6sye7r36doe1hygjl1act2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: '.tiniText',
      width: 1100,
      height: 300,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
        'media', 'table', 'emoticons', 'template', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: {
          title: 'My Favorites',
          items: 'code visualaid | searchreplace | emoticons'
        }
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css'
    });
  </script>

  <link rel="stylesheet" href="./css/styleForm3.css">
  <link rel="stylesheet" href="./css/font1.css">
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
            <div class="row d-flex flex-column">
              <?php
              if (isset($_GET['quanly']) == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
              ?>
                <div class="col-md-12">
                  <h4>C???p nh???t s???n ph???m</h4>
                  <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">T??n s???n ph???m</label>
                        <input type="text" name="tensanpham" class="form-control form-input" value="<?php echo $row_capnhat['sanpham_name'] ?>">
                      </div>
                      <input type="hidden" name="capnhat_id" class="form-control" value="<?php echo $row_capnhat['sanpham_id'] ?>">
                      <br>
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 1</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh1" class="input-image" />
                          <div class="form-label--chose">
                            <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" class="chose-image--update" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 2</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh2" class="input-image" />
                          <div class="form-label--chose">
                            <img src="../uploads/<?php echo $row_capnhat['sanpham_img1'] ?>" class="chose-image--update" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 3</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh3" class="input-image" />
                          <div class="form-label--chose">
                            <img src="../uploads/<?php echo $row_capnhat['sanpham_img2'] ?>" class="chose-image--update" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">Gi??</label>
                        <input type="text" name="giasanpham" class="form-control form-input" value="<?php echo $row_capnhat['sanpham_gia'] ?>">
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">Gi?? khuy???n m??i</label>
                        <input type="text" name="giakhuyenmai" class="form-control form-input" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>">
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div>
                        <label for="" class="form-label">S??? l?????ng</label>
                        <input type="number" name="soluong" class="form-control form-quanliti" value="<?php echo $row_capnhat['sanpham_soluong'] ?>">
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">SP n???i b???t or hot</label>
                        <select name="active-hot" id="" class="form-control form-input">
                          <option value="1">ACTIVE</option>
                          <option value="0">HOT</option>
                        </select>
                      </div>
                    </div>
                    <label for="" class="form-label">M?? t???</label>
                    <textarea name="mota" class="tiniText"><?php echo $row_capnhat['sanpham_mota'] ?></textarea>
                    <br>
                    <label for="" class="form-label">Chi ti???t</label>
                    <textarea name="chitiet" class="tiniText">
              <?php echo $row_capnhat['sanpham_chitiet'] ?>
              </textarea>
                    <br>
                    <label for="" class="form-label">Danh m???c</label>
                    <?php
                    $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC ")
                    ?>
                    <select name="danhmuc" id="" class="form-control">
                      <option value="0">----Ch???n danh m???c----</option>
                      <?php
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                      ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <br>
                    <input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-success">
                  </form>
                </div>
              <?php
              } else {
              ?>
                <div class="col-md-12">
                  <h4>Th??m s???n ph???m</h4>
                  <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">T??n s???n ph???m</label>
                        <input type="text" name="tensanpham" class="form-control form-input" placeholder="T??n s???n ph???m...">
                      </div>
                      <br>
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 1</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh1" class="input-image" />
                          <div class="form-label--chose">
                            <img src="./images/img-upload.png" class="chose-image" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 2</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh2" class="input-image" />
                          <div class="form-label--chose">
                            <img src="./images/img-upload.png" class="chose-image" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">H??nh ???nh 3</label>
                        <label for="" class="form-label--images">
                          <input type="file" name="hinhanh3" class="input-image" />
                          <div class="form-label--chose">
                            <img src="./images/img-upload.png" class="chose-image" alt="">
                            <p>Ch???n ???nh</p>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div class="form-group--product">
                        <label for="" class="form-label">Gi??</label>
                        <input type="text" name="giasanpham" class="form-control form-input" placeholder="Gi?? s???n ph???m...">
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">Gi?? khuy???n m??i</label>
                        <input type="text" name="giakhuyenmai" class="form-control form-input" placeholder="Gi?? khuy???n m??i...">
                      </div>
                    </div>
                    <div class="flex flex-mb">
                      <div>
                        <label for="" class="form-label">S??? l?????ng</label>
                        <input type="number" name="soluong" class="form-control form-quanliti" placeholder="S??? l?????ng...">
                      </div>
                      <div class="form-group--product">
                        <label for="" class="form-label">SP n???i b???t or hot</label>
                        <select name="active-hot" id="" class="form-control form-input">
                          <option value="1">ACTIVE</option>
                          <option value="0">HOT</option>
                        </select>
                      </div>
                    </div>
                    <label for="" class="form-label">M?? t???</label>
                    <textarea name="mota" class="tiniText"></textarea>
                    <br>
                    <label for="" class="form-label">Chi ti???t</label>
                    <textarea name="chitiet" class="tiniText"></textarea>
                    <br>
                    <label for="" class="form-label">Danh m???c</label>
                    <?php
                    $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC ")
                    ?>
                    <select name="danhmuc" id="" class="form-control">
                      <option value="0">----Ch???n danh m???c----</option>
                      <?php
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                      ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <br>
                    <input type="submit" name="themsanpham" value="Th??m s???n ph???m" class="btn btn-success">
                  </form>
                </div>
              <?php
              }
              ?>
              <div class="col-md-12">
                <h4>Danh s??ch s???n ph???m</h4>
                <?php
                $sql_select_sp = mysqli_query($con, "SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.category_id = tbl_category.category_id  ORDER BY tbl_sanpham.category_id DESC");
                ?>
                <table class="table table-bordered">
                  <tr style="text-align:center">
                    <th>STT</th>
                    <th>T??n s???n ph???m</th>
                    <th>H??nh ???nh</th>
                    <th>S??? l?????ng</th>
                    <th>Danh m???c</th>
                    <th>Gi?? s???n ph???m</th>
                    <th>Gi?? khuy???n m??i</th>
                    <th>Qu???n l??</th>
                  </tr>
                  <?php
                  $i = 0;
                  while ($row_sp = mysqli_fetch_array($sql_select_sp)) {
                    $i++;
                  ?>
                    <tr style="text-align:center">
                      <td><?php echo $i ?></td>
                      <td><?php echo $row_sp['sanpham_name'] ?></td>
                      <td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" width="80" height="80" alt=""></td>
                      <td><?php echo $row_sp['sanpham_soluong'] ?></td>
                      <td><?php echo $row_sp['category_name'] ?></td>
                      <td><?php echo  number_format($row_sp['sanpham_gia']) . 'vnd' ?></td>
                      <td><?php echo  number_format($row_sp['sanpham_giakhuyenmai']) . 'vnd' ?></td>
                      <td style="text-align: center;"><a style="font-size: 14px;" href="?xoa=<?php echo $row_sp['sanpham_id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>" style="font-size: 14px" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
          @coppyright B???n quy???n thu???c by <a href="https://colorlib.com">Huy Ho??ng</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- sweet -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  <script>
    const btnDelete = document.querySelectorAll(".btn-danger");
    [...btnDelete].forEach((item) => {
      item.addEventListener((e) => {
        e.preventDefault();
        console.log(item);
      })
    })
  </script>
</body>

</html>
//