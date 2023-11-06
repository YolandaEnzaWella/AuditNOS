<!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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
</ul> -->
<?= form_open('cs/simpan_penilaian'); ?>
<input type="hidden" value="<?= $penilaian_id; ?>" name="csdp_csp_id" id="csdp_csp_id">
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <th>Kode</th>
        <th>Sub Kode</th>
        <th>Place</th>
        <th>Indikator</th>
        <th>Penilaian</th>

    </thead>
    <tbody>
        <?php $i = 0;
        $arr_place = array(1 => 'DEALER', 2 => 'BENGKEL', 3 => 'ALL');
        ?>

        <?php foreach ($indikator as $in) : ?>
            <tr>
                <td>
                    <?= $in['csi_kode']; ?>
                </td>
                <td>
                    <?= $in['csi_sub_kode']; ?>
                </td>
                <td width="600">
                    <?php
                    foreach ($arr_place as $key => $val) {

                        echo $in['csi_place'] == $key ? $val : "";
                    }
                    ?>
                </td>
                <td width="600">
                    <p><?= $in['csi_indikator']; ?></p>
                    <input type="hidden" name="csdp_csi_id[<?= $i; ?>]" id="csdp_csi_id" value="<?= $in['csi_id']; ?>">
                </td>
                <?php if ($in['csi_kode'] == "A201V") { ?>
                    <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="1">
                            WA
                        </label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="2">
                            SMS
                        </label>
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="3">
                            TELPON
                        </label>
                    </div>
                </td>
                <?php } else { ?>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="2">
                            Ya
                        </label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="1">
                            Tidak
                        </label>
                        <label class="form-check-label">
                            <input type="radio" required class="form-check-input" name="csdp_nilai[<?= $i; ?>]" value="0">
                            Tidak Menjawab
                        </label>
                    </div>
                </td>
                <?php } ?>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </tbody>
</table>
<div class="col-md-12">

    <input type="submit" value="Kirim Penilaian">
</div>
<?= form_close(); ?>