<section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <div class="box-body pad table-responsive">
                  <a href="<?php echo base_url('fasilitas_ruangan') ?>" style="color:grey;"> <i class="fa fa-arrow-circle-left" style="margin-top:20px;margin-right:3px;color:black;">
                   Kembali </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Nama Aset</th>
                        <!-- <th>Jumlah</th> -->
                        <th>Tgl Masuk</th>
						            <th>No. Identifikasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; while ($i <= $kategoriku->total){  ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $kategoriku->kode_ruangan ?> - <?php echo $kategoriku->nama_ruangan ?></td>
                        <td><?php echo $kategoriku->nama_barang ?></td>
                        <!-- <td><?php echo $kategoriku->jumlah ?></td> -->
                        <td><?php echo $kategoriku->tgl_masuk?></td>
            						<td><?php echo $kategoriku->kode_ruangan. " / " .$kategoriku->kode_barang. " / " .$i. " / GA / " .$abc->month?></td>
            						<td><a href='<?php echo base_url('fasilitas_ruangan/detaillengkap/'.$kategoriku->id_fasilitas_ruangan) ?>'><i class='fa fa-eye' style='margin-right:5px;color:black;'></i> </a></td>

                      </tr>
                      <?php $i++; } ?>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
