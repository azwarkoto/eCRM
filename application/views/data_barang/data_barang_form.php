
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

          <h2 style="margin-top:0px">Data Barang </h2>
          <form action="<?php echo $action; ?>" method="post">

      	    <div class="form-group">
               <input type="hidden" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Nama Barang" value="<?php echo $this->session->userdata('id_karyawan'); ?>" />
                  <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
              </div>
      	    <div class="form-group">
                  <label for="varchar">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
                  <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?php echo $jenis_barang; ?>" />
              </div>
      	    <div class="form-group">
                  <label for="varchar">Nama Ng <?php echo form_error('nama_ng') ?></label>
                  <input type="text" class="form-control" name="nama_ng" id="nama_ng" placeholder="Nama Ng" value="<?php echo $nama_ng; ?>" />
              </div>
      	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
      	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
      	    <a href="<?php echo site_url('data_barang') ?>" class="btn btn-default">Cancel</a>
          </form>
        </section><!-- /.content -->
</div><!-- /.content-wrapper -->



