<?php
include './db/conect.php';
?>
<?php
if (isset($_POST['submit-contact'])) {
	$name = $_POST['user'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['adress'];
	$note = $_POST['write'];

	$sql_lienhe = mysqli_query($con, "INSERT INTO `tbl_lienhe`(`name`, `email`, `sdt`, `diachi`, `ghichu`) VALUES ('$name','$email','$phone','$address','$note')");
	if($sql_lienhe) {
		echo '<script>alert("Cảm ơn bạn đã phản hồi đến chúng tôi")</script>';
	}
	else {
		echo '<script>alert("Phản hồi của bạn chưa được gửi đi")</script>';
	}
}
?>
<!-- Contact__adddress -->
<div class="contact__addrress">
	<div class="container">
		<div class="contact__address-list">
			<div class="address-list_item">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<h3 class="address-title">Địa chỉ</h3>
				<p class="address-name">441 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</p>
				<a href="" class="addres-link">Click to see map <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			</div>
			<div class="address-list_item">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<h3 class="address-title">Thời gian làm việc</h3>
				<p class="address-name">Mon - Fri: 10AM - 7PM</p>
				<p class="address-name">Sta: 11AM - 5PM</p>
			</div>
			<div class="address-list_item">
				<i class="fa fa-phone" aria-hidden="true"></i>
				<h3 class="address-title">Phone numbers</h3>
				<p class="address-name">For customers: 085666725</p>
				<p class="address-name">Tech support:: 0888196259</p>
			</div>
			<div class="address-list_item">
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
				<h3 class="address-title">Email addresses</h3>
				<p class="address-name">For customers: huyhoang0508@gmail.com</p>
				<p class="address-name">Tech support: hoang0508@gmail.com</p>
			</div>
		</div>
	</div>
</div>

<!-- Contact__partner -->
<div class="contact__partner">
	<div class="container">
		<div class="title-center">
			<h3 class="contact-title partner-title product-title heading-tittle  heading-title1">Chi nhánh công ty</h3>
		</div>
		<div class="contact__partner-list">
			<div class="partner-list_item">
				<div class="item-images"><img src="assets/img/anh70.jpg" alt="" class="partner-image"></div>
				<div class="item-contact">
					<h3 class="address-name">Cầu Giấy, Hà Nội</h3>
					<div class="partner__place">
						<div class="partner__palce-contact">
							<i class="fa fa-map-marker contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Find us</span>
								<a href="#" class="place-link">441 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-phone contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Call us</span>
								<a href="#" class="place-link">+1(0888) 196 259</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-envelope-o contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Write us</span>
								<a href="#" class="place-link">huyhoang0508@gmail.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="partner-list_item">
				<div class="item-images"><img src="assets/img/anh71.jpg" alt="" class="partner-image"></div>
				<div class="item-contact">
					<h3 class="address-name">Yên Định, Thanh Hóa</h3>
					<div class="partner__place">
						<div class="partner__palce-contact">
							<i class="fa fa-map-marker contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Find us</span>
								<a href="#" class="place-link">TT Quán Lào, Yên Định, Thanh Hóa</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-phone contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Call us</span>
								<a href="#" class="place-link">+1(0888) 196 259</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-envelope-o contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Write us</span>
								<a href="#" class="place-link">huyhoang0508@gmail.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="partner-list_item">
				<div class="item-images"><img src="assets/img/anh72.jpg" alt="" class="partner-image"></div>
				<div class="item-contact">
					<h3 class="address-name">Tây Hồ, Hà Nội</h3>
					<div class="partner__place">
						<div class="partner__palce-contact">
							<i class="fa fa-map-marker contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Find us</span>
								<a href="#" class="place-link">55 Lạc Long Quân, Tây Hồ, Hà Nội</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-phone contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Call us</span>
								<a href="#" class="place-link">+1(0888) 196 259</a>
							</div>
						</div>
						<div class="partner__palce-contact">
							<i class="fa fa-envelope-o contact__icon" aria-hidden="true"></i>
							<div class="place-name">
								<span>Write us</span>
								<a href="#" class="place-link">huyhoang0508@gmail.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contact__maps">
	<div class="contact__maps-epu">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6575906466296!2d105.78278231429816!3d21.046382392553813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zxJDhuqFpIGjhu41jIMSQaeG7h24gTOG7sWM!5e0!3m2!1svi!2s!4v1620222558644!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<form action="" class="form-maps">
		<div class="form__singup">
			<h3 class="singup-title">Liên hệ chúng tôi</h3>
			<div class="signup-form_row">
				<div class="signup-form_group">
					<label for="name" class="signup-form_label">Tên của bạn</label>
					<input type="text" class="signup-form_input" id="name" required placeholder="Huy Hoang" name="user">
				</div>
				<div class="signup-form_group">
					<label for="email" class="signup-form_label">Email của bạn</label>
					<input type="email" class="signup-form_input" id="name" placeholder="Email" required name="email">
				</div>
			</div>
			<div class="signup-form_row">
				<div class="signup-form_group">
					<label for="name" class="signup-form_label">Số điện thoại</label>
					<input type="number" class="signup-form_input"  name="phone" id="name" placeholder="Phone" required>
				</div>
				<div class="signup-form_group">
					<label for="email" class="signup-form_label">Địa chỉ</label>
					<input type="text" class="signup-form_input" name="adress" placeholder="Subject" id="name" required>
				</div>
			</div>
			<div class="signup-form_text">
				<label for="name" class="signup-form_label">Ghi chú</label>
				<textarea name="write" name="" id="" cols="30" rows="10"></textarea>
			</div>
			<button class="sigin-form_submit" type="submit" name="submit-contact" value="Gửi liên hệ">
				Gửi đến cty
			</button>
		</div>
	</form>
</div>