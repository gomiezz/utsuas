<?php
    $page=(isset($_GET['page']))?$_GET['page']:"main";
    switch($page){
        case 'beranda': include"page/beranda.html";break;
        case 'produk': include"page/produk.php";break;
        case 'rakit': include"page/rakitpc.html";break;
        case 'tentang': include"page/tentangkami.html";break;
        case 'kontak': include"page/kontak.html";break;
        case 'kegiatan': include"page/kegiatan.php";break;
        case 'detail_produk': include "page/detail_produk.php"; break;
  
        default:include"page/beranda.html";
    }
?>