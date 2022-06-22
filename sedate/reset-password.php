<?php include 'header.php';     ?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Ganti Password Pelanggan</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="order-summary clearfix">
            <?php
                include('koneksi.php');
                if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                    $key = $_GET["key"];
                    $email = $_GET["email"];
                    $curDate = date("Y-m-d H:i:s");
                    $query = mysqli_query($koneksi, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
                    $row = mysqli_num_rows($query);
                    if ($row == "") {
                        $error .= "<div class='alert alert-warning text-center'>Invalid Link</div>";
                    } else {
                        $row = mysqli_fetch_assoc($query);
                        $expDate = $row['expDate'];
                        if ($expDate >= $curDate) {
                ?> 
                    <div class="section-title">
					    <h3 class="title">Ganti Password</h3>
				    </div>
				    <div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<form action="" method="post" name="update">
                                <input type="hidden" name="action" value="update" class="form-control"/>
								<div class="form-group">
									<label for="">Masukkan Password Baru</label>
									<input type="password" class="input"  required="required" name="password" placeholder="Masukkan password .." min="5">
								</div>
                                <div class="form-group">
									<label for="">Konfirmasi Password Baru</label>
									<input type="password" class="input"  required="required" name="password2" placeholder="Masukkan password .." min="5">
								</div>
                                <input type="hidden" name="email" value="<?php echo $email; ?>"/>
								<div class="form-group">
									<input type="submit" class="primary-btn" value="Ganti Password">
								</div>
							</form>
                        <?php
                            } else {
                                $error .= "<div class='alert alert-warning text-center'>Link Expired</div>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }
                    }
                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
                        $password2 = mysqli_real_escape_string($koneksi, $_POST["password2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($password != $password2) {
                            $error .= "<div class='alert alert-danger text-center'>Kata sandi tidak cocok, kedua kata sandi harus sama.</div>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {
                            $password = md5($password);
                            mysqli_query($koneksi, "UPDATE `customer` SET `customer_password` = '" . $password . "' WHERE `customer_email` = '" . $email . "'");
                            mysqli_query($koneksi, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");
                        ?> <script type = "text/javascript">
                           function Redirect() {
                              window.location = "masuk.php";
                           }            
                           document.write("<div class='alert alert-success text-center'>Selamat! Kata sandi Anda telah berhasil diperbarui.</div>");
                           setTimeout('Redirect()', 5000);  
                     </script>
                     <?php }
                    }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<?php include 'footer.php'; ?>