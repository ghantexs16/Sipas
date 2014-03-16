<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Buku</label>
        <div class="col-lg-5">
            <input type="text" name="kode" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Judul Buku</label>
        <div class="col-lg-5">
            <input type="text" name="judul" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Pengarang</label>
        <div class="col-lg-5">
            <input type="text" name="pengarang" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Klasifikasi</label>
        <div class="col-lg-10">
            <textarea name="klasifikasi"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Image</label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('buku');?>" class="btn btn-default">Kembali</a>
    </div>
</form>