
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Faktur</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Faktur <?php echo form_error('id_faktur') ?></label>
            <input type="text" class="form-control" name="id_faktur" id="id_faktur" placeholder="Id Faktur" value="<?php echo $id_faktur; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Mo <?php echo form_error('no_mo') ?></label>
            <input type="text" class="form-control" name="no_mo" id="no_mo" placeholder="No Mo" value="<?php echo $no_mo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <input type="hidden" name="id_detailfaktur" value="<?php echo $id_detailfaktur; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_faktur') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
