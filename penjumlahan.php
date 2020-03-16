<html>
<head>
<meta charset ="utf-8">
<title>nah</title>
 <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 integrity="sha384MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
 crossorigin="anonymous"> 
 </head>
 <body><link rel="stylesheet" href="mbcsmbrfzq.css" type="text/css" />

<link rel="stylesheet" href="mbcsmbinsmenu0.css" type="text/css" />
<script type="text/javascript" src="mbjsmbinsmenu0.js"></script>
<script type="text/javascript" src="mbjsmbrfzq.js"></script>
<style>
body{
	padding:20px 20px;
}
form{
	padding:10px 20px;
	background-color:#f5f5f5;
	border:solid thin #eee;
}
input, select{
	padding :6px 12px;
}
.hasil{
	padding :10px 20px;
	background-color:#900;
	color:#fff;
	border:solid thin #600;
}
</style>
</head>
<center><h1>	menghitung</h1></center>
<?php
include('t.php'); 
 if(isset($_GET['bmi']))
   {   
   //membuat variabel $id untuk menyimpan id dari GET id di URL  
   $bmi = $_GET['bmi']; 
       //query ke database SELECT tabel mahasiswa berdasarkan id = $id  
	   $select = mysqli_query($koneksi, "SELECT * FROM coding WHERE bmi='$bmi'") or die(mysqli_error($koneksi)); 
       //jika hasil query = 0 maka muncul pesan error   
	   if(mysqli_num_rows($select) == 0){  
	   echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';  
	   exit();    //jika hasil query > 0  
	   }else{     //membuat variabel $data dan menyimpan data row dari query 
	   $data = mysqli_fetch_assoc($select);    
	   }  
	   }   
if(isset($_GET['submit'])){
	$id=$_GET['id'];
	$tb=$_GET['tb'];
	$bb=$_GET['bb'];
		$keterangan=$_GET['keterangan'];
	$bmi=($tb+$bb);
	echo'<div class = "hasil">' ;
	 echo"<input type=text name=bmi value='$bmi'>";
	 echo'</div>';
			for($i=0;$i<=10;$i++){
				$tb=$bb;
				$bb=$bmi;
				$bmi=$bb+$tb;
				if($bmi<=0){
					$keterangan='D';
				} elseif($bmi>>0){
					$keterangan='A';
				}elseif($bmi>>10) {
					$keterangan='B';

				} elseif($bmi>>10) {
					$keterangan='C';

			}}
   $sql = mysqli_query($koneksi, "INSERT INTO coding (id,a, b, c, keterangan) 
   VALUES('$id', '$tb', '$bb', '$bmi','$keterangan')") or die(mysqli_error($koneksi));
  
}?>  
<div class ="form">
 <form methot="get" action="">
ID<br>
<input type ="text" name="id" readonly placeholder ="keisi auto"><br>
angka 1<br>
<input type ="text" name="tb" id="tb"><br>
angka 2<br>
<input type ="text" name ="bb" id="bb"><br>
Keterangan<br>
<input type ="text" name ="keterangan" id="keterangan"><br>
<input type="submit" name="submit" value ="itung">
</div>
</form>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type ="text/javascript">
		$(".form").keyup(function(){
			var tb = parseInt($("#tb").val())
			var bb = parseInt($("#bb").val())
			var keterangan = tb+bb;
			if ((keterangan <= 10)& (keterangan >= 0)) {
		keterangan = "A";
	}else if ((keterangan >= 10) & (keterangan <= 20)){
		keterangan = "B";
	}else if ((keterangan >= 20) & (keterangan <= 30)){
		keterangan = "C";
	} else if ((keterangan >= 30)){
		keterangan = "D";
	}else {
		keterangan = "E";
	};
			$("#keterangan").attr("value",keterangan)
			
			});
	</script>
<div class="container" style="margin-top:50px"> 
   
   
     <div class="container" style="margin-top:50px"> 
  <center> <h2>Database</h2>  </center> 
   <hr>  
   <table class="table table-striped table-hover table-sm table-bordered">   
   <thead class="thead-dark"> 
    <tr>   
        <th>NO.</th> 
<th>ID.</th>    
    <th>Nomor 1</th>   
        <th>Nomor 2</th>  
    <th>Hasil</th>   
        <th>Keterangan</th>  
        </tr> 
        </thead>  
        <tbody>   
        <?php   include('t.php');   //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar  
        $sql = mysqli_query($koneksi, "SELECT a.id,a.a, a.b,a.c, a.keterangan
        from coding as a") 
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
        <td>'.$data['a'].'</td>   
        <td>'.$data['b'].'</td>  
        <td>'.$data['c'].'</td> 
        <td>'.$data['keterangan'].'</td>    
            
        <td>   
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