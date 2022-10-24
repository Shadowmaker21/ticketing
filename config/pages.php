<?php
error_reporting(error_reporting()& ~E_NOTICE);
include "../config/koneksi.php";


// PAGE SURAT
if(empty($_GET['page'])){
    $getPage = '';
}else{
    $getPage = $_GET['page'];
}
if($getPage=="request"){
    include "../page/menu/menu_request/request.php";
}
if($getPage=="create_request"){
    include "../page/menu/menu_request/create_request.php";
}
if($getPage=="history"){
    include "../page/menu/menu_history/history.php";
}

// 

if($getPage=="user"){
    include "../page/menu/menu_user/user.php";
}
if($getPage=="create_user"){
    include "../page/menu/menu_user/create_user.php";
}
if($getPage=="delete_user"){
    include "../page/menu/menu_user/delete_user.php";
}
if($getPage=="edit_user"){
    include "../page/menu/menu_user/edit_user.php";
}

//

if($getPage=="dashboard"){
    include "../page/menu/dashboard/dashboard.php";
}
?>