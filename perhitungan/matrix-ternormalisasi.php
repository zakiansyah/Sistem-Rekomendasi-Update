<?php
require_once('includes/init.php');
$page = "Matrix Ternormalisasi";
require_once('template/header.php');
?>
<h3>Matrix Ternormalisasi</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Alternatif</th>
            <?php foreach ($kriterias as $kriteria): ?>
                <th><?php echo $kriteria['nama']; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alternatifs as $alternatif): ?>
            <tr>
                <td><?php echo $alternatif['nama']; ?></td>
                <?php foreach ($kriterias as $kriteria): ?>
                    <td><?php echo $nilai_u[$kriteria['id_kriteria']][$alternatif['id_alternatif']]; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="bobot-kriteria.php">Previous</a></li>
        <li class="page-item"><a class="page-link" href="matrix-ternormalisasi-terbobot.php">Next</a></li>
    </ul>
</nav>
<?php require_once('template/footer.php'); ?>
