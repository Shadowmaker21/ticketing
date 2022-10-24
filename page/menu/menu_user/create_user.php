<?php

$nip = $_POST['nip'];
$nama_lengkap = $_POST['nama_lengkap'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$pass_user = md5($_POST['pass_user']);

$imgname=$_FILES['file_pic']['name'];
	$extension = pathinfo($imgname,PATHINFO_EXTENSION);
    $getfilename =  str_replace(' ', '_', $imgname);

	
	// $rename='http://192.168.0.4/sekar/files/'.$getfilename;

    $newname=$getfilename;

    $filename=$_FILES['file_pic']['tmp_name'];
    move_uploaded_file($filename, '../files/user_pict/'.$getfilename);

$level = $_POST['level'];

$query=mysqli_query($koneksi1, "INSERT INTO user VALUES ('','$nip','$nama_lengkap','$jabatan','$username','$pass_user','$newname','$level')");

    if($query){
        ?>
        <script>alert('Data berhasil Ditambahkan')</script>";
	    <script type='text/javascript'> document.location = 'index.php?page=user'; </script>";
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Ada Kesalahan saat input.");
        </script>
        <?php
    }
?>