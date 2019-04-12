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
                        <th>Jumlah</th>
                        <th>Tgl Masuk</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; foreach ($datalist as $data) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->kode_ruangan ?> - <?= $data->nama_ruangan ?></td>
                        <td><?= $data->nama_barang ?></td>
                        <td><?= $data->jumlah ?></td>
                        <td><?= $data->tgl_masuk?></td>
						            <td>
                          <a href='<?php echo base_url('fasilitas_ruangan/delete/'.$data->id_fasilitas_ruangan) ?>'><i class='fa fa-eraser' style='margin-right:5px;color:black;'></i></a>
                          <a href='<?php echo base_url('fasilitas_ruangan/edits/'.$data->id_fasilitas_ruangan) ?>'><i class='fa fa-edit' style='margin-right:5px;color:black;'></i> </a>
                          <a href='<?php echo base_url('fasilitas_ruangan/details_lengkap/'.$data->id_fasilitas_ruangan) ?>'><i class='fa fa-eye' style='margin-right:5px;color:black;'></i> </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
