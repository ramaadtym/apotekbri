<div class="modal fade" id="addBeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Pembelian/addBeli');?>
<div class="form-group">
    <label for="exampleInputPassword1">Tanggal Pembelian</label>
    <input type="date" class="form-control" name="tglbeli">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Nama Obat</label>
    <select class="custom-select" name ="namaobt" onchange="loadKate(this.value);">
        <option selected>- Nama Obat -</option>
        <?php foreach($obat as $dt):?>
            <option value="<?php echo $dt->ID_Obat;?>"><?php echo $dt->Nama_obat;?></option>
        <?php endforeach;?>
    </select>
    <?php foreach($obat as $dt):?>
        <input type="hidden" value="<?php echo $dt->Nama_obat;?>" name="namanya">
    <?php endforeach;?>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Jenis Obat</label>
    <input type="text" id="jns2" class="form-control" name="jenis" readonly>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Kategori Obat</label>
    <select class="custom-select" name ="kategori">
        <option selected>- Jenis Kategori -</option>
        <?php foreach($kt as $kate):?>
            <option value="<?php echo $kate->ID_kategori;?>"><?php echo $kate->Nama_kategori;?></option>

        <?php endforeach;?>
    </select>
</div>
<!--<div class="form-group">-->
<!--  <label for="exampleInputPassword1">Stok</label>-->
<!--  <input type="number" name="stok"  value="0" class="form-control" min="0" placeholder="Jumlah Obat">-->
<!--</div>-->
<div class="row">
    <div class="col">
        <label for="exampleInputPassword1">Jumlah Dibeli</label>
        <input type="number" name="jum" value="0" id="qty2" class="form-control" min="0" placeholder="Jumlah Obat">
    </div>
    <div class="col">
        <label for="exampleInputPassword1">Harga Satuan</label>
        <input type="text" name="hrg" class="form-control" id="hrg2">
    </div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Total</label>
    <input type="text" name="total" class="form-control" placeholder="Total Harga" id="tot2">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Tanggal Kadaluwarsa</label>
    <input type="date" name="kadaluwarsa" class="form-control" placeholder="Tanggal Kadaluwarsa" id="kadal">
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