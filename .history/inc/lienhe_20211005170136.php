<?php
  include './db/conect.php';
?>
<?php
  if(isset($_POST['submit-contact'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address= $_POST['adress'];
    $note = $_POST['write'];

    $sql_lienhe = mysqli_query($con, "INSERT INTO `tbl_lienhe`(`name`, `email`, `sdt`, `diachi`, `ghichu`) VALUES ('$name','$email','$phone','$address','$note')");
  }
?>
<!-- contact -->
<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>L</span>iên
				<span>H</span>ệ
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Địa chỉ</h4>
						<p>Mai dịch, Cầu Giấy
							<label>Hà Nội.</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Call Us</h4>
						<p>+(0121) 121 121
							<label>+(0121) 121 122</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
						<p>
							<a href="mailto:info@example.com">info@example1.com</a>
							<label>
								<a href="mailto:info@example.com">info@example2.com</a>
							</label>
						</p>
					</div>
				</div>
			</div>
			<!-- form -->
      <form action="" method="POST" enctype="multipart/form-data" class="form-contact" >
          <div class="form-group group-contact">
            <input type="text" class="contact-form form-control" name="user" placeholder="Họ và tên" />
            <input type="email" class="contact-form form-control" name="email" placeholder="Email" />
          </div>
          <div class="form-group group-contact">
            <input type="text" class="contact-form form-control" name="phone" placeholder="SDT" />
            <input type="text" class="contact-form form-control" name="adress" placeholder="Địa chỉ" />
          </div>
          <div class="form-group group-contact">
            <textarea name="write" id="" cols="30"  rows="10"></textarea>
          </div>
          <input type="submit" style="width: 40%;text-align:center;margin: 0 auto;
          display: inherit;" name="submit-contact" class="btn-contact btn btn-primary" value="Gửi liên hệ">
        </form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->
  	<!-- map -->
	<div class="map mt-sm-0 mt-4">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657060482336!2d105.78272751429809!3d21.04640359255304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1631268219230!5m2!1svi!2s"
    width="1200"
    height="450"
    style="border: 0"
    allowfullscreen=""
    loading="lazy"
  ></iframe>
	</div>
	<!-- //map -->
  	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->