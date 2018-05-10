
<div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                         <?php $this->load->view('laman/comp/profil');?>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <?php $this->load->view('laman/comp/menu');?>

                        <!-- END Side Navigation -->
                    </div>
                </div>
            </nav>
    <?php $this->load->view('laman/comp/header');?>

            <!-- Main Container -->
<!--             <main id="main-container">-->

                <!-- Page Content -->
                <div class="content">
                    <div class="my-50 ">
                        <h2 class="font-w700 text-black mb-10">Sirkulasi Apotek</h2>
                        <h3 class="h5 text-muted mb-0">
                           Selamat Datang, <?php echo $this->session->userdata('nama');?> | <?php echo $this->session->userdata('username');?> | <?php echo ucfirst($this->session->userdata('level'));?>
                        </h3>

                    </div>

                    <div class="block block-fx-shadow px-4 py-4">
                        <!-- Tab Menu -->
                        <?php
                        if($this->session->flashdata('del')):
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('del');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                            elseif($this->session->flashdata('add')):
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('add');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                            endif;
                        ?>



                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#jual" role="tab" aria-controls="profile" aria-selected="false">Penjualan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " id="contact-tab" data-toggle="tab" href="#beli" role="tab" aria-controls="contact" aria-selected="false">Pembelian</a>
                        </li>
                         <li class="nav-item">
                           <a class="nav-link" id="home-tab" data-toggle="tab" href="#obat" role="tab" aria-controls="home" aria-selected="true">Daftar Obat</a>
                         </li>
                       </ul>
                        <!-- Tab menu content -->
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane  fade py-3" id="obat" role="tabpanel" aria-labelledby="home-tab">
                              <!-- Daftar Obat -->
                              <h3>Stok Obat</h3>
                              <?php $this->load->view('laman/tabel/tbl_obat');?>
                          </div>
                          <div class="tab-pane show active fade  py-3" id="jual" role="tabpanel" aria-labelledby="profile-tab">
                              <!-- Penjualan -->
                            <div class="row mb-10">
                                <div class="col-12">
                                    <h3>Transaksi Penjualan</h3>
                                    <div class="float-right">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addJual"><i class="si si-plus"></i> Tambah</button>
                                        <?php $this->load->view('laman/modal/v_modaljual');?>
                                    </div>
                                </div>
                            </div>
                            <?php $this->load->view('laman/tabel/tbl_jual');?>
                          </div>
                          <div class="tab-pane  fade py-3" id="beli" role="tabpanel" aria-labelledby="contact-tab">
                              <!-- Pembelian -->
                              <div class="row mb-10">
                                  <div class="col-12">
                                    <h3>Pembelian Obat</h3>
                                      <div class="float-right">
                                          <button class="btn btn-primary" data-toggle="modal" data-target="#addBeli"><i class="si si-plus"></i> Tambah</button>
                                          <?php $this->load->view('laman/modal/v_modalbeli');?>
                                      </div>
                                  </div>
                              </div>
                              <?php $this->load->view('laman/tabel/tbl_beli');?>
                          </div>
                        </div>
                       
                    </div>
                </div>
                <!-- END Page Content -->
<!--             </main>-->
            <!-- END Main Container -->

            <!-- Footer -->
            <footer>
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 2.0</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
<script>
//    $(document).ready(function() {
//        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
//            $("#success-alert").slideUp(500);
//        });
//    });
</script>