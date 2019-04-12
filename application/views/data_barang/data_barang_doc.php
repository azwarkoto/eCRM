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
        <h2>Data_barang List2</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Jenis Barang</th>
		<th>Nama Ng</th>
		
            </tr><?php
            foreach ($data_barang_data as $data_barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_barang->nama_barang ?></td>
		      <td><?php echo $data_barang->jenis_barang ?></td>
		      <td><?php echo $data_barang->nama_ng ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>