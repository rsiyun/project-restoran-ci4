<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>" class="page-link">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?> class="page-item">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>