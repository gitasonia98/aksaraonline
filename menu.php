<!--navbar-->
<nav class="navbar navbar-default" style="background: yellow">
	<div class="container">

		<ul class ="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="Keranjang.php">Keranjang</a></li>

			<!--jika sudah login muncul logout pada navbar-->
			<?php if (isset($_SESSION["pelanggan"])): ?>
			<li><a href="logout.php">Logout</a></li>

			<!--jika blm login tetap muncul login di navbarnya-->

		<?php else: ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="daftar.php">Daftar</a></li>
		<?php endif ?>

			<li><a href="checkout.php">Checkout</a></li>
		</ul>
	</div>
</nav>