<?php
	require_once('koneksi.php');

	

	//menampilkan data pabrikan
	$sql="select * from pabrikan";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
	
	<table cellpadding="0" cellspacing="0" border="1">
		<thead>
			<tr>
				
				<th>ID Pabrikan</th>
				<th>Nama Pabrikan</th>
				<th>Kota</th>
				<th>Alamat</th>
				<th>No Telp/HP</th>
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
		
			//cetak idpabrikan
			echo "<td>".$row['idpabrikan']."</td>";

			//cetak namapabrikan
			echo "<td>".$row['nama']."</td>";

			//cetak harga
			echo "<td>".$row['kota']."</td>";
			
			//cetak harga
			echo "<td>".$row['alamat']."</td>";

			//cetak harga
			echo "<td>".$row['notelp']."</td>";

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