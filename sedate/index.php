<?php include 'header.php'; ?>
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<style>
				.welcome{
					width: 100%;
					margin: auto;
				}
				.gambar{
					width: 100%;
					height: 100%;
				}
				@media only screen and (max-width: 991px){
					.welcome{
						margin-top: -50px;
					}
				}
			</style>
			<div class="welcome">
				<img class = "gambar" src="frontend/img/feed .jpg" alt="">
			</div>
			<br>
			<!-- promo area -->
			<div class="promo-area">
				<div class="zigzag-bottom"></div>
				<div class="container">
					<div class="row">
						<div class="auto-grid col-md-3 col-sm-6">
							<div class="single-promo promo1">
								<i class="fa fa-refresh"></i>
								<p>Pengembalian 30 Hari</p>
							</div>
						</div>
						<div class="auto-grid col-md-3 col-sm-6">
							<div class="single-promo promo2">
								<i class="fa fa-truck"></i>
								<p>Bebas Ongkir</p>
							</div>
						</div>
						<div class="auto-grid col-md-3 col-sm-6">
							<div class="single-promo promo3">
								<i class="fa fa-lock"></i>
								<p>Pembayaran Privasi</p>
							</div>
						</div>
						<div class="auto-grid col-md-3 col-sm-6">
							<div class="single-promo promo4">
								<i class="fa fa-gift"></i>
								<p>Produk Baru</p>
							</div>
						</div>
					</div>
				</div>
   			</div> 
			<!-- MAIN -->
			<div id="main" class="col-md-12">
				<!-- STORE -->
				<div id="store-main">
					<!-- row -->
					<div class="row">
						<?php
						$halaman = 12;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM produk");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);  
						if(isset($_GET['urutan']) && $_GET['urutan'] == "harga"){
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga asc LIMIT $mulai, $halaman");
							}else{
								$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori order by produk_harga asc LIMIT $mulai, $halaman");
							}
						}else{

							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_id desc LIMIT $mulai, $halaman");
							}else{
								$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori order by produk_id desc LIMIT $mulai, $halaman");
							}
						}          
						$no =$mulai+1;
						while($d = mysqli_fetch_array($data)){
							?> 
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span><?php echo $d['kategori_nama'] ?></span>
										</div>

										<a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
										
										<?php if($d['produk_foto1'] == ""){ ?>
											<img src="gambar/sistem/produk.png" style="max-height: 250px;">
										<?php }else{ ?>
											<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="margin-left: auto ; margin-right: auto;display: block ; width: 250px; max-height: 250px">
										<?php } ?>
									</div>
									<div class="product-body">
										<h3 class="product-price"><?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?> <?php if($d['produk_jumlah'] == 0){?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
										</br>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										</br></br>
										<h2 class="product-name"><a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a></h2>
										<div class="product-btns">
											<a class="main-btn btn-block text-center" href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-search"></i> Lihat</a>
											<a class="primary-btn add-to-cart btn-block text-center" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=index"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>
										
										</div>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
							<?php } ?>
							</br>
							<center><h3> Website ini sedang dalam pengembangan!</h3></center>
							</br>
					</div>
					<!-- /row -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /MAIN -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>