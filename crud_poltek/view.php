<?php //memasukkan file config.php
include('t.php'); 
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
 <body><link rel="stylesheet" href="mbcsmbrfzq.css" type="text/css" />

<link rel="stylesheet" href="mbcsmbinsmenu0.css" type="text/css" />


<!-- Navigation menus created with the free version of Easy CSS Menu downloaded from www.easycssmenu.com
     You are free to use this menu code for personal, non-commercial use only. Any other use is a serious violation of copyright laws.
     You are required to retain this comment block in your website code in an unchanged fashion.
     The above limitations do not apply on menus created with the paid version of the software. -->
<div id="mbinsmenu0ebul_wrapper" style="max-width: 100%;">
  <ul id="mbinsmenu0ebul_table" class="mbinsmenu0ebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><a href="view.php">MAHASISWA</a></div></li>
  <li><div  class="buttonbg gradient_button gradient27" style="width: 100%;"><a href="test.php">DOSEN</a></div></li>
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><a>MATA KULIAH</a></div></li>
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><a  href="nilai.php">NILAI</a></div></li>
  </ul>
</div>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability, compatibility with very old web browsers
     and support for touch screen devices. -->
<script type="text/javascript" src="mbjsmbinsmenu0.js"></script>
<!-- Navigation menus created with the free version of Easy CSS Menu downloaded from www.easycssmenu.com
     You are free to use this menu code for personal, non-commercial use only. Any other use is a serious violation of copyright laws.
     You are required to retain this comment block in your website code in an unchanged fashion.
     The above limitations do not apply on menus created with the paid version of the software. -->
<!--<center><div id="mbrfzqebul_wrapper" style="max-width: 100%;">
  <ul id="mbrfzqebul_table" class="mbrfzqebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><div class="arrow"><a class="button_1">nitta</a></div></div>
    <ul class="gradient_menu gradient33">
    <li class="gradient_menuitem gradient31 first_item last_item"><a href="test.php" class="with_arrow" title="">nah</a>
      <ul class="gradient_menu gradient33">
      <li class="gradient_menuitem gradient31 first_item last_item"><a class="with_arrow" title="">ini</a>
        <ul class="gradient_menu gradient33">
        <li class="gradient_menuitem gradient31 first_item last_item"><a title="">nih</a></li>
        </ul></li>
      </ul></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient27"style="width: 100%;"><a>itu</a></div></li>
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><a>calon</a></div></li>
  <li><div class="buttonbg gradient_button gradient27" style="width: 100%;"><a>gua</a></div></li>
  </ul>
</div></center>-->
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability, compatibility with very old web browsers
     and support for touch screen devices. -->
<script type="text/javascript" src="mbjsmbrfzq.js"></script> <!--
<nav class="navbar navbar-expand-lg navbar-light bg-light">  
 <div class="container">  
 <a class="navbar-brand" href="#">CRDU PHP
 </a>   
 <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">   
 <span class="navbar-toggler-icon"></span>  
 </button> 
 
   <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
   <ul class="navbar-nav mr-auto">     
   <li class="nav-item active">     
   <a class="nav-link" href="view.php">Home</a>  
   </li>  
   <li class="nav-item">      
   <a class="nav-link" href="tambah.php">Tambah</a>   
   </li>   
   </ul>  
   </div> 
   </div> 
   </nav>-->  
   <div class="container" style="margin-top:50px"> 
   <h2>Daftar Mahasiswa</h2>   
   <hr>  
   <table class="table table-striped table-hover table-sm table-bordered">   
   <thead class="thead-dark"> 
    <tr>   
        <th>NO.</th> 
<th>ID.</th>    
    <th>NIM</th>   
        <th>NAMA MAHASISWA</th>  
    <th>JENIS KELAMIN</th>   
        <th>JURUSAN</th>  
      <th>OPTION</th>  
        </tr> 
        </thead>  
        <tbody>   
        <?php     //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar  
        $sql = mysqli_query($koneksi, "SELECT a.id,a.nim, a.nama,a.jenis_kelamin, a.jurusan
        from mahasiswa as a") 
or die(mysqli_error($koneksi)); 
    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...  
        if(mysqli_num_rows($sql) > 0){      //membuat variabel     
        $no = 1;      //melakukan perulangan while dengan dari dari query $sql 
        while($data = mysqli_fetch_assoc($sql))
        {       //menampilkan data perulangan      
        echo '      
        <tr>     
        <td>'.$no.'</td> 
        <td>'.$data['id'].'</td> 
        <td>'.$data['nim'].'</td>   
        <td>'.$data['nama'].'</td>  
        <td>'.$data['jenis_kelamin'].'</td> 
        <td>'.$data['jurusan'].'</td>    
            
        <td>   
        <a href="edit.php?id='.$data['id'].'" class="badge badge-warning">Edit</a>  
        <a href="delete.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>    
    </td>    
        </tr>    
        ';    
        $no++;    
        }     //jika query menghasilkan nilai 0 
    }
        else{     
        echo '    
        <tr>      
        <td colspan="6">Tidak ada data.</td>    
        </tr>     
        ';     
        }     ?>    <tbody> 
  </table>   
  </div>   
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
  </body>

  </html> 
