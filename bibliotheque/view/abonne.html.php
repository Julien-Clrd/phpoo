<?php
include __DIR__ . '/../layout/top.php';
?>

<h1>Abonnés</h1>

<p><a href="abonne-edit.php">Ajouter un abonné</a></p>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Prénom</th>
    </tr>
    <?php
    foreach ($abonnes as $abonne) :
    ?>
    <tr>
        <td><?= $abonne->getId(); ?></td>
        <td><?= $abonne->getPrenom(); ?></td>
    </tr>
<?php
endforeach;
?>
</table>

<?php
echo '<p>Bonjour ' . $abonne->getPrenom() . '</p>';

include __DIR__ . '/../layout/bottom.php';