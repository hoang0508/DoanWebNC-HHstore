<?php
include './db/conect.php';
// include './incLogin.php';
?>
<?php
if (isset($_POST['dangnhap_home'])) {
	$taikhoan = $_POST['email_login'];
	$matkhau = md5($_POST['password_login']);

	if ($taikhoan == "" || $matkhau == "") {
		echo '<script>alert("Bạn hãy nhập đủ thông tin")</script>';
	} else {
		$sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$taikhoan' AND password = '$matkhau' LIMIT 1");
		$count = mysqli_num_rows($sql_select_admin);
		$row_dangnhap = mysqli_fetch_array($sql_select_admin);
		if ($count > 0) {
			$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
			$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
			echo '<script>alert("Đăng nhập thành công!")</script>';
		} else {
			echo '<script>alert("Tài khoản hoặc mật khẩu sai!")</script>';
		}
	}
}
?>
<?php
$sql_donhang = mysqli_query($con, "SELECT * FROM tbl_donhang");
$row_dh = mysqli_fetch_array($sql_donhang);
// $_SESSION['em_donhang'] = $row_dh['email'];
?>
<style>
	.line-text {
		text-align: center;
		position: relative;
	}

	.line-text:before {
		content: "";
		width: 100%;
		height: 1px;
		position: absolute;
		top: 50%;
		left: 0;
		transform: translateY(-50%);
		background-color: #333;
	}

	.line-text span {
		display: inline-block;
		background-color: white;
		position: relative;
		z-index: 2;
		padding: 1rem;
		font-weight: 600;
	}

	.social-share {
		width: 100%;
		max-width: 300px;
		margin: 0 auto;
	}

	.social-share-icon {
		width: 40px;
		height: 40px;
		background-color: white;
		border-radius: inherit;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 18px;
	}

	.social-share-text {
		color: white;
		margin-left: 20px;
		font-size: 16px;
	}

	.social-share-item {
		width: 100%;
		padding: 10px;
		border-radius: 8px;
		display: flex;
		align-items: center;
		cursor: pointer;
	}

	.social-share-item.facebook {
		background-color: #3b5999;
	}

	.social-share-item.facebook .social-share-icon {
		color: #3b5999;
	}

	.social-share-item.instagram {
		background-color: #e4405f;
	}

	.social-share-item.instagram .social-share-icon {
		color: #e4405f;
	}

	.social-share-item.twitter {
		background-color: #55acee;
	}

	.social-share-item.twitter .social-share-icon {
		color: #55acee;
	}

	.social-share-item+.social-share-item {
		margin-top: 20px;
	}
</style>
<!-- top-header -->
<div class="agile-main-top">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2 align-items-center">
			<div class="col-lg-4 header-most-top">
				<p class="text-white text-lg-left text-center">Uy tín - Nhanh chóng - Tiện lợi
					<i class="fas fa-shopping-cart ml-1"></i>
				</p>
			</div>
			<div class="col-lg-8 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul class="header-top">
					<?php
					if (isset($_SESSION['dangnhap_home'])) {
					?>
						<li class="text-center border-right text-white">
							<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white d-flex align-items-center">
								<i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home']  ?></a>
						</li>
					<?php
					}
					?>
					<li class="text-center border-right text-white">
						<i class="fas fa-phone mr-2"></i> 001 234 5678
					</li>
					<li class="text-center border-right text-white">
						<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
							<i class="fa fa-sign-out" aria-hidden="true"></i> Đăng nhập</a>
					</li>
					<li class="text-center border-right text-white">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<a href="?login=dangxuat" style="color: #fff;">Đăng xuất</a>
					</li>
					<li class="text-center text-white">
						<i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 20px;"></i>
						<?php
						if (!isset($_SESSION['dangnhap_home'])) {
							unset($_SESSION['dangnhap_home']);
						} else {
						?>
							<?php echo $_SESSION['dangnhap_home'] ?>
						<?php
						}
						?>
					</li>
				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>

<!-- log in -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="border: none;">
			<div class="modal-header">
				<h5 class="modal-title text-center">Đăng nhập Tài khoản</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="login__create">
					<div class="form-login">
						<div class="form-group center">
							<i class="fa fa-envelope-o icon-form" aria-hidden="true"></i>
							<input type="text" name="email_login" id="" class="form-email" placeholder="Email">
						</div>
						<div class="form-group center">
							<i class="fa fa-lock icon-form" aria-hidden="true"></i>
							<input type="password" name="password_login" id="" class="form-password" placeholder="Password">
							<i class="fa fa-eye eye-pass icon-eye" aria-hidden="true"></i>
						</div>
						<div class="form-group">
							<input type="submit" name="dangnhap_home" class="login__button" value="Đăng nhập">
						</div>
					</div>
					<div class="line-text"><span>Or</span></div>
					<div class="social-share">
						<div class="social-share-item facebook">
							<i class="fab fa-facebook social-share-icon"></i>
							<span class="social-share-text">Đăng nhập qua Facebook</span>
						</div>
						<div class="social-share-item instagram">
							<i class="fab fa-instagram social-share-icon"></i>
							<span class="social-share-text">Đăng nhập qua Instagram</span>
						</div>
						<div class="social-share-item twitter">
							<i class="fab fa-twitter social-share-icon"></i>
							<span class="social-share-text">Đăng nhập qua Twitter</span>
						</div>
					</div>
					<p class="text-center dont-do mt-3">Chưa có tài khoản?
						<a href="#" data-toggle="modal" data-target="#dangky">
							Đăng ký ngay</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- register -->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="border: none;">
			<div class="modal-header">
				<h5 class="modal-title">Đăng ký tài khoản</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" class="form" id="form" method="POST">
					<div class="form-control">
						<label for="#">User name</label>
						<input type="text" name="name" id="username" placeholder="huyhoang0508">
					</div>
					<div class="form-control">
						<label for="#">Enail</label>
						<input type="email" name="email" id="email" placeholder="huyhoang@gmail.com">
					</div>
					<div class="form-control">
						<label for="#">Phone</label>
						<input type="number" name="phone" id="email" placeholder="0000">
					</div>
					<div class="form-control">
						<label for="#">Địa chỉ</label>
						<input type="text" name="address" id="email" placeholder="vd: Hà Nội">
					</div>
					<div class="form-control">
						<label for="#">Password</label>
						<input type="password" name="password" id="password" placeholder="Password">
						<i class="fa fa-eye icon-eye" aria-hidden="true"></i>
						<small class="error-txt">Error message</small>
					</div>
					<input type="hidden" name="giaohang" value="0">
					<div class="form-control">
						<textarea style="border: 1px solid #ccc" class="form-control" name="note">Ghi chú</textarea>
					</div>
					<input type="submit" style="width: 100%" name="dangky" class="login__button btn btn-primary" value="Đăng ký">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //modal -->
<!-- //top-header -->

<!-- header-bottom-->
<div class="header-bot">
	<div class="container">
		<div class="row header-bot_inner_wthreeinfo_header_mid">
			<!-- logo -->
			<div class="col-md-3 logo_agile">
				<h1 class="text-center">
					<a href="index.html" class="font-weight-bold font-italic">
						HH Store
					</a>
				</h1>
			</div>
			<!-- //logo -->
			<!-- header-bot -->
			<div class="col-md-9 header mt-4 mb-md-0 mb-4">
				<div class="row">
					<!-- search -->
					<div class="col-10 agileits_search">
						<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
							<input class="input-search" name="search_product"  placeholder="Tìm kiếm sản phẩm" required>
							<button class="btn-search--input" name="search_button" type="submit">Tìm kiếm</button>
						</form>
					</div>
					<!-- //search -->
					<!-- cart details -->
					<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
						<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<form action="#" method="post" class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<a href="?quanly=giohang">
									<button class="btn w3view-cart" type="button" name="submit" value="">
										<i class="fas fa-cart-arrow-down cart-down"></i>
										<?php
										$sql_giohang = mysqli_query($con,  "SELECT COUNT(*) AS 'gh' FROM `tbl_giohang`");
										$row_gh = mysqli_fetch_array($sql_giohang)
										?>
										<span class="cart-number"><?php echo $row_gh['gh']  ?></span>
									</button>
								</a>
							</form>
						</div>
					</div>
					<!-- //cart details -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->
<!-- navigation -->
<script>
	// show password
	const iconEye = document.querySelectorAll(".icon-eye");
	iconEye.forEach((item) =>
		item.addEventListener("click", function(e) {
			const input = this.previousElementSibling;
			const inputType = input.getAttribute("type");
			if (inputType === "password") {
				input.setAttribute("type", "text");
				e.target.classList.toggle("fa-eye-slash");
				e.target.classList.toggle("fa-eye");
			} else {
				input.setAttribute("type", "password");
				e.target.classList.toggle("fa-eye-slash");
				e.target.classList.toggle("fa-eye");
			}
		})
	);
</script>