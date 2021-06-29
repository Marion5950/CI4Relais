
                <article class="main-article">
                <?php if (!isset ($recherche_vide)){ ?>
                    <h1><?php echo $heading . "(" . $pager ->getDetails()['total'] . " trouvés)"; ?></h1>
                    <?php } ?> 

                    <form action="<?php echo base_url('Cconteneur/search'); ?>" method="get">
                    <?php if (!isset($searchText)) $searchText =""; ?>
 <input type="text" name="recherche"  value="<?=$searchText; ?>" placeholder="adresse ou ville">
 <input type="submit" value="Rechercher">
</form>




<?php if(!isset ($recherche_vide)){ ?>

    <?php if (count($result) != 0) { ?>
<ul class="list-items">
<?php

 foreach ($result as $row) { ?>
 <li>
 <?= $row['Id'] . '-' . $row['AddrEmplacement'];?>
 <a href="<?=base_url('Cconteneur/detail/'). '/' . $row['Id']; ?>">Plus d'infos</a>
 </li>

 <?php } ?> 
 </ul>
<?php 

 } else {
     echo "<p>Aucun résultat trouvé</p>";
 }
?>
  
                  <?php echo $pager->links(); ?> 
                  <?php } ?> 

                </article>
                
    