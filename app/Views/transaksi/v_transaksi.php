<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <ul class="list-inline float-left mb-0">
                            <h4 class="mt-e header-title">DATA TRANSAKSI</h4>
                        </ul>
                        <ul class="list-inline float-right mb-0">
                            <!-- Jam -->
                            <h6>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                ?>

                                <script type="text/javascript">
                                    function date_time(id) {
                                        date = new Date;
                                        year = date.getFullYear();
                                        month = date.getMonth();
                                        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                        d = date.getDate();
                                        day = date.getDay();
                                        days = new Array('Minggu', 'Senen', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                                        h = date.getHours();
                                        if (h < 10) {
                                            h = "0" + h;
                                        }
                                        m = date.getMinutes();
                                        if (m < 10) {
                                            m = "0" + m;
                                        }
                                        s = date.getSeconds();
                                        if (s < 10) {
                                            s = "0" + s;
                                        }
                                        result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                                        document.getElementById(id).innerHTML = result;
                                        setTimeout('date_time("' + id + '");', '1000');
                                        return true;
                                    }
                                </script>

                                <span id="date_time"></span>
                                <script type="text/javascript">
                                    window.onload = date_time('date_time');
                                </script>
                                <!-- Batas jam -->
                            </h6>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Harga</th>
                                                <th>Meter Bulan Ini</th>
                                                <th>Meter Bulan Lalu</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php $no = 0;
                                            foreach ($transaksi as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['nama'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['tarif'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['meterblnini'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['meterblnlalu'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['tglbayar'] ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit">
                                                            <i class=" fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<form action="/KasMasuk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pengurus</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini? </h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/KasMasuk/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Kas Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label></label>
                        <input type="hidden" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tgl" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label><b>Keterangan</b></label>
                        <input type="text" class="form-control ket" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>Kas Masuk</b></label>
                        <input type="text" class="form-control kmasuk" name="kmasuk">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jenis Kas</b></label>
                        <select class="form-control jkas" name="jkas">
                            <option value="">=Pilih=</option>
                            <option value="Anak Yatim">Anak yatim</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Mesjid">Mesjid</option>
                            <option value="TPQ">TPQ</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Form Tambah -->
<form action="/transaksi/save" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Pelanggan</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur"
                                        class="btn btn-xs btn-primary">Plg</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" readonly id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur1"
                                        class="btn btn-xs btn-primary">Tarif</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur1" readonly id="iddonatur1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Klass</label>
                                    <input type="text" readonly id="nama1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label><b>Meter Bulan Ini</b></label>
                        <input type="number" class="form-control" name="mblnini">
                    </div>
                    <div class="col-md-12">
                        <label><b>Meter Bulan Lalu</b></label>
                        <input type="number" class="form-control" name="mblnll">
                    </div>
                    <div class="col-md-12">
                        <label><b>Tanggal Bayar</b></label>
                        <input type="date" class="form-control" name="tgl">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form donatur -->
    <div class="modal fade" id="modal_donatur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Donatur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_pelanggan as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idpelanggan ?>
                                    </td>
                                    <td>
                                        <?= $d->nama ?>
                                    </td>
                                    <td>
                                        <?= $d->nohp ?>
                                    </td>
                                    <td>
                                        <?= $d->alamat ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur('<?= $d->idpelanggan ?>','<?= $d->nama ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form tarif -->
    <div class="modal fade" id="modal_donatur1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Donatur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Klass</th>
                                <th>Tarif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_tarif as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idtarif ?>
                                    </td>
                                    <td>
                                        <?= $d->klass ?>
                                    </td>
                                    <td>
                                        <?= $d->tarif ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur1('<?= $d->idtarif ?>','<?= $d->klass ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    //script delete
    $('.btn-delete').on('click', function () {
        const id = $(this).data('id_kas');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    //script datatable
    $(document).ready(function () {
        $('#datapengurus').DataTable();
    });
    $('.btn-edit').on('click', function () {
        const id = $(this).data('id_kas');
        const tanggal = $(this).data('tanggal');
        const keterangan = $(this).data('ket');
        const kasmasuk = $(this).data('kasmasuk');
        const jenis = $(this).data('jenis');


        $('.id').val(id);
        $('.tgl').val(tanggal);
        $('.ket').val(keterangan);
        $('.kmasuk').val(kasmasuk);
        $('.jkas').val(jenis);
        $('.tgl').val(tanggal).trigger('change');
        $('#updateModal').modal('show');
    });

    //script donatur
    function pilih_donatur(id, nama) {

        $('#iddonatur').val(id);
        $('#nama').val(nama);
        $('#modal_donatur').modal().hide();
    }
    function pilih_donatur1(id, nama) {

        $('#iddonatur1').val(id);
        $('#nama1').val(nama);
        $('#modal_donatur1').modal().hide();
}
</script>
<?= $this->endSection('') ?>