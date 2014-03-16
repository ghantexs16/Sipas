<table class="table table-striped">
    <thead>
        <tr>
            <td>Kode</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($anggota as $row):?>
    <tr>
        <td><?php echo $row->nis;?></td>
        <td><a href="#" class="hapus"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>