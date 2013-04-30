<?php
require_once('koneksi.php');
include_once('header.php');


?>

<div class="container">
	

		<!-- Example row of columns -->
		<div class="row">
			<div class="span12">
				<h2>Manajemen Produk</h2>
				<p>Manajemen Produk dapat berupa pengelolaan stok produk, harga produk, pembelian dan penjualan</p>
				
			</div>
		</div>
		<div class="row">
		
			<div class="span3">
                <div id="form_input" class="">
                                <form action="" method="post" accept-charset="utf-8" id="addform" class="form form-vertical">                    
                    <input type="hidden" value='' id="idproduk" name="idproduk">
                    
                    <div class="control-group">
                            <label for="idkategori" class="control-label">idkategori : </label>                            <div class="controls">
                                <input type="text" name="idkategori" value="" id="idkategori" />                            </div>
                    </div>
                    <div class="control-group">
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
			
					</div>

                    <div class="control-group">
                            <label for="namaproduk" class="control-label">namaproduk : </label>                            <div class="controls">
                                <input type="text" name="namaproduk" value="" id="namaproduk" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="harga" class="control-label">harga : </label>                            <div class="controls">
                                <input type="text" name="harga" value="" id="harga" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="jumlah" class="control-label">jumlah : </label>                            <div class="controls">
                                <input type="text" name="jumlah" value="" id="jumlah" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="idstatus" class="control-label">idstatus : </label>                            <div class="controls">
                                <input type="text" name="idstatus" value="" id="idstatus" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="idpabrikan" class="control-label">idpabrikan : </label>                            <div class="controls">
                                <input type="text" name="idpabrikan" value="" id="idpabrikan" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="images" class="control-label">images : </label>                            <div class="controls">
                                <input type="text" name="images" value="" id="images" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="description" class="control-label">description : </label>                            <div class="controls">
                                <input type="text" name="description" value="" id="description" />                            </div>
                    </div>
                    
                    <div class="control-group">
                            <label for="datetime" class="control-label">datetime : </label>                            <div class="controls">
                                <input type="text" name="datetime" value="" id="datetime" />                            </div>
                    </div>
                    
                    <button id="save" type="submit" class="btn btn-success"><icon class="icon-plus-sign"></icon> Add New</button>
                    <button id="save_edit" type="submit" class="btn btn-primary" style="display:none;"><icon class="icon-refresh"></icon> Update</button>

                    </form>                 
                </div>
            </div>

			</div>
		
		<hr>

		<footer>
			<p>&copy; Company 2012</p>
		</footer>

	</div> <!-- /container -->