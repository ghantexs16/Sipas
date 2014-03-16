<legend><?php echo $title;?></legend>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Kode Buku</td>
            <td>Judul</td>
            <td>Pengarang</td>
            <td>Klasifikasi</td>
        </tr>
    </thead>
    <?php $no=0; foreach($buku as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->kode_buku;?></td>
        <td><?php echo $row->judul;?></td>
        <td><?php echo $row->pengarang;?></td>
        <td><?php echo $row->klasifikasi;?></td>
    </tr>
    <?php endforeach;?>
</table>