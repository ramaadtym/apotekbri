<table class="table table-bordered table-striped table-vcenter js-dataTable-full obat">
<thead>
    <tr>
        <th class="text-center" style="width: 5%;">No</th>
        <th class="d-none d-sm-table-cell">Nama Obat</th>
        <th class="d-none d-sm-table-cell" style="width: 15%;">Jenis</th>
        <th class="text-center" style="width: 15%;">Kategori</th>
        <th class="text-center" style="width: 15%;">Jumlah</th>
        <th class="text-center" style="width: 15%;">Tanggal Kadaluwarsa</th>
    </tr>
</thead>
<tbody>
  <?php 
    $no = 0;
    foreach($obat as $obt):
      $no++;
  ?>
    <tr>
      <td class="text-center"><?php echo $no;?></td>
      <td class="font-w600"><?php echo $obt->Nama_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->Jenis_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->Nama_kategori;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->stok;?></td>
      <td class="d-none d-sm-table-cell">
         <?php echo $obt->kadaluwarsa;?>
      </td>
  </tr>
<?php endforeach;?>
</tbody>
</table>
