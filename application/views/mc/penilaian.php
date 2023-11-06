<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tahap1-tab" data-toggle="tab" href="#tahap1" role="tab" aria-controls="tahap1" aria-selected="true">Tahap 1 : <br> Interaksi Di Awal Telepon</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tahap2-tab" data-toggle="tab" href="#tahap2" role="tab" aria-controls="tahap2" aria-selected="false">Tahap 2 : <br> Interaksi Saat Membicarakan <br> Pembelian Motor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tahap3-tab" data-toggle="tab" href="#tahap3" role="tab" aria-controls="tahap3" aria-selected="false">Tahap 3 : <br> Interaksi Saat Tidak Jadi <br> Membeli Motor </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tahap4-tab" data-toggle="tab" href="#tahap4" role="tab" aria-controls="tahap4" aria-selected="false">Tahap 4 : <br> Interkasi Di Akhir Telepon </a>
    </li>
</ul>
<?= form_open('mc/simpan_penilaian'); ?>
<input type="hidden" value="<?= $penilaian_id; ?>" name="mcdp_mcp_id" id="mcdp_mcp_id">
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tahap1" role="tabpanel" aria-labelledby="tahap1-tab">

        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <th>Atribut Penilaian</th>
                <th>Penilaian</th>
                <th>Nilai</th>
            </thead>
            <tbody>
                <?php $i = 0;
                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                ?>

                <?php foreach ($indikator_1 as $in_1) : ?>
                    <tr>
                        <td width="600">
                            <p><?= $in_1['mci_atribut']; ?></p>
                            <input type="hidden" name="mcdp_mci_id1[<?= $i; ?>]" id="mcdp_mci_id" value="<?= $in_1['mci_id']; ?>">
                        </td>
                        <td width="600">
                            <?php
                            foreach ($arr_penilaian as $key => $val) {

                                echo $in_1['mci_penilaian'] == $key ? $val : "";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="mcdp_nilai1[<?= $i; ?>]" value="1">
                                    Ya
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="mcdp_nilai1[<?= $i; ?>]" value="0">
                                    Tidak
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
    <div class="tab-pane fade" id="tahap2" role="tabpanel" aria-labelledby="tahap2-tab">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <th>Atribut Penilaian</th>
                <th>Penilaian</th>
                <th>Nilai</th>
            </thead>
            <tbody>
                <?php $a = 0;
                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                ?>

                <?php foreach ($indikator_2 as $in_2) : ?>
                    <tr>
                        <td width="600">
                            <p><?= $in_2['mci_atribut']; ?></p>
                            <input type="hidden" name="mcdp_mci_id2[<?= $a; ?>]" id="mcdp_mci_id" value="<?= $in_2['mci_id']; ?>">
                        </td>
                        <td width="600">
                            <?php
                            foreach ($arr_penilaian as $key => $val) {

                                echo $in_2['mci_penilaian'] == $key ? $val : "";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai2[<?= $a; ?>]" value="1">
                                    Ya
                                </label>
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai2[<?= $a; ?>]" value="0">
                                    Tidak
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php $a++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="tahap3" role="tabpanel" aria-labelledby="tahap3-tab">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <th>Atribut Penilaian</th>
                <th>Penilaian</th>
                <th>Nilai</th>
            </thead>
            <tbody>
                <?php $b = 0;
                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                ?>

                <?php foreach ($indikator_3 as $in_3) : ?>
                    <tr>
                        <td width="600">
                            <p><?= $in_3['mci_atribut']; ?></p>
                            <input type="hidden" name="mcdp_mci_id3[<?= $b; ?>]" id="mcdp_mci_id" value="<?= $in_3['mci_id']; ?>">
                        </td>
                        <td width="600">
                            <?php
                            foreach ($arr_penilaian as $key => $val) {

                                echo $in_3['mci_penilaian'] == $key ? $val : "";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai3[<?= $b; ?>]" value="1">
                                    Ya
                                </label>
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai3[<?= $b; ?>]" value="0">
                                    Tidak
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php $b++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
    <div class="tab-pane fade" id="tahap4" role="tabpanel" aria-labelledby="tahap4-tab">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <th>Atribut Penilaian</th>
                <th>Penilaian</th>
                <th>Nilai</th>
            </thead>
            <tbody>
                <?php $c = 0;
                $arr_penilaian = array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL');
                ?>

                <?php foreach ($indikator_4 as $in_4) : ?>
                    <tr>
                        <td width="600">
                            <p><?= $in_4['mci_atribut']; ?></p>
                            <input type="hidden" name="mcdp_mci_id4[<?= $c; ?>]" id="mcdp_mci_id" value="<?= $in_4['mci_id']; ?>">
                        </td>
                        <td width="600">
                            <?php
                            foreach ($arr_penilaian as $key => $val) {

                                echo $in_4['mci_penilaian'] == $key ? $val : "";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai4[<?= $c; ?>]" value="1">
                                    Ya
                                </label>
                                <label class="form-check-label">
                                    <input required type="radio" class="form-check-input" name="mcdp_nilai4[<?= $c; ?>]" value="0">
                                    Tidak
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php $c++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>


</div>
<div class="col-md-12">

    <input type="submit" value="Kirim Penilaian">
</div>
<?= form_close(); ?>