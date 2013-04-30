<?php
	require_once('koneksi.php');
	include_once('header.php');


//menampilkan data produk
	$sql="select * from status";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
<?php include_once('table-tambahan.swi');?>
		<thead>
			<tr>
				<th>ID Status</th>
				<th>Status</th>
				<th>Parent</th>
				<th>Deskripsi</th>
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
			echo "<td>".$row['idstatus']."</td>";

			//cetak namastatus
			echo "<td>".$row['status']."</td>";

			//cetak parent
			echo "<td>".$row['parent']."</td>";
			
			//cetak deskripsi
			echo "<td>".$row['deskripsi']."</td>";

			//cetak aksi
			echo "<td> <a class='btn btn-success btn-mini' href='#'><icon class='icon-pencil'></icon> Edit</a> <a href='#'>Hapus</a></td>";
			echo "</tr>";
			$i++;
		}
	} else{
		echo "Tidak Ada ada";
	}?>
</tbody>
</table>



