
<table class="table table-bordered table-striped table-vcenter js-dataTable-full jual">
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
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hps<?php echo $obt->idFakturjual;?>">
              <i class="fa fa-trash"></i>
          </button>

      </td>
        <div class="modal fade" id="hps<?php echo $obt->idFakturjual;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Anda yakin ingin menghapus transaksi <?php echo $obt->Nama_obat;?> ?</h5>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('Trx/delJual');?>
                        <input type="hidden" name="id" value="<?php echo $obt->idFakturjual;?> ">
                        <button type="submit" class="btn btn-danger">YA</button>
                        <?php echo form_close();?>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                    </div>
                </div>
            </div>
        </div>
  </tr>
<?php endforeach;?>
</tbody>
</table>
