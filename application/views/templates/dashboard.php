<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sistem Informasi Pelaporan HC3</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-black sidebar sidebar-light accordion shadow-sm" id="accordionSidebar" style="background-color: #262626">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex text-white align-items-center bg-black justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-warehouse"></i>

                </div>
                <div class="sidebar-brand-text mx-2"></div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php //if (!is_dealer()) : 
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                PAGES
            </div>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCrm" aria-expanded="true" aria-controls="collapseCrm">
                    <i class="fas fa-fw fa-users"></i>
                    <span>CRM</span>
                </a>
                <div id="collapseCrm" class="collapse" aria-labelledby="headingCrm" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('crm'); ?>">Dashboard</a>
                        <a class="collapse-item" href="<?= base_url('daily'); ?>">Aktivitas Harian CRM</a>
                        <a class="collapse-item" href="<?= base_url('report'); ?>">Upload Report</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNos" aria-expanded="true" aria-controls="collapseNos">
                    <i class="fas fa-fw fa-users"></i>
                    <span>NOS</span>
                </a>
                <div id="collapseNos" class="collapse" aria-labelledby="headingNos" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('nos'); ?>">Nos</a>
                        <a class="collapse-item" href="<?= base_url('ms'); ?>">Mistery Shopping</a>
                        <a class="collapse-item" href="<?= base_url('mc'); ?>">Mistery Calling </a>
                        <a class="collapse-item" href="<?= base_url('cs'); ?>">Call Survey</a>
                    </div>
                </div>
            </li> -->


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('mc'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Mistery Calling</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('ms'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Mistery Shopping</span>
                </a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cs'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Call Survey</span>
                </a>
            </li>
            <?php if (is_admin()) : ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Data:</h6>
                            <a class="collapse-item" href="<?= base_url('dealer'); ?>">Dealer</a>
                            <a class="collapse-item" href="<?= base_url('mc_indikator'); ?>">Mistery Calling Indikator</a>
                            <a class="collapse-item" href="<?= base_url('cs_indikator'); ?>">Call Survey Indikator</a>
                            <a class="collapse-item" href="<?= base_url('distrik'); ?>">Distrik </a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Data Master
            </div> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('barangmasuk'); ?>">
                    <i class="fas fa-fw fa-download"></i>
                    <span>User Profile</span>
                </a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('barangkeluar'); ?>">
                    <i class="fas fa-fw fa-upload"></i>
                    <span> Media Learning</span>
                </a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('barangkeluar'); ?>">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Berita Terkini</span>
                </a>
            </li> -->
            <?php //endif;
            ?>
            <?php //if (is_admin() || is_dealer() ): 
            ?>
            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Report
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li> -->
            <?php //endif;
            ?>
            <?php if (is_admin() ) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Settings
                </div>

                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>User Management</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand bg-gray-900 topbar mb-4 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link bg-transparent d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-white">
                                    <?= userdata('nama'); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/setting'); ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/ubahpassword'); ?>">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <?= $contents; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SISFOHC3CDN</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Datepicker -->
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>
    <script src="<?= base_url(); ?>assets/select2/js/select2.full.js"></script>

    <script type="text/javascript">
        $(function() {
            $('.date').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });

            $('.select').select2({
                theme: "bootstrap4"
            });

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }

            $('#tanggal').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                    'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                }
            }, cb);

            cb(start, end);
        });

        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');

            var table1 = $('#dataTable1').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table1.buttons().container().appendTo('#dataTable1_wrapper .col-md-5:eq(0)');

        });
    </script>
    <script type="text/javascript">
        let hal = '<?= $this->uri->segment(1); ?>';

        let satuan = $('#satuan');
        let stok = $('#stok');
        let total = $('#total_stok');
        let jumlah = hal == 'barangmasuk' ? $('#jumlah_masuk') : $('#jumlah_keluar');

        $(document).on('change', '#barang_id', function() {
            let url = '<?= base_url('barang/getstok/'); ?>' + this.value;
            $.getJSON(url, function(data) {
                satuan.html(data.nama_satuan);
                stok.val(data.stok);
                total.val(data.stok);
                jumlah.focus();
            });
        });

        $(document).on('keyup', '#jumlah_masuk', function() {
            let totalStok = parseInt(stok.val()) + parseInt(this.value);
            total.val(Number(totalStok));
        });

        $(document).on('keyup', '#jumlah_keluar', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
        });
    </script>

    <?php if ($this->uri->segment(1) == 'dashboard') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
        </script>
    <?php endif; ?>


    <!-- Amchart Chart JS -->
    <script src="<?php echo base_url() ?>assets/amcharts4/core.js"></script>
    <script src="<?php echo base_url() ?>assets/amcharts4/chart.js"></script>
    <script src="<?php echo base_url() ?>assets/amcharts4/animated.js"></script>
    <script src="<?php echo base_url() ?>assets/amcharts4/kelly.js"></script>
    <script src="<?= base_url() ?>assets/select2/js/select2.full.min.js"></script>
    <script>
        var filtering = {}
        $(document).ready(function() {
            $('.filter_nama').select2({
                placeholder: "Pilih Nama",
                allowClear: true,
                theme: "classic"
            });
            $('.filter_bulan').select2({
                // placeholder: "Pilih Bulan",
                // allowClear: true,
                theme: "classic"
            });
            filter()
            init()

        })

        function filter() {
            $('#filter_mc_indikator').change(function() {
                filtering['filter_mc_indikator'] = $(this).val();
                init()
            })
            $('#filter_crm_distrik').change(function() {
                filtering['filter_crm_distrik'] = $(this).val();
                init()
            })
            $('#filter_crm_dealer').change(function() {
                filtering['filter_crm_dealer'] = $(this).val();
                init()
            })

            $('#filter_kpb_month').change(function() {
                filtering['filter_kpb_month'] = $(this).val();
                init()
            })
            $('#filter_kpb_distrik').change(function() {
                filtering['filter_kpb_distrik'] = $(this).val();
                init()
            })
            $('#filter_kpb_dealer').change(function() {
                filtering['filter_kpb_dealer'] = $(this).val();
                init()
            })
        }


        function init() {
            $(".init-loading").html("<i class='fa fa-spin fa-refresh'></i> &nbsp;&nbsp;&nbsp;Memuat Data ...");
            grafik_mc()
            grafik_mc_dealer()
            grafik_cs_dealer()
            // grafik_ims()

        }

        function groupBy(arr, key) {
            const initialValue = {}
            const res = arr.reduce((acc, cval) => {
                const myAttribute = cval[key]
                let test = acc
                acc[myAttribute] = [...(acc[myAttribute] || []), cval]
                for (let i = 0; i < acc[myAttribute].length; i++) {
                    if (test[myAttribute][i].status_training == 'Trained') {
                        test[myAttribute][0].trained = acc[myAttribute][i].data;
                        // test[myAttribute][0].persentase = (acc[myAttribute][i].trained / acc[myAttribute][i].data) * 100;
                    } else {
                        test[myAttribute][0].untrained = acc[myAttribute][i].data;
                        // test[myAttribute][0].persentase= 0;
                    }
                    delete test[myAttribute][i].status_training
                    delete test[myAttribute][i].data
                }
                delete test[myAttribute][1]
                return test
            }, initialValue)
            return res
        }

        // function persentase(arr, key){
        // const initialValue = {}
        // const res = arr.reduce((acc, cval) => {
        //     const myAttribute = cval[key]
        //     let test = acc
        //     acc[myAttribute] = [...(acc[myAttribute] || []), cval]
        //     for (let i = 0; i < acc[myAttribute].length; i++) {
        //         if (test[myAttribute][i].status_training == 'Trained') {
        //             if (test[myAttribute][0].trained = '') {
        //                 test[myAttribute][0].trained = 0;
        //             }else{
        //                 test[myAttribute][0].trained = acc[myAttribute][i].data;

        //             }
        //         test[myAttribute][0].persentase = (acc[myAttribute][i].data / acc[myAttribute][i].data) * 100;  
        //         } else{
        //                 test[myAttribute][0].untrained = acc[myAttribute][i].data;
        //            }
        //             delete test[myAttribute][i].status_training
        //             delete test[myAttribute][i].data
        //     }
        //             delete test[myAttribute][1]
        //     return test
        // }, initialValue)
        // return res
        // }

        function persentase(arr, key) {
            const initialValue = {}
            const res = arr.reduce((acc, cval) => {
                const myAttribute = cval[key]
                let test = acc
                acc[myAttribute] = [...(acc[myAttribute] || []), cval]

                delete test[myAttribute][1]
                return test
            }, initialValue)

            let newArr = []

            let i = 0

            Object.entries(res).forEach(element => {
                // console.log("el", element)
                newArr[i++] = element[1][0]
            });
            let z = 0
            newArr.forEach(element => {
                let a = Number(element.trained)
                let b = Number(element.untrained)
                let c = a + b
                let d = (a / c) * 100
                newArr[z++].persentase = d
            });
            // console.log("new arr = " , newArr)
            // console.log("res" , res)
            return newArr
        }


        function grafik_mc() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>mc/grafik_mc",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    barChartMc(data, "grafik_mc");
                    // console.log(data);
                }
            })
        }

        function grafik_mc_dealer() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>mc/grafik_mc_dealer",
                // data: filtering,
                dataType: "json",
                success: function(data) {
                    barChartMcDealer(data, "grafik_mc_dealer");
                    // console.log(data);
                }
            })
        }

        function grafik_cs_dealer() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>cs/grafik_cs",
                // data: filtering,
                dataType: "json",
                success: function(data) {
                    barChartCsDealer(data, "grafik_cs_dealer");
                    // console.log(data);
                }
            })
        }

        function barChartMc(data, chartdiv) {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create(chartdiv, am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.data = data;
            chart.paddingRight = 0;
            chart.paddingLeft = 0;
            chart.paddingTop = 20;
            chart.paddingBottom = 0;

            chart.data = data;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "mci_atribut";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = true;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 200;
            // label.truncate = true;
            label.tooltipText = "{category}";


            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -90;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "ya";
            series1.dataFields.categoryX = "mci_atribut";
            series1.name = "Atribut Penilaian";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}%";
            chart.cursor = new am4charts.XYCursor();

            var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            paretoValueAxis.renderer.opposite = true;
            paretoValueAxis.min = 0;
            paretoValueAxis.max = 100;
            paretoValueAxis.strictMinMax = true;
            paretoValueAxis.renderer.grid.template.disabled = true;
            paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
            paretoValueAxis.numberFormatter.numberFormat = "#'%'"
            paretoValueAxis.cursorTooltipEnabled = false;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";
        }


        function barChartMcDealer(data, chartdiv) {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create(chartdiv, am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.data = data;
            chart.paddingRight = 0;
            chart.paddingLeft = 0;
            chart.paddingTop = 20;
            chart.paddingBottom = 0;

            chart.data = data;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "nama_dealer";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = true;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 200;
            // label.truncate = true;
            label.tooltipText = "{category}";


            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -90;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "mcp_score";
            series1.dataFields.categoryX = "nama_dealer";
            series1.name = "Nama Dealer";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}%";
            chart.cursor = new am4charts.XYCursor();

            var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            paretoValueAxis.renderer.opposite = true;
            paretoValueAxis.min = 0;
            paretoValueAxis.max = 100;
            paretoValueAxis.strictMinMax = true;
            paretoValueAxis.renderer.grid.template.disabled = true;
            paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
            paretoValueAxis.numberFormatter.numberFormat = "#'%'"
            paretoValueAxis.cursorTooltipEnabled = false;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";



        }

        function barChartCsDealer(data, chartdiv) {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create(chartdiv, am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.data = data;
            chart.paddingRight = 0;
            chart.paddingLeft = 0;
            chart.paddingTop = 20;
            chart.paddingBottom = 0;

            chart.data = data;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "nama_dealer";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = true;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 200;
            // label.truncate = true;
            label.tooltipText = "{category}";


            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -90;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "csp_score";
            series1.dataFields.categoryX = "nama_dealer";
            series1.name = "Nama Dealer";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}%";
            chart.cursor = new am4charts.XYCursor();

            var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            paretoValueAxis.renderer.opposite = true;
            paretoValueAxis.min = 0;
            paretoValueAxis.max = 100;
            paretoValueAxis.strictMinMax = true;
            paretoValueAxis.renderer.grid.template.disabled = true;
            paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
            paretoValueAxis.numberFormatter.numberFormat = "#'%'"
            paretoValueAxis.cursorTooltipEnabled = false;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";



        }


        function groupSemester(arr, key) {
            const initialValue = {}
            const res = arr.reduce((acc, cval) => {
                const myAttribute = cval[key]
                let test = acc
                acc[myAttribute] = [...(acc[myAttribute] || []), cval]
                for (let i = 0; i < acc[myAttribute].length; i++) {
                    if (test[myAttribute][i].semester == '1') {
                        test[myAttribute][0].semester1 = acc[myAttribute][i].data;
                    } else {
                        test[myAttribute][0].semester2 = acc[myAttribute][i].data;
                        test[myAttribute][0].target = acc[myAttribute][i].data1;
                    }
                    delete test[myAttribute][i].semester
                    delete test[myAttribute][i].data
                }
                delete test[myAttribute][1]
                return test
            }, initialValue)
            return res
        }
    </script>

</body>

</html>