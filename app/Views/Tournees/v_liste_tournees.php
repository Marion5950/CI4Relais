<article class="main-article">
    <?php if (!isset($recherche_vide)) { ?>
        <h1><?php echo $heading . "(" . count($result) . " trouvés)"; ?></h1>
    <?php } ?>

    <?php if (count($result) != 0) { ?>
        <ul class="list-items">
            <?php

            foreach ($result as $row) { ?>
                <li>
                    <?= $row['Id'] . '-' . $row['Nom']; ?>
                    <a href="<?= base_url('Ctournee/detail/') . '/' . $row['Id']; ?>">Plus d'infos</a>
                </li>

            <?php } ?>
        </ul>




      

    <?php } ?>
</article>