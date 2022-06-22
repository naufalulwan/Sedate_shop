<!-- FOOTER -->
<footer id="footer" class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- footer widget -->
			<div class="col-md-3">
				<div class="footer">
					<!-- footer logo -->
					<div class="footer-logo">
						<a class="logo" href="index.php">
							<img src="frontend/img/logo_footer.png" alt="">
						</a>
					</div>
					<!-- /footer logo -->
					<p style="text-align: center;">Sedate store menyediakan berbagai produk pakaian lokal dengan kualitas terbaik .</p>
				</div>
			</div>
			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Akun Saya</h3><hr>
					<ul class="list-links">
						<li><a href="keranjang.php">Keranjang.</a></li>
						<li><a href="checkout.php">Checkout.</a></li>
						<li><a href="daftar.php">Daftar.</a></li>
						<li><a href="masuk.php">Masuk.</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer widget -->
			<div class="clearfix visible-sm visible-xs"></div>
			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Layanan Pelanggan</h3><hr>
					<ul class="list-links">
						<li><a href="about.php">Tentang.</a></li>
						 <li><a href="" id="pengiriman" data-toggle="modal" data-target="#tracking-modal">Pengiriman.</a></li>
						 <div id="tracking-modal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<a class="close" data-dismiss="modal">×</a>
										<h3>Jasa Pengiriman</h3>
									</div>
									<table border="0" style="margin-left: 60px;">
										<tr>
											<td>
												<div class="footer-logo-pengiriman">
													<a class="logo-pengiriman" >
														<img src="frontend/img/pos-indonesia.png" alt="" style="max-width: 400px;">
													</a>
												</div>
											</td>
											<td>
												<div class="footer-logo-pengiriman">
													<a class="logo-pengiriman">
														<img src="frontend/img/jne.png" alt="">
													</a>
												</div>
											</td>
											<td>
												<div class="footer-logo-pengiriman">
													<a class="logo-pengiriman" >
														<img src="frontend/img/tiKi.png" alt="">
													</a>
												</div>
											</td>
										</tr>
									</table>
									<div class="modal-footer">					
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						 </div>
						<!-- <li><a href="#">Tracking Resi</a></li> -->
						<li><a href="" id="kontak" data-toggle="modal" data-target="#contact-modal">Kontak Kami.</a></li>
						<div id="contact-modal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<a class="close" data-dismiss="modal">×</a>
										<h3>Kontak ke Sedate Official</h3>
									</div>
									<form action="kontak_act.php"method="POST"id="contactForm" name="contact" role="form">
										<div class="modal-body">				
											<div class="form-group">
												<label for="name">Nama</label>
												<input type="text" required="required" name="name" class="form-control">
											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" required="required" name="email" class="form-control">
											</div>
											<div class="form-group">
												<label for="message">Pesan</label>
												<textarea name="message" required="required" class="form-control"></textarea>
											</div>					
										</div>
										<div class="modal-footer">					
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<input type="submit" class="btn main-btn-success" id="submit">
										</div>
									</form>
								</div>
							</div>
						</div>	
						<li><a href="alamat_toko.php">Alamat Toko.</a></li>
						<li><a href="#">Kebijakan.</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer widget -->
			<!-- footer subscribe -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Tetap Terhubung!</h3><hr>	
					<p>Ikuti media sosial kami untuk lebih dekat dan mendapat informasi-informasi terbaru tentang toko kami.</p>
					<!-- footer social -->
					<ul class="footer-social">
						<!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
						<li><a href="https://www.instagram.com/sedate.id/"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://business.google.com/u/2/dashboard/l/17862610382733207126"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<!-- /footer social -->
				</div>
			</div>
			<!-- /footer subscribe -->	
		</div>
		<!-- /row -->
		<hr>
		<!-- row -->
		<div class="row">	
			<div class="col-md-8 col-md-offset-2 text-center">
				<!-- footer copyright -->
				<div class="footer-copyright">	
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <br>
					Sedate-Store 	
				</div>
				<!-- /footer copyright -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>

<a href="javascript:void(0)" data-scroll class="back-to-top"><i class="cf-angle-up"></i></a>
<!-- /FOOTER -->
<!-- jQuery Plugins -->
<script src="frontend/js/jquery.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/slick.min.js"></script>
<script src="frontend/js/nouislider.min.js"></script>
<script src="frontend/js/jquery.zoom.min.js"></script>
<script src="frontend/js/main.js"></script>
<script src="frontend/js/smooth-scroll.js"></script>
</body>
<script>
	$(document).ready(function(){
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
		$('.jumlah').on("keyup",function(){
			var nomor = $(this).attr('nomor');
			var jumlah = $(this).val();
			var harga = $("#harga_"+nomor).val();
			var total = jumlah*harga;
			var t = numberWithCommas(total);
			$("#total_"+nomor).text("Rp. "+t+" ,-");
		});
	});
	$(document).ready(function(){
		$('#provinsi').change(function(){
			var prov = $('#provinsi').val();
			var provinsi = $("#provinsi :selected").text();
			$.ajax({
				type : 'GET',
				url : 'rajaongkir/cek_kabupaten.php',
				data :  'prov_id=' + prov,
				success: function (data) {
					$("#kabupaten").html(data);
					$("#provinsi2").val(provinsi);
				}
			});
		});
		$(document).on("change","#kabupaten",function(){

			var asal = 152;
			var kab = $('#kabupaten').val();
			var kurir = "a";
			var berat = $('#berat2').val();
			var kabupaten = $("#kabupaten :selected").text();
			$.ajax({
				type : 'POST',
				url : 'rajaongkir/cek_ongkir.php',
				data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
				success: function (data) {
					$("#ongkir").html(data);
					// alert(data);
					// $("#provinsi").val(prov);
					$("#kabupaten2").val(kabupaten);
				}
			});
		});
		function format_angka(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
		$(document).on("change", '.pilih-kurir', function(event) { 
			// alert("new link clicked!");
			var kurir = $(this).attr("kurir");
			var service = $(this).attr("service");
			var ongkir = $(this).attr("harga");
			var total_bayar = $("#total_bayar").val();
			$("#kurir").val(kurir);
			$("#service").val(service);
			$("#ongkir2").val(ongkir);
			var total = parseInt(total_bayar) + parseInt(ongkir);
			$("#tampil_ongkir").text("Rp. "+ format_angka(ongkir) +" ,-");
			$("#tampil_total").text("Rp. "+ format_angka(total) +" ,-");
		});
		// $(".pilih-kurir").on("change",function(){
		// 	alert('sd');
			// var asal = 152;
			// var kab = $('#kabupaten').val();
			// var kurir = "a";
			// var berat = $('#berat2').val();
			// $.ajax({
			// 	type : 'POST',
			// 	url : 'rajaongkir/cek_ongkir.php',
			// 	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
			// 	success: function (data) {
			// 		$("#ongkir").html(data);
			// 		// alert(data);
			// 	}
			// });
		// });
	});
</script>
</html>