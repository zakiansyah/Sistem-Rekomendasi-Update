<?php
require_once('includes/init.php');
$page = "Bobot Kriteria";
require_once('template/header.php');
?>
<h3>Bobot Kriteria dan Normalisasi</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Bobot Asli</th>
            <th>Normalisasi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kriterias as $kriteria): ?>
            <tr>
                <td><?php echo $kriteria['nama']; ?></td>
                <td><?php echo $kriteria['bobot']; ?></td>
                <td><?php echo $kriteria['normalisasi']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="matrix-keputusan.php">Previous</a></li>
        <li class="page-item"><a class="page-link" href="matrix-ternormalisasi.php">Next</a></li>
    </ul>
</nav>
<?php require_once('template/footer.php'); ?>
