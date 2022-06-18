<?php
include '../db/conect.php';
include '../admin/2404/incLogin.php'
?>
<?php
if (isset($_POST['themblog'])) {
    $tenbaiviet = $_POST['tenBlog'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $tentacgia = $_POST['tentacgia'];
    $chitiet = $_POST['chitiet'];
    $path = '../uploads/';
    $active = $_POST['active-hot'];
    $sql_insert_product = mysqli_query($con, "INSERT INTO `tbl_blog`(`author`, `content_name`, `content`, `Blog_img`, `blog_hot`) VALUE('$tentacgia', '$tenbaiviet', '$chitiet', '$hinhanh', $active)");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
    print_r($sql_insert_product);
  } else if (isset($_POST['capnhatbaiviet'])) {
    $id_capnhat = $_GET['capnhat_id'];
    $tenbaiviet = $_POST['tenBlog'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $tentacgia = $_POST['tentacgia'];
    $chitiet = $_POST['chitiet'];
    $path = '../uploads/';
  if ($hinhanh == '') {
    $sql_update_image = "UPDATE tbl_blog SET content_name = '$tenbaiviet' ,author = '$tentacgia',content = '$chitiet ' WHERE blog_id = '$id_capnhat'";
  } else {
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
    $sql_update_image = "UPDATE tbl_blog SET tenbaiviet = '$tenbaiviet',content = '$chitiet',baiviet_image ='$hinhanh',author = '$tentacgia' WHERE blog_id = '$id_capnhat'";
  }
  mysqli_query($con, $sql_update_image);
}
?>
<?php
if (isset($_GET['xoa'])) {
  $id = $_GET['xoa'];

  $sql_delete_sp = mysqli_query($con, "DELETE FROM tbl_blog WHERE blog_id = '$id'");
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

    <title>Blog</title>

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

    <link rel="stylesheet" href="./css/font1.css">
    <link rel="stylesheet" href="./css/styleForm3.css">
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
                        <div class="row flex ">
                            <?php
              if (isset($_GET['quanly']) == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_blog WHERE blog_id = '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
                $id_category_1 = $row_capnhat['blog_id'];
              ?>
                            <div class="col-md-12">
                                <h4>Cập nhật blog</h4>
                                <form action="" method="POST" enctype='multipart/form-data'>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Tên blog</label>
                                            <input type="text" name="tenBlog" class="form-control form-input"
                                                value="<?php echo $row_capnhat['content_name'] ?>">
                                        </div>
                                        <br>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh</label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="../uploads/<?php echo $row_capnhat['Blog_img'] ?>"
                                                        class="chose-image" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group--product">
                                        <label for="" class="form-label">Tên Tác Giả</label>
                                        <input type="text" name="tentacgia" class="form-control form-input"
                                            value="<?php echo $row_capnhat['author'] ?>">
                                    </div>
                                    <div class="form-group--product">
                                        <label for="" class="form-label">Blog hot</label>
                                        <select name="active-hot" id="" class="form-control form-input">
                                            <option value="1">ACTIVE</option>
                                            <option value="0">HOT</option>
                                        </select>
                                    </div>
                                    <br>
                                    <label for="" class="form-label">Chi tiết</label>
                                    <textarea name="chitiet" class="tiniText">
                    <?php echo $row_capnhat['content'] ?>
                    </textarea>

                                    <br>
                                    <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết"
                                        class="btn btn-success">
                                </form>
                            </div>
                            <?php
              } else {
              ?>
                            <div class="col-md-12">
                                <h4>Thêm bài Blog</h4>
                                <form action="" method="POST" enctype='multipart/form-data'>
                                    <div class="flex flex-mb">
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Tên Blog</label>
                                            <input type="text" name="tenBlog" class="form-control form-input"
                                                placeholder="Tên Blog...">
                                        </div>
                                        <br>
                                        <div class="form-group--product">
                                            <label for="" class="form-label">Hình ảnh </label>
                                            <label for="" class="form-label--images">
                                                <input type="file" name="hinhanh" class="input-image" />
                                                <div class="form-label--chose">
                                                    <img src="./images/img-upload.png" class="chose-image" alt="">
                                                    <p>Chọn ảnh</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group--product">
                                        <label for="" class="form-label">Tên Tác Giả</label>
                                        <input type="text" name="tentacgia" class="form-control form-input"
                                            placeholder="Tên tác giả...">
                                    </div>
                                    <div class="form-group--product">
                                        <label for="" class="form-label">Blog hot</label>
                                        <select name="active-hot" id="" class="form-control form-input">
                                            <option value="1">ACTIVE</option>
                                            <option value="0">HOT</option>
                                        </select>
                                    </div>
                                    <label for="" class="form-label">Nội dung</label>
                                    <textarea name="chitiet" class="tiniText"></textarea>
                                    <br>

                                    <br>
                                    <input type="submit" name="themblog" value="Thêm Blog" class="btn btn-success">
                                </form>
                            </div>
                            <?php
              }
              ?>
                            <div class="col-md-12">
                                <h4>Danh sách Blog</h4>
                                <?php
                $sql_select_bv = mysqli_query($con, "SELECT * FROM tbl_blog ORDER BY tbl_blog.blog_id DESC");
                ?>
                                <table class="table table-bordered">
                                    <tr style="text-align:center">
                                        <th>STT</th>
                                        <th>Tên bài viết</th>
                                        <th>ên tác giả</th>
                                        <th>Hình ảnh</th>
                                        <th>Nội dung</th>
                                        <th>Ngày đăng</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    <?php
                  $i = 0;
                  while ($row_bv = mysqli_fetch_array($sql_select_bv)) {
                    $i++;
                  ?>
                                    <tr style="text-align:center">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row_bv['content_name'] ?></td>
                                        <td><?php echo $row_bv['author'] ?></td>
                                        <td><img src="../uploads/<?php echo $row_bv['Blog_img'] ?>" width="80"
                                                height="80" alt=""></td>
                                        <td><?php echo $row_bv['content'] ?></td>
                                        <td><?php echo $row_bv['ngaydang'] ?></td>
                                        <td style="text-align: center;"><a style="font-size: 14px;width: 100px;"
                                                href="?xoa=<?php echo $row_bv['blog_id'] ?>" class="btn btn-danger"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a> <a
                                                href="xulyblog.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['blog_id'] ?>"
                                                style="width: 100px; font-size: 14px" class="btn btn-warning"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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