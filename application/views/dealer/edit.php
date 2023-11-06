<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], array('id_dealer' => $dealer['id_dealer'])); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kode_dealer">Kode Dealer</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('kode_dealer', $dealer['kode_dealer']); ?>" type="text" id="kode_dealer" name="kode_dealer" class="form-control" placeholder="Kode Dealer">
                        <?= form_error('kode_dealer', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama_dealer">Nama Dealer</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama_dealer', $dealer['nama_dealer']); ?>" type="text" id="nama_dealer" name="nama_dealer" class="form-control" placeholder="Nama Dealer">
                        <?= form_error('nama_dealer', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="dealer_id_distrik">Pilih Distrik</label>
                    <div class="col-md-6">
                        <select name="dealer_id_distrik" id="dealer_id_distrik" class="custom-select select">
                            <option value="" selected disabled>Pilih Distrik</option>
                            <?php foreach ($distrik as $dis) : ?>
                                <option <?= set_select('dealer_id_distrik', $dis['id_distrik']) ?> <?= $dealer['dealer_id_distrik'] == $dis['id_distrik'] ? 'selected' : '' ?> value="<?= $dis['id_distrik'] ?>"><?= $dis['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('dealer_id_distrik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <!-- <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div> -->
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Jenis Dealer</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('jenis_dealer', $dealer['jenis_dealer']); ?>" type="text" id="jenis_dealer" name="jenis_dealer" class="form-control" placeholder="Jenis Dealer">
                        <?= form_error('jenis_dealer', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>