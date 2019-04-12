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
        <h2>Daftar Part</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Part</th>
		<th>Jenis Part</th>
		<th>Cycle Time</th>
		<th>Nama Ng</th>
		<th>Id Material</th>
		
            </tr><?php
            foreach ($part_data as $part)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $part->nama_part ?></td>
		      <td><?php echo $part->jenis_part ?></td>
		      <td><?php echo $part->cycle_time ?></td>
		      <td><?php echo $part->nama_ng ?></td>
		      <td><?php echo $part->id_material ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>