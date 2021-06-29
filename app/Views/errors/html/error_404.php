<?php
$page['title'] = "Cette page n'existe pas";
ob_start(); ?>
<article><h1>Cette page n'existe pas</h1><p>
<?php if (!empty($message) && $message !== '(null)') : ?>
<?= esc($message) ?>
<?php else : ?>
Désolé ! Cette page n'existe plus ou n'a jamais existée.
<?php endif ?>
</p></article>
<?php
$page['contenu'] = ob_get_clean();
echo view('Commun/v_template', $page);
