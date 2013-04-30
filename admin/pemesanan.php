<?php
	require_once('koneksi.php');
	include_once('header.php');

	//menampilkan data produk
	$sql="select * from produk";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
<?php include_once('table-tambahan.swi');?>
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
		
		//untuk penomoran table
		$i=1;

		//mendapatkan list/data 
		while($row=mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$i."</td>";

			//cetak idproduk
			echo "<td>".$row['idproduk']."</td>";

			//cetak idkategori
			echo "<td>".$row['idkategori']."</td>";

			//cetak namaproduk
			echo "<td>".$row['namaproduk']."</td>";

			//cetak harga
			echo "<td>".$row['harga']."</td>";

			//cetak aksi
			echo "<td> <a href='#'>Edit</a> <a href='#'>Hapus</a></td>";
			echo "</tr>";
			$i++;
		}
	} else{
		echo "Tidak Ada ada";
	}?>
</tbody>
</table>