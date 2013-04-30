<?php
	include_once('header.php');
	require_once('koneksi.php');


	//menampilkan data produk
	$sql="select * from kategori";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
	<div class="container">
		<div class="row">
			<div class="span12">
			<h3>Kelola Kategori</h3>
		<table class="table table-striped">
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
							echo "<td>".$row['idkategori']."</td>"; //cetak idstatus
							echo "<td>".$row['namakategori']."</td>"; //cetak status
							echo "<td>".$row['parent']."</td>"; //cetak parent
							echo "<td>".$row['deskripsi']."</td>"; //cetak deskripsi
							echo "<td> <a href='#'>Edit</a> <a href='#'>Hapus</a></td>"; //cetak aksi
							echo "</tr>";
							$i++;
						}
					} else{
						echo "Tidak Ada ada";
					}
				?>
			</tbody>
			</table>
		</div>
		</div>
		</div>