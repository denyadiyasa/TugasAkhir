<?php
	error_reporting(E_ALL);
	ini_set('display_error',1);

	require_once('nusoap/lib/nusoap.php');
	$url = 'http://localhost/satub_03119/server.php?wsdl';
	$client = new nusoap_client($url, 'WSDL');

	$idHapus =  isset($_GET["idHapus"]) ? $_GET["idHapus"] : '' ;
	$aksi =  isset($_GET["aksi"]) ? $_GET["aksi"] : '' ;
	$id = isset($_GET["id"]) ? $_GET["id"] : '' ;

	$idUbah = isset($_GET["idUbah"]) ? $_GET["idUbah"] : '' ;
	$result = $client->call('getDataByID',array('id'=>$idUbah));	
	$dataByID = json_decode($result);

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "tambahDataBuku"){
		$no = $_POST['no'];
	    $id = $_POST['id'];
	    $nama = $_POST['nama'];
	    $pengarang = $_POST['pengarang'];
	    $penerbit = $_POST['penerbit'];
	    $tahun = $_POST['tahun'];
	    $hasil = $client->call('tambah_buku', array('no'=>$no,'id'=>$id,'nama'=>$nama,'pengarang'=>$pengarang,'penerbit'=>$penerbit,
	                              'tahun'=>$tahun));
	    return $hasil;
	}

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "UbahDataBuku"){
		$idAwal = $_POST['idAwal'];
		$no = $_POST['no'];
	    $id = $_POST['id'];
	    $nama = $_POST['nama'];
	    $pengarang = $_POST['pengarang'];
	    $penerbit = $_POST['penerbit'];
	    $tahun = $_POST['tahun'];
	    $hasil = $client->call('ubah_buku', array('idAWAL'=>$idAwal, 'no'=>$no,'id'=>$id,'nama'=>$nama,'pengarang'=>$pengarang,'penerbit'=>$penerbit,
	                              'tahun'=>$tahun));
	    return $hasil;
	}

	
	$result = $client->call('get_buku_by_id',array('id'=>$id));
	$dataDetail = json_decode($result);
	

	$hapus = $client->call('hapus_buku',array('id'=>$idHapus));

	$result = $client->call('get_buku');	
	$data = json_decode($result);

	
	
	//echo 'Request';
	//echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	//echo 'Response';
	//echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	//echo 'Debug';
	//echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>