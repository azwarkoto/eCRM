<section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">,</div>');

//open form
echo form_open(base_url('barang/tambah'));
?>
<div class="box-body">
	<div class="form-group">
		<label>Kode Barang</label>
        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?php echo set_value('kode_barang') ?>">
    </div>

    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo set_value('nama_barang') ?>">
    </div>

    <div class="box-footer" >
    	<button type="submit" name="input" style="float:right;" class="btn btn-primary">Simpan</button>
        	<button type="reset" style="float:right;margin-right:5px;" class="btn btn-primary">Batal</button>
    </div>
<?php
//close form
echo form_close();
?>
</div>
