<?php
session_start();
//koneksi ke database
include 'koneksi.php';

//jika blm login maka harus login dlu svlm checkout
if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login'); </script>";
	echo "<script> location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<!--navbar--> 
	<?php include 'menu.php'; ?>
<section class ="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">   
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Member</th>
					<th>Judul Buku</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					
				</tr>
			</thead>

			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja =0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<!--menampilkan produk yang diperulangkan berdasarkan id produk-->

					<?php

					$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah=$ambil->fetch_assoc();
					$subharga=$pecah["harga_produk"]*$jumlah;
					

					?>
					<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah["nama_member"]; ?></td>
			<td><?php echo $pecah["judul_buku"]; ?></td>
			<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
			<td><?php echo $jumlah; ?></td>
			<td>Rp. <?php echo number_format($subharga); ?></td>
			
					</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
			
			
		</table>