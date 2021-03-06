<style>
	/* chi tiet sp*/
	i.fa-star {
		color: coral;
	}

	.form-cart {
		border-bottom: 1px solid #ccc;
		padding-bottom: 30px;
	}

	.occasion-cart .snipcart-details {
		width: 100% !important;
		margin: 0;
	}

	.add-cart input.number-cart {
		width: 100px;
		margin-right: 30px;
		outline: none;
		border: 1px solid #ccc;
		padding: 10px;
		border-radius: 5px;
	}

	.social-interact a.modal-social i {
		border: 1px solid #ddd;
		border-radius: 5px;
		width: 40px;
		height: 40px;
		display: inline-block;
		line-height: 40px;
		text-align: center;
		font-size: 20px;
		margin-right: 6px;
	}

	a.modal-social i.facebook {
		color: #4867aa;
		transition: all 0.25s linear;
	}

	a.modal-social i.facebook:hover {
		background-color: #4867aa;
		color: #fff;
	}

	a.modal-social i.twitter {
		transition: all 0.25s linear;
		color: #1da1f2;
	}

	a.modal-social i.twitter:hover {
		background-color: #1da1f2;
		color: #fff;
	}

	a.modal-social i.instagram {
		color: #dd5144;
		transition: all 0.25s linear;
	}

	a.modal-social i.instagram:hover {
		background-color: #dd5144;
		color: #fff;
	}

	a.modal-social i.youtube {
		color: #bd081b;
		transition: all 0.25s linear;
	}

	a.modal-social:hover i.youtube {
		background-color: #bd081b;
		color: #fff;
	}

	.btn-buy i.fa-cart-plus {
		color: #fff;
	}

	button.button--cart {
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 12px 30px;
		background: #FF512F;
		/* fallback for old browsers */
		background: -webkit-linear-gradient(to left, #DD2476, #FF512F);
		/* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to left, #DD2476, #FF512F);
		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		color: #fff;
		border: none;
		outline: none;
		border-radius: 100rem;
		cursor: pointer;
		transition: all 0.25s linear;
	}

	button.button p {
		margin-left: 10px;
		color: #fff !important;
		font-size: 16px;
		font-weight: 500;
	}

	button.button:hover {
		opacity: 0.6;
	}

	.flex-control-thumbs {
		display: flex !important;
		justify-content: center;
		align-items: center;
		gap: 10px;
	}

	.flex-control-thumbs img {
		width: 150px;
		object-fit: cover;
		padding: 3px;
		border-radius: 5px;
	}

	.flex-control-thumbs img:focus {
		border-color: #1da1f2;
	}

	.product-title p.heading-pd {
		max-width: 500px;
		background: #FF512F;
		/* fallback for old browsers */
		background: -webkit-linear-gradient(to bottom, #DD2476, #FF512F);
		/* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to bottom, #DD2476, #FF512F);
		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		color: #fff;
		padding: 10px;
		border-radius: 5px;
		margin-bottom: 15px;
		text-transform: uppercase;
		margin-top: 20px;
		font-weight: bold;
	}

	.shipp-add {
		margin: 20px 0 30px;
		text-transform: uppercase;
		font-weight: 600;
		color: black;
	}

	@media screen and (min-width: 1280px) {
		img.shipper {
			width: 600px;
			object-fit: cover;
		}
	}

	.review-voted {
		width: 100%;
		display: flex;
		align-items: center;
		flex-direction: column;
	}

	.voted-item {
		width: 100%;
		display: flex;
		align-items: center;
		margin-bottom: 10px;
	}

	.bar-vote {
		width: 86%;
		height: 6px;
		border-radius: 5rem;
		border: 1px solid #eee;
		margin: 0 10px;
	}

	.bar-percent {
		height: 100%;
		background-color: #07a787;
		border-radius: inherit;
	}

	.bar-percent-1 {
		height: 100%;
		background-color: #4e54c8;
		border-radius: inherit;
	}

	.bar-percent-2 {
		height: 100%;
		background-color: #f34770;
		border-radius: inherit;
	}

	.bar-percent-3 {
		height: 100%;
		background-color: #42d697;
		border-radius: inherit;
	}

	.bar-percent-4 {
		height: 100%;
		background-color: #1da1f2;
		border-radius: inherit;
	}
	.product-cart .row {
		flex-direction: column !important;
	}
</style>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = '';
}
$sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id'");
$sql_soluong = mysqli_query($con,"SELECT *, SUM(tbl_sanpham.sanpham_soluong) - SUM(tbl_donhang.soluong) AS 'soluong'  FROM tbl_donhang, tbl_sanpham WHERE tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id AND tbl_sanpham.sanpham_id = '$id'" );
$row_sp_cs = mysqli_fetch_array($sql_soluong)
?>
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php">Trang ch???</a>
					<i>|</i>
				</li>
				<li>Chi ti???t s???n ph???m</li>
			</ul>
		</div>
	</div>
</div>
<div class="details-bg" style="background-image: url(./images/bn-details.jpg)">
	<div class="overlay"></div>
	<h3 class="details-text">Chi ti???t s???n ph???m</h3>
</div>
<!-- //page -->
<?php
while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
?>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="product-cart">
				<div class="d-flex">
					<div class="col-lg-5 col-md-8 single-right-left ">
						<div class="grid images_3_of_2">
							<div class="flexslider">
								<ul class="slides d-flex align-items-center">
									<li data-thumb="images/<?php echo $row_chitiet['sanpham_image'] ?>">
										<div class="thumb-image">
											<img src="images/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true" class="img-fluid" alt="">
										</div>
									</li>
									<li data-thumb="images/<?php echo $row_chitiet['sanpham_img1'] ?>">
										<div class="thumb-image">
											<img src="images/<?php echo $row_chitiet['sanpham_img1'] ?>" data-imagezoom="true" class="img-fluid" alt="">
										</div>
									</li>
									<li data-thumb="images/<?php echo $row_chitiet['sanpham_img2'] ?>">
										<div class="thumb-image">
											<img src="images/<?php echo $row_chitiet['sanpham_img2'] ?>" data-imagezoom="true" class="img-fluid" alt="">
										</div>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>

						</div>
					</div>
					<div class="col-lg-7 single-right-left simpleCart_shelfItem">
						<h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
						<div class="star-vote d-flex justify-content-between">
							<div class="start">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
							</div>
							<div class="heart">
								<i class="fa fa-heart-o mr-2" aria-hidden="true"></i>
								<i class="fa fa-share" aria-hidden="true"></i>
							</div>
						</div>
						<p class="mb-3">
							<span class="product-details--text">Gi?? s???n ph???m: </span>
							<span class="item_price details-price"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']) . 'vnd' ?></span>
							<del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['sanpham_gia']) . 'vnd' ?></del>
						</p>
						<div class="product-details--text mb-3">
							<?php
							if( $row_sp_cs['soluong'] >= 0) {
								?>
								<?php echo $row_sp_cs['soluong'] ?>  s???n ph???m c?? s???n
								<?php 
							}
							else {
								echo $row_sp_cs['sanpham_soluong]   s???n ph???m c?? s???n
								?>
							}
							</div>
						<div class="occasion-cart">
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out ">
								<!-- action="?quanly=giohang":???????ng ???? cho h??nh ?????ng c???a form;d??ng vs ph????ng th???c Post -->
								<form action="?quanly=giohang" method="post" class="form-cart">
									<fieldset>
										<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
										<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
										<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai'] ?>" />
										<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
										<div class="add-cart d-flex align-items-center">
											<span class="product-details--text">S??? l?????ng: </span>
											<div class="btn-count">
												<span class="minus">-</span>
												<input type="text" min="1" name="soluong" value="1" class="number-cart" />
												<span class="plus">+</span>
											</div>
											<div class="btn-buy btn-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>
												<button type="submit" name="themgiohang" value="" class="button button--cart">
													<p>Th??m gi??? h??ng</p>
												</button </div>
									</fieldset>
								</form>
								<div class="social-interact mt-3">
									<h3 class="social-title mb-3" style="font-size: 20px;">Chia s???</h3>
									<a href="#" class="modal-social">
										<i class="fa fa-facebook facebook" aria-hidden="true"></i>
									</a>
									<a href="#" class="modal-social">
										<i class="fa fa-twitter twitter" aria-hidden="true"></i>
									</a>
									<a href="#" class="modal-social">
										<i class="fa fa-instagram instagram" aria-hidden="true"></i>
									</a>
									<a href="#" class="modal-social">
										<i class="fa fa-youtube youtube" aria-hidden="true"></i>
									</a>
								</div>
							</div>
							<p class="shipp-add">????n v??? v???n chuy???n</p>
							<img class="shipper" src="./images/ctsp.png" alt="">
							<p class="shipp-add">Kh??ch h??ng ????nh gi??</p>
							<div class="review-voted">
								<div class="voted-item">
									<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>
									<div class="bar bar-vote">
										<div class="bar-percent" style="width: 25%;"></div>
									</div>
									<span class="number-vote">45</span>
								</div>
								<div class="voted-item">
									<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>
									<div class="bar bar-vote">
										<div class="bar-percent-1" style="width: 15%;"></div>
									</div>
									<span class="number-vote">75</span>
								</div>
								<div class="voted-item">
									<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>
									<div class="bar bar-vote">
										<div class="bar-percent-2" style="width: 10%;"></div>
									</div>
									<span class="number-vote">100</span>
								</div>
								<div class="voted-item">
									<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>
									<div class="bar bar-vote">
										<div class="bar-percent-3" style="width:50%;"></div>
									</div>
									<span class="number-vote">195</span>
								</div>
								<div class="voted-item">
									<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>
									<div class="bar bar-vote">
										<div class="bar-percent-4" style="width: 75%;"></div>
									</div>
									<span class="number-vote">255</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product-single-w3l product-title">
					<p class="heading-pd">M?? t??? s???n ph???m</p>
					<p><?php echo $row_chitiet['sanpham_mota'] ?></p>
					<br>
					<p class="heading-pd">Chi ti???t s???n ph???m</p>
					<p><?php echo $row_chitiet['sanpham_chitiet'] ?></p>
					<br>
				</div>
			</div>
		</div>
	</div>

	<!-- //Single Page -->
<?php
}
?>