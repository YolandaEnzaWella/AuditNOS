<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Dealer
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('dealer/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Dealer
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
                    <th>Kode Dealer</th>
                    <th>Nama Dealer</th>
                    <th>Nama Distrik</th>
                    <th>Jenis Dealer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($dealer) :
                    foreach ($dealer as $dlr) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $dlr['kode_dealer']; ?></td>
                            <td><?= $dlr['nama_dealer']; ?></td>
                            <td><?= $dlr['nama']; ?></td>
                            <td><?= $dlr['jenis_dealer']; ?></td>
                            <td>
                                <a href="<?= base_url('dealer/edit/') . $dlr['id_dealer'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('dealer/delete/') . $dlr['id_dealer'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Silahkan tambahkan dealer baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>