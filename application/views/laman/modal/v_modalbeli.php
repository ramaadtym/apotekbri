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
    <input type="text" class="form-control" name="tglbeli" value="<?php echo date("Y/m/d");?>" readonly>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Nama Obat</label>
    <!-- <input type="text" class="form-control" name="namaobt"> -->
    <select class="custom-select" onchange="loadKate(this.value);">
        <option selected>- Nama Obat -</option>
        <?php foreach($obat as $dt):?>
            <option value="<?php echo $dt->ID_Obat;?>"><?php echo $dt->Nama_obat;?></option>
        <?php endforeach;?>
        
    </select> 
    <input type="hidden" id="nmObat"  name ="namaobt">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Jenis Obaat</label>
    <input type="text" id="jns2" class="form-control" name="jenis" readonly>
    <!-- <input type="text" class="form-control" name="jenis" id> -->
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Kategori Obat</label>
    <input type="text" id="ktgr2" class="form-control" readonly>
    <input type="hidden" id="idKate" class="form-control" name="kategori">
</div>
<!--<div class="form-group">-->
<!--  <label for="exampleInputPassword1">Stok</label>-->
<!--  <input type="number" name="stok"  value="0" class="form-control" min="0" placeholder="Jumlah Obat">-->
<!--</div>-->
<div class="row">
    <div class="col">
        <label for="exampleInputPassword1">Jumlah Dibeli</label>
        <input type="number" name="jum"  id="qty2" class="form-control" min="0" placeholder="Jumlah Obat" required>
    </div>
    <div class="col">
        <label for="exampleInputPassword1">Harga Satuan</label>
        <input type="text" name="hrg" class="form-control" id="hrg2" readonly>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Total</label>
    <input type="text" name="total" class="form-control" placeholder="Total Harga" id="tot2" readonly>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Tanggal Kadaluwarsa</label>
    <!-- <input type="date" name="kadaluwarsa" class="form-control" placeholder="Tanggal Kadaluwarsa" id="kadal"> -->
    <input type="text" name="kadaluwarsa" class="form-control" placeholder="Tanggal Kadaluwarsa" id="kadal2" readonly>
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
