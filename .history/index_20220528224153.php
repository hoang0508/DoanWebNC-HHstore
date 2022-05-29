<!-- Session trong PHP được dùng để lưu trữ thông tin của người dùng hoặc là lưu trữ tùy chọn cấu hình hệ thống cho người dùng. -->
<!-- Đăng ký session : session_start() phía trên đầu mỗi file. -->
<!-- vì tách trang và từ phần và đa có include các phần đó vào nên ỏ các phần khác kocaanf đặt section_start() nữa -->
<!-- Tất cả Session được lưu trữ trong biến toàn cục $_SESSION -->
<?php
	session_start();
	include "./db/conect.php";
	include './inc/incLogin.php';
?>
<?php 
	if(isset($_POST['dangky'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $note = $_POST['note'];
    $giaohang = $_POST['giaohang'];
  
    $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name, phone, email, address, note, giaohang, password) VALUES ('$name','$phone','$email', '$address','$note', '$giaohang', '$password')");
    $sql_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
    $row_khachhang = mysqli_fetch_array($sql_khachhang);
    $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cửa hàng bán điện máy</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css"  />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css"/>
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- //web icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
  <link
      rel="stylesheet" 
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
	<link rel="stylesheet" type="text/css" href="./css/reset2.css"  >
	<link rel="stylesheet" type="text/css" href="./css/contact.css"  >
	<link rel="stylesheet" type="text/css" href="./css/menu.css"  >
	<link rel="stylesheet" type="text/css" href="./css/styleh1-hh.css" >
</head>

<style>
	.main-top-w3l, .snipcart-details input.button , .copy-right  {
 background: #9CECFB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
} 

.snipcart-details input.button  {
	border-radius: 10px;
}
.btn-buy {
		display: flex;
    position: relative;
}


/*---*/

.btn-search {
  border-radius: 0 6px 6px 0 !important;
  background: #1fa2ff !important;
}
.logo_agile h1 a {
    color: #1FA2FF;
}

	body::-webkit-scrollbar {
  width: 8px;
}

body::-webkit-scrollbar-thumb {
	border-radius: 10px;
  background: #36D1DC;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to bottom, #5B86E5, #36D1DC);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to bottom, #5B86E5, #36D1DC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

  /* Admin Login */
  form.login__create {
    max-width: 500px;
    width: 100%;
    background-color: #fff;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 10px;
    padding: 20px 25px;
  }

  form h3 {
    text-align: center;
    font-size: 25px;
  }

  .form-login {
    width: 100%;
    margin-top: 20px;
  }

  .form-login .center {
    display: flex;
    align-items: center;
  }

  .form-group {
    padding-bottom: 15px;
    position: relative;
    text-align: center;
    max-width: 300px;
    margin: 0 auto;
    display: flex;
  }

  .form-group input {
    width: 300px;
    padding: 10px 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
    position: relative;
  }

  .form-group input::placeholder {
    font-size: 14px;
  }

  .form-group input:focus {
    transition: all 0.5 linear;
    border-color: #3d6ef7;
  }

  .form-group i.icon-form {
    position: absolute;
    z-index: 10;
    padding: 0 10px;
  }

  .form-group i.eye-pass {
    position: absolute;
    right: 10px;
  }

  .form-group .login__button {
    padding: 15px 30px;
    background-color: #3d6ef7;
    color: #fff;
    border-radius: 10px;
    text-align: center;
    margin: 0 auto;
  }

	.form {
    padding: 30px 40px;
}

.form-control {
    padding-bottom: 20px;
    position: relative;
		border: 0;
}

.form-control label {
    display: inline-block;
    margin-bottom: 5px;
}

.form-control input {
    border: 2px solid #f0f0f0;
    border-radius: 4px;
    display: block;
    width: 100%;
    font-size: 14px;
    padding: 10px;
}

.form-control.success input {
    border-color: #2ecc71;
}

.form-control.error input {
    border-color: #e74c3d;
}

.form-control i {
  	position: absolute;
    top: 56%;
    right: 25px;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    font-size: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    color: #fff;
    border-radius: 50%;
}

.form-control.success i.icon-check {
    opacity: 1;
    visibility: visible;
    background-color: #2ecc71;
}

.form-control.error i.icon-ex {
    opacity: 1;
    visibility: visible;
    background-color: #e74c3d;
}

.form-control i.icon-eye {
    opacity: 1;
    visibility: visible;
    color: #333;
    cursor: pointer;
}

.form-control small {
    position: absolute;
    bottom: 0;
    left: 0;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
}

.form-control.error small {
    color: #e74c3d;
    opacity: 1;
    visibility: visible;
}

.form button {
    background-color: #8e44ad;
    color: #fff;
    border: 2px solid #8e44ad;
    border-radius: 4px;
    display: block;
    padding: 10px;
    width: 100%;
}

.product-cart {
  background-color: #fff;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  border-radius: 10px;
	padding: 20px 15px;
}

/*step ctietsq*/
.stepper-input {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 180px;
  height: 80px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 40px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  overflow: hidden;
}

.stepper-input input {
  display: none;
}

.stepper-input .input {
  width: 100%;
  height: 100%;
  display: flex;
}

.stepper-input .input button {
  width: 50px;
  height: 100%;
  background-color: #fff;
  color: #222;
  font-size: 30px;
  cursor: pointer;
  transition: all 0.25s linear;
}

.stepper-input .input button:active {
  background-color: #555;
}

.stepper-input .input .range {
  flex: 1;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 30px;
}

.stepper-input .input .range .list span {
  display: block;
  width: 100%;
  height: 80px;
  color: #222;
  font-size: 30px;
  line-height: 80px;
}

.checkout-left {
  margin-top: 30px;
  background-color: #fff;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  padding: 20px 30px;
  border-radius: 10px;
}

.information-wrapper input,
.information-wrapper  textarea 
.information-wrapper select {
  border-bottom: 1px solid #fff !important;
  border-radius: 10px;
}

.information-wrapper  textarea {
  border: 1px solid #ccc;
  margin-bottom: 20px;
  height: 200px;
}
/*MOON*/
.register {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}

.register-left {
    text-align: center;
    color: #fff;
    margin-top: 4%;
}

.register-left input {
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}

.register-right {
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}

.register-left img {
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite alternate;
    animation: mover 1s infinite alternate;
}

@-webkit-keyframes mover {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-20px);
    }
}

@keyframes mover {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-20px);
    }
}

.register-left p {
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}

.register .register-form {
    padding: 10%;
    margin-top: 10%;
}

.btnRegister {
    float: right;
    margin-top: 2%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}

.register .nav-tabs {
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}

.register .nav-tabs .nav-link {
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}

.register .nav-tabs .nav-link:hover {
    border: none;
}

.register .nav-tabs .nav-link.active {
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}

.register-heading {
    
    margin-bottom: -15%;
    color: #495057;
}
</style>
<body>
	<?php
include './inc/topbar.php';
include './inc/menu.php';
include './inc/slider.php';
if(isset($_GET['quanly'])) {
	$tam = $_GET['quanly'];
}
else {
	$tam = '';
}
if($tam=='danhmuc') {
	include ('./inc/danhmuc.php');
}
else if($tam=='chitietsp') {
	include ('./inc/chitietsp.php');
}
else if($tam =='giohang') {
	include ('./inc/giohang.php');
}
else if($tam =='lienhe') {
	include ('./inc/lienhe.php');
}
else if($tam =='timkiem'){
	include ('./inc/timkiem.php');
}
else if($tam =='tintuc'){
	include ('./inc/tintuc.php');
}
else if($tam =='chitiettin'){
	include ('./inc/chitiettin.php');
}
else if($tam =='xemdonhang'){
	include ('./inc/xemdonhang.php');
}
else if($tam =='recruitment'){
	include ('./inc/recruitment.php');
}
else {
	include ('./inc/home.php');
}
	include './inc/footer.php';
?>


	<!-- js-files -->
	<script  type="text/javascript" src="./js/apphh.js"></script>

  <!-- slider -->
  <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.0.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
  ></script>

  <script >
		$(".product-row").slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 2,
      // autoplay: true,
      autoplaySpeed: 5000,
      dots: true,
      prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
      nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
      responsive: [
    {
      breakpoint: 1279,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
	</script>
  <script>
    $('.smart-slider').slick({
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      prevArrow: false,
      nextArrow: false,
      responsive: [
    {
      breakpoint: 1279,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  </script>
    <script >
		$(".brand").slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: false,
      nextArrow: false,
});
	</script>
	</script>
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
		<!-- imagezoom -->
		<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- scroll seller -->
	<script src="js/scroll.js"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
  <!-- Messenger Plugin chat Code -->
  <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "111981197792996");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>