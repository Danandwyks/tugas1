<div id="view">
<div style="float:left; padding-bottom:5px;">
<a href="<?php echo base_url();?>index.php/barang/tambah">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</a>
<a href="<?php echo base_url();?>index.php/barang">
<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>

</div>
<div style="float:left; padding-bottom:5px;">
<form name="form" method="post" action="<?php echo base_url();?>index.php/barang">
Cari Kode & Nama Warna : <input type="text" name="txt_cari" id="txt_cari" size="50" />
<!--<select name="gudang" id="gudang">
    <?php 
	/*if(empty($gudang)){
	?>
    <option value="">-PILIH-</option>
    <?php
	}
	foreach($l_gudang->result() as $t){
		if($gudang==$t->id_gudang){
	?>
    	<option value="<?php echo $t->id_gudang;?>" selected="selected"><?php echo $t->gudang;?></option>
    <?php }else{ ?>
    	<option value="<?php echo $t->id_gudang;?>"><?php echo $t->gudang;?></option>
    <?php }
	} */?>
    </select>-->
<button type="submit" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
</form>
</div>
<div id="gird" style="float:left; width:100%;">
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Kode Warna</th>
    <th>Nama Warna</th>
    <!--<th>Satuan</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Stok Awal</th>
    <th>Gudang</th>-->
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		//$gudang = $this->app_model->Nama_Gudang($db['id_gudang']);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_barang']; ?></td>
            <td ><?php echo $db['nama_barang']; ?></td>
            <!--<td align="center" width="100" ><?php //echo $db['satuan']; ?></td>
            <td align="right" width="100" ><?php //echo number_format($db['harga_beli']); ?></td>
            <td align="right" width="100" ><?php //echo number_format($db['harga_jual']); ?></td>
            <td align="center" width="80" ><?php //echo $db['stok_awal']; ?></td>
            <td align="center" width="80" ><?php //echo $gudang; ?></td>-->
            <td align="center" width="80">
            <a href="<?php echo base_url();?>index.php/barang/edit/<?php echo $db['kode_barang'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
			</a>
            <a href="<?php echo base_url();?>index.php/barang/hapus/<?php echo $db['kode_barang'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>
</div>
</div>