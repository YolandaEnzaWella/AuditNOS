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
                        <a href="<?= base_url('distrik') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], array('id_distrik' => $distrik['id_distrik'])); ?>
                <!-- <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_distrik">Kode distrik</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('id_distrik', $distrik['id_distrik']); ?>" type="text" id="id_distrik" name="id_distrik" class="form-control" placeholder="Kode distrik">
                        <?= form_error('id_distrik', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div> -->
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama_distrik">Nama distrik</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama', $distrik['nama']); ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama distrik">
                        <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
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