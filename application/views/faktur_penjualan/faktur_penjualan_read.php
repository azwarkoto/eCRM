
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Faktur Penjualan</h2>
        <table class="table">
	    <tr><td>Tgl Faktur</td><td><?php echo $tgl_faktur; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Item</td><td><?php echo $item; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Dibayar</td><td><?php echo $dibayar; ?></td></tr>
	    <tr><td>Kembalian</td><td><?php echo $kembalian; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('faktur_penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>     
    </section>
  </div>