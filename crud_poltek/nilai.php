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
<script type="text/javascript" src="mbjsmbrfzq.js"></script> 
   <div class="container" style="margin-top:50px"> 
   <h2>Daftar NILAI</h2>   
   <hr>  
   <table class="table table-striped table-hover table-sm table-bordered">   
   <thead class="thead-dark"> 
    <tr>  
 <th>NO.</th> 
  <th>ID.</th> 
        <th>KODE MAHASISWA.</th> 
		   <th>NIM.</th> 
<th>ABSEN.</th>      
        <th>KUIS</th>  
    <th>TUGAS</th>   
        <th>UTS</th>  
        <th>KODE DOSEN</th>
		 <th>OPTION</th>
        </tr> 
        </thead>  
        <tbody>   
        <?php     //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar  
        $sql = mysqli_query($koneksi, "SELECT a.id,a.kd_dosen, a.nim,a.kd_mk, a.absen,a.kuis, a.tugas,a.uts
        from nilai as a
       ") 
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
		<td>'.$data['kd_mk'].'</td>
        <td>'.$data['nim'].'</td> 
        <td>'.$data['absen'].'</td>   
        <td>'.$data['kuis'].'</td>  
        <td>'.$data['tugas'].'</td> 
        <td>'.$data['uts'].'</td>   
        <td>'.$data['kd_dosen'].'</td>   		
        <td>   
        <a href="edit3.php?id='.$data['id'].'" class="badge badge-warning">Edit</a>  
        <a href="delete3.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>    
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
