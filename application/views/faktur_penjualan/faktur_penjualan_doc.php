<!doctype html>
<html>
    <head>
    <title>e-CRM | Astra Juoko Indonesia</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Daftar Faktur Penjualan</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl Faktur</th>
		<th>Id Barang</th>
		<th>Item</th>
		<th>Total</th>
		<th>Dibayar</th>
		<th>Kembalian</th>
		<th>Id Customer</th>
		
            </tr><?php
            foreach ($faktur_penjualan_data as $faktur_penjualan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $faktur_penjualan->tgl_faktur ?></td>
		      <td><?php echo $faktur_penjualan->id_barang ?></td>
		      <td><?php echo $faktur_penjualan->item ?></td>
		      <td><?php echo $faktur_penjualan->total ?></td>
		      <td><?php echo $faktur_penjualan->dibayar ?></td>
		      <td><?php echo $faktur_penjualan->kembalian ?></td>
		      <td><?php echo $faktur_penjualan->id_customer ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>