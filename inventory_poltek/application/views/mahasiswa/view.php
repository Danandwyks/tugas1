<div id="view">
<div style="float:left; padding-bottom:5px;">
<a href="<?php echo base_url();?>index.php/mahasiswa/tambah">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</a>
<a href="<?php echo base_url();?>index.php/mahasiswa">
<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>

</div>
<div style="float:left; padding-bottom:5px;">
<form name="form" method="post" action="<?php echo base_url();?>index.php/mahasiswa">
Cari NIM : <input type="text" name="txt_cari" id="txt_cari" size="50" />
<!--<select name="jurusan" id="jurusan">
    <?php 
	/*if(empty($jurusan)){
	?>
    <option value="">-PILIH-</option>
    <?php
	}
	foreach($l_jurusan->result() as $t){
		if($jurusan==$t->id_jurusan){
	?>
    	<option value="<?php echo $t->id_jurusan;?>" selected="selected"><?php echo $t->jurusan;?></option>
    <?php }else{ ?>
    	<option value="<?php echo $t->id_jurusan;?>"><?php echo $t->jurusan;?></option>
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
    <th>NIM</th>
    <th>Nama</th>
	<th>Tempat Tanggal</th>
	<th>tanggal Lahir</th>
    <th>Jenis Kelamin</th>
	<th>jurusan</th>
	<th>umur</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$mahasiswa = $this->app_model->mahasiswa($db['nim']);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $nim['nim']; ?></td>
            <td ><?php echo $nama['nama']; ?></td>
            <td ><?php echo $tempat_lahir['tempat_lahir']; ?></td>
            <td ><?php echo $tanggal_lahir['tanggal_lahir']; ?></td>
			    <td ><?php echo $jenis_kelamin['jenis_kelamin']; ?></td>
            <td ><?php echo $jurusan['jurusan']; ?></td>
			   <td ><?php echo $umur['umur']; ?></td>
   
            <td align="center" width="80">
            <a href="<?php echo base_url();?>index.php/mahasiswa/edit/<?php echo $db['nim'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
			</a>
            <a href="<?php echo base_url();?>index.php/mahasiswa/hapus/<?php echo $db['nim'];?>"
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