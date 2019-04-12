<section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Ruangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">,</div>');

//open form
echo form_open(base_url('ruangan/edit/'.$kategori->id_ruangan));
?>
<div class="box-body">
	<div class="form-group">
		<label>Kode Ruangan</label>
        <input type="text" name="kode_ruangan" class="form-control" placeholder="kode_ruangan" value="<?php echo $kategori->kode_ruangan ?>">
    </div>

    <div class="form-group">
        <label>Nama Ruangan</label>
        <input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" value="<?php echo $kategori->nama_ruangan ?>">
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
