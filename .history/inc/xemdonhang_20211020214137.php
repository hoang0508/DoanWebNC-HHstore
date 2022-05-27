<?php
  if(isset($_GET['huydon']) && $_GET['magiaodich']) {
    $huydon = $_GET['huydon'];
    $magiaodich = $_GET['magiaodich'];
  }
  else {
    $huydon = "";
    $magiaodich = "";
  }
  $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon = '$huydon' WHERE mahang= '$magiaodich'");
  $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon = '$huydon' WHERE magiaodich= '$magiaodich'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        Xem đơn hàng
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
							<div class="row">
                <?php
							if(isset($_SESSION['dangnhap_home'])) {
                  echo 'Khách hàng: '.$_SESSION['dangnhap_home'];
              }
              ?>
         <div class="col-md-12 mt-3">
      <h4 class="mb-3">Danh sách lịch sử đơn hàng</h4>
      
      <?php
        if(isset($_GET['khachhang'])){
          $id_khach =$_GET['khachhang'];
        }else{
          $id_khach = '';
        }
        $sql_select = mysqli_query($con, "SELECT * FROM tbl_giaodich ,tbl_sanpham WHERE tbl_giaodich.sanpham_id = tbl_sanpham.sanpham_id AND tbl_giaodich.khachhang_id = '$id_khach'  GROUP BY tbl_giaodich.magiaodich DESC");
      ?>
        <table class="table table-bordered">
          <tr style="text-align:center">
            <th>STT</th>
            <th>Mã giao dịch</th>
            <th>Ngày đặt</th>
            <th>Trạng thái đơn hàng</th>
            <th>Yêu cầu hủy</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i= 0;
            while($row_donhang = mysqli_fetch_array($sql_select)){
              $i++;
          ?>
            <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_donhang['magiaodich'] ?></td>
              <td><?php echo $row_donhang['ngaythang'] ?></td>
              <td>
                <?php
                if($row_donhang['tinhtrangdon']==0) {
                  echo 'Đã đặt hàng';
                }
                else {
                  echo 'Đang vận chuyển';
                }
                ?>
              </td>
              <td>
              <?php
              if($row_donhang['huydon']==0){
                ?>
                <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich']?>&huydon=1">Yêu cầu hủy</a>
                <?php
              }
              else if($row_donhang['tinhtrangdon']==1) {
                echo '<script>alert("Hủy đơn hàng không thành công")</script>';
                ?>
                <p>Hủy đơn hàng thất bại!</p>
                <?php
              }
              else if($row_donhang['huydon']==1) {
                ?>
                <p>Đang chờ xử lý ...</p>
                <?php
              }
              else {
                ?>
                <p>Đã hủy đơn</p>
                <?php
              }
              ?>
              </td>
              <td><a class="btn btn-primary" href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich']  ?>">Xem chi tiết</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
      </div>
      <div class="col-md-12">
      <h4 class="mb-3">Chi tiết đơn hàng</h4>
      
      <?php
        if(isset($_GET['magiaodich'])){
          $magiaodich = $_GET['magiaodich'];
        }else{
          $magiaodich = '';
        }
        $sql_select = mysqli_query($con, "SELECT *  FROM tbl_giaodich ,tbl_sanpham, tbl_donhang WHERE tbl_giaodich.sanpham_id = tbl_sanpham.sanpham_id AND tbl_giaodich.magiaodich = '$magiaodich' AND tbl_donhang.khachhang_id = tbl_giaodich.khachhang_id and tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id");
      ?>
        <table class="table table-bordered">
          <tr style="text-align:center">
            <th>STT</th>
            <th>Mã giao dịch</th>
            <th>Mã hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Ngày đặt</th>
            <th>Thanh toán</th>
          </tr>
          <?php
          $i= 0;
            while($row_donhang = mysqli_fetch_array($sql_select)){
              $i++;
          ?>
            <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_donhang['magiaodich'] ?></td>
              <td><?php echo $row_donhang['mahang'] ?></td>
              <td><?php echo $row_donhang['sanpham_name'] ?></td>
              <td><?php echo $row_donhang['soluong'] ?></td>
              <td><?php echo $row_donhang['ngaythang'] ?></td>
              <td><?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_giakhuyenmai']).'vnđ'?></td>
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
</div>
  </div>

	<!-- //top products -->