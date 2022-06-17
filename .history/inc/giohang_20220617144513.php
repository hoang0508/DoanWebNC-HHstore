<?php
if (isset($_POST['themgiohang'])) {
	$tensanpham = $_POST['tensanpham'];
	$sanpham_id = $_POST['sanpham_id'];
	$hinhanh = $_POST['hinhanh'];
	$gia = $_POST['giasanpham'];
	$soluong = $_POST['soluong'];

	$sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'");
	$count = mysqli_num_rows($sql_select_giohang);

	if ($count > 0) {
		$row_sanpham = mysqli_fetch_array(($sql_select_giohang));
		$soluong = $row_sanpham['soluong'] + 1;
		$sql_giohang = "UPDATE tbl_giohang SET soluong = '$soluong' WHERE sanpham_id= '$sanpham_id'";
	} else {
		// $soluong = $row_sanpham['soluong'];
		$sql_giohang = "INSERT INTO tbl_giohang(tensanpham, sanpham_id, giasanpham, hinhanh, soluong) VALUES ('$tensanpham','$sanpham_id','$gia', '$hinhanh','$soluong')";
	}
	$insert_row = mysqli_query($con, $sql_giohang);
	// khi mà muốn thêm sp kiểm tra row đã = 0 location sẽ hướng về trang sp theo sanpham_id
	// để check số lượng sp trong giỏ hàng
	if ($insert_row == 0) {
		header('Location:index.php?quanly=chitietsp&id=' . $sanpham_id);
	}
}
// array sản phẩm cập nhật: array([0]=>id_sp[soluong]=>.....)
else if (isset($_POST['capnhatsoluong'])) {
	for ($i = 0; $i < count($_POST['product_id']); $i++) {
		$sanpham_id = $_POST['product_id'][$i];
		$soluong = $_POST['soluong'][$i];
		if ($soluong <= 0) {
			$sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang  WHERE sanpham_id = '$sanpham_id'");
		} else {
			$sql_update = mysqli_query($con, "UPDATE tbl_giohang SET soluong = '$soluong' WHERE sanpham_id = '$sanpham_id'");
		}
	}
} else if (isset($_GET['xoa'])) {
	$id = $_GET['xoa'];
	$sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang  WHERE giohang_id = '$id'");
}
?>

<!-- Session trong PHP được dùng để lưu trữ thông tin của người dùng hoặc là lưu trữ tùy chọn cấu hình hệ thống cho người dùng.  -->
<!-- khi lấy dc dữ liệu sản phẩm > tiên shanhf thanh toán; -->
<!-- nếu icó $_POST['thanhtoandangnhap'] tồn tại;gãn $khachhang_id = $_SESSION['khachhang_id'];  -->
<!-- $mahang = rand(0,9999);:tránh việc chùng lặp đơn hàng vì môi dơn 1 mã  -->
<!-- vòng for để kiểm tra và lấy thông tin đơnhàng để nhập v ào swql -->
<?php

$khachhang_id = $_SESSION['khachhang_id'];
$email_kh = $_SESSION['email'];
$name = $_SESSION['dangnhap_home'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];
$mahang = rand(0, 9999);
if (isset($_POST['thanhtoandangnhap'])) {
	$mahang = $_POST['mahang'];
	for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {
		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
		$soluong = $_POST['thanhtoan_soluong'][$i];
		$sql_sp = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'");
		$row_sp = mysqli_fetch_array($sql_sp);
		$sanpham = $row_sp['tensanpham'];
		$total_sp = $row_sp['giasanpham'] * $soluong;

		$sql_donhang = mysqli_query($con, "INSERT INTO tbl_donhang(sanpham_id, khachhang_id, soluong, mahang, phuongthuc) VALUES ('$sanpham_id', '$khachhang_id','$soluong','$mahang', '0')");
		$sql_giaodich = mysqli_query($con, "INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id ) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
		$sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang  WHERE sanpham_id = '$sanpham_id'");
	}
}
?>
<div class="details-bg" style="background-image: url(./images/bn-cart.png)">
	<div class="overlay"></div>
	<h3 class="details-text">Giỏ hàng</h3>
</div>
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			Giỏ hàng của bạn
		</h3>
		<!-- //tittle heading -->
		<div class="loading"></div>
		<div class="checkout-right">
			<?php
			$sql_lay_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
			$row_result_gio = mysqli_num_rows($sql_lay_giohang);
			?>
			<?php
			if ($row_result_gio <= 0) {
			?>
				<div class="cart-null">
					<div class="cart-null--bag">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
					</div>
					<div class="cart-null--text">Chưa có sản phẩm nào được thêm vào giỏ!!</div>
				</div>
			<?php
			} else {
			?>

				<div class="table-responsive">
					<form id="thanhtoan" action="" method="post">
						<table class="timetable_sub" style="width: 98%">
							<thead>
								<tr>
									<th>STT</th>
									<th>Sản phẩm</th>
									<th>Số lượng</th>
									<th>Tên sản phẩm</th>
									<th>Giá</th>
									<th>Giá tổng</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								<!-- tính tổng tiền thanh toán băng các cộng hết giá tiền các sp trong giỏ hàng băng t $total += $subtotal;  -->
								<?php
								$i = 0;
								$total = 0;
								$array_productId = [];
								$array_thanhtoansoluong = [];
								while ($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)) {
									$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
									$total += $subtotal;
									$i++;
								?>
									<tr class="rem1">
										<td class="invert"><?php echo $i ?></td>
										<td class="invert-image">
											<a href="single.html">
												<img style="width:unset;object-fit: cover;" src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " height="130" class="img-responsive">
											</a>
										</td>
										<td class="invert">
											<div class="btn-count btn-count--cart">
												<span class="minus">-</span>
												<input type="text" class="number-cart number" name="soluong[]" id="" value="<?php echo $row_fetch_giohang['soluong']  ?>">
												<span class="plus">+</span>
											</div>
											<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id']  ?>">
										</td>
										<td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
										<td class="invert"><?php echo  number_format($row_fetch_giohang['giasanpham']) . 'vnd' ?></td>
										<td class="invert"><?php echo  number_format($subtotal) . 'vnd' ?></td>
										<td class="invert">
											<a style="color: #fff; font-size: 14px" class="btn btn-danger" href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">
												<i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>
									</tr>
								<?php
								}
								?>
								<tr>
									<td colspan="7" class="cart-price-txt">
										Tổng tiền thanh toán : <?php echo  number_format($total) . 'VNĐ' ?>
									</td>
								</tr>
								<tr>
									<td colspan="7" class="text-right">
										<button type="submit" class="btn-cart btn-cart--update" value="Cập nhật giỏ hàng" name="capnhatsoluong">Cập nhật giỏ hàng</button>
										<?php
										$sql_giohang_select = mysqli_query($con, "SELECT * FROM tbl_giohang");
										$count_giohang_select = mysqli_num_rows($sql_giohang_select);
										if (isset($_SESSION['dangnhap_home']) && $count_giohang_select > 0) {
											while ($row_1 = mysqli_fetch_array($sql_giohang_select)) {
										?>
												<input type="hidden" name="thanhtoan_soluong[]" id="" value="<?php echo $row_1['soluong']  ?>">
												<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
												<?php
												array_push($array_productId, $row_1['sanpham_id']);
												array_push($array_thanhtoansoluong, $row_1['soluong']);
												?>

											<?php
											}
											?>
											<input type="hidden" name="thanhtoandangnhap" value="Thanh toán giỏ hàng" />
											<input type="hidden" name="mahang" value="<?= $mahang?>" />
											<div class="button-cart">
												<button type="button" class="btn-cart btn-cart--price" value="Thanh toán giỏ hàng">Thanh toán giỏ hàng</button>
												<div class="button-cart--loading">
													<div class="lds-ellipsis">
														<div></div>
														<div></div>
														<div></div>
													</div>
												</div>
									</td>
								<?php
										}
								?>
								</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		if (!isset($_SESSION['dangnhap_home'])) {
		?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="w3_agileits_card_number_grids col-md-12 d-flex" style="padding: 0;">
										<div class="controls col-md-6">
											<input class="billing-address-name form-control form-cart" type="text" name="name" placeholder="Tên của bạn..." required="">
										</div>
										<div class="w3_agileits_card_number_grid_right col-md-6">
											<div class="controls">
												<input type="text" class="form-control form-cart" placeholder="Email" name="email" required="">
											</div>
										</div>
									</div>
									<div class="w3_agileits_card_number_grids col-md-12 d-flex" style="padding: 0;">
										<div class="w3_agileits_card_number_grid_left col-md-6">
											<div class="controls">
												<input type="text" class="form-control form-cart" placeholder="Số điện thoại..." name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right col-md-6">
											<div class="controls">
												<input type="text" class="form-control form-cart" placeholder="Địa chỉ..." name="address" required="">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="controls ">
											<textarea style="padding: 0;" class="form-control" id="" placeholder="Ghi chú" name="note" require=""></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="controls">
											<select class="option-w3ls" name="giaohang">
												<option>Chọn hình thức giao hàng</option>
												<option value="1">Thanh toán qua thẻ</option>
												<option value="0">Giao bán tại nhà</option>
											</select>
										</div>
									</div>
								</div>
								<?php
								$sql_lay_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
								while ($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)) {
								?>
									<input type="hidden" name="thanhtoan_soluong[]" id="" value="<?php echo $row_1['soluong']  ?>">
									<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id']  ?>">
								<?php
								}
								?>
								<input type="submit" name="thanhtoan" value="Thanh toán đơn hàng" class="btn btn-success" style="width: 30%">
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- //checkout page -->

<?php
if (isset($_GET['m'])) { ?>
	<div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
<?php } ?>
<script>
	const btnDelete = document.querySelectorAll(".btn-danger");
	[...btnDelete].forEach((item) => {
		item.addEventListener("click", (e) => {
			e.preventDefault();
			const href = e.currentTarget.getAttribute("href");
			Swal.fire({
				title: 'Bạn có muốn xóa sản phẩm?',
				text: "Bạn sẽ không thể hoàn nguyên điều này!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Tôi đồng ý!!'
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

<script>
	const btnCartUpdate = document.querySelector(".btn-cart--update");
	btnCartUpdate.addEventListener("click", async (e) => {
		await Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Cập nhật sản phẩm thành công!!',
			showConfirmButton: false,
			timer: 50000000
		})
	})
</script>

<!-- AJAX EMAIL -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-cart--price').click(function(e) {
			$(this).css({
				color: "transparent"
			})
			$('.button-cart--loading').addClass("active");
			$.ajax({
				type: "POST",
				url: './ajax/mail.php',
				data: {
					thanhtoan_product_id: `<?= json_encode($array_productId, JSON_UNESCAPED_UNICODE)  ?>`,
					thanhtoan_soluong: `<?= json_encode($array_thanhtoansoluong, JSON_UNESCAPED_UNICODE)  ?>`,
					khachhang_id: "<?= $khachhang_id ?>",
					email: "<?= $email_kh ?>",
					dangnhap_home: "<?= $name ?>",
					address: "<?= $address ?>",
					phone: "<?= $phone ?>",
					mahang: "<?= $mahang ?>"
				},
				success: function(response)

				{
					$('#thanhtoan').submit()

				}
			});
		});
	});
</script>