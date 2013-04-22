<?php
	require_once('config.php');

	//koneksi php mysql_connect('localhost','root','');

	$connect=@mysql_connect($host,$dbuser,$dbpass);
	if(!($connect)){
		echo mysql_error();
	}else{
		//koneksi ke database mysql_select_db('tokoonline');
		@mysql_select_db($dbname) or die('Database tidak tersedia');
		//echo "koneksi  berhasil";
	}

	//menampilkan data produk
	$sql="select * from produk";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
	
	<table cellpadding="0" cellspacing="0" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Produk</th>
				<th>ID Kategori</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

	<?php

	if($numrow>=1){
		//echo "ada record";
		$i=1;
		//mendapatkan list/data 
		while($row=mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row['idproduk']."</td>";
			echo "<td>".$row['idkategori']."</td>";
			echo "<td>".$row['namaproduk']."</td>";
			echo "<td>".$row['harga']."</td>";
			echo "<td> <a href='#'>Edit</a> <a href='#'>Hapus</a></td>";
			echo "</tr>";
			$i++;
		}
	} else{
		echo "Tidak Ada ada";
	}?>
</tbody>
</table>