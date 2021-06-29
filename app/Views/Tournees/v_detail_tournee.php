<article class="main-article">
    <h1><?php echo $heading  ?></h1>
   
    <p>Jour de collecte : <strong><?php echo $resTournee[0]['JourCollecte'] ?></strong></p>
    <h2> <?= count($resTournee); ?> conteneurs dans la tournée : </h2>

    <p>
        <?php if (count($resConteneur) != 0) { ?>
    <ul class="list-items">
        <?php

            foreach ($resConteneur as $row) { ?>
            <li>
                <?= $row['Id'] . '-' . $row['AddrEmplacement']; ?>
                <a href="<?= base_url('Cconteneur/detail/') . '/' . $row['Id']; ?>">Plus d'infos</a>
            </li>
        <?php } ?>
    </ul>

<?php

        } else {
            echo "<p>Aucun résultat trouvé</p>";
        }
?>
</p>

</article>