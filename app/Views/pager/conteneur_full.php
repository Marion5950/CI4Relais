
<?php //https://codeigniter4.github.io/userguide/libraries/pagination.html > Creating the View > links() ?>
<?php $pager->setSurroundCount(2) ?>
<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="|<<">
                    <span aria-hidden="true">|<<</span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>" class="pager-next-previous" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?>>
                <a href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>" class="pager-next-previous" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label=">>|">
                    <span aria-hidden="true">>>|</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>