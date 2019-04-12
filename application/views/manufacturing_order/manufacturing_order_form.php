<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Manufacturing Order</h2>
        <form action="<?php echo $action; ?>" method="post">
	    
	    <div class="form-group">
          <label>Nama Customer</label>
        <select name="id_customer" class="form-control">
            <option value="">-- Nama Customer --</option>
            <?php foreach ($customer as $customers){
            echo "<option value='$customers->id_customer'>$customers->nama_customer</option>";
            } ?>     
        </select>
        </div>
         <div class="form-group">
          <label>Nama Line</label>
        <select name="id_line" class="form-control">
            <option value="">-- Nama Line --</option>
            <?php foreach ($line as $lines){
            echo "<option value='$lines->id_line'>$lines->nama_line</option>";
            } ?>     
        </select>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Mo <?php echo form_error('tanggal_mo') ?></label>
            <input type="text" class="form-control" id="datepicker" name="tanggal_mo" placeholder="Tanggal Mo"  value="<?php echo $tanggal_mo; ?>">
        </div>
	    <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    
	    <input type="hidden" name="no_mo" value="<?php echo $no_mo; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('manufacturing_order') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

