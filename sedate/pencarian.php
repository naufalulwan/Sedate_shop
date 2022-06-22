<?php include 'header.php'; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Lapak</li>
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
			<!-- MAIN -->
			<div id="main" class="col-md-12">
				<!-- store top filter -->
				<?php
				$id = $_GET['pilihan'];
				$kategori = mysqli_query($koneksi,"SELECT * FROM kategori WHERE kategori_id='$id'");
				$k = mysqli_fetch_assoc($kategori);
				$cari = $_GET['cari'];
				?>
				<div class="pull-left">
					<h4>Kategori Produk : <?php echo $k['kategori_nama']; ?></h4>
					<h4>Kata Kunci : <?php echo $cari;?></h4>
				</div>
				<form action="" method="get">
					<div class="store-filter clearfix">
						<div class="pull-right">
							<div class="sort-filter">
								<!-- <span class="text-uppercase">Urutkan :</span>
								<select class="input" name="urutan" onchange="this.form.submit()">
									<option <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terbaru"){echo "selected='selected'";} ?> value="terbaru">Terbaru</option>
									<option <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "harga"){echo "selected='selected'";} ?> value="harga">Harga</option>
								</select> -->
							</div>
						</div>
					</div>
				</form>
				<!-- /store top filter -->
				<!-- STORE -->
				<div id="store">
					<!-- row -->
					<div class="row">
						<?php
						$halaman = 12;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM produk");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);  
						if (isset($_GET['cari']) || ($_GET['pilihan'])){
							$cari = $_GET['cari'];
							$pilihan = $_GET['pilihan'];
							$data = mysqli_query($koneksi,"SELECT * FROM produk,kategori WHERE kategori_id=produk_kategori AND kategori_id = '$pilihan' AND produk_nama LIKE '%$cari%' LIMIT $mulai, $halaman");
						}else{
							$data = mysqli_query($koneksi,"SELECT * FROM produk,kategori WHERE kategori_id=produk_kategori LIMIT $mulai, $halaman");
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
											<i class="fa fa-star-o empty"></i>
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
							<?php 
						}
						?>
						<?php 
						if(mysqli_num_rows($data) == 0){
							echo "<center><h3>Belum Ada Produk</h3></center>";
						}
						?>
					</div>
					<!-- /row -->
				</div>
				<!-- /STORE -->
				<div class="store-filter clearfix">
					<div class="pull-right">
						<ul class="store-pages">
							<li><span class="text-uppercase">Halaman:</span></li>
							<?php for ($i=1; $i<=$pages ; $i++){ ?>
								<?php if($page==$i){ ?>
									<li class="active"><?php echo $i; ?></li>
								<?php }else{ ?>
									<?php 
									if(isset($_GET['pilihan'])||($_GET['cari'])){
										$cari = $_GET['cari'];
										$c = "&cari=".$cari;
										$pilihan = $_GET['pilihan'];
										$p = "$pilihan=".$pilihan; ?>
										<li><a href="?halaman=<?php echo $i; ?><?php echo $c || $p ?>"><?php echo $i; ?></a></li>
										<?php 
									}else{
										?>
										<li><a href="?halaman=<?php echo $i; ?><?php echo $c || $p ?>"><?php echo $i; ?></a></li>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<!-- /MAIN -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
<?php include 'footer.php'; ?>