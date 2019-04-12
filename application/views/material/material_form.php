
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Material</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Material <?php echo form_error('nama_material') ?></label>
            <input type="text" class="form-control" name="nama_material" id="nama_material" placeholder="Nama Material" value="<?php echo $nama_material; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan Material <?php echo form_error('satuan_material') ?></label>
            <input type="text" class="form-control" name="satuan_material" id="satuan_material" placeholder="Satuan Material" value="<?php echo $satuan_material; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stock Material <?php echo form_error('stock_material') ?></label>
            <input type="text" class="form-control" name="stock_material" id="stock_material" placeholder="Stock Material" value="<?php echo $stock_material; ?>" />
        </div>
	    <input type="hidden" name="id_material" value="<?php echo $id_material; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('material') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->