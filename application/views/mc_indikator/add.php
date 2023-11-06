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
                        <a href="<?= base_url('mc_indikator') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="mci_atribut">Atribut Penilaian</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('mci_atribut'); ?>" type="text" id="mci_atribut" name="mci_atribut" class="form-control" placeholder="Atribut Penilaian">
                        <?= form_error('mci_atribut', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="mci_penilaian">Area Penilaian</label>
                    <div class="col-md-6">

                        <select class="form-control" name="mci_map_id" id="mci_map_id">
                            <?php foreach ($mci_map_id as $id => $key) : ?>
                                <option value="<?= $id; ?>"><?= $key; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <?= form_error('mci_map_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="mci_penilaian">Penilaian</label>
                    <div class="col-md-6">

                        <select class="form-control" name="mci_penilaian" id="mci_penilaian">
                            <?php foreach ($mci_penilaian as $id => $key) : ?>
                                <option value="<?= $id; ?>"><?= $key; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <?= form_error('mci_apenilaian', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
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