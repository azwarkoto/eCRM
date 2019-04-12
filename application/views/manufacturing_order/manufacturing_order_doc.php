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
        <h2>Daftar Manufacturing Order</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Customer</th>
		<th>Id Line</th>
		<th>Tanggal Mo</th>
		<th>Total</th>
		<th>Id Detailfaktur</th>
		
            </tr><?php
            foreach ($manufacturing_order_data as $manufacturing_order)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $manufacturing_order->id_customer ?></td>
		      <td><?php echo $manufacturing_order->id_line ?></td>
		      <td><?php echo $manufacturing_order->tanggal_mo ?></td>
		      <td><?php echo $manufacturing_order->total ?></td>
		      <td><?php echo $manufacturing_order->id_detailfaktur ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>