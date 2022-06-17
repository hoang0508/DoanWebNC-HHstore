<style>
		input.ip {
			border-radius: 10px 0px 0px 10px;
		}
		.brand img.logo-img {
			width: 200px;
		}
		.brand .slick-track {
			display: flex;
			align-items: center;
		}
		/*noti*/
@media screen and (min-width: 1280px) {
	.noti {
		left: 15px;
		max-width: 450px;
	}
	.noti-image {
		height: 120px;
	}
}

.noti {
	align-items: center;
  position: fixed;
  bottom: 15px;
  left: 15px;
  background-color: #fff;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  width: 100%;
  height: 130px;
  border-radius: 10px;
  transform: translateY(150%);
  animation: noti 10s forwards 5 linear;
  z-index: 20;
}

@keyframes noti {
  20%,
  80% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(150%);
  }
}

.noti-image {
  flex-shrink: 0;
  border-radius: inherit;
  object-fit: cover;
}

.noti-content {
  padding: 15px;
  flex: 1;
}

.noti-desc span {
  display: block;
  margin-top: var(--mt-0);
  font-size: 14px;
}

.pay {
	display: flex;
	align-items: center;
	gap: 0 5px;
}

.pay img {
	border-radius: 5px;
  width: 40px;
}
	</style>
	
	<!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Doanh nghiệp liên kết</h2>
				<div class="brand d-flex align-items-center">
					<img src="images/logo1.jpg" alt="" class="logo-img">
					<img src="images/logo2.jpg" alt="" class="logo-img">
					<img src="images/logo3.jpg" alt="" class="logo-img">
					<img src="images/logo4.jpg" alt="" class="logo-img">
					<img src="images/logo5.jpg" alt="" class="logo-img">
					<img src="images/logo6.jpg" alt="" class="logo-img">
					<img src="images/acer.png" alt="" class="logo-img">
					<img src="images/hp.png" alt="" class="logo-img">
					<img src="images/dell.png" alt="" class="logo-img">
					<img src="images/asus.png" alt="" class="logo-img">
				</div>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Miễn phí vận chuyển</h3>
								<p>Đơn hàng trên 100$</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Vận chuyển nhanh</h3>
								<p>Toàn quốc</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Tin cậy</h3>
								<p>Sự đảm bảo</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="footer-bg">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Danh mục</h3>
						<ul>
							<li class="mb-3">
								<a href="product.html">Điện thoại</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Máy tính</a>
							</li>
							<li class="mb-3">
								<a href="product.html">TV, Audio</a>
							</li>
							<li class="mb-3">
								<a href="product2.html">Tủ lạnh</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Điều hòa</a>
							</li>
							<li>
								<a href="product2.html">Gia dụng</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Tương tác</h3>
						<ul>
							<li class="mb-3">
								<a href="about.html">Tuyển dụng</a>
							</li>
							<li class="mb-3">
								<a href="contact.html">Liên hệ</a>
							</li>
							<li class="mb-3">
								<a href="help.html">Trợ giúp</a>
							</li>
							<li class="mb-3">
								<a href="faqs.html">Truy cập</a>
							</li>
							<li class="mb-3">
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Liên lạc</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i>36, Thanh Hóa, VN</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 00 888 196 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +999 777 888</li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com">huyhoang@gmail.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Gửi thư</h3>
						<p class="mb-3">Free Delivery on your first order!</p>
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control ip" placeholder="Email" name="email" required="">
								<input type="submit" style="border-radius: 0px 10px 10px 0px;" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
									<li>
										<a class="icon ig" href="#">
											<i class="fa fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->
	</footer>
	<!-- //footer -->
  	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<div class="footer-bt d-flex justify-content-between align-items-center">
				<p class="text-white text-dg">© 2022 HH Store. Bản quyền sỡ hữu | Design by Huy Hoàng
					<a href="http://w3layouts.com"> EPU.</a>
				</p>
					<div class="pay">
						<img src="./images/pay1.png" alt="">
						<img src="./images/pay2.png" alt="">
						<img src="./images/pay3.png" alt="">
						<img src="./images/pay4.png" alt="">
						<img src="./images/pay5.png" alt="">
						<img src="./images/pay6.png" alt="">
						<img src="./images/pay7.png" alt="">
						<img src="./images/pay8.png" alt="">
					</div>
			</div>
		</div>
	</div>
	<!-- //copyright -->

	<?php
		$sql_product = mysqli_query($con, "SELECT * FROM tbl_donhang ORDER BY tbl_donhang.donhang_id DESC");
		$row_sanpham = mysqli_fetch_array($sql_product);
		if($row_sanpham['huydon'] == 2) {
				return ;
		}
		else {
			$sanpham_id = $row_sanpham['donhang_id'];
			$sql_sanpham = mysqli_query($con, "SELECT * FROM tbl_donhang , tbl_sanpham, tbl_khachhang WHERE tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id AND tbl_khachhang.khachhang_id = tbl_donhang.khachhang_id ORDER BY tbl_donhang.donhang_id DESC");
			while($row_noti = mysqli_fetch_array($sql_sanpham)){
					if($row_noti['donhang_id'] == $sanpham_id) {
					?>
					<div class="noti d-flex">
					<img src="images/<?php echo $row_noti['sanpham_image'] ?>" alt=" " class="noti-image">
					<div class="noti-content ">
							<h3 class="noti-data "><?php echo $row_noti['name'] ?></h3>
							<p class="noti-desc ">
								<p>Đã mua</p>
								<?php echo $row_noti['ngaythang'] ?><br> <span>vừa xong</span>
							</p>
					</div>
			</div>
		<?php
				}
			}
		}
	?>