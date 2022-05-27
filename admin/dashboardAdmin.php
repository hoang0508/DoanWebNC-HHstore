<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php 
  $sql_phanhoi = mysqli_query($con, "SELECT COUNT(email) FROM tbl_lienhe");
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

    <title>Trang chủ Admin</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['category_name', 'daban'],
           <?php
          $sql_ct = mysqli_query($con, "SELECT * FROM tbl_sanpham");
          while($id_cate = mysqli_fetch_assoc($sql_ct)) {
            $category_id = $id_cate['sanpham_id'];
          }
          $sql_soluong_dt = mysqli_query($con, "SELECT * , tbl_category.category_name , count(tbl_donhang.soluong) AS 'daban'  FROM tbl_donhang, tbl_sanpham, tbl_category WHERE tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id AND tbl_sanpham.category_id = tbl_category.category_id GROUP BY tbl_category.category_name DESC");
          while($row_dt = mysqli_fetch_array($sql_soluong_dt)) {
            $category_name = $row_dt['category_name'];
            $daban = $row_dt['daban'];
            ?>
            ['<?php echo $category_name ?>', <?php echo $daban ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Biểu đồ thống kê'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link rel="stylesheet" href="./css/clendar.css">
    <link rel="stylesheet" href="./css/styleh1.css">
    
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
            <div class="statistical">
              <?php 
                  $sql_phanhoi = mysqli_query($con, "SELECT * , COUNT(email) as 'phanhoi' FROM tbl_lienhe");
                  while($row_ph = mysqli_fetch_array($sql_phanhoi)) {
              ?>
              <div class="list-statis feed-back">
              <i class="fa fa-comments-o" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_ph['phanhoi'] ?></span>
                <span class="txt-desc">Phản hồi</span>
              </div>
              </div>
              <?php
                  }
              ?>
              <?php 
                $sql_dangky = mysqli_query($con, "SELECT COUNT(email) AS 'dangky' FROM tbl_khachhang");
                while($row_dk = mysqli_fetch_array($sql_dangky)) {
              ?>
              <div class="list-statis login-total">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_dk['dangky'] ?></span>
                <span class="txt-desc">Lượt đăng ký</span>
              </div>
              </div>
              <?php
                }
              ?>
              <?php 
                $sql_doanhthu = mysqli_query($con, "SELECT SUM(tbl_donhang.soluong*tbl_sanpham.sanpham_giakhuyenmai) AS 'doanhthu' FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id");
                  $row_dt = mysqli_fetch_array($sql_doanhthu);
              ?>
              <div class="list-statis money-total">
              <i class="fa fa-line-chart" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt" style="font-size: 18px;"><?php echo number_format($row_dt['doanhthu']) ?></span>
                <span class="txt-desc">Tổng thu nhập</span>
              </div>
              </div>
              <?php
                $sql_dondat = mysqli_query($con, "SELECT COUNT(mahang) AS 'mahang' FROM tbl_donhang");
                $row_dd = mysqli_fetch_array($sql_dondat);
              ?>
              <div class="list-statis total-order">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_dd['mahang'] ?></span>
                <span class="txt-desc">Đơn đặt hàng</span>
              </div>
              </div>
              <?php
                $sql_yt =  mysqli_query($con, "SELECT *, COUNT(sanpham_yeuthich) AS 'YT' FROM tbl_sanpham WHERE sanpham_yeuthich = 1");
                $row_yt = mysqli_fetch_array($sql_yt);
              ?>
              <div class="list-statis total-vote">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt">
                  <?php 
                    if($row_yt['sanpham_yeuthich']==1) {
                      ?>
                      <?php echo $row_yt['YT'] ?>
                      <?php
                    }
                    else {
                      ?>
                      <?php echo '0' ?>
                      <?php
                    }
                  ?>
                </span>
                <span class="txt-desc">Sp yêu thích</span>
              </div>
              </div>
              <?php
                $sql_cv= mysqli_query($con, "SELECT COUNT(cv_email) AS 'email' FROM tbl_cv");
                $row_cv = mysqli_fetch_array($sql_cv);
              ?>
              <div class="list-statis cv-total">
              <i class="fa fa-file" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_cv['email'] ?></span>
                <span class="txt-desc">Đơn cv</span>
              </div>
              </div>
              <div class="list-statis total-online">
              <i class="fa fa-adjust" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_dd['mahang'] ?></span>
                <span class="txt-desc">Đang online</span>
              </div>
              </div>
              <?php
                $sql_admin = mysqli_query($con, "SELECT COUNT(email) as 'admin' FROM tbl_admin");
                $row_admin = mysqli_fetch_array($sql_admin);
              ?>
              <div class="list-statis total-admin">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <div class="feed-number">
                <span class="number-txt"><?php echo $row_admin['admin'] ?></span>
                <span class="txt-desc">ADMIN</span>
              </div>
              </div>
            </div>
            <section class="ftco-section" style="width: 100%;padding: 3rem">
		<div class="container">
			<div class="row">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="elegant-calencar d-md-flex">
						<div class="wrap-header d-flex align-items-center img" style="background-image: url(images/bg.jpg);">
				      <p id="reset">Today</p>
			        <div id="header" class="p-0">
								<!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
		            <div class="head-info">
		            	<div class="head-month"></div>
		                <div class="head-day"></div>
		            </div>
		            <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
			        </div>
			      </div>
			      <div class="calendar-wrap">
			      	<div class="w-100 button-wrap">
				      	<div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
				      	<div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
			      	</div>
			        <table id="calendar">
		            <thead>
		                <tr>
	                    <th>Sun</th>
	                    <th>Mon</th>
	                    <th>Tue</th>
	                    <th>Wed</th>
	                    <th>Thu</th>
	                    <th>Fri</th>
	                    <th>Sat</th>
		                </tr>
		            </thead>
		            <tbody>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
		            </tbody>
			        </table>
			      </div>
			    </div>
				</div>
        <div class="col-md-6 bg-clock">
          <div class="clock">
            <div class="hour">
              <div class="hr" id="hr"></div>
            </div>
            <div class="min">
              <div class="mn" id="mn">
              </div>
            </div>
            <div class="sec">
              <div class="sc" id="sc">
              </div>
            </div>
          </div>
        </div>
			</div>
		</div>
    <div class="task-chart">
      <div id="piechart" style="width: 500px; height: 500px;border-radius: 10px"></div>
      <div class="app">
      <div class="form-control1">
        <textarea class="content" name="" id="content"> </textarea>
        <button>Ghi chú</button>
      </div>
      <div id="list-task" class="list-task">
        <h4>Danh sách cv</h4>
        <div class="result"></div>
      </div>
    </div>
    </div>
	</section>
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
    <script >
      const deg = 6;
      const hr = document.querySelector("#hr");
      const mn = document.querySelector("#mn");
      const sc = document.querySelector("#sc");

      setInterval(() => {
        let day = new Date();
        let hh = day.getHours() * 30;
        let mm = day.getMinutes() * deg;
        let ss = day.getSeconds() * deg;

        hr.style.transform = `rotateZ(${hh + mm / 12}deg)`;
        mn.style.transform = `rotateZ(${mm}deg)`;
        sc.style.transform = `rotateZ(${ss}deg)`;
});
    </script>
    <script src="./js/app11.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/popper.js"></script>
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
