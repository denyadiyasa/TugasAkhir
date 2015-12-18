<?php
	require_once 'adodb/adodb.inc.php';
	class Buku{
		function __construct()
		{
			$this->db = NewADOConnection('mysqli');
			$this->db->Connect('localhost','root','','tasit');
		}

		function get_buku()
		{
			$buku  = $this->db->Execute("SELECT * FROM buku order by no asc");
			return json_encode($buku->GetAssoc());
		}
		
		function get_buku_by_id($id){
			$buku  = $this->db->Execute("SELECT * FROM buku where id='$id'");
			return json_encode($buku->GetAssoc());
		}

		function hapus_buku($id)
		{
			$this->db->Execute("delete from buku where id='$id'");
		}

		function tambah_buku($no, $id, $nama, $pengarang, $penerbit, $tahun){
			$sql = "insert into buku(no,id,nama, pengarang, penerbit, tahun) values('$no','$id','$nama','$pengarang','$penerbit','$tahun')";
			
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}

		function ubah_buku($idAWAL,$no, $id, $nama, $pengarang, $penerbit, $tahun){
			$sql = "update buku set no='$no', id='$id', nama='$nama', pengarang='$pengarang', penerbit='$penerbit',tahun='$tahun' where id='$idAWAL'";
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}
  		
  		function getDataByID($id){
  			$buku  = $this->db->Execute("SELECT * FROM buku WHERE id='$id'");
			return json_encode($buku->GetAssoc());
  		}
	}
?>