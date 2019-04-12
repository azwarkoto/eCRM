<section class="content">
          <div class="row">
            <div class="col-xs-12">

<div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url('user/tambah') ?>" style="color:grey;"> <i class="fa fa-plus-circle" style="margin-top:20px;margin-right:3px;color:black;">
         Tambah Data </i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Level User</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($daftar_user as $daftar_user){ ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $daftar_user->username ?></td>
                        <td><?php echo $daftar_user->level ?></td>
                        <td>
                            <a href='<?php echo base_url('user/delete/'.$daftar_user->id_user) ?>'><i class='fa fa-eraser' style='margin-right:5px;color:black;'></i></a>
                            <a href='<?php echo base_url('user/edit/'.$daftar_user->id_user) ?>'><i class='fa fa-edit' style='margin-right:5px;color:black;'></i> </a>
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
