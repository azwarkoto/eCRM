
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
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($daftar_ruangan as $daftar_ruangan){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $daftar_ruangan->kode_ruangan ?></td>
                        <td><?php echo $daftar_ruangan->nama_ruangan ?></td>
                      
                      </tr>
                      <?php $i++; } ?>
                    </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->