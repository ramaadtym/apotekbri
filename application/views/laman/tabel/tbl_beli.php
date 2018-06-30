<script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
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
      <td class="d-none d-sm-table-cell">Rp<?php echo number_format($buy->hrg,0,'','.');?></td>
      <td class="d-none d-sm-table-cell">
          <span class="badge badge-success">Rp<?php echo number_format($buy->total_hrg,0,'','.');?></span>
      </td>
      <td class="text-center">
          <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" title="Edit Obat" data-target="#edit<?php echo $buy->idFakturbeli;?>">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </button>
      </td>
  </tr>
  <!-- MODAL EDIT PEMBELIAN -->

  <div class="modal fade" id="edit<?php echo $buy->idFakturbeli;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pembelian Obat <?php echo $buy->Nama_obat;?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('Pembelian/editBeli');?>
  <div class="form-group">
      <label for="exampleInputPassword1">Tanggal Pembelian</label>
      <input type="date" class="form-control" name="tglbeli" required>
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1">Nama Obat</label>
      <input type="text" class="form-control" name="namaobt" value="<?php echo $buy->Nama_obat;?>">
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Jenis Obat</label>
      <input type="text" class="form-control" name="jenis" value="<?php echo $buy->Jenis_obat;?>">
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Kategori Obat</label>
      <select class="custom-select" name ="kategori">
          <option>- Jenis Kategori -</option>
          <?php foreach($kt as $kate):?>
              <option value="<?php echo $kate->ID_kategori;?>" selected><?php echo $kate->Nama_kategori;?></option>

          <?php endforeach;?>
      </select>
  </div>

  <div class="row">
      <div class="col">
          <label for="exampleInputPassword1">Jumlah Dibeli</label>
          <input type="number" name="jum" value="<?php echo $buy->Qty;?>" id="edtqty<?php echo $buy->idFakturbeli;?>" class="form-control" min="0" placeholder="Jumlah Obat">
      </div>
      <div class="col">
          <label for="exampleInputPassword1">Harga Satuan</label>
          <input type="text" name="hrg" class="form-control" id="edthrg<?php echo $buy->idFakturbeli;?>" value="<?php echo $buy->hrg;?>">
      </div>
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Total</label>
      <input type="text" name="total" class="form-control" placeholder="Total Harga" id="edttot<?php echo $buy->idFakturbeli;?>" value="<?php echo $buy->total_hrg;?>">
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Tanggal Kadaluwarsa</label>
      <input type="date" name="kadaluwarsa" class="form-control" placeholder="Tanggal Kadaluwarsa" id="kadal" required>
  </div>

  </div>
  <div class="modal-footer">
      <input type="hidden" name="idFaktur" value="<?php echo $buy->idFakturbeli;?>">
      <input type="hidden" name="idObt" value="<?php echo $buy->ID_Obat;?>">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  <?php echo form_close();?>
  </div>
  </div>
  </div>
  <script>
    $(function(){
        $("#edthrg<?php echo $buy->idFakturbeli;?>").on("input",function(){
            var qty = $("#edtqty<?php echo $buy->idFakturbeli;?>").val();
            var hrg = $("#edthrg<?php echo $buy->idFakturbeli;?>").val();
            $('#edttot<?php echo $buy->idFakturbeli;?>').val(qty*hrg);
        });
        $("#edtqty<?php echo $buy->idFakturbeli;?>").on("change",function(){
            var qty = $("#edtqty<?php echo $buy->idFakturbeli;?>").val();
            var hrg = $("#edthrg<?php echo $buy->idFakturbeli;?>").val();
            $('#edttot<?php echo $buy->idFakturbeli;?>').val(qty*hrg);
        });
        $("#edtqty<?php echo $buy->idFakturbeli;?>").on("input",function(){
            var qty = $("#edtqty<?php echo $buy->idFakturbeli;?>").val();
            var hrg = $("#edthrg<?php echo $buy->idFakturbeli;?>").val();
            $('#edttot<?php echo $buy->idFakturbeli;?>').val(qty*hrg);
        });
        
    });
  </script>
<?php endforeach;?>
</tbody>
</table>
<script type="text/javascript">
      function loadKate(str){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  var json = JSON.parse(this.responseText);
                  json.forEach(function(element) {
                      output1 = element["Nama_kategori"];
                      output2 = element["Jenis_obat"];
                      output3 = element["hrg_obat"];
                      output4 = element['kadaluwarsa'];
                  });
                  document.getElementById("ktgr").value = output1;
                  document.getElementById("jns2").value = output2;
  //                document.getElementById("hrg").value = output3;
  //                document.getElementById("kadal").value = output4;
              }
          };
          xhttp.open("GET", "<?php echo base_url() . 'Trx/kategori?id='?>"+str, true);
          xhttp.send();
      }
</script>
