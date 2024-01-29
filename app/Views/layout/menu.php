<?= $this->extend('layout/main') ?>
<?= $this->section('menu') ?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <br>
            <a href="<?= site_url('layout') ?>" class="logo"><img src="<?= base_url() ?>/assets/images/logo.png" height="150" alt="logo"></a>
            <br>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
       
        <div id="sidebar-menu">
            <ul>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-plus"></i> <span>
                                Data Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= site_url('pelanggan') ?>">Pelanggan</a></li>
                            <li><a href="<?= site_url('tarif') ?>">Tarif</a></li>
                        </ul>
                    </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open"></i> <span>Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= site_url('transaksi') ?>">Transaksi</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i> <span>Laporan</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= site_url('transaksi/laporanperperiode') ?>">Laporan Perperiode</a></li>
                                </ul>
                            </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->


<?= $this->endSection('') ?>