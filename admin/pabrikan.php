<?php
	include_once('header.php');
	require_once('koneksi.php');


	$act=$_GET['act'];
	$id=(htmlspecialchars($_GET['id']));

	switch($act){
		case $act="edit":
			echo "edit".$id;
		break;
	}
	

	//menampilkan data pabrikan
	$sql="select * from pabrikan";

	//jalankan query
	$result=@mysql_query($sql);

	//mendapatkan jumlah baris/row
	$numrow=@mysql_num_rows($result);
	?>
<div class="container">
		<div class="row">
			<div class="span12">
			<h3>Kelola Pabrikan</h3>
		<table class="table table-striped">
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
						echo "<td><a class='btn primary btn-mini' href='pabrikan.php?act=edit&id=".$row['idpabrikan']."'><icon class='icon-pencil'></icon>  Edit</a> | <icon class='icon-remove'></icon> <a class='btn primary btn-mini' href='pabrikan.php?act=del&id=".$row['idpabrikan'].">Hapus</a></span></td>";
						echo "</tr>";
						$i++;
					}
				} else{
					echo "Tidak Ada ada";
				}?>
			</tbody>
			</table>
		</div>
		</div>
		</div>

	<?php

	function delete(){

	}

	function add(){

	}

	function edit(){

	}

	?>