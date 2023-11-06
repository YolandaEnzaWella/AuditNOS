<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Mistery Calling Indikator
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Mc_indikator/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
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
                    <th>Atribut Penilaian</th>
                    <th>Area Penilaian</th>
                    <th>Penilaian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                $arr_area_penilaian = array(1 => 'INTERAKSI DI AWAL TELEPON', 2 => 'INTERAKSI SAAT MEMBICARAKAN PEMBELIAN MOTOR', 3 => 'INTERAKSI SAAT TIDAK JADI MEMBELI MOTOR', 4 => 'INTERAKSI DI AKHIR TELEPON');
                if ($mc_indikator) :
                    foreach ($mc_indikator as $mci) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $mci['mci_atribut']; ?></td>
                            <td><?php
                                foreach ($arr_area_penilaian as $key => $val) {

                                    echo $mci['mci_map_id'] == $key ? $val : '';
                                }

                                ?></td>
                            <td><?php
                                foreach ($arr_penilaian as $key => $val) {

                                    echo $mci['mci_penilaian'] == $key ? $val : '';
                                }

                                ?></td>
                            <td>
                                <a href="<?= base_url('mc_indikator/edit/') . $mci['mci_id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('mc_indikator/delete/') . $mci['mci_id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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