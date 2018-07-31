<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a href="<?php echo base_url();?>Dashboard" class="active"><i class="si si-refresh"></i><span class="sidebar-mini-hide">Sirkulasi</span></a>
        </li>
        <?php if($this->session->userdata('level') == "admin"):?>
        <li>
            <a href="<?php echo base_url();?>Users"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Manajemen Pengguna</span></a>
        </li>
        <li>
            <a href="<?php echo base_url();?>Resep"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Lihat Resep</span></a>
        </li>
    <?php endif;?>
        <!-- <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-refresh"></i><span class="sidebar-mini-hide">Sirkulasi</span></a>
            <ul>
                <li>
                    <a href="op_error_400.html">Penjualan</a>
                </li>
                <li>
                    <a href="op_error_400.html">Pembelian</a>
                </li>
                
            </ul>
        </li> -->
        <!-- <li>
            <a href="be_pages_dashboard.html"><i class="fa fa-sign-out"></i><span class="sidebar-mini-hide">Keluar</span></a>
        </li> -->
    </ul>
</div>