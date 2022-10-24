<?php
    $nip = $_POST['nip'];
    $notik = $_POST['notik'];
    $subject = addslashes(strip_tags($_POST['subject']));
    $project = $_POST['project'];
    $nama_app = $_POST['nama_app'];
    $id_tiket = $_POST['id_tiket'];
    $ket = nl2br($_POST['ket']);

    $imgname=$_FILES['lampiran']['name'];
	$extension = pathinfo($imgname,PATHINFO_EXTENSION);
    $getfilename =  str_replace(' ', '_', $imgname);

	
	// $rename='http://192.168.0.4/sekar/files/'.$getfilename;

    $newname=$getfilename;

    $filename=$_FILES['lampiran']['tmp_name'];
    move_uploaded_file($filename, '../files/request'.$getfilename);

	$query = "INSERT INTO request VALUES('','$nip','$notik','$subject','$project','$nama_app','$id_tiket','$ket','$newname')";
	$run = mysqli_query($koneksi1,$query);
		if($run == true){
            ?>
                <script>alert('Request Berhasil Disubmit, Mohon Untuk Menunggu ')</script>";
                <script type='text/javascript'> document.location = 'index.php?page=request'; </script>";
                <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Email Tidak Berhasil Dikirim");
            </script>
            <?php
        }
?>