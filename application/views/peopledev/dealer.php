<!-- Main content -->
            <section class="content">
                    <div class="col-xs-6">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Dealer</label>
                                    <select class="filter_nama" style="width: 20%;">
                                        <option value=""></option>
                                        <?php foreach ($nama as $nm) : ?>
                                            <option value="<?= $nm->nama_dealer; ?>"><?= $nm->nama_dealer; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="init-loading grafik_dealer" style="height:600px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-6">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Wajib Training</label>
                                    <select class="filter_nama" style="width: 20%;">
                                        <option value=""></option>
                                        <?php foreach ($jabatan as $nm) : ?>
                                            <option value="<?= $nm->wajib_training; ?>"><?= $nm->wajib_training; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="init-loading grafik_jabatan" style="height:600px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-line-chart"></i> Grafik Keseluruhan</h3>
                            </div>
                            <div class="box-body">
                                <div class="init-loading grafik_stacked" style="height:640px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
            </section>
<!-- <div class="row">

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bengkalis</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Trained : <?= $trained_bengkalis->total ?>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"><?= $trained_bengkalis->total?></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Untrained : <?= $untrained_bengkalis->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Indragiri Hilir</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Trained : <?= $trained_inhil->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_inhil->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Indragiri Hulu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Trained : <?= $trained_inhu->total?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                     aria-valuenow="<?= $trained_inhu->total?>" aria-valuemin="0"
                        aria-valuemax="<?= $trained->total?>"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_inhu->total ?>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kampar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Trained : <?= $trained_kampar->total ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>

             <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_kampar->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kuantan Singingi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Trained : <?= $trained_kuansing->total ?>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_kuansing->total ?>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pekanbaru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Trained : <?= $trained_pekanbaru->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_pekanbaru->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rokan Hilir</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Trained : <?= $trained_rohil->total ?>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Untrained : <?= $untrained_rohil->total ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Untrained : <?= $untrained_rohil->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rokan Hulu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Trained : <?= $trained_rohul->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
             <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_rohul->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Trained : <?= $trained_siak->total ?>
                        
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Untrained : <?= $untrained_siak->total ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>-->