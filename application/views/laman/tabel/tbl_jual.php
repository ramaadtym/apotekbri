<table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="jual">
<thead>
    <tr>
        <th class="text-center align-middle">No</th>
        <th style="width: 15%" class="align-middle" >Tanggal</th>
        <th class="d-none d-sm-table-cell align-middle">Nama Obat</th>
        <th class="d-none d-sm-table-cell align-middle" style="width: 10%;">Jenis</th>
        <th class="text-center align-middle" style="width: 10%;">Kategori</th>
        <th class="text-center align-middle " style="width: 2%;">Banyaknya</th>
        <th class="text-center align-middle" style="width: 15%;">Tanggal Kadaluwarsa</th>
        <th class="text-center align-middle" style="width: 15%;">Harga Satuan</th>
        <th class="text-center align-middle" style="width: 15%;">Total</th>
        <th class="text-center align-middle" style="width: 5%;">Aksi</th>
    </tr>
</thead>
<tbody>
    
    <?php 
      $no = 0;
      foreach($trx as $obt): 
      $no++;

    ?>
      

    <tr>
      <td class="text-center"><?php echo $no;?></td>
      <td class="font-w600"><?php echo $obt->tglPenjualan;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->Nama_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->Jenis_obat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->namaKategori;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->Qty;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $obt->kadaluwarsa;?></td>
      <td class="d-none d-sm-table-cell">Rp<?php echo number_format($obt->harga,0,'','.');?></td>
      <td class="d-none d-sm-table-cell">
          <span class="badge badge-success">Rp<?php echo number_format($obt->total_hrg,0,'','.');?></span>
      </td>
      <td class="text-center">
          <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
              <i class="fa fa-trash-o"></i>
          </button>
      </td>
  </tr>
<?php endforeach;?>
</tbody>
</table>
