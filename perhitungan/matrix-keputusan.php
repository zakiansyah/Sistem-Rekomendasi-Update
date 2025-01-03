<?php
require_once('includes/init.php');
$page = "Matrix Keputusan";
require_once('template/header.php');
?>
<h3>Matrix Keputusan</h3>
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
                    <td><?php echo $matriks_x[$kriteria['id_kriteria']][$alternatif['id_alternatif']]; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="bobot-kriteria.php">Next</a></li>
    </ul>
</nav>
<?php require_once('template/footer.php'); ?>
