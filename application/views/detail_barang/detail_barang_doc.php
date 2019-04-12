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
        <h2>Daftar Detail Barang</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barang</th>
		<th>Id Komponen</th>
		<th>Qty</th>
		<th>Satuan</th>
		
            </tr><?php
            foreach ($detail_barang_data as $detail_barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detail_barang->id_barang ?></td>
		      <td><?php echo $detail_barang->id_komponen ?></td>
		      <td><?php echo $detail_barang->qty ?></td>
		      <td><?php echo $detail_barang->satuan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>