<div class="col">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url ('peopledev/district') ?> ">By District</a>
            <a class="dropdown-item" href="<?= base_url ('peopledev/dealer') ?>">By Dealer</a>
          </div>
        </div>
        <?= $trained->total ?>
        <?= $untrained->total ?>
    </div>
    <br>

<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="container">
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-4 col-md-offset-3">
					<?php if(!empty($this->session->flashdata('status'))){ ?>
					<div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
					<?php } ?>
					<form action="<?= base_url('Peopledev/import_excel'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Pilih File Excel</label>
							<input type="file" name="fileExcel">
						</div>
						<div>
							<button class='btn btn-success' type="submit">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					    		Import		
							</button>
						</div>
						<div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</div>
					</form>
				</div>
            </div>
				<div class="card-body">
					<h3>Data Keseluruhan</h3>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Dealer</th>
									<th>Nama Dealer</th>
									<th>distrik</th>
                                    <th>honda_id</th>
                                    <th>nama_karyawan</th>
                                    <th>jabatan</th>
                                    <th>wajib_training</th>
                                    <th>status_training</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 1;
									foreach ($list_data as $row) {
								 ?>
								<tr>
									<td><?= $no++; ?></td>
                                    <td><?= $row['kode_dealer'] ?></td>
                                    <td><?= $row['nama_dealer'] ?></td>
									<td><?= $row['distrik'] ?></td>
									<td><?= $row['honda_id'] ?></td>
									<td><?= $row['nama_karyawan'] ?></td>
                                    <td><?= $row['jabatan'] ?></td>
                                    <td><?= $row['wajib_training'] ?></td>
                                    <td><?= $row['status_training'] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>	