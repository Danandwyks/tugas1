<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#nim").focus();
	$("#nama").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		CariDataBarang();
	});
	function CariDataBarang(){
		var kode = $("#nim").val()
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoBarang",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				//$("#nama_brg").val(data.nama_barang);
				//$("#satuan").val(data.satuan);
				//$("#hrg_beli").val(data.harga_beli);
				//$("#hrg_jual").val(data.harga_jual);
				//$("#stok_awal").val(data.stok_awal);
			}
		});
	}
	$("#nim").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	/*$("#hrg_jual").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#stok_awal").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});*/
	
	$("#simpan").click(function(){
		var nim	= $("#nim").val();
		var nama	= $("#nama").val();
		var tempat_lahir	= $("#tempat_lahir").val();
		var tanggal_lahir	= $("#tanggal_lahir").val();
		var umur	= $("#umur").val();
		var jenis_kelamin	= $("#jenis_kelamin").val();
		var jurusan	= $("#jurusan").val();
		//var satuan		= $("#satuan").val();
		//var gudang		= $("#gudang").val();
		
		var string = $("#form").serialize();
		
		if(nim.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Barang tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#nim").focus();
			return false();
		}
		if(nama_brg.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Barang tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#nama_brg").focus();
			return false();
		}
		/*if(satuan.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Satuan tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#satuan").focus();
			return false();
		}
		if(gudang.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Gudang tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#gudang").focus();
			return false();
		}*/
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/mahasiswa/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				CariSimpanan();
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});
		return false();		
	});
	
});	
</script>
<form name="form" id="form">
<fieldset class="atas">
<table width="100%">
<tr>    
	<td width="150">NIM</td>
    <td width="5">:</td>
    <td><input type="text" name="nim" id="nim" size="12" maxlength="12" class="easyui-validatebox"  value="<?php echo $nim;?>" /></td>
</tr>
<tr>    
	<td>Nama Mahasiswa</td>
    <td>:</td>
    <td><input type="text" name="nama" id="nama"  size="50" maxlength="30" class="easyui-validatebox"  value="<?php echo $nama;?>"/></td>
</tr>
<tr>    
	<td>Tempat Lahir</td>
    <td>:</td>
    <td><input type="text" name="tempat_lahir" id="tempat_lahir"  size="50" maxlength="20" class="easyui-validatebox"  value="<?php echo $tempat_lahir;?>"/></td>
</tr>
<tr>    
	<td>Tanggal Lahir</td>
    <td>:</td>
    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir"  size="50" maxlength="50" class="easyui-validatebox"  value="<?php echo $tanggal_lahir;?>"/></td>
</tr>
<tr>    
	<td>Umur</td>
    <td>:</td>
    <td><input type="text" name="umur" id="umur"  size="50" maxlength="50" class="easyui-validatebox"  value="<?php echo $umur;?>"/></td>
</tr>
<tr>    
	<td>Jenis Kelamin</td>
    <td>:</td>
	<td>
    <select name="jenis_kelamin" id="jenis_kelamin">
    <option value="">-PILIH-</option>
    <?php
$kondisi_y = array('L','P');
for ($y = 0; $y<sizeof($kondisi_y);$y++) {
	if ($kondisi_y[$y] == $jenis_kelamin){
		echo "<option value='".$kondisi_y[$y]."'select>".$kondisi_y[$y]."</option>";

	}else {
		echo "<option value='".$kondisi_y[$y]."'>".$kondisi_y[$y]."</option>";
	}
}
	?>
    </select>
	</td>
</tr>
<tr>    
	<td>Jurusan</td>
    <td>:</td>
	<td>
    <select name="id_jurusan" id="id_jurusan">
    <?php 
	if(empty($id_jurusan)){
	?>
    <option value="">-PILIH-</option>
    <?php
	}
	foreach($l_jurusan->result() as $t){
		if($id_jurusan==$t->id_jurusan){
	?>
    	<option value="<?php echo $t->id_jurusan;?>" selected="selected"><?php echo $t->id_jurusan;?></option>
    <?php }else{ ?>
    	<option value="<?php echo $t->id_jurusan;?>"><?php echo $t->id_jurusan;?></option>
    <?php }
	}
	?>
    </select>
	</td>
</tr>

</table>
</fieldset>
<fieldset class="bawah">
<table width="100%">
<tr>
	<td colspan="3" align="center">
    <button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/mahasiswa/tambah">
    <button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
    </a>
    <a href="<?php echo base_url();?>index.php/mahasiswa/">
    <button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>  
</fieldset>   
</form>