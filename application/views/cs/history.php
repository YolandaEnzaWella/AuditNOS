<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data History Call Survey
                </h4>
            </div>
            <?php if (is_admin()) : ?>
                <div class="col-auto">
                    <a href="<?= base_url('Cs/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Data
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Nama Dealer</th>
                    <th>Nama Konsumen</th>
                    <th>No Telpon Konsumen</th>
                    <th>Tanggal Penilaian</th>
                    <th>Skor Dealer</th>
                    <th>Predikat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($history) :
                    foreach ($history as $hst) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $hst['nama_dealer']; ?></td>
                            <td><?= $hst['csp_nama_penilai']; ?></td>
                            <td><?= $hst['csp_notelp_penilai']; ?></td>
                            <td><?= $hst['created_at'] ?></td>
                            <td><?= $hst['csp_score']; ?></td>
                            <td><?= $hst['csp_predikat']; ?></td>
                            <td><?= $hst['csp_status']; ?></td>
                            <td>
                                <?php if (is_admin()) : ?>
                                    <a href="<?= base_url('history/edit/') . $hst['csp_id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <?php endif; ?>
                                <a href="<?= base_url('cs/detail_penilaian/') . $hst['csp_id'] ?>" class="btn btn-circle btn-sm btn-primary"><i class="fa fa-fw fa-list"></i></a>
                                <?php if (is_admin()) : ?>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('cs/delete/') . $hst['csp_id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan atribut penilaian baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>