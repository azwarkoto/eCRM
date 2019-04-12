<section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">,</div>');

//open form
echo form_open(base_url('user/edit/'.$kategori->id_user));
?>
<div class="box-body">
	<div class="form-group">
		<label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $kategori->username ?>">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $kategori->password ?>">
    </div>
    <div class="form-group">
        <label>Level User</label>
       <select name="level" class="form-control">

            <option value="<?php echo $kategori->level ?>"><?php echo $kategori->level ?></option>
            <option value="">-- Level User --</option>
            <option value="Admin">Admin</option>
            <option value="Manajer">Manajer</option>
   
        </select>
       
    </div>


    <div class="box-footer" >
    	<button type="submit" name="input" style="float:right;" class="btn btn-primary">Simpan</button>
        	<button type="reset" style="float:right;margin-right:5px;" class="btn btn-primary">Batal</button>
    </div>
<?php
//close form
echo form_close();
?>
</div>
