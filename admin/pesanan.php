<?php
	require_once('koneksi.php');
	include_once('header.php');

	//menampilkan data produk
	$sql="select * pemesanan";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
	
	<table cellpadding="0" cellspacing="0" border="1">
		<thead>
			<tr>
				
				<th>idpesanan</th>
				<th>idproduk</th>
				<th>NamaPemesan</th>
				<th>jumlahpesan</th>
				<th>alamat</th>
				<th>email</th>
				<th>telpHP</th>
				<th>catatan</th>
				<th>idstatus</th>
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
			

			//cetak idpesanan
			echo "<td>".$row['idpesanan']."</td>";

			//cetak status
			echo "<td>".$row['idproduk']."</td>";

			//cetak parent
			echo "<td>".$row['namapesanan']."</td>";

			//cetak deskripsi
			echo "<td>".$row['jumlahpesan']."</td>";

			echo "<td>".$row['alamat']."</td>";

			echo "<td>".$row['email']."</td>";

			echo "<td>".$row['telphp']."</td>";

			echo "<td>".$row['catatan']."</td>";

			echo "<td>".$row['idstatus']."</td>";

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