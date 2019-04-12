
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Faktur Penjualan</h2>
        <form action="<?php echo $action; ?>" method="post">
        
	    <div class="form-group">
            <label for="date">Tgl Faktur <?php echo form_error('tgl_faktur') ?></label>
            <input type="text" class="form-control" id="datepicker" name="tgl_faktur" placeholder="Tgl Faktur"  value="<?php echo $tgl_faktur; ?>">
        </div>
	    
         <div class="form-group">
        <label>Nama Barang</label>
        <select name="id_barang" class="form-control">
            <option value="">-- Nama Barang --</option>
            <?php foreach ($barang as $barangs){
            echo "<option value='$barangs->id_barang'>$barangs->nama_barang</option>";
            } ?>     
        </select>
        </div>

	    <div class="form-group">
            <label for="int">Item <?php echo form_error('item') ?></label>
            <input type="text" class="form-control" name="item" id="item" placeholder="Item" value="<?php echo $item; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dibayar <?php echo form_error('dibayar') ?></label>
            <input type="text" class="form-control" name="dibayar" id="dibayar" placeholder="Dibayar" value="<?php echo $dibayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kembalian <?php echo form_error('kembalian') ?></label>
            <input type="text" class="form-control" name="kembalian" id="kembalian" placeholder="Kembalian" value="<?php echo $kembalian; ?>" />
        </div>
        <div class="form-group">
          <label>Nama Customer</label>
        <select name="id_customer" class="form-control">
            <option value="">-- Nama Customer --</option>
            <?php foreach ($customer as $customers){
            echo "<option value='$customers->id_customer'>$customers->nama_customer</option>";
            } ?>     
        </select>
        </div>
	    <input type="hidden" name="id_faktur" value="<?php echo $id_faktur; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faktur_penjualan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


