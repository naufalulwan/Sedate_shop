<?php include 'header.php'; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Pelanggan Masuk</li>
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
						<h3 class="title">Pelanggan Masuk</h3>
					</div>	
					<?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "terdaftar"){
							echo "<div class='alert alert-success text-center'>Selamat akun anda telah disimpan, silahkan login.</div>";
						}elseif($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-danger text-center'>Email dan Password tidak sesuai, coba lagi.</div>";
						}elseif($_GET['alert'] == "login-dulu"){
							echo "<div class='alert alert-warning text-center'>Silahkan login terlebih dulu untuk membuat pesanan.</div>";
						}
					}
					?>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<form action="masuk_act.php" method="post">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" class="input" required="required" name="email" placeholder="Masukkan email ..">
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" class="input" required="required" name="password" placeholder="Masukkan password ..">
								</div>
							
								<div class="form-group">
									<input type="submit" class="primary-btn btn-block" value="Masuk">
								</div>
							</form>
							<a href="forgot_akun.php" style="color: blue;">Lupa Password?</a></br>
							<p>Belum punya akun?
								<a href="daftar.php" style="color: blue;">Daftar Sekarang!</a></br>
							
							</p>
							</br>
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
<?php include 'footer.php'; ?>