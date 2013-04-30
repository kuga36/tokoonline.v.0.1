<?php include_once('header.php');?>
	<div class="container">
	

		<!-- Example row of columns -->
		<div class="row">
			<div class="span4">
				<h2>Manajemen Produk</h2>
				<p>Manajemen Produk dapat berupa pengelolaan stok produk, harga produk, pembelian dan penjualan</p>
				
			</div>
			<div class="span8">
				<form method="post" action="produk.php">
					<label for="namaproduk">Nama Produk</label>
					<input type="text" name="namaproduk" class="">
					<label for="idkategori">Kategori Produk</label>
					<select name="idkategori">
						<option value="1">CD Tutorial</option>
						<option value="2">Software</option>
						<option value="3">Buku</option>
						<option value="4">Hardware</option>
					</select>
					<input type="submit" value="Submit" >
				</form>

			</div>
		</div>
		<hr>

		<footer>
			<p>&copy; Company 2012</p>
		</footer>

	</div> <!-- /container -->

	
</body>

</html>