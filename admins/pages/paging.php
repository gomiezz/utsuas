<?php
	$page=(isset($_GET['page']))?$_GET['page']:"main";
	switch ($page){ 
	case 'home':include "pages/panelkanan.html";break;	
	case 'sejarah':include "pages/sejarah_lihat.php";break;
	case 'sejarah_edit':include "pages/sejarah_edit.php";break;
	case 'sejarah_update':include "pages/sejarah_update.php";break;
	
	case 'produk':include "pages/produk.php";break;
	case 'tambahProduk':include "pages/tambahProduk.php";break; 
	case 'hapusProduk':include "pages/hapusProduk.php";break; 
	case 'editProduk': include "pages/editProduk.php"; break;
	
	case 'kategori':include "pages/kategori.php";break;
	case 'tambahKategori':include "pages/tambahKategori.php";break;
	case 'editKategori': include "pages/editKategori.php"; break;
	case 'hapusKategori':include "pages/hapusKategori.php";break; 

	case 'spesifikasi':include "pages/spesifikasi.php";break;
	case 'tambahSpesifikasi': include "pages/tambahSpesifikasi.php"; break;
	case 'editSpesifikasi': include "pages/editSpesifikasi.php"; break;
	case 'hapusSpesifikasi':include "pages/hapusSpesifikasi.php";break; 

	case 'nilai':include "pages/nilai.php";break;
	case 'tambahNilai': include "pages/tambahNilai.php"; break;
	case 'editNilai': include "pages/editNilai.php"; break;
	case 'hapusNilai':include "pages/hapusNilai.php";break; 

	
	
	case 'login':include "pages/page-login.html";break;	
	case 'register':include "pages/page-register.html";break;		
	case 'main':
	default:include"pages/panelkanan.php";	
	}
?>
