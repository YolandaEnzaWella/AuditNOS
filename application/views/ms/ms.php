<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <?php if(!empty($this->session->flashdata('status'))){ ?>
                    <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                    <?php } ?>
                    <form action="<?= base_url('Ms/import_excelMs'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pilih File Mistery Shopping</label>
                            <input type="file" name="fileExcel">
                        </div>
                        <div>
                            <button class='btn btn-success' type="submit">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Import      
                            </button>
                        </div>
                        <div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <h3>Mistery Shopping</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Distrik</th>
                                <th>Nama Dealer</th>
                                <th>Tahun</th>
                                <th>SEMESTER</th>
                                <th>Value</th>
                                <th>Target</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($list_data as $row) {
                             ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['distrik'] ?></td>
                                <td><?= $row['nama_dealer'] ?></td>
                                <td><?= $row['tahun'] ?></td>
                                <td><?= $row['semester'] ?></td>
                                <td><?= $row['value'] ?></td>
                                <td><?= $row['target'] ?></td>
                                <td><?= $row['grade'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>  
<br>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="container">
            <section class="content">
                    <div class="col-xs-6">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Tahun</label>
                                    <select class="filter_nama" style="width: 150px;">
                                        <option value=""></option>
                                        <?php foreach ($nama as $nm) : ?>
                                            <option value="<?= $nm->tahun; ?>"><?= $nm->tahun; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="init-loading grafik_ms" style="height:600px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
<br>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="container">
            <div class="col-md-4 col-md-offset-3">
                <?php if(!empty($this->session->flashdata('status'))){ ?>
                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                <?php } ?>
                <form action="<?= base_url('Ms/import_excel_IssueIMs'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pilih File Issue Mis. Shop</label>
                        <input type="file" name="fileExcel">
                    </div>
                    <div>
                        <button class='btn btn-success' type="submit">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Import      
                        </button>
                    </div>
                    <div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <h3>Mistery Shopping</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Semester</th>
                                <th>Premisses</th>
                                <th>Issues</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($list_dataims as $row) {
                             ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['tahun'] ?></td>
                                <td><?= $row['id_semester'] ?></td>
                                <td><?= $row['h1premisses'] ?></td>
                                <td><?= $row['issues'] ?></td>
                                <td><?= $row['result'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="container">
            <section class="content">
                    <div class="col-xs-6">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Tahun</label>
                                    <select class="filter_nama" style="width: 150px;">
                                        <option value=""></option>
                                        <?php foreach ($nama_ims as $nm) : ?>
                                            <option value="<?= $nm->tahun; ?>"><?= $nm->tahun; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Semester</label>
                                    <select class="filter_nama" style="width: 150px;">
                                        <option value=""></option>
                                        <?php foreach ($nama_ims2 as $nm) : ?>
                                            <option value="<?= $nm->id_semester; ?>"><?= $nm->id_semester; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="init-loading grafik_ims" style="height:600px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>