<table class="table table-striped">
    <thead>
        <tr>
            <td>No. Transaksi</td>
            <td>NIS</td>
            <td>Tgl. Peminjaman</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($pencarian as $row):?>
    <tr>
        <td><?php echo $row->id_transaksi;?></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->tanggal_pinjam;?></td>
        <td><a href="#" class="tambahkan" no="<?php echo $row->id_transaksi;?>">
            <i class="glyphicon glyphicon-plus"></i>
        </a></td>
    </tr>
    <?php endforeach;?>
</table>