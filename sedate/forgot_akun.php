<?php include 'header.php'; ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="masuk.php">Pelanggan Masuk</a></li>
			<li class="active">Lupa Password</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Lupa Password</h3>
					</div>
					<?php
                    include('koneksi.php');
						if (isset($_POST['input_kode'])) {
							if ($_SESSION['code']!=$_POST['input_kode']){
								$pesan="<div class='alert alert-danger text-center'><strong>Error!</strong> Captcha yang dimasukan salah.</div>";
								echo $pesan;	
							}else {
								if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
								
									$email = $_POST["email"];
									$email = filter_var($email, FILTER_SANITIZE_EMAIL);
									$email = filter_var($email, FILTER_VALIDATE_EMAIL);
									if (!$email) {
										$error .="Invalid email address";
									} else {
										$sel_query = "SELECT * FROM `customer` WHERE customer_email='" . $email . "'";
										$results = mysqli_query($koneksi, $sel_query);
										$row = mysqli_num_rows($results);
										if ($row == "") {
											$error .= "<div class='alert alert-danger text-center'>Pengguna tidak di temukan!</div>";
										}
									}
									if ($error != "") {
										echo $error;
									} else {

										$output = '';

										$expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
										$expDate = date("Y-m-d H:i:s", $expFormat);
										$key = md5(time());
										$addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
										$key = $key . $addKey;
										// Insert Temp Table
										mysqli_query($koneksi, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


										$output.='<p>Klik link dibawah ini untuk mereset password anda.</p>';
										//replace the site url
										$output.='<p><a href="http://localhost/sedate/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/sedate/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
										$output.='<p>Jika anda tidak melakukan aktivitas atau lupa password, harap abaikan saja pesan ini.</p>';
										$output.='<p>Untuk info lebih lanjut harap menghubungi <a href="+62 821-2429-3938">+62 821-2429-3938.</a></p>';
										$output.='<p>Hormat Kami</p>';
										$output.='</br>';
										$output.='<p>  Sedate</p>';
										$body = $output;
										$subject = "Pemulihan Password";
										$email_to = $email;
										//autoload the PHPMailer
										require("vendor/autoload.php");
										$mail = new PHPMailer();
										$mail->IsSMTP();
										$mail->Host = "smtp.gmail.com"; // Enter your host here
										$mail->SMTPAuth = true;
										$mail->Username = "sedatelah63@gmail.com"; // Enter your email here
										$mail->Password = "sedate123"; //Enter your passwrod here
										$mail->Port = 587;
										$mail->IsHTML(true);
										$mail->From = "sedatelah63@gmail.com	";
										$mail->FromName = "Sedate Official";

										$mail->Subject = $subject;
										$mail->Body = $body;
										$mail->AddAddress($email_to);
										if (!$mail->Send()) {
											echo "Mailer Error: " . $mail->ErrorInfo;
										} else {
											echo "<div class='alert alert-success text-center'>Email berhasil dikirimkan, cek email kamu!</div>";
										}
									}
								}
							}
						}?>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<form action="" method="post">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" class="input" required="required" name="email" placeholder="Masukkan email ..">
								</div>
								<label for="">Verifikasi Captcha</label>
								<div class="form-group">
									<input type="text" name="input_kode" required="required" id="kodeval" maxlength="5" style="width: 80px; display:block; float:left;" class="input" placeholder="Masukan kode disini .." onKeyUp="maxLengthCheck(this,5);"/>
									<img src="captcha.php" width="85" height="40" alt="Kode Acak" style="margin-left: 20px;"/>
								</div>
								</br>
								<div class="form-group">
									<input type="submit" class="primary-btn btn-block" value="Konfirmasi">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
</br>
<?php include 'footer.php'; ?>