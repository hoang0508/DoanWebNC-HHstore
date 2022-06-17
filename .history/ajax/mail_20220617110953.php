
<?php
include "../db/conect.php";

use PHPMailer\PHPMailer\PHPMailer;

$_productId = json_decode($_POST['thanhtoan_product_id'],  JSON_UNESCAPED_UNICODE);
$_soluongs = json_decode($_POST['thanhtoan_soluong'],  JSON_UNESCAPED_UNICODE);

//
$content = "<table border='1' style='width:100%;text-align: center;border-collapse: collapse;'>";
$content .= '<thead>
<tr>
<th scope="col" style="padding: 10px 20px;">STT</th>
<th>Tên khách hàng</th>
<th>Địa chỉ</th>
<th>SĐT</th>
<th scope="col">Tên sản phẩm</th>
<th scope="col">Số lượng</th>
<th scope="col">Giá</th>
<th scope="col">Phương thức thanh toán</th>
</tr>
</thead>';


for ($i = 0; $i < count($_productId); $i++) {
  $sanpham_id = $_productId[$i];
  $soluong = $_soluongs[$i];
  $sql_sp = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'");
  $row_sp = mysqli_fetch_array($sql_sp);
  $sanpham = $row_sp['tensanpham'];
  $total_sp = intval($row_sp['giasanpham']) * intval($soluong);
  $khachhang_id = $_POST['khachhang_id'];
  $email_kh = $_POST['email'];
  $name = $_POST['dangnhap_home'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $mahang = $_POST['mahang'];

  $content .= "<tbody>
		<tr>
      <td style='padding: 10px 20px;'>$i</td>
			<td>$name</td>
			<td>$address</td>
			<td>$phone</td>
      <td>$sanpham</td>
      <td>$soluong</td>
      <td>$total_sp VNĐ</td>
      <td>Tiền mặt</td>
    </tr>
		</tbody>";
}
$content .= "</table>";

include "../PHPMailer/src/PHPMailer.php";
include "../PHPMailer/src/Exception.php";
include "../PHPMailer/src/OAuth.php";
include "../PHPMailer/src/POP3.php";
include "../PHPMailer/src/SMTP.php";


$mail = new PHPMailer(true);
try {
  //Server settings
  // $mail->SMTPDebug = 2;  
  $mail->CharSet = 'UTF-8';                              // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'nguyenhuyhoang05082001@gmail.com';                 // SMTP username
  $mail->Password = 'prbclaxpciyvtywn';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('nguyenhuyhoang05082001@gmail.com', 'Shop HH Store');
  $mail->addAddress($email_kh);     // Add a recipient
  $mail->addCC('nguyenhuyhoang05082001@gmail.com');

  //email settings
  $mail->isHTML(true);
  $mail->Subject = "Chào bạn $name, Thông tin mua hàng của bạn, mã hàng: $mahang";
  $mail->Body = $content;

  if ($mail->send()) {
    echo '<script>
				console.log("Đặt hàng thành công")</script>';
  }
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>