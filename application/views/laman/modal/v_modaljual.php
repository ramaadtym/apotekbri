<div class="modal fade" id="addJual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Trx/addJual');?>
        <div class="form-group">
          <label for="exampleInputPassword1">Tanggal Pembelian</label>
          <input type="text" class="form-control" name="tgljual" value="<?php echo date("Y/m/d");?>" readonly>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Nama Obat</label>
              <select class="custom-select" name ="nama" onchange="loadKategori(this.value);">
                <option selected>- Nama Obat -</option>
                <?php foreach($obat as $dt):?>
                  <option value="<?php echo $dt->ID_Obat;?>"><?php echo $dt->Nama_obat;?></option>
              <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jenis Obat</label>
              <input type="text" id="jns" class="form-control" value="" name="jenis" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori Obat</label>
              <input type="text" id="ktgr" class="form-control" value="" readonly name="ktgr">
            </div>
            <div class="row">
              <div class="col">
                <label for="exampleInputPassword1">Jumlah Obat</label>
                <input type="number" name="jum" id="qty" class="form-control" placeholder="Jumlah Obat">
              </div>
              <div class="col">
                <label for="exampleInputPassword1">Harga Satuan</label>
                <input type="text" name="hrg" class="form-control" value="" readonly id="hrg">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Total</label>
              <input type="text" name="total" class="form-control" placeholder="Total Harga" id="tot">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Kadaluwarsa</label>
              <input type="text" name="kadaluwarsa" value="" readonly class="form-control" placeholder="Tanggal Kadaluwarsa" id="kadal">
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

<script>
  function loadKategori(str){
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
            document.getElementById("jns").value = output2;
            document.getElementById("hrg").value = output3;
            document.getElementById("kadal").value = output4;
        }
    };
    xhttp.open("GET", "<?php echo base_url() . 'Trx/kategori?id='?>"+str, true);
    xhttp.send();
}
</script>