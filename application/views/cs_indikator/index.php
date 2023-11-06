<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Call Survey Indikator
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Cs_indikator/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Data
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Kode</th>
                    <th>Sub Kode</th>
                    <th>Posisi</th>
                    <th>Place</th>
                    <th width="90">Indikator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $arr_posisi = array(1 => 'SALES COUNTER', 2 => 'KASIR', 3 => 'AHASS');
                $arr_place = array(1 => 'DEALER', 2 => 'BENGKEL', 3 => 'ALL');
                if ($cs_indikator) :
                    foreach ($cs_indikator as $csi) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $csi['csi_kode']; ?></td>
                            <td><?= $csi['csi_sub_kode']; ?></td>
                            <td><?php
                                foreach ($arr_posisi as $key => $val) {

                                    echo $csi['csi_posisi'] == $key ? $val : '';
                                }

                                ?></td>
                            <td><?php
                                foreach ($arr_place as $key => $val) {

                                    echo $csi['csi_place'] == $key ? $val : '';
                                }

                                ?></td>
                            <td>
                                <?= $csi['csi_indikator'];?>
                            </td>
                            <td>
                                <a href="<?= base_url('cs_indikator/edit/') . $csi['csi_id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('cs_indikator/delete/') . $csi['csi_id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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