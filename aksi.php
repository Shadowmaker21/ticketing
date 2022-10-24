<?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'config/koneksi.php';
 
// berfungsi menangkap data yang dikirim
$user = $_POST['username'];
$pass = md5($_POST['password']);

//var_dump($user); exit;
 
// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($koneksi1,"SELECT * FROM user WHERE username='$user' AND pass_user='$pass'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($sql);


	// berfungsi mengecek jika user login sebagai admin
	if($data['level']=="ADMIN"){
		// berfungsi membuat session
		$_SESSION['nama'] =  $data['nama_lengkap'];
		$_SESSION['level'] = "ADMIN";
		$_SESSION['jab'] = $data['jabatan'];
		$_SESSION['pict'] = $data['file_pic'];
		$_SESSION['n'] = $data['nip'];
		$_SESSION['iduser'] = $data['id_user'];
		//berfungsi mengalihkan ke halaman admin
		header("location:admin/index.php?page=dashboard");
	// berfungsi mengecek jika user login sebagai moderator
	}else if($data['level']=="DIREKTUR"){
		// berfungsi membuat session
		$_SESSION['nama'] = $data['nama_lengkap'];
		$_SESSION['level'] = "DIREKTUR";
		$_SESSION['jab'] = $data['jabatan'];
		$_SESSION['pict'] = $data['file_pic'];
		$_SESSION['n'] = $data['nip'];
		$_SESSION['iduser'] = $data['id_user'];
		// berfungsi mengalihkan ke halaman moderator
		header("location:direktur/index.php?page=dashboard");

	}else if($data['level']=="KARYAWAN"){
		// berfungsi membuat session
		$_SESSION['nama'] = $data['nama_lengkap'];
		$_SESSION['level'] = "KARYAWAN";
		$_SESSION['jab'] = $data['jabatan'];
		$_SESSION['pict'] = $data['file_pic'];
		$_SESSION['n'] = $data['nip'];
		$_SESSION['iduser'] = $data['id_user'];
		// berfungsi mengalihkan ke halaman moderator
		header("location:karyawan/index.php?page=dashboard");
	}
	else{
		// berfungsi mengalihkan alihkan ke halaman login kembali
		header("location:index.php?alert=gagal1");
	}	
}else{
	header("location:index.php?alert=gagal");
}
?>