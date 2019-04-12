<section class="content">
          <div class="row">
            <div class="col-xs-12">

<div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url('C_perawatan/tambah') ?>" style="color:grey;"> <i class="fa fa-plus-circle" style="margin-top:20px;margin-right:3px;color:black;">
         Tambah Data </i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Nama Aset</th>
                        <th>No Identifikasi</th>
                        <th>Keterangan</th>
                        <th>Tgl Diperbaiki</th>
                        <th>Tgl Selesai</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($perawatans as $perawatann){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $perawatann->nama_ruangan ?></td>
                        <td><?php echo $perawatann->nama_barang ?></td>
                        <td><?php echo $perawatann->no_identifikasi ?></td>
                        <td><?php echo $perawatann->keterangan ?></td>
                        <td><?php echo $perawatann->tgl_diperbaiki ?></td>
                        <td><?php echo $perawatann->tgl_selesai ?></td>
                        <td><img src="<?= base_url('upload/img/'.$perawatann->foto)?>" width="50" height="50" alt="<?= $perawatann->foto ?>"/></td>
                        <td>
                            <a href='<?php echo base_url('C_perawatan/delete/'.$perawatann->id_perawatan) ?>'><i class='fa fa-eraser' style='margin-right:5px;color:black;'></i></a>
                            <a href='<?php echo base_url('C_perawatan/edit/'.$perawatann->id_perawatan) ?>'><i class='fa fa-edit' style='margin-right:5px;color:black;'></i> </a>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
