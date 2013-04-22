<?php
	require_once('koneksi.php');


	//menampilkan data produk
	$sql="select * from kategori";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
	
	<table cellpadding="0" cellspacing="0" border="1">
		<thead>
			<tr>
				
				<th>idkategori</th>
				<th>namakategori</th>
				<th>parent</th>
				<th>deskripsi</th>
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
			

			//cetak idstatus
			echo "<td>".$row['idkategori']."</td>";

			//cetak status
			echo "<td>".$row['namakategori']."</td>";

			//cetak parent
			echo "<td>".$row['parent']."</td>";

			//cetak deskripsi
			echo "<td>".$row['deskripsi']."</td>";

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