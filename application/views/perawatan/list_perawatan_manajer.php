<section class="content">
          <div class="row">
            <div class="col-xs-12">

<div class="box">
                <div class="box-header">
                
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
                        <th>tgl_diperbaiki</th>
                        <th>tgl_selesai</th>
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
                       
                      </tr>
                      <?php $i++; } ?>
                    </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
