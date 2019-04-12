
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Line</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Line <?php echo form_error('nama_line') ?></label>
            <input type="text" class="form-control" name="nama_line" id="nama_line" placeholder="Nama Line" value="<?php echo $nama_line; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Time <?php echo form_error('time') ?></label>
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stopline <?php echo form_error('stopline') ?></label>
            <input type="text" class="form-control" name="stopline" id="stopline" placeholder="Stopline" value="<?php echo $stopline; ?>" />
        </div>
	    <div class="form-group">
            <label>Nama Part</label>
            <select name="id_part" class="form-control">
                <option value="">-- Nama Part --</option>
                <?php foreach ($part as $parts){
                echo "<option value='$parts->id_part'>$parts->nama_part</option>";
                } ?>     
            </select>
        </div>

	    <input type="hidden" name="id_line" value="<?php echo $id_line; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('line') ?>" class="btn btn-default">Cancel</a>
	</form>
     </section><!-- /.content -->
    </div>