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
        <h2>Daftar Material</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Material</th>
		<th>Satuan Material</th>
		<th>Stock Material</th>
		
            </tr><?php
            foreach ($material_data as $material)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $material->nama_material ?></td>
		      <td><?php echo $material->satuan_material ?></td>
		      <td><?php echo $material->stock_material ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>