<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Upload Report
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('barang/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-upload"></i>
                    </span>
                    <span class="text">
                        Upload
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>PI</th>
                    <th>CA</th>
                    <th>Due Date</th>
                    <th>Picture</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="card-header bg-white py-3">
    <div class="row">
        <div class="col-auto">
            <a href="<?= base_url('barang/add') ?>" class="btn btn-sm btn-success btn-icon-split">
                <span class="icon">
                    <i class="fa fa-download"></i>
                </span>
                <span class="text">
                    Download
                </span>
            </a>
        </div>
    </div>
</div>

    