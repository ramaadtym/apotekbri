<div class="modal fade" id="addJual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Users/addUsers');?>
        <div class="form-group">
          <label for="exampleInputPassword1">No. Induk</label>
          <input type="text" class="form-control" name="user">
        </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Nama Apoteker</label>
              <input type="text" class="form-control" name="nama_apoteker">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="Password"  class="form-control" name="pass" >
            </div> 
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text"  class="form-control" name="almt" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Level Pengguna</label>
             <select class="custom-select" name ="level">
                <option selected>- Level Pengguna -</option>
                <option value="admin">Administrator</option>
                <option value="apoteker">Apoteker</option>
                <option value="kasir">Kasir</option>
              </select>
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