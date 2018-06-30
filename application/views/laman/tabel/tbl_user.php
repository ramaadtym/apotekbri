<script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
<table class="table table-bordered table-striped table-vcenter js-dataTable-full beli">
<thead>
    <tr>
        <th class="text-center" style="width: 5%;">No</th>
        <th class="d-none d-sm-table-cell" style="width: 1%;">No. Induk</th>
        <th class="d-none d-sm-table-cell" >Nama Apoteker</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Level Pengguna</th>

        <th class="text-center">Aksi</th>

    </tr>
</thead>
<tbody>
    <tr>
        <?php
        $no = 0;
         foreach($user as $users):
        $no++;

        ?>
      <td class="text-center"><?php echo $no;?></td>
      <td class="font-w600"><?php echo $users->induk;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $users->Nama_apoteker;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $users->Alamat;?></td>
      <td class="d-none d-sm-table-cell"><?php echo $users->user_level;?></td>
      <td class="text-center">
          <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" title="Edit Pengguna" data-target="#edtUsers<?php echo $users->ID_apoteker;?>">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </button>
          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" title="Hapus Pengguna" data-target="#hpsUsers<?php echo $users->ID_apoteker;?>">
              <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
      </td>
  </tr>

  <!--MODAL EDIT-->
    <div class="modal fade" id="edtUsers<?php echo $users->ID_apoteker;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna <?php echo $users->Nama_apoteker;?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('Users/editUsers');?>
                <div class="form-group">
                  <label for="exampleInputPassword1">No. Induk</label>
                  <input type="text" class="form-control" name="user" value="<?php echo $users->induk ;?>">
                </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Nama Apoteker</label>
                      <input type="text" class="form-control" name="nama_apoteker" value="<?php echo $users->Nama_apoteker ;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="Password"  class="form-control" name="pass">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text"  class="form-control" name="almt" value="<?php echo $users->Alamat ;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Level Pengguna</label>
                     <select class="custom-select" name ="level">
                        <option value="">- Level Pengguna -</option>
                        <option value="admin">Administrator</option>
                        <option value="apoteker">Apoteker</option>
                        <option value="kasir">Kasir</option>
                      </select>
              </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $users->ID_apoteker;?>" name="idAptk">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  <!--MODAL HAPUS-->
      <div class="modal fade" id="hpsUsers<?php echo $users->ID_apoteker;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <h5>Anda yakin ingin menghapus transaksi <?php echo $users->Nama_apoteker;?> ?</h5>
                  </div>
                  <div class="modal-footer">
                      <?php echo form_open('Users/delUsers');?>
                      <input type="hidden" name="id" value="<?php echo $users->ID_apoteker;?> ">
                      <button type="submit" class="btn btn-danger">YA</button>
                      <?php echo form_close();?>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                  </div>
              </div>
          </div>
      </div>

<?php endforeach;?>
</tbody>
</table>