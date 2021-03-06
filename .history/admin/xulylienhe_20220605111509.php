<?php
include '../db/conect.php';
include '../admin/2404/incLogin.php'
?>
<?php
if (isset($_GET['xoa'])) {
  $email = $_GET['xoa'];

  $sql_delete_lienhe = mysqli_query($con, "DELETE FROM tbl_lienhe WHERE email = '$email'");
}
?>
<?php
if (isset($_POST['sb-form'])) {
  $xuly = $_POST['xuly'];
  $name = $_POST['name'];
  $sql_update_lienhe = mysqli_query($con, "UPDATE tbl_lienhe SET phanhoi = '$xuly' WHERE name = '$name'");
}
?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['header']) && isset($_POST['email'])) {
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $header = $_POST['header'];
  $message = $_POST['message'];
  
  include "../PHPMailer/src/PHPMailer.php";
  include "../PHPMailer/src/Exception.php";
  include "../PHPMailer/src/OAuth.php";
  include "../PHPMailer/src/POP3.php";
  include "../PHPMailer/src/SMTP.php";
  $mail = new PHPMailer(true);    

  try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nguyenhuyhoang05082001@gmail.com';                 // SMTP username
    $mail->Password = 'prbclaxpciyvtywn';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('nguyenhuyhoang05082001@gmail.com', 'Mailer');
    $mail->addAddress('nguyenhuyhoang05082001@gmail.com');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('nguyenhuyhoang05082001@gmail.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //email settings
    $mail->isHTML(true);
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Li??n h???</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/font1.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
      include("2404/menu.php");
      include("2404/top.php");
      ?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="container">
            <div class="row">
              <?php
              if (isset($_GET['quanly']) == 'lienhe') {
              ?>
                <div class="col-md-12">
                  <form action="" class="sub-form" method="POST" enctype="multipart/form-data">
                    <h4>Ph???n h???i kh??ch h??ng</h4>
                    <div class="form-group col-md-12">
                      <input type="email" name="email" class="form-control col-md-6" id="" placeholder="Email...">
                      <input type="text" name="subject" class="form-control col-md-6" id="" placeholder="Ti??u ?????">
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                      <input type="text" name="header" class="form-control" id="" placeholder="N???i dung">
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                      <textarea name="message" style="width: 100%" id="" cols="30" rows="10"></textarea>
                    </div>
                    <?php
                    $sql_lienhe = mysqli_query($con, "SELECT * FROM tbl_lienhe");
                    $row_lh = mysqli_fetch_array($sql_lienhe);
                    ?>
                    <input type="hidden" name="name" value="<?php echo $row_lh['name'] ?>">
                    <br>
                    <select name="xuly" id="" class="form-control">
                      <option value="0">Ch??a ph???n h???i</option>
                      <option value="1">???? ph???n h???i</option>
                    </select>
                    <br>
                    <input type="submit" name="sb-form" class="btn-contact btn btn-success" value="G???i kh??ch h??ng">
                  </form>
                </div>
              <?php
              }
              ?>
              <div class="col-md-12 mt-4">
                <h4>Danh s??ch li??n h???</h4>
                <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_lienhe");
                ?>
                <table class="table table-bordered">
                  <tr style="text-align:center">
                    <th>STT</th>
                    <th>T??n kh??ch h??ng</th>
                    <th>Email kh??ch</th>
                    <th>S??? ??i???n tho???i</th>
                    <th>?????a ch???</th>
                    <th>Ghi ch??</th>
                    <th>Ph???n h???i</th>
                    <th>Qu???n l??</th>
                  </tr>
                  <?php
                  $i = 0;
                  while ($row_lienhe = mysqli_fetch_array($sql_select)) {
                    $i++;
                  ?>
                    <tr style="text-align:center">
                      <td><?php echo $i ?></td>
                      <td><?php echo $row_lienhe['name'] ?></td>
                      </td>
                      <td><?php echo $row_lienhe['email'] ?></td>
                      <td><?php echo $row_lienhe['sdt'] ?></td>
                      <td><?php echo $row_lienhe['diachi'] ?></td>
                      <td><?php echo $row_lienhe['ghichu'] ?></td>
                      <td>
                        <?php
                        if ($row_lienhe['phanhoi'] == 0) {
                          echo 'Ch??a ph???n h???i';
                        } else {
                          echo '???? ph???n h???i';
                        }
                        ?>
                      </td>
                      <td style="text-align: center;"><a style="font-size: 14px;display:block;" href="?xoa=<?php echo $row_lienhe['email'] ?>" class="btn btn-danger mb-2"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="?quanly=lienhe&email=<?php echo $row_lienhe['email'] ?>" style="font-size: 14px;display:block" class="btn btn-primary">Ph???n h???i kh??ch h??ng</a></td>
                    </tr>
                  <?php
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          @coppyright B???n quy???n thu???c by <a href="https://colorlib.com">Huy Ho??ng</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="vendors/Flot/jquery.flot.js"></script>
  <script src="vendors/Flot/jquery.flot.pie.js"></script>
  <script src="vendors/Flot/jquery.flot.time.js"></script>
  <script src="vendors/Flot/jquery.flot.stack.js"></script>
  <script src="vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="vendors/moment/min/moment.min.js"></script>
  <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>

</body>

</html>