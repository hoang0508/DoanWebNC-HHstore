<?php
  include './db/conect.php';
?>

<?php
  if(isset($_POST['submit-apply'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
if(isset($_POST['gender'])){
    $gioitinh = $_POST['gender'];
    }  else {
        $gioitinh = false;
    }

    $address= $_POST['adress'];
    $file = $_FILES['File']['name'];
    $sql_recruiment = mysqli_query($con, "INSERT INTO `tbl_cv`( `cv_ten`, `cv_diachi`, `cv_email`, `cv_sodienthoai`,`cv_gioitinh`,`cv_file` ) VALUES ('$name','$address','$email','$phone','$gioitinh','$file')");
    $path = "files/".$file;
    move_uploaded_file($file,$path); 
    $sql_recruiment2 = mysqli_query($con, "INSERT INTO `btl_download_cv_file`(`filename`) VALUES ('$file')");
    $path2 = "files/".$file;
    move_uploaded_file($file,$path2);
}
?>
<!-- contact -->
<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>Recruitment</span>
			</h3>
			<!-- //tittle heading -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading" style="text-align: center;" >Apply as a Employee</h3>
                  
                        <form action="" method="POST" enctype="multipart/form-data" class="row register-form" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user" placeholder="H??? v?? t??n" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="adress" placeholder="?????a ch???" />
                                </div> 
                                <div class="form-group">
                                <input type="email" class="form-control"  name="email" placeholder="Email" />
                             </div>
                             <div class="form-group">
                                 <input type="text" minlength="10" maxlength="10" name="phone" placeholder="S??? ??i???n tho???i"  class="form-control" />
                             </div> 
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline" style="display: flex;"> 
                                            <input type="radio" name="gender" value="1" style="width: 20px;" >
                                            <span> Nam </span> 
                                        </label>
                                        <label class="radio inline" style="display: flex;" > 
                                            <input type="radio" name="gender" value="0" style="width: 20px;" >
                                            <span>N??? </span> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="file"  name="File" class="form-control ">      
                            <input type="submit" name="submit-apply" class="btnRegister " value="G???i CV" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>