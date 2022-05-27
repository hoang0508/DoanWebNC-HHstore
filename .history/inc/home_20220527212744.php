<style>
h3.heading-tittle {
	display: inline-block;
	position: relative;
  margin-bottom: 50px !important;
	font-weight: 600;
  font-size: 32px;
	padding-right: 10px;
}

h3.heading-tittle::before {
	content: "";
	position: absolute;
	top: 50%;
	left: 100%;
	width: 50px;
	height: 5px;
	background-color: #3D6EF7;
	border-radius: 10px;
}


.product-new-top {
  top: -50px;
}

.btn-buy {
	justify-content: space-between;
	align-items: center;
}

.btn-buy i.fa-cart-plus {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
		font-size: 21px;
		color: #fff;
}
.btn-buy button.button-cart {
		/* width: 45px; */
		padding: 12px 30px;
    height: 45px;
    background: #ec008c;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #fc6767, #ec008c);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #fc6767, #ec008c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		color: #fff;
    border: none;
    outline: none;
    border-radius: 100rem;
    cursor: pointer;
    transition: all 0.25s linear;
    display: flex;
    justify-content: center;
    align-items: center;
}

button.button:hover {
	opacity: 0.6;
}
.social-cart {
	color: #ccc;
	cursor: pointer;
}
.social-cart i {
	margin-left: 10px;
}

a.icon-heart:hover {
	color: red;
}

.banner-smart img {
	border-radius: 10px;
}

@media screen and (min-width: 1280px) {
	.smart-slider  {
	width: 800px;
}
.smart-trend  img {
	width: 150px;
}
.smart-trend {
	margin-left: 20px;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-gap: 20px;
}
.app img {
	width: 100%;
	margin: 10px auto;
	padding: 0px 10px;
}
}

/*subscrice*/

#subscrice {
	margin-top: 30px;
}
.subscrice-container {
	background: #1A2980;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #26D0CE, #1A2980);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #26D0CE, #1A2980); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    padding: 10px 0px!important;
    /* grid-template-columns: repeat(2, 1fr); */
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 10px;
		display: flex;
		flex-direction: column;
		justify-content: center;
}

h3.subscrice-title {
    text-align: center;
    color: #fff;
}

.countdown {
		margin: 30px 0px 10px;
    justify-content: center;
}
.countdown div {
    position: relative;
    width: 45px;
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    background-color: #fff;
    color: #3D6EF7;
    margin: 0px 15px;
    font-size: 20px;
    font-weight: 500;
    border-radius: 10px 0 0 0;
}

.countdown div::before {
    content: "";
    position: absolute;
    bottom: -30px;
    left: 0;
    width: 100%;
    height: 35px;
    background-color: #3D6EF7;
    color: #fff;
    border: 1px solid #fff;
    font-size: 11px;
    line-height: 35px;
    font-weight: 300;
    border-radius: 0 0px 12px 0px;
}

.countdown #day::before {
    content: "Days";
}

.countdown #hour::before {
    content: "Hour";
}

.countdown #minute::before {
    content: "Minute";
}

.countdown #second::before {
    content: "Second";
}
button.subscrice-btn {
		margin: 40px auto 0;
		width: 120px;
    height: 50px;
		border: none;
		outline: none;
    background-color: #fff;
		color:#3D6EF7;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 10px;
		cursor: pointer;
}

.app {
	margin-top: 20px;
}

.info-sale {
	margin-top: 20px;
	display: flex;
	flex-direction: column;
}
.info-sale img {
	/* width: 285px; */
	width: 100%;
	object-fit: cover;
	margin-bottom: 20px;
	border-radius: 10px;
}
</style>
<?php 
	if(!isset($_SESSION['luottruycap'])) {
		$_SESSION['luottruycap'] = 0;
	}
	else {
		$_SESSION['luottruycap']+=1;
	}
?>
<?php 
	if(isset($_GET['yeuthich']) && $_GET['id']) {
		$yt = $_GET['yeuthich'];
		$id = $_GET['id'];
	}
	else {
		$yt = "";
		$id= "";
	}
	$update_yt = mysqli_query($con, "UPDATE tbl_sanpham SET sanpham_yeuthich = '$yt' WHERE sanpham_id = '$id'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			Danh mục sản phẩm
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<?php
							$sql_category_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");
							while($row_cate_home = mysqli_fetch_array($sql_category_home)) {
								$id_category = $row_cate_home['category_id'];
						?>
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4 slider-product">
							<h3 class="heading-tittle  heading-title1"><?php echo $row_cate_home['category_name'] ?></h3>
							<div class="row product-row">
								<?php
									$sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY tbl_sanpham.sanpham_id DESC");
									while($row_sanpham = mysqli_fetch_array($sql_product)) {
										$sanpham_id = $row_sanpham['sanpham_id'];
										if($row_sanpham['category_id'] == $id_category) {
								?>
								<div class="col-md-4 product-men mt-5 product-item">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img class="image-product" style="object-fit: cover;" src="images/<?php echo $row_sanpham['sanpham_image'] ?>"  alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
											<span class="product-new-top">Sale</span>
										</div>
										<div class="item-info-product border-top mt-4">
											<h4 class="pt-1">
												<a class="pd-name" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnd'?></span>
												<del><?php echo number_format($row_sanpham['sanpham_gia']).'vnd'?></del>
											</div>
											<div class="star-buy d-flex mt-3 justify-content-between">
												<div class="star-vote flex">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
										</div>
											<?php 
												$sql_soluongban = mysqli_query($con,"SELECT *, SUM(tbl_sanpham.sanpham_soluong) - SUM(tbl_sanpham.sanpham_soluong-tbl_donhang.soluong) AS 'daban'  FROM tbl_donhang, tbl_sanpham WHERE tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id AND tbl_sanpham.sanpham_id = '$sanpham_id'" );
														$row_ban = mysqli_fetch_array($sql_soluongban);
														if($row_sanpham['sanpham_id'] = $sanpham_id) {
											?>
														<span class="number-buy">
														<?php
														if($row_ban['soluong'] >= 1) {
														?>
														Đã bán
														<?php
															echo $row_ban['daban']
														?>
														sp
														<?php
														}
														else {
															echo 'Đang còn hàng';
															?>
															<?php
														}
														?>
												</span>
												<?php
														}
												?>
											</div>
											<br>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />	
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />	
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />
													<!-- <input type="hidden" name="mahang" value="<?php echo $row_ban['mahang'] ?>" /> -->
													<div class="btn-buy">
														<button type="submit" name="themgiohang" value = "" class="button-cart" >
															<!-- <i class="fa fa-cart-plus" aria-hidden="true"></i> -->
														Mua ngay
														</button>
														<div class="social-cart">
															<?php
																$sql_yt = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$sanpham_id'");
																while($row_yeuthich = mysqli_fetch_array($sql_yt)) {
															?>
																<?php
																if($row_yeuthich['sanpham_yeuthich']!=0) {
																	?>
																	<?php
																	$sql_yt1 =  mysqli_query($con, "SELECT *, COUNT(sanpham_yeuthich) AS 'YT' FROM tbl_sanpham");
																	$row_yt1 = mysqli_fetch_array($sql_yt1);
																	$i=0;
																	$dd = array($row_yt1['sanpham_yeuthich']);
																	$counthh = count($dd);
																	while($i < $counthh) {
																		?>
																		<a style="color:#3D6EF7" class="icon-heart" href="index.php?id=<?php echo $row_yeuthich['sanpham_id'] ?>&yeuthich=<?php echo $i ?>"><i class="fa fa-heart-o icon-heart" style="color:#3D6EF7;" aria-hidden="true">
																		</i>
																		</a>	
																	<!-- ?> -->
																<?php
																$i++;
																	}
																?>
																	<?php
																}
																else {
																	?>	
																<a style="color: #ccc;" class="icon-heart" href="?index.php&id=<?php echo $row_yeuthich['sanpham_id'] ?>&yeuthich=<?php echo $i++ ?>"><i class="fa fa-heart-o icon-heart" style="color: #ccc;" aria-hidden="true"></i>
																</a>
																	<?php
																}
																?>
															<?php
																}
															?>
															<i class="fa fa-share" aria-hidden="true"></i>
														</div>
													</div>
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<!-- //first section -->
						<?php
							}
						?>
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
					<div class="access-eye mb-2">
						<span>Lượt truy cập: 
							<?php
								if(isset($_SESSION['luottruycap'])) {
									echo $_SESSION['luottruycap'];
								}
							?>
						</span>
					</div>
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm kiếm</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Sản phẩm" name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Dưới 1 triệu</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Khách hàng review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<ul>
							<?php
						$sql_category_sidebar = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
						while($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)) {
							?>
								<li>
									<!-- <input type="checkbox" class="checked"> -->
									<span class="span"><a href="danhmucsanpham.php?id=<?php echo $row_category_sidebar['category_id'] ?>"><?php echo $row_category_sidebar['category_name'] ?></a></span>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
						<!-- //electronics -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
							<div class="box-scroll">
								<div class="scroll">
								<?php
									$sql_product_sidebar = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot = '0'  ORDER BY sanpham_id DESC");
									while($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
									?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image']?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_sanpham_sidebar['sanpham_name']?></a>
											<a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).'vnd'?></a>
											<del><?php echo number_format( $row_sanpham_sidebar['sanpham_gia']).'vnd'?></del>
										</div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
					<section id="subscrice">
        <div class="subscrice-container container d-grid d-flex">
            <div class="subscrice-container__data" data-aos="zoom-in-up" data-aos-easing="ease-in-out" data-aos-delay="300">
                <h3 class="data-subtitle subscrice-title ">Subscrice And Sale <br> 50% OFF.</h3>
                <div class="countdown d-flex ">
                    <div id="day">NA</div>
                    <div id="hour">NA</div>
                    <div id="minute">NA</div>
                    <div id="second">NA</div>
                </div>
            </div>
                <button type="submit" class="button subscrice-btn data-btn ">
                    Subscrice
                </button>
								<div class="app">
									<img src="./images/app1.png" alt="" class="app-image">
									<img src="./images/app2.png" alt="" class="app-image">
								</div>
        </div>
    </section>
						<div class="info-sale">
							<img src="./images/samsung.png" alt="">
							<img src="./images/giadung.png" alt="">
							<img src="./images/locnuoc.png" alt="">
							<img src="./images/micro.png" alt="">
							<img src="./images/giadung2.png" alt="">
							<img src="./images/bep.png" alt="">
							<img src="./images/massa.png" alt="">
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->
	<div class="banner-smart container d-flex mb-3">
		<div class="smart-slider">
			<img src="images/anh5.jpg" alt="">
			<img src="images/anh6.png" alt="">
			<img src="images/anh7.png" alt="">
		</div>
		<div class="smart-trend">
			<img src="images/anh1.png" alt="" class="item-trend">
			<img src="images/anh2.png" alt="" class="item-trend">
			<img src="images/anh3.png" alt="" class="item-trend">
			<img src="images/anh4.png" alt="" class="item-trend">
		</div>
	</div>

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Sản phẩm nổi bật</h6>
								<h4 class="mt-2 mb-3">Iphone 13</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/iPhone 13.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>Sản phẩm sắp ra mắt</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/samsung-galaxy-a52-8gb-256gb-thumb-blue-600x600-600x600.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->

	<script>
		/* coundown timer*/
var countDate = new Date("June 31, 2022 00:00:00 ").getTime();

function newYear() {
  let now = new Date().getTime();
  gap = countDate - now;

  let second = 1000;
  let minute = second * 60;
  let hour = minute * 60;
  let day = hour * 24;

  let d = Math.floor(gap / day);
  let h = Math.floor((gap % day) / hour);
  let m = Math.floor((gap % hour) / minute);
  let s = Math.floor((gap % minute) / second);

  document.getElementById("day").innerText = d;
  document.getElementById("hour").innerText = h;
  document.getElementById("minute").innerText = m;
  document.getElementById("second").innerText = s;
}

setInterval(function () {
  newYear();
}, 1000);
	</script>