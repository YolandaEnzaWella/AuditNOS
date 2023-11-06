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
                        <a href="<?= base_url('cs_indikator') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-4 text-md-right" for="csi_kode">Kode Penilaian</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('csi_kode', $csi['csi_kode']); ?>" type="text" id="csi_kode" name="csi_kode" class="form-control" placeholder="Kode Penilaian">
                        <?= form_error('csi_kode', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csi_sub_kode">Sub Kode Penilaian (Kosongkan jika tidak ada)</label>
                    <div class="col-md-6">
                        <select class="form-control" name="csi_sub_kode" id="csi_sub_kode">
                            <option value="">-Pilih Sub Kode-</option>
                            <?php foreach ($csi_sub_kode as $val) : ?>
                                <option value="<?= $val; ?> <?= $csi['csi_sub_kode'] == $val ? 'selected' : ''; ?>"><?= $val; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csi_posisi">Area Penilaian</label>
                    <div class="col-md-6">

                        <select class="form-control" name="csi_posisi" id="csi_posisi">
                            <?php foreach ($csi_posisi as $id => $key) : ?>
                                <option value="<?= $id; ?> <?= $csi['csi_posisi'] == $id ? 'selected' : ''; ?>"><?= $key; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <?= form_error('csi_posisi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csi_place">Tempat Penilaian</label>
                    <div class="col-md-6">

                        <select class="form-control" name="csi_place" id="csi_place">
                            <?php foreach ($csi_place as $id => $key) : ?>
                                <option value="<?= $id; ?> <?= $csi['csi_place'] == $id ? 'selected' : ''; ?>"><?= $key; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <?= form_error('csi_place', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="csi_indikator">Indikator Penilaian</label>
                    <div class="col-md-6">
                        <textarea name="csi_indikator" id="csi_indikator" class="form-control" placeholder="Indikator Penilaian" cols="30" rows="10"><?= set_value('csi_indikator', $csi['csi_indikator']); ?></textarea>
                        <?= form_error('csi_indikator', '<span class="text-danger small">', '</span>'); ?>
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