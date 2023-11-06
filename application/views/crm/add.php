<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Input Data CRM
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('satuan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Pilih Tahun
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                        <td>1</td>
                        <td>CRM</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelcrm'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>H1 KE H1</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excel'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>H2 KE H1 DEALER SENDIRI</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelds'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data      
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>H2 KE H1 DEALER LAIN</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_exceldl'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>KPB 1</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelkpb1'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>KPB 2</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelkpb2'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>KPB 3</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelkpb3'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>KPB 4</td>
                        <td>
                            <div class="col-md-4 col-md-offset-3">
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <form action="<?= base_url('Crm/import_excelkpb4'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih File Excel</label>
                                        <input type="file" name="fileExcel">
                                    </div>
                                    <div>
                                        <button class='btn btn-success' type="submit">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Tambah Data       
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
          