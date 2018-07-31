<script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
<table class="table table-bordered table-striped table-vcenter js-dataTable-full beli">
<thead>
    <tr>
        <th class="text-center" style="width: 5%;">No</th>
        <th class="d-none d-sm-table-cell" style="width: 1%;">Nama Pasien</th>
        <th class="d-none d-sm-table-cell" >Gender</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">No.Telp</th>
        <th class="text-center">Tanggal Resep</th>

        <th class="text-center">Aksi</th>

    </tr>
</thead>
<tbody>
    <tr>
        <?php
        $no = 0;
         foreach($resep as $viewResep):
        $no++;

        ?>
      <td class="text-center"><?php echo $no;?></td>
      <td class="font-w600"><?php echo $viewResep->nmPasien;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $viewResep->gender;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $viewResep->Alamat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $viewResep->noTelp;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $viewResep->tglResep;?></td>
      <td class="text-center">
          <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" title="Lihat Resep" data-target="#edtUsers<?php echo $viewResep->idResep;?>">
              <i class="fa fa-eye" aria-hidden="true"></i>
          </button>
          <!-- <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" title="Hapus Pengguna" data-target="#hpsUsers<?php echo $users->ID_apoteker;?>">
              <i class="fa fa-trash" aria-hidden="true"></i>
          </button> -->
      </td>
  </tr>

  <!--MODAL EDIT-->
    <div class="modal fade" id="edtUsers<?php echo $viewResep->idResep;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Resep <?php echo $viewResep->nmPasien;?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
                <label>Umur: <?php echo $viewResep->umur;?></label>
            </div>
            <div>
                <label>Nama Dokter: <?php echo $viewResep->nmDokter;?></label>
            </div>
            <div>
                <label>Nama Obat: <?php echo $viewResep->Nama_obat;?></label>
            </div>
            <div>
                <label>Jenis Obat: <?php echo $viewResep->Jenis_obat;?></label>
            </div>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>

<?php endforeach;?>
</tbody>
</table>