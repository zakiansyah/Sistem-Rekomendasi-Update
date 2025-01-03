<?php
require_once('includes/init.php');

$user_role = get_role();
if ($user_role == 'admin' || $user_role == 'user') {

	$page = "Hasil";
	require_once('template/header.php');
?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>

		<a href="cetak.php" target="_blank" class="btn btn-orange"> <i class="fa fa-print"></i> Cetak Data </a>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-orange text-white">
						<tr align="center">
							<th>Nama Alternatif</th>
							<th>Nilai</th>
							<th width="15%">Rank</th>
							<th width="15%">Hasil Rekomendasi</th>
					</thead>
					<tbody>
						<?php
						$no = 0;
						$query = mysqli_query($koneksi, "SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY hasil.nilai DESC");
						while ($data = mysqli_fetch_array($query)) {
							$no++;
							$hasil_rekomendasi = $data['nilai'] > 0.5 ? 'Tepat Waktu' : 'Tidak Tepat Waktu';
							$button_class = $data['nilai'] > 0.5 ? 'btn-success' : 'btn-danger';
						?>
							<tr align="center">
								<td align="left"><?= $data['nama'] ?></td>
								<td><?= $data['nilai'] ?></td>
								<td><?= $no; ?></td>
								<td><button class="btn <?= $button_class ?> btn-sm"> <?= $hasil_rekomendasi ?> </button></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
	require_once('template/footer.php');
} else {
	header('Location: login.php');
}
?>