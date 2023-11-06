<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Mistery Calling
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('mc') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <!-- <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tanggal_masuk">Tanggal Penilaian</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <div class="row form-group">
                    <input type="hidden" name="mcp_id" id="mcp_id">
                    <label class="col-md-4 text-md-right" for="supplier_id">Nama Dealer</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="mcp_dealer_id" id="mcp_dealer_id" class="custom-select select">
                                <option value="" selected disabled>Pilih Dealer</option>
                                <?php foreach ($dealer as $dlr) : ?>
                                    <option <?= set_select('mcp_dealer_id', $dlr['id_dealer']) ?> value="<?= $dlr['id_dealer'] ?>"><?= $dlr['nama_dealer'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <!-- <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div> -->
                            <?= form_error('mcp_dealer_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="mcp_nama_penilai">Nama Penilai</label>
                    <div class="col-md-5">
                        <input id="mcp_nama_penilai" type="text" name="mcp_nama_penilai" class="form-control">
                        <?= form_error('mcp_nama_penilai', '<small class="text-danger">', '</small>'); ?>
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