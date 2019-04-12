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
        <h2>Daftar Data Laporan</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Karyawan</th>
		<th>Id Part</th>
		<th>Tanggal</th>
		<th>Total</th>
		<th>No Mo</th>
		
            </tr><?php
            foreach ($data_laporan_data as $data_laporan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_laporan->id_karyawan ?></td>
		      <td><?php echo $data_laporan->id_part ?></td>
		      <td><?php echo $data_laporan->tanggal ?></td>
		      <td><?php echo $data_laporan->total ?></td>
		      <td><?php echo $data_laporan->no_mo ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>