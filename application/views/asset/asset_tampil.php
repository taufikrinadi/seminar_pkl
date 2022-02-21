<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!--tambahkan custom css disini-->
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<!-- Main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<a href="<?php echo base_url('asset/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
					Tambah Data
				</a>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">

				<!-- DataTables -->
				<div class="dataTable-container">
					<table class="table datatable">
						<thead>
							<tr>
								<th>ID Asset</th>
								<th>Tanggal Input</th>
								<th>Nama Asset</th>
								<th>Jenis Asset</th>
								<th>Kategori Asset</th>
								<th>Jumlah</th>
								<th>Staff</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $asset) : ?>
								<tr>
									<td>
										<?php echo $asset->id_asset ?>
									</td>
									<td>
										<?php echo $asset->tgl_input ?>
									</td>
									<td>
										<?php echo $asset->nama_asset ?>
									</td>
									<td>
										<?php echo $asset->nama_jenis ?>
									</td>
									<td>
										<?php echo $asset->nama_kategori ?>
									</td>
									<td>
										<?php echo $asset->jumlah ?>
									</td>
									<td>
										<?php echo $asset->nama_user ?>
									</td>
									<td>
										<?php echo $asset->status_asset ?>
									</td>

								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!-- /.box-body -->
	<!-- modal dialog-->
	<div class="modal fade" id="basicModal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Asset</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<table id="table1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID Asset</th>
							<th>Nama Asset</th>
							<th>Jenis Asset</th>
							<th>Kategori Asset</th>
							<th>Jumlah Asset</th>
						</tr>
					</thead>
					<tbody id="table-tbody">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</section>
<!-- /.content -->
<!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>