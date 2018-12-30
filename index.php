<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HerShop</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<!--<body background="hijau.jpg">-->
	<body>

 

	<!--navbar--> 
	<?php include 'menu.php'; ?>

<!--konten-->
<section class="konten"> 
	<div class="container">
		<div class ="col-md-offset-2">
		<!--<h1>Daftar Menu</h1>-->
		<tr>
<td bgcolor="#000000"><div align="center"><span class="stylel"><marquee>BERBAGAI MACAM PRODUK HERBAL TERSEDIA DI HERSHOP INDONESIA </marquee></span></td>
</tr>
		<div class="row">


			<?php $ambil=$koneksi->query("SELECT*FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			

			<div class="col-md-3">
				<div class ="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
					<div class="caption">
					<h3><?php echo $perproduk['nama_member']; ?></h3>
					<h3><?php echo $perproduk['judul_buku']; ?></h3>
					<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
				<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
					<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail
					</a>
				</div>
				</div>
			</div>
			<?php } ?>
			
	</div>
</div>
</section>

</body>
</html>