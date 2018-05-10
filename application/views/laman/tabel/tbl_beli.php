<table class="table table-bordered table-striped table-vcenter js-dataTable-full beli">
<thead>
    <tr>
        <th class="text-center" style="width: 5%;">No</th>
        <th class="d-none d-sm-table-cell">Tanggal Beli</th>
        <th class="d-none d-sm-table-cell" style="width: 1%;">Nama Obat</th>
        <th class="text-center">Jenis</th>
        <th class="text-center">Kategori</th>
        <th class="text-center">Jumlah Dibeli</th>
        <th class="text-center">Tanggal Kadaluwarsa</th>
        <th class="text-center"">Harga Satuan</th>
        <th class="text-center">Total</th>
        <th class="text-center">Aksi</th>

    </tr>
</thead>
<tbody>
    <tr>
        <?php
        $no = 0;
         foreach($beli as $buy):
        $no++;

        ?>
      <td class="text-center"><?php echo $no;?></td>
      <td class="font-w600"><?php echo $buy->tglPembelian;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->Nama_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->Jenis_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->Nama_kategori;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->Qty;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->tglKadaluwarsa;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $buy->hrg;?></td>
      <td class="d-none d-sm-table-cell">
          <span class="badge badge-success"><?php echo $buy->total_hrg;?></span>
      </td>
      <td class="text-center">
          <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="Edit Obat">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </button>
      </td>
  </tr>
<?php endforeach;?>
</tbody>
</table>
