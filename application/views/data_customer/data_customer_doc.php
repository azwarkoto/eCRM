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
        <h2>Daftar Data Customer</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Customer</th>
		<th>Alamat Customer</th>
		<th>Tanggal Lahir Customer</th>
		<th>Email Customer</th>
		<th>No Telpon Customer</th>
		
            </tr><?php
            foreach ($data_customer_data as $data_customer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_customer->nama_customer ?></td>
		      <td><?php echo $data_customer->alamat_customer ?></td>
		      <td><?php echo $data_customer->tanggal_lahir_customer ?></td>
		      <td><?php echo $data_customer->email_customer ?></td>
		      <td><?php echo $data_customer->no_telpon_customer ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>