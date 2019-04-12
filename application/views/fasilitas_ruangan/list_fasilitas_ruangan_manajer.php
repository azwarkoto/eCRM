<section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                  <div class="box-body pad table-responsive">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Nama Aset</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($fasilitas_ruangan as $fasilitas_ruangan){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $fasilitas_ruangan->nama_ruangan ?></td>
                        <td><?php echo $fasilitas_ruangan->nama_barang ?></td>
                        <td><?php echo $fasilitas_ruangan->total ?></td>
                       
                      </tr>
                      <?php $i++; } ?>
                    </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
