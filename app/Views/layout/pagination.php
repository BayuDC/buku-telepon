<?php $pager->setSurroundCount(2) ?>

<nav>
    <ul class="uk-pagination uk-flex-center" uk-margin>
        <?php if ($pager->hasPreviousPage()) : ?>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>">
                    <span uk-pagination-previous></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="<?= $link['active'] ? 'uk-active' : '' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span uk-pagination-next></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>