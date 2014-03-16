<script>
    $(function(){
        $("#tampilkan").click(function(){
            var tanggal1=$("#tanggal1").val();
            var tanggal2=$("#tanggal2").val();
            
            $.ajax({
                url:"<?php echo site_url('laporan/cari_pinjaman');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(html){
                    $("#tampil").html(html);
                }
            })
        })
    })
</script>

<legend><?php echo $title;?></legend>
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-3">Tanggal Awal</label>
        <div class="col-lg-5">
            <input type="text" id="tanggal1" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3">Tanggal Selesai</label>
        <div class="col-lg-5">
            <input type="text" id="tanggal2" class="form-control">
        </div>
        
        <div class="col-lg-4">
            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
        </div>
    </div>
</div>

<div id="tampil"></div>