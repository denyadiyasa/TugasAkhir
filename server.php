<?php
  error_reporting(E_ALL); 
  ini_set('display_error',1);

  require_once 'nusoap/lib/nusoap.php';
  require_once 'adodb/adodb.inc.php';
  require_once 'buku.php';
  $server = new nusoap_server();
  $server->configureWSDL('Service Buku','urn:buku');
  $server->wsdl->schemaTargetNamespace = 'urn:buku';

  $server->register('get_buku',
    array(),
      array(
        'return' => 'xsd:string'
      ),
      'urn:buku',
      'urn:buku#get_buku',
      'rpc',
      'encoded',
      'mengambil semua data buku'
  );
  
    $server->register('get_buku_by_id',
    array(
		'id' => 'xsd:string'
	),
      array(
        'return' => 'xsd:string'
      ),
      'urn:buku',
      'urn:buku#get_buku_by_id',
      'rpc',
      'encoded',
      'mengambil semua data buku berdasarkan id'
  );


    $server->register('hapus_buku',
    array(
      'id' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:buku',
      'urn:buku#hapus_buku',
      'rpc',
      'encoded',
      'menghapus data buku'
  );

      $server->register('tambah_buku',
        array('no' => 'xsd:string',
              'id' => 'xsd:string',
              'nama' => 'xsd:string',
              'pengarang' => 'xsd:string',
              'penerbit' => 'xsd:string',
              'tahun' => 'xsd:string',
              ),
        array('return' => 'xsd:string'),
        'urn:buku',
        'urn:buku#tambah_buku',
        'rpc',
        'encoded',
        'menambah data buku'
      );

      

      $server->register('getDataByID',
        array('id' => 'xsd:string'),
        array('return' => 'xsd:string'),
        'urn:buku',
        'urn:buku#getDataByID',
        'rpc',
        'encoded',
        'ambil data by id'
        );

      $server->register('ubah_buku',
    array(
          'idAWAL' => 'xsd:string',
          'no' => 'xsd:string',
          'id' => 'xsd:string',
          'nama' => 'xsd:string',
          'pengarang' => 'xsd:string',
          'penerbit' => 'xsd:string',
          'tahun' => 'xsd:string'
          ),
    array('return' => 'xsd:string'),
    'urn:buku',
    'urn:buku#ubah_buku',
    'rpc',
    'encoded',
    'merubah data buku'
  );      

  function getDataByID($id){
    $buku = new Buku();
    return $buku->getDataByID($id);
  }

  function get_buku_by_id($id){
	$buku = new Buku();
    return $buku->get_buku_by_id($id);
  }
  function get_buku() {
    $buku = new Buku();
    return $buku->get_buku();
  }

  function tambah_buku($no, $id, $nama, $pengarang, $penerbit, $tahun){
    $buku = new Buku();
    return $buku->tambah_buku($no, $id, $nama, $pengarang, $penerbit, $tahun);
  }

  function ubah_buku($idAWAL, $no, $id, $nama, $pengarang, $penerbit, $tahun){
    $buku = new Buku();
    return $buku->ubah_buku($idAWAL, $no, $id, $nama, $pengarang, $penerbit, $tahun);
  }

  function hapus_buku($id){
    $buku = new Buku();
    return $buku->hapus_buku($id);
  }

  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ''; $server->service($HTTP_RAW_POST_DATA);
?>