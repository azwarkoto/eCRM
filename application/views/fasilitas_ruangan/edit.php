<section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Aset</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">,</div>');

//open form
echo form_open(base_url('fasilitas_ruangan/edit/'.$kategori->id_fasilitas_ruangan));
?>
<div class="box-body">
	<div class="form-group">
		<label>Ruangan</label>
        <select name="ruangan" class="form-control">
            <option value="<?php echo $kategori->id_ruangan?>"><?php echo $kategori->nama_ruangan ?></option>
            <?php foreach ($ruangankat as $ruangan){
            echo "<option value='$ruangan->id_ruangan'>$ruangan->kode_ruangan - $ruangan->nama_ruangan</option>";
            } ?>     

        </select> 
    </div>

    <div class="form-group">
        <label>Nama Aset</label>
         <select name="nama_aset" class="form-control">
            <option value="<?php echo $kategori->id_barang?>"><?php echo $kategori->nama_barang?></option>
            <?php foreach ($barang as $barang){
            echo "<option value='$barang->id_barang'>$barang->kode_barang - $barang->nama_barang</option>";
            } ?>     

        </select> 
    </div>

    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" name="jumlah_data" class="form-control" placeholder="Jumlah" value="<?php echo $kategori->jumlah ?>">
    </div>

    <div class="form-group">
        <label>Tanggal Masuk</label>
        <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk" value="<?php echo $kategori->tgl_masuk ?>">
    </div>
     <!-- <div class="form-group">
        <label>No Identifikasi</label>
        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo $kategori->kode_ruangan ?> / <?php echo $kategori->kode_barang ?> / 1 / GA / <?php echo $year->month ?> ">
    </div> -->

    <div class="box-footer" >
    	<button type="submit" name="input" style="float:right;" class="btn btn-primary">Simpan</button>
        <button type="reset" style="float:right;margin-right:5px;" class="btn btn-primary">Batal</button>
    </div>
<?php
//close form
echo form_close();
?>
</div>
