<div class="form-group">
    <label for=""></label>
    <select style="width: 25%" class="form-control form-control-sm float-right" name="filter_mc_indikator" id="filter_mc_indikator">
        <option value="">== Pilih Tahap Penilaian ==</option>
        <?php foreach ($filter_indikator as $key => $val) { ?>
            <option value="<?= $key ?>"><?= $val ?> </option>
        <?php } ?>

    </select>
</div>
<div id="grafik_mc" style="width: 100%; height: 800px;"></div>
<br>
<div id="grafik_mc_dealer" style="width: 100%; height: 800px;"></div>
<br>
<div id="grafik_cs_dealer" style="width: 100%; height: 800px;"></div>
<br>
<!-- <div id="grafik_dealer"  style="width: 100%; height: 800px;"></div> -->