<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Call Survey
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('cs') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                
                <div class="row form-group">
                    <input type="hidden" name="mcp_id" id="mcp_id">
                    <label class="col-md-4 text-md-right" for="supplier_id">Nama Dealer</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="csp_dealer_id" id="csp_dealer_id" class="custom-select select">
                                <option value="" selected disabled>Pilih Dealer</option>
                                <?php foreach ($dealer as $dlr) : ?>
                                    <option <?= set_select('csp_dealer_id', $dlr['id_dealer']) ?> value="<?= $dlr['id_dealer'] ?>"><?= $dlr['nama_dealer'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <!-- <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div> -->
                            <?= form_error('csp_dealer_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csp_nama_penilai">Nama Konsumen</label>
                    <div class="col-md-5">
                        <input id="csp_nama_penilai" type="text" name="csp_nama_penilai" class="form-control">
                        <?= form_error('csp_nama_penilai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csp_notelp_penilai">Nomor Telp Konsumen</label>
                    <div class="col-md-5">
                        <input id="csp_notelp_penilai" type="text" name="csp_notelp_penilai" class="form-control">
                        <?= form_error('csp_notelp_penilai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
              
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>