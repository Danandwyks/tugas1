<?php include('t2.php'); 
?> 
<!DOCTYPE html>
 <html> 
 <head>
 <title>Akademikita.com</title>  
 <link rel="stylesheet" 
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
 crossorigin="anonymous">   
 </head>
 <body> 
 <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
 <div class="container">   
 <a class="navbar-brand" href="#">CRDU PHP</a>   
 <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">     
 <span class="navbar-toggler-icon"></span>    
 </button> 
   <div class="collapse navbar-collapse" id="navbarSupportedContent">     
   <ul class="navbar-nav mr-auto"> 
   <li class="nav-item">     
   <a class="nav-link" href="index.php">Home</a> 
   </li>  
   <li class="nav-item">
   <a class="nav-link" href="tambah.php">Tambah</a>  
   </li>    
   </ul>  
   </div> 
   </div> 
   </nav>  
   <div class="container" style="margin-top:20px">
   <h2>Edit Dosen</h2>    
   <hr> 
    <?php   //jika sudah mendapatkan parameter GET id dari URL  
   if(isset($_GET['id']))
   {   
   //membuat variabel $id untuk menyimpan id dari GET id di URL  
   $id = $_GET['id']; 
       //query ke database SELECT tabel mahasiswa berdasarkan id = $id  
	   $select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id='$id'") or die(mysqli_error($koneksi)); 
       //jika hasil query = 0 maka muncul pesan error   
	   if(mysqli_num_rows($select) == 0){  
	   echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';  
	   exit();    //jika hasil query > 0  
	   }else{     //membuat variabel $data dan menyimpan data row dari query 
	   $data = mysqli_fetch_assoc($select);    
	   }  
	   }   
	   ?>    
	   <?php   //jika tombol simpan di tekan/klik   
	   if(isset($_POST['submit']))
	   { 
      $id   = $_POST['id'];  
   $kd_dosen   = $_POST['kd_dosen'];  
   $nama_dosen = $_POST['nama_dosen'];   
   $alamat  = $_POST['alamat']; 
   $email  = $_POST['email'];
$hp  = $_POST['hp'];    
   $sql = mysqli_query($koneksi, "UPDATE dosen SET  kd_dosen='$kd_dosen',nama_dosen='$nama_dosen', alamat='$alamat' , email='$email', hp='$hp'  WHERE id = '$id'") or die(mysqli_error($koneksi));   
   if($sql){    
   echo '<script>alert("Berhasil menyimpan data."); document.location="edit2.php?id='.$id.'";</script>';   
   }else{  
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';   
   } 
   }   
   ?>        
   <form action="edit2.php?id=<?php 
   echo $id; ?>" method="post">  
   <div class="form-group row">  
   <label class="col-sm-2 col-form-label">ID</label>   
   <div class="col-sm-10">     
   <input type="text" name="id" class="form-control" size="4" value="<?php
   echo $data['id']; ?>"  readonly required>    
   </div>  
   </div>
   <div class="form-group row">  
   <label class="col-sm-2 col-form-label">kd dosen</label>   
   <div class="col-sm-10">     
   <input type="text" name="kd_dosen" class="form-control" size="4" value="<?php
   echo $data['kd_dosen']; ?>"  readonly required>    
   </div>  
   </div>
 <div class="form-group row">  
   <label class="col-sm-2 col-form-label">Nama Dosen</label>   
   <div class="col-sm-10">     
   <input type="text" name="nama_dosen" class="form-control" size="4" value="<?php
   echo $data['nama_dosen']; ?>"  required>    
   </div>  
   </div>
   <div class="form-group row">  
   <label class="col-sm-2 col-form-label">kd dosen</label>   
   <div class="col-sm-10">     
   <input type="text" name="alamat" class="form-control" size="4" value="<?php
   echo $data['alamat']; ?>"  required>    
   </div>  
   </div>
   <div class="form-group row">  
   <label class="col-sm-2 col-form-label">kd dosen</label>   
   <div class="col-sm-10">     
   <input type="text" name="email" class="form-control" size="4" value="<?php
   echo $data['email']; ?>"  required>    
   </div>  
   </div>
   <div class="form-group row">  
   <label class="col-sm-2 col-form-label">kd dosen</label>   
   <div class="col-sm-10">     
   <input type="text" name="hp" class="form-control" size="4" value="<?php
   echo $data['hp']; ?>"  required>    
   </div>  
   </div>
	</div>
	<div class="form-group row">  
	<label class="col-sm-2 col-form-label">&nbsp;</label> 
    <div class="col-sm-10">    
	<input type="submit" name="submit" class="btn btnprimary" value="SIMPAN">    
	<a href="test.php" class="btn btn-warning">KEMBALI</a>    
	</div>   
	</div>  
	</form>   
	</div>   
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
 crossorigin="anonymous"></script>  
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
 crossorigin="anonymous"></script>   
 </body> 
 </html>