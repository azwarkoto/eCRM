<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Part</h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">ID Part <?php echo form_error('id_part') ?></label>
            <input type="text" class="form-control" name="id_part" id="id_part" placeholder="ID Part" value="<?php echo $id_part; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Part <?php echo form_error('nama_part') ?></label>
            <input type="text" class="form-control" name="nama_part" id="nama_part" placeholder="Nama Part" value="<?php echo $nama_part; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Part <?php echo form_error('jenis_part') ?></label>
            <input type="text" class="form-control" name="jenis_part" id="jenis_part" placeholder="Jenis Part" value="<?php echo $jenis_part; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Cycle Time <?php echo form_error('cycle_time') ?></label>
            <input type="text" class="form-control" name="cycle_time" id="cycle_time" placeholder="Cycle Time" value="<?php echo $cycle_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ng <?php echo form_error('nama_ng') ?></label>
            <input type="text" class="form-control" name="nama_ng" id="nama_ng" placeholder="Nama Ng" value="<?php echo $nama_ng; ?>" />
        </div>
	    
         <div class="form-group">
        <label>Nama Material</label>
        <select name="id_material" class="form-control">
            <option value="">-- Nama Material --</option>
            <?php foreach ($material as $materials){
            echo "<option value='$materials->id_material'>$materials->nama_material</option>";
            } ?>     
        </select>
    </div>
	    <input type="hidden" name="id_part" value="<?php echo $id_part; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('part') ?>" class="btn btn-default">Cancel</a>
	</form>
  </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



