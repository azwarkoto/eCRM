<section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Perawatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<!--  -->
<form method="POST" action="<?= site_url('C_Perawatan/tambah') ?>" enctype="multipart/form-data">
<div class="box-body">
	<div class="form-group">
		<label>Ruangan</label>
        <select class="form-control" name="ruangan" id="ruangan">
			<option value="">-- Pilih Ruangan --</option>
			<?php
			foreach ($ruangan as $ruang) {
				?>
				<option <?php echo $ruangan_selected == $ruang->id_ruangan ? 'selected="selected"' : '' ?> 
					value="<?php echo $ruang->id_ruangan ?>"><?php echo $ruang->nama_ruangan ?></option>
				<?php
			}
			?>
		</select>
    </div>

    <div class="form-group">
        <label>Nama Aset</label>
          <select class="form-control" name="barang" id="barang">
			<option value="">-- Pilih Aset --</option>
			<?php
			foreach ($barang as $aset) {
				?>
				<!--di sini kita tambahkan class berisi id provinsi-->
				<option <?php echo $barang_selected == $aset->id_ruangan ? 'selected="selected"' : '' ?> 
					class="<?php echo $aset->id_ruangan ?>" value="<?php echo $aset->id_barang ?>"><?php echo $aset->kode_barang ?> / <?php echo $aset->nama_barang ?></option>
				<?php
			}
			?>
		</select>
       
    </div>

    <div class="form-group">
        <label>No Identifikasi</label>
       <select class="form-control" name="no_identifikasi" id="no_identifikasi">
			<option value="">-- Pilih No Identifikasi --</option>
			<?php
			$i=1; while ($i <= $identifikasi->jumlah) {
				?>
				<!--di sini kita tambahkan class berisi id provinsi-->
				<option <?php echo $identifikasi_selected == $identifikasi->id_barang ? 'selected="selected"' : '' ?> 
					class="<?php echo $identifikasi->id_barang ?>" value="<?php echo $identifikasi->kode_ruangan ?> / <?php echo $identifikasi->kode_barang ?> / <?php echo $i ?> / GA / <?php echo $identifikasi->month ?>"><?php echo $identifikasi->kode_ruangan ?> / <?php echo $identifikasi->kode_barang ?> / <?php echo $i ?> / GA / <?php echo $identifikasi->month ?></option>
				<?php
				$i++;
			}
			?>
		</select>
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo set_value('no_identifikasi') ?>">
    </div>

    <div class="form-group">
        <label>Tanggal Diperbaiki</label>
        <input type="date" name="tgl_diperbaiki" class="form-control" placeholder="Tanggal Diperbaiki" value="<?php echo set_value('tgl_diperbaiki') ?>">
    </div>

    <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" name="tgl_selesai" class="form-control" placeholder="Tanggal Selesai" value="<?php echo set_value('tgl_selesai') ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Upload Foto</label>
       <input type="file" name="foto" class="file">
    </div>

    <div class="box-footer" >
    	<button type="submit" name="input" style="float:right;" class="btn btn-primary">Simpan</button>
        	<button type="reset" style="float:right;margin-right:5px;" class="btn btn-primary">Batal</button>
    </div>
</form>
<script src="<?php echo base_url('assets/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/jquery.chained.min.js') ?>"></script>
        <script>
            $("#barang").chained("#ruangan"); // disini kita hubungkan kota dengan provinsi
       
			 $("#no_identifikasi").chained("#barang");
        </script>
</div>
