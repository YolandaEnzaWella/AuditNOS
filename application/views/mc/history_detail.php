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
                <a href="<?= base_url('Mc') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <th>Atribut Penilaian</th>
                    <th>Penilaian</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                if ($history_list) :
                    foreach ($history_list as $hst) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $hst['mci_atribut']; ?></td>
                            <td>
                                <?php
                                foreach ($arr_penilaian as $key => $val) {
                                    echo $hst['mci_penilaian'] == $key ? $val : "";
                                }
                                ?>
                            </td>

                            <td><?= $hst['mcdp_nilai'] == 1 ? '1' : '-' ?></td>
                            <td><?= $hst['mcdp_nilai'] == 0 ? '1' : '-' ?></td>
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
                    <th>
                        Ya (<?= $jumlah_ya; ?>)
                    </th>
                    <th>
                        Tidak (<?= $jumlah_tidak; ?>)
                    </th>

                </tr>
                <tr>
                    <th>
                        Dealer Operation
                    </th>
                    <th>
                        <?= $jumlah_operasional; ?>
                    </th>
                    <th>
                        <?= $skor_do_ya = $penilaian_dealer_operation_ya * 1.75; ?>
                    </th>
                    <th>
                        <?= $skor_do_tidak = $penilaian_dealer_operation_tidak * 1.75; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Hospitality
                    </th>
                    <th>
                        <?= $jumlah_hospitality; ?>
                    </th>
                    <th>
                        <?= $skor_hospitality_ya = $penilaian_hospitality_ya * 2; ?>
                    </th>
                    <th>
                        <?= $skor_hospitality_tidak = $penilaian_hospitality_tidak * 2; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Product Knowledge
                    </th>
                    <th>
                        <?= $jumlah_produkknowledge; ?>
                    </th>
                    <th>
                        <?= $skor_product_knowledge_ya = $penilaian_product_knowledge_ya * 9; ?>
                    </th>
                    <th>
                        <?= $skor_product_knowledge_tidak = $penilaian_product_knowledge_tidak * 9; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Selling Skill
                    </th>
                    <th>
                        <?= $jumlah_sellingskill; ?>
                    </th>
                    <th>
                        <?= $skor_selling_skill_ya = $penilaian_selling_skill_ya * 6; ?>
                    </th>
                    <th>
                        <?= $skor_selling_skill_tidak = $penilaian_selling_skill_tidak * 6; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Total
                    </th>
                    <th>
                        <?= $jumlah_operasional + $jumlah_hospitality + $jumlah_produkknowledge + $jumlah_sellingskill;  ?>
                    </th>
                    <th>
                        <?= $total_skor_ya = $skor_do_ya + $skor_hospitality_ya + $skor_product_knowledge_ya + $skor_selling_skill_ya;  ?>
                    </th>
                    <th>
                        <?= $total_skor_tidak = $skor_do_tidak + $skor_hospitality_tidak + $skor_product_knowledge_tidak + $skor_selling_skill_tidak;  ?>
                    </th>

                </tr>

                <tr>
                    <th>
                        Skor akhir :
                    </th>
                    <th colspan="3">
                        <?= $grading= $total_skor_ya - $total_skor_tidak / 100;  ?>
                    </th>


                </tr>

                <tr>
                    <th>
                        Capaian :
                    </th>
                    <th colspan="3">
                        <?php echo grading($grading); ?>
                    </th>


                </tr>
                <tr>
                    <th>
                        Status :
                    </th>
                    <th colspan="3">
                        <?php echo status($jumlah_ya + $jumlah_tidak); ?>
                    </th>


                </tr>
            </thead>

        </table>
    </div>
</div>