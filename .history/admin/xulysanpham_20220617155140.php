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
  echo '<script>alert("Sản phẩm đã được thêm!!")</script>';
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
  echo '<script>alert("Sản phẩm đã được update!!")</script>';
  } else {
    move_uploaded_file($hinhanh_tmp1, $path . $hinhanh1);
    move_uploaded_file($hinhanh_tmp2, $path . $hinhanh2);
    move_uploaded_file($hinhanh_tmp3, $path . $hinhanh3);
    $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name = '$tensanpham',sanpham_chitiet = '$chitiet',sanpham_mota = '$mota',sanpham_gia = '$gia',sanpham_giakhuyenmai = '$giakhuyenmai',sanpham_soluong = '$soluong', sanpham_image = '$hinhanh1', sanpham_img1 = '$hinhanh2', sanpham_img2 = '$hinhanh3' ,category_id= '$danhmuc'  WHERE sanpham_id = '$id_update'";
  echo '<script>alert("Sản phẩm đã được update!!")</script>';
  }
  mysqli_query($con, $sql_update_image);
}
?>
<?php
if (isset($_GET['xoa'])) {
  $id = $_GET['xoa'];
  $sql_delete_sp = mysqli_query($con, "DELETE FROM tbl_sanpham WHERE sanpham_id = '$id'");
  header('Location: xulysanpham.php?m=1');
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

    <title>Sản phẩm</title>

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

    <script src="https://cdn.tiny.cloud/1/po3oq8g18rn7fc8keswxmb7hpg6sye7r36doe1hygjl1act2/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '.tiniText',
        width: 1100,
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
            'insertdatetime',
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
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
                                <h4>Cập nhật sản phẩm</h4>
                                <form action="" method="POST" enctype='multipart/form-data'>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Tên sản phẩm</label>
                                            <input type="text" name="tensanpham" class="form-control form-input"
                                                value="<?php echo $row_capnhat['sanpham_name'] ?>">
                                        </div>
                                        <input type="hidden" name="capnhat_id" class="form-control"
                                            value="<?php echo $row_capnhat['sanpham_id'] ?>">
                                        <br>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 1</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh1" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>"
                                                        class="chose-image--update" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 2</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh2" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="../uploads/<?php echo $row_capnhat['sanpham_img1'] ?>"
                                                        class="chose-image--update" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 3</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh3" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="../uploads/<?php echo $row_capnhat['sanpham_img2'] ?>"
                                                        class="chose-image--update" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Giá</label>
                                            <input type="text" name="giasanpham" class="form-control form-input"
                                                value="<?php echo $row_capnhat['sanpham_gia'] ?>">
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Giá khuyến mãi</label>
                                            <input type="text" name="giakhuyenmai" class="form-control form-input"
                                                value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>">
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div>
                                            <label for="" class="form-label">Số lượng</label>
                                            <input type="number" name="soluong" class="form-control form-quanliti"
                                                value="<?php echo $row_capnhat['sanpham_soluong'] ?>">
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">SP nổi bật or hot</label>
                                            <select name="active-hot" id="" class="form-control form-input">
                                                <option value="1">ACTIVE</option>
                                                <option value="0">HOT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label for="" class="form-label">Mô tả</label>
                                    <textarea name="mota"
                                        class="tiniText"><?php echo $row_capnhat['sanpham_mota'] ?></textarea>
                                    <br>
                                    <label for="" class="form-label">Chi tiết</label>
                                    <textarea name="chitiet" class="tiniText">
              <?php echo $row_capnhat['sanpham_chitiet'] ?>
              </textarea>
                                    <br>
                                    <label for="" class="form-label">Danh mục</label>
                                    <?php
                    $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC ")
                    ?>
                                    <select name="danhmuc" id="" class="form-control">
                                        <option value="0">----Chọn danh mục----</option>
                                        <?php
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                      ?>
                                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                                            <?php echo $row_danhmuc['category_name'] ?></option>
                                        <?php
                      }
                      ?>
                                    </select>
                                    <br>
                                    <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm"
                                        class="btn btn-success">
                                </form>
                            </div>
                            <?php
              } else {
              ?>
                            <div class="col-md-12">
                                <h4>Thêm sản phẩm</h4>
                                <form action="" method="POST" enctype='multipart/form-data'>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Tên sản phẩm</label>
                                            <input type="text" name="tensanpham" class="form-control form-input"
                                                placeholder="Tên sản phẩm...">
                                        </div>
                                        <br>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 1</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh1" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="./images/img-upload.png" class="chose-image" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 2</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh2" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="./images/img-upload.png" class="chose-image" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh 3</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh3" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="./images/img-upload.png" class="chose-image" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Giá</label>
                                            <input type="text" name="giasanpham" class="form-control form-input"
                                                placeholder="Giá sản phẩm...">
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Giá khuyến mãi</label>
                                            <input type="text" name="giakhuyenmai" class="form-control form-input"
                                                placeholder="Giá khuyến mãi...">
                                        </div>
                                    </div>
                                    <div class="flex flex-mb">
                                        <div>
                                            <label for="" class="form-label">Số lượng</label>
                                            <input type="number" name="soluong" class="form-control form-quanliti"
                                                placeholder="Số lượng...">
                                        </div>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">SP nổi bật or hot</label>
                                            <select name="active-hot" id="" class="form-control form-input">
                                                <option value="1">ACTIVE</option>
                                                <option value="0">HOT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label for="" class="form-label">Mô tả</label>
                                    <textarea name="mota" class="tiniText"></textarea>
                                    <br>
                                    <label for="" class="form-label">Chi tiết</label>
                                    <textarea name="chitiet" class="tiniText"></textarea>
                                    <br>
                                    <label for="" class="form-label">Danh mục</label>
                                    <?php
                    $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC ")
                    ?>
                                    <select name="danhmuc" id="" class="form-control">
                                        <option value="0">----Chọn danh mục----</option>
                                        <?php
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                      ?>
                                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                                            <?php echo $row_danhmuc['category_name'] ?></option>
                                        <?php
                      }
                      ?>
                                    </select>
                                    <br>
                                    <input type="submit" name="themsanpham" value="Thêm sản phẩm"
                                        class="btn btn-success">
                                </form>
                            </div>
                            <?php
              }
              ?>
                            <div class="col-md-12">
                                <h4>Danh sách sản phẩm</h4>
                                <?php
                                if (isset($_GET['trang'])){
                                  $page = $_GET['trang'];  
                                }else{
                                    $page = '';
                                }
                                if($page == '' || $page == 1){
                                    $begin = 0;
                                }else{
                                    $begin = ($page*7)-7;
                                }
                $sql_select_sp = mysqli_query($con, "SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.category_id = tbl_category.category_id  ORDER BY tbl_sanpham.category_id DESC LIMIT $begin,7");
                ?>
                                <table class="table table-bordered">
                                    <tr style="text-align:center">
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    <?php
                  $i = 0;
                  while ($row_sp = mysqli_fetch_array($sql_select_sp)) {
                    $i++;
                  ?>

                                    <tr style="text-align:center">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row_sp['sanpham_name'] ?></td>
                                        <td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" width="80"
                                                height="80" alt=""></td>
                                        <td><?php echo $row_sp['sanpham_soluong'] ?></td>
                                        <td><?php echo $row_sp['category_name'] ?></td>
                                        <td><?php echo  number_format($row_sp['sanpham_gia']) . 'vnd' ?></td>
                                        <td><?php echo  number_format($row_sp['sanpham_giakhuyenmai']) . 'vnd' ?></td>
                                        <td style="text-align: center;">
                                            <a style="font-size: 14px;" href="?xoa=<?php echo $row_sp['sanpham_id'] ?>"
                                                class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                            <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>"
                                                style="font-size: 14px" class="btn btn-warning"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php

                  }
                  ?>
                                </table>
                            </div>
                            <!-- //phân rang -->
                            <div style="clear:both;"></div>
                            <style type="text/css">
                            ul.list_trang {
                                padding: 0;
                                margin: 0;
                                list-style: none;
                            }

                            ul.list_trang li {
                                float: left;
                                padding: 10px 13px;
                                margin: 10px;
                                background: burlywood;
                                display: block;
                            }

                            ul.list_trang li a {
                                color: #000;
                                text-align: center;
                                text-decoration: none;

                            }
                            </style>
                            <?php
                            $sql_trang = mysqli_query($con,"SELECT * FROM tbl_sanpham");
                            $row_count = mysqli_num_rows($sql_trang);
                            $trang = ceil($row_count/7);
                            ?>
                            <div>
                                <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
    
                                <ul class="list_trang">
                                    <?php
                                    for($i=1;$i<=$trang;$i++){
                                    ?>
                                    <li
                                        <?php if($i == $page){echo 'style="background:brown; font-size:14 ;"';}else{ echo '';}?>>
                                        <a href="xulysanpham.php?trang=<?php echo $i?>"><?php echo $i?></a>
                                    </li>
                                    <?php
                                    }
                                    ?>
    
                                </ul>
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
    <?php
  if (isset($_GET['m'])) { ?>
    <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
    <?php } ?>
    <script>
    const btnDelete = document.querySelectorAll(".btn-danger");
    [...btnDelete].forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const href = e.target.getAttribute("href");
            console.log("🚀 ~ file: xulysanpham.php ~ line 428 ~ item.addEventListener ~ href", href)
            Swal.fire({
                title: 'Bạn có muốn xóa sản phẩm?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                    Swal.fire(
                        'Deleted!',
                        'Sản phẩm đã được xóa!!.',
                        'success'
                    )
                }
            })
        })
    })


    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        swal.fire({
            type: 'success',
            title: 'Sản phẩm đã được xóa',
            text: 'Xóa sản phẩm thành công!!'
        })
    }
    </script>
</body>

</html>