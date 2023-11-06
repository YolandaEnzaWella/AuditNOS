<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary mb-5">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data CRM
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('crm/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Update Data
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Grafik CRM
                </h4>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div> -->
<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_crm_month" id="filter_crm_month">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_crm_bulanan" style="width: 100%; height: 800px;margin-bottom:40px; "></div>
<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_crm_dealer" id="filter_crm_dealer">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_crm_dealer" style="width: 100%; height: 800px; margin-bottom:40px; "></div>
<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_crm_distrik" id="filter_crm_distrik">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_crm_distrik" style="width: 100%; height: 800px; margin-bottom:40px; "></div>




<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_kpb_month" id="filter_kpb_month">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_kpb_bulanan" style="width: 100%; height: 800px;margin-bottom:40px; "></div>

<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_kpb_distrik" id="filter_kpb_distrik">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_kpb_distrik" style="width: 100%; height: 800px; margin-bottom:40px; "></div>

<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right filter_bulan" name="filter_kpb_dealer" id="filter_kpb_dealer">
        <option value="">== Pilih Tahun ==</option>
        <?php foreach ($year as $y) { ?>
            <option value="<?= $y['tanggal']; ?>"><?= $y['tanggal']; ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_kpb_dealer" style="width: 100%; height: 800px; margin-bottom:40px; "></div>