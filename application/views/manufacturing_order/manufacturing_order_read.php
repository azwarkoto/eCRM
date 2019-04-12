
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Manufacturing Order</h2>
        <table class="table">
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td>Id Line</td><td><?php echo $id_line; ?></td></tr>
	    <tr><td>Tanggal Mo</td><td><?php echo $tanggal_mo; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Id Detailfaktur</td><td><?php echo $id_detailfaktur; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('manufacturing_order') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>     
   </section>
 </div>