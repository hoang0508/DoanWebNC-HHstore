<?php
  session_start();
   include '../db/conect.php';
?>
<?php
      if(isset($_POST['dangnhap'])) {
        $taikhoan = $_POST['email'];
        $matkhau = md5($_POST['pass']);
        
        $sql_capquyen = mysqli_query($con, "SELECT * FROM tbl_admin");
        $row_capquyen = mysqli_fetch_array($sql_capquyen);
        if($taikhoan== "" || $matkhau=="") {
          echo '<script>alert("Bạn hãy nhập đủ thông tin")</script>';
        }
        else {
          $sql_capquyen = mysqli_query($con, "SELECT * FROM tbl_admin WHERE capquyen = '1'");
          $row_capquyen = mysqli_fetch_array($sql_capquyen);
          $sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_admin WHERE email = '$taikhoan' AND password = '$matkhau' AND capquyen = '1' LIMIT 1");
          $count = mysqli_num_rows($sql_select_admin);
          $row_dangnhap = mysqli_fetch_array($sql_select_admin);
          if($count > 0) {
            $_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
            $_SESSION['admin_id'] = $row_dangnhap['admin_id'];
            echo '<script>alert("Đăng nhập thành công!")</script>';
            header('Location: dashboardAdmin.php');
          }
          else if($row_capquyen['capquyen'] == 0) {
            echo '<script>alert("Ban chưa được cấp quyền đăng nhập!")</script>';
          }
          else {
            echo '<script>alert("Tài khoản hoặc mật khẩu sai!")</script>';
          }
        }
      }
    ?>
    <?php 
      if(isset($_POST['dangky'])) {
        $name = $_POST['name'];
        $email1 = $_POST['email1'];
        $password1 = md5($_POST['password1']);
        
        if($name == "" || $email1 == "" || $password1 == "") {
          echo '<script>alert("Bạn hãy nhập đủ thông tin")</script>';
        }
        else {
        $sql_dangky = mysqli_query($con, "INSERT INTO `tbl_admin`(`email`, `password`, `admin_name`) VALUES ('$email1','$password1','$name')");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/reset.css">
    <!-- <link rel="stylesheet" href="../css/fixedh.css"> -->
    <link rel="stylesheet" href="./css/styleh1.css">
</head>

<style>
  /* Admin Login */
  form {
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

  .form-group {
    padding-bottom: 15px;
    position: relative;
    text-align: center;
    max-width: 300px;
    margin: 0 auto;
    display: flex;
    align-items: center;
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
  .text-admin {
    text-align: center;
    font-size: 14px;
  }
</style>

<body style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <form action="" method="POST" class="login__create">
        <h3>Đăng nhập Admin</h3>
        <div class="form-login">
            <div class="form-group">
                <i class="fa fa-envelope-o icon-form" aria-hidden="true"></i>
                <input type="text" name="email" id="" class="form-email" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fa fa-lock icon-form" aria-hidden="true"></i>
                <input type="password" name="pass" id="" class="form-password" placeholder="Password">
                <i class="fa fa-eye eye-pass icon-eye" aria-hidden="true"></i>
            </div>
            <div class="form-group">
                <input type="submit" name="dangnhap" class="login__button" value="Đăng nhập">
            </div>
        </div>
        <span class="text-admin">Chưa có tài khoản ?<a href="" class="create-login">Đăng ký admin</a></span>
    </form>

    <form action="" method="POST" class="form none" id="form1">
              <h3>Đăng ký Admin</h3>
              <div class="form-control2">
                  <label for="#">Tên tài khoản</label>
                  <input type="text" name="name" id="username" placeholder="huyhoang0508">
                  <i class="fa fa-check icon-check"></i>
                  <i class="fa fa-exclamation icon-ex" aria-hidden="true"></i>
                  <small class="error-txt">Error message</small>
              </div>
              <div class="form-control2">
                  <label for="#">Enail</label>
                  <input type="email" name="email1" id="email" placeholder="huyhoang@gmail.com">
                  <i class="fa fa-check icon-check"></i>
                  <i class="fa fa-exclamation icon-ex" aria-hidden="true"></i>
                  <small class="error-txt">Error message</small>
              </div>
              <div class="form-control2">
                  <label for="#">Password</label>
                  <input type="password" name="password1" id="password" placeholder="Password">
                  <i class="fa fa-eye icon-eye1" aria-hidden="true"></i>
                  <small class="error-txt">Error message</small>
              </div>
              <div class="form-control2">
                  <label for="#">Password check</label>
                  <input type="password" name="password1" id="password2" placeholder="Password two">
                  <i class="fa fa-eye icon-eye1" aria-hidden="true"></i>
                  <small class="error-txt">Error message</small>
              </div>
              <button type="submit" name="dangky" class="sub-form"  value="Đăng ký">Đăng ký</button>
        </form>
    <script src="./js/app11.js"></script>
    <script>
const form = document.querySelector(".form");
const username = document.querySelector("#username");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const password2 = document.querySelector("#password2");
const subForm = document.querySelector(".sub-form");
const loginCreate = document.querySelector(".login__create")
const createLogin = document.querySelector(".create-login");

subForm.addEventListener("submit", function(e) {
  e.preventDefault();
  // checkInputs();
})

createLogin.addEventListener("click", function(e){
  e.preventDefault();
  form.classList.add("block")
  form.classList.remove("none");

  loginCreate.classList.add("none");
})

const iconEye1 = document.querySelectorAll(".icon-eye1");

iconEye1.forEach((item) => {
  item.addEventListener("click", function (e) {
    const inputPass = this.previousElementSibling; // input
    const inputType = inputPass.getAttribute("type"); // lấy ra type input
    if (inputType === "password") {
      inputPass.setAttribute("type", "text");
      e.target.classList.toggle("fa-eye-slash");
      e.target.classList.toggle("fa-eye");
    } else {
      inputPass.setAttribute("type", "password");
      e.target.classList.toggle("fa-eye-slash");
      e.target.classList.toggle("fa-eye");
    }
  });
});
    </script>
</body>
</html>