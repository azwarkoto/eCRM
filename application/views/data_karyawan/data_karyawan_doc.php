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
        <h2>Daftar Data Karyawan</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Password</th>
		<th>Nama Karyawan</th>
		<th>Jabatan Karyawan</th>
		<th>Shift</th>
		<th>Id Line</th>
		
            </tr><?php
            foreach ($data_karyawan_data as $data_karyawan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_karyawan->password ?></td>
		      <td><?php echo $data_karyawan->nama_karyawan ?></td>
		      <td><?php echo $data_karyawan->jabatan_karyawan ?></td>
		      <td><?php echo $data_karyawan->shift ?></td>
		      <td><?php echo $data_karyawan->id_line ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>