<?php
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$nama_user = $_POST['nama_user'];
$pass_user = md5($_POST['pass_user']);
$level = $_POST['level'];

$query=mysqli_query($koneksi1, "UPDATE user SET username='$username',nama_user='$nama_user',pass_user='$pass_user',level='$level' WHERE id_user='$id_user'");

    if($query){
        ?>
        <script>alert('Data berhasil Update')</script>";
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