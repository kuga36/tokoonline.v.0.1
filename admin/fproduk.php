<?php 
require_once('koneksi.php');
?>
<html>
<head>
	<title>Form Produk</title>
</head>
<body>
	<form method="post" action="produk.php">
		<label for="namaproduk">Nama Produk</label>
		<input type="text" name="namaproduk" class="">
		<label for="idkategori">Kategori Produk</label>
<?php

	$sql="select * from kategori";
	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);

	if($numrow>=1):
?>

		<select name="idkategori">
			<?php while($row=mysql_fetch_array($result)): ?>
			<option value="<?php echo $row['idkategori']?>"><?php echo $row['namakategori'];?> </option>

			<? endwhile; ?>
		</select>

	<?php endif;?>
			






			<input type="submit" value="Submit" >
		<input type="text" name="pabrikan" class="">
		<label for="pabrikan">Pabrikan</label>

<?php 
	$sql1="select * from pabrikan";
	$result=mysql_query($sql1);
	$numrow
?>

		<select name="pabrikan">
			<!-- While Start  -->
			<!-- $row['idpabrikan'] untuk value -->
			<!-- $row['namapabrikan'] untuk namanya -->
			<option value="1" >Garuda Media</option>
			<!-- End While -->

			<!-- Dua bagian ini dihapus -->
			<option value="2">Erway Media</option> 
			<option value="3">Bamboo Media</option>

			</select>
		<input type="submit" value="Submit" >

	</form>
</body>
</html>