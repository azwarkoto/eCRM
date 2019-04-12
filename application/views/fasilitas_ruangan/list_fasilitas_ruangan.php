<section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <div class="box-body pad table-responsive">
                  <a href="<?php echo base_url('fasilitas_ruangan/tambah') ?>" style="color:grey;"> <i class="fa fa-plus-circle" style="margin-top:20px;margin-right:3px;color:black;">
                   Tambah Data </i> </a>&nbsp&nbsp
                  <a href="<?php echo base_url();?>Fasilitas_Ruangan/report" <i class='fa fa-print' style='margin-right:10px;color:black;'>  Cetak</a> </i>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Nama Aset</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($fasilitas_ruangan as $fasilitas_ruangan){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $fasilitas_ruangan->nama_ruangan ?></td>
                        <td><?php echo $fasilitas_ruangan->nama_barang ?></td>
                        <td><?php echo $fasilitas_ruangan->total ?></td>
                        <td>
                            <a href='<?php echo base_url('fasilitas_ruangan/delete/'.$fasilitas_ruangan->id_fasilitas_ruangan) ?>'><i class='fa fa-eraser' style='margin-right:5px;color:black;'></i></a>
                            <!-- <a href='<?php echo base_url('fasilitas_ruangan/edit/'.$fasilitas_ruangan->id_fasilitas_ruangan) ?>'><i class='fa fa-edit' style='margin-right:5px;color:black;'></i> </a> -->
                            <a href='<?php echo base_url('fasilitas_ruangan/details/'.$fasilitas_ruangan->id_ruangan.'/'.$fasilitas_ruangan->id_barang) ?>'><i class='fa fa-eye' style='margin-right:5px;color:black;'></i> </a>
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
