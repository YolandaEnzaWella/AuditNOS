<?php
function grading($val)
{
    if (0 < $val && $val < 49.9) {
        return "Bronze";
    } elseif (50 < $val && $val < 69.9) {
        return "Silver";
    } elseif (70 < $val && $val < 89.9) {
        return "Gold";
    } else {
        return "Platinum";
    }
}
function status($val)
{
    if ($val < 38) {
        return "Not Complete";
    } else {
        return "Complete";
    }
}
?>

<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data History Mistery Calling
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Cs') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Kode</th>
                    <th>Sub Kode</th>
                    <th>Atribut Penilaian</th>
                    <th>Penilaian</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                    <th>Tidak Menjawab</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                $arr_place = array(1 => 'DEALER', 2 => 'BENGKEL', 3 => 'ALL');

                if ($history_list) :
                    foreach ($history_list as $hst) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $hst['csi_kode']; ?></td>
                            <td><?= $hst['csi_sub_kode']; ?></td>

                            <td><?= $hst['csi_indikator']; ?></td>
                            <td>
                                <?php
                                foreach ($arr_place as $key => $val) {
                                    echo $hst['csi_place'] == $key ? $val : "";
                                }
                                ?>
                            </td>

                            <td><?= $hst['csdp_nilai'] == 2 ? '2' : '-' ?></td>
                            <td><?= $hst['csdp_nilai'] == 1 ? '1' : '-' ?></td>
                            <td><?= $hst['csdp_nilai'] == 0 ? '0' : '-' ?></td>
                            <td>
                                -
                            </td>
                        </tr>

                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada riwayat penilaian</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
        <br>
        <?php
        $skor_do_ya = 0;
        $skor_do_tidak = 0;
        $skor_hospitality_ya = 0;
        $skor_hospitality_tidak = 0;
        $skor_product_knowledge_ya = 0;
        $skor_product_knowledge_tidak = 0;
        $skor_selling_skill_ya = 0;
        $skor_selling_skill_tidak = 0;
        $total_skor_ya = 0;
        $total_skor_tidak = 0;
        $grading = 0;

        ?>
        <table class="table table-striped dt-responsive nowrap">
            <thead>
                <tr>
                    <th>
                        Atribut Penilaian
                    </th>
                    <th>
                        Total
                    </th>
                  

                </tr>

                <tr>
                    <th>Total Point Ya (2)</th>
                    <th><?= $jumlah_ya; ?></th>
                </tr>
                <tr>
                    <th>Total Point Tidak (1)</th>
                    <th><?= $jumlah_tidak; ?></th>
                </tr>
                <tr>
                </tr>
                <tr>
                    <th>
                        Poin PDSA 8
                    </th>
                    <th>
                        <?= $pdsa8_1; ?>
                    </th>
                    
                </tr>
                <tr>
                <th>
                        Poin PDSA 8
                    </th>
                    <th>
                        <?= $pdsa8_2; ?>
                    </th>
                    
                </tr>
              
                <tr>
                    <th>
                        Total
                    </th>
                    <th>
                        <?=  ($jumlah_ya + $pdsa8_1 + $pdsa8_2) / ($jumlah_ya + $jumlah_tidak + $pdsa8_1 + $pdsa8_2);  ?>
                    </th>
                

                </tr>

              
            </thead>

        </table>
    </div>
</div>