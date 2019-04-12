<section class="content">
          <div class="row">
            <div class="col-xs-12">

<div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url('barang/tambah') ?>" style="color:grey;"> <i class="fa fa-plus-circle" style="margin-top:20px;margin-right:3px;color:black;">
         Tambah Data </i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($daftar_barang as $daftar_barang){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $daftar_barang->kode_barang ?></td>
                        <td><?php echo $daftar_barang->nama_barang ?></td>
                        <td>
                            <a href='<?php echo base_url('barang/delete/'.$daftar_barang->id_barang) ?>'><i class='fa fa-eraser' style='margin-right:5px;color:black;'></i></a>
                            <a href='<?php echo base_url('barang/edit/'.$daftar_barang->id_barang) ?>'><i class='fa fa-edit' style='margin-right:5px;color:black;'></i> </a>
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
