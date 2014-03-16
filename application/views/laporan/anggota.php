<legend><?php echo $title;?></legend>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nis</td>
            <td>Nama</td>
            <td>Tanggal Lahir</td>
            <td>Kelas</td>
        </tr>
    </thead>
    <?php $no=0; foreach($anggota as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->ttl;?></td>
        <td><?php echo $row->kelas;?></td>
    </tr>
    <?php endforeach;?>
</table>