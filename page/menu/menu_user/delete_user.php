<?php
$id_user = $_POST['id_user'];

$query=mysqli_query($koneksi1, "DELETE FROM user WHERE id_user='$id_user'");

    if($query){
        ?>
        <script>alert('Pengguna Berhasil Dihapus')</script>";
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