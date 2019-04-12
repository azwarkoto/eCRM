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
        <h2>Line List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Line</th>
		<th>Time</th>
		<th>Stopline</th>
		<th>Id Part</th>
		
            </tr><?php
            foreach ($line_data as $line)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $line->nama_line ?></td>
		      <td><?php echo $line->time ?></td>
		      <td><?php echo $line->stopline ?></td>
		      <td><?php echo $line->id_part ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>