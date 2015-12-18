<?php require_once 'clientDataBuku.php' ?>
<!DOCTYPE html>

<html>
  <head>
  <meta charset="utf-8">
  <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-hal-login.css" rel="stylesheet"> 
    </head>
  </head>
  <body>
    <?php if($aksi=="" || $aksi=="dataBuku"){ ?>
		<div class="container">
      <div class="panel panel-default">
      <div style="text-align:center" class="panel-heading"><b>Data Buku</b></div>
      <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed" id="example" class="tablesorter">
            <thead>
            <tr class="info">
                <th>No</th>
                <th>ID</th>
                <th>Nama Buku</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td><?php echo $value->no;?></td>
              <td><a href="?aksi=detail&id=<?= $value->id ?>"><?php echo $value->id;?></a></td>
              <td><?php echo $value->nama;?></td>
              <td style="width:250px">
              <center>
                <a href="?aksi=detail&id=<?= $value->id ?>" class="btn btn-info">Detail</a>
				<a href="?aksi=ubahData&idUbah=<?= $value->id ?>" class="btn btn-success">Ubah</a>
                <a href="?idHapus=<?= $value->id ?>" class="btn btn-danger">Hapus</a>
              </center>
          	  </td>
            </tr>
            <?php } ?>
        </thead>
        </table>
    </div>
    </div>
    </div>
    </div>
        <br>
		<center><a href="?aksi=tambahData" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Buku</a></center>
	<?php } else if($aksi=="tambahData"){?>
            <div class="container">
            <div class="panel panel-default">
            <div style="text-align:center" class="panel-heading"><b>Tambah Buku</b></div>
            <div class="panel-body">
            <form class="form-horizontal" action="?aksi=tambahDataBuku" method="POST">
                <div class="form-group">
                  <label class="control-label col-sm-2">No Buku :</label>
                  <div class="col-sm-5">
                    <input name="no" type="number" placeholder="No Buku" autofocus required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-5">
                    <?php
                      foreach ($dataBuku as $key => $list) {
                    ?>
                        <option value="<?php echo $list->no;?>">
                          <?php echo $list->no;?>
                        </option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">ID :</label>
                  <div class="col-sm-5">
                    <input name="id" type="number" placeholder="ID" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama Buku :</label>
                  <div class="col-sm-5">
                    <input name="nama" type="text" placeholder="Nama Buku" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Pengarang :</label>
                  <div class="col-sm-5">
                    <input name="pengarang" type="text" placeholder="Pengarang" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Penerbit :</label>
                  <div class="col-sm-5">
                    <input name="penerbit" type="text" placeholder="Penerbit" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tahun Pembuatan :</label>
                  <div class="col-sm-5">
                    <input name="tahun" type="date" placeholder="Tahun Pembuatan" required>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Tambah" class="btn btn-success btn-md">
                  </div>
                </div>
                <a href="index.php">Kembali</a>
            </form>
            </div>


            <?php } else if($aksi=="ubahData"){
            foreach ($dataByID as $key => $value) { ?>
            <div class="container">
            <div class="panel panel-default">
            <div style="text-align:center" class="panel-heading"><b>Ubah Buku</b></div>
            <div class="panel-body">
            <form class="form-horizontal" action="?aksi=UbahDataBuku" method="POST">
            	<input type="hidden" name="idAwal"  value="<?php echo $value->id;?>" >
                <div class="form-group">
                  <label class="control-label col-sm-2">No Buku :</label>
                  <div class="col-sm-5">
                    <input name="no" type="number" placeholder="No Buku" value="<?php echo $value->no;?>" autofocus required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">ID :</label>
                  <div class="col-sm-5">
                    <input name="id" type="number" placeholder="ID" value="<?php echo $value->id;?>"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama Buku :</label>
                  <div class="col-sm-5">
                    <input name="nama" type="text" placeholder="Nama Buku"  value="<?php echo $value->nama;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Pengarang :</label>
                  <div class="col-sm-5">
                    <input name="pengarang" type="text" placeholder="Pengarang"  value="<?php echo $value->pengarang;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Penerbit :</label>
                  <div class="col-sm-5">
                    <input name="penerbit" type="text" placeholder="Penerbit"  value="<?php echo $value->penerbit;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tahun Pembuatan :</label>
                  <div class="col-sm-5">
                    <input name="tahun" type="date" placeholder="Tahun Pembuatan"  value="<?php echo $value->tahun;?>" required>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Ubah" class="btn btn-success btn-md">
                  </div>
                </div>
                <a href="index.php">Kembali</a>
            </form>
        	</div>
    		</div>
			</div>


	<?php
			}
		}else if($aksi=="detail"){
	?>
		<div class="container">
      <div class="panel panel-default">
      <div style="text-align:center" class="panel-heading"><b>Detail Buku</b></div>
      <div class="panel-body">
      <div class="table-responsive">
		<center>
        <table class="table table-striped table-bordered" id="example" class="tablesorter">
			<?php foreach ($dataDetail as $key => $value) { ?>
            <tr class="info">
                <td>ID</td>
				<td><?php echo $value->id;?></td>
            </tr>
            <tr>
				<td>Nama Buku</td>
				<td><?php echo $value->nama;?></td>
            </tr>
			<tr>
				<td>Pengarang</td>
				<td><?php echo $value->pengarang;?></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><?php echo $value->penerbit;?></td>
			</tr>
			<tr>
				<td>Tahun Pembuatan</td>
				<td><?php echo $value->tahun;?></td>
			</tr>
            <?php } ?>
        </table>
		<a href="?aksi=dataBuku">Kembali</a>
		</center>
		</div>
    </div>
    </div>
    </div>
	<?php
		}else if($aksi=="UbahDataBuku"){
			if($hasil==1){
                echo "<script>alert('Ubah data berhasil')</script>";
                header("Refresh: 0; URL='index.php'");
              }else{ 
                echo "<script>alert('Ubah data gagal')</script>";
                echo "<script>history.go(-1);</script>"; 
              }
		}else if($aksi=="tambahDataBuku"){
			if($hasil==1){
                echo "<script>alert('Tambah data berhasil')</script>";
                header("Refresh: 0; URL='index.php'");
              }else{ 
                echo "<script>alert('Tambah data gagal')</script>";
                echo "<script>history.go(-1);</script>"; 
              }
		}
	?>

	
  </body>
</html>