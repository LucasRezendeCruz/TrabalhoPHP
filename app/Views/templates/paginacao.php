<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="Page navigation example">
    <ul class="pagination">

        <?php if ($pager->getCurrentPageNumber() != 1) : ?>
            <li class="page-item"><a class="page-link" href="<?= $pager->getFirst() ?>">Primeira</a></li>
            <li class="page-item"><a class="page-link" href="<?= $pager->getPreviousPage() ?>">Anterior</a></li>
        <?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
            <li class="page-item"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
        <?php endforeach ?>

        <?php if ($pager->getCurrentPageNumber() != $pager->getPageCount()) : ?>
            <li class="page-item"><a class="page-link" href="<?= $pager->getNextPage() ?>">Próximo</a></li>
            <li class="page-item"><a class="page-link" href="<?= $pager->getLast() ?>">Última</a></li>
        <?php endif ?>

    </ul>
</nav>