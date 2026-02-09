<?php
/**
 * Pagination Component
 * @param int $currentPage
 * @param int $totalPages
 * @param string $baseUrl
 */
if (!isset($totalPages) || $totalPages <= 1)
    return;
$currentPage = $currentPage ?? 1;
$baseUrl = $baseUrl ?? '';
?>

<div class="vnpc-pagination">
    <div class="pagination-list">
        <?php if ($currentPage > 1): ?>
            <a href="<?= $baseUrl ?>?page=<?= $currentPage - 1 ?>" class="pagination-item prev">
                <i class="fa fa-chevron-left"></i>
            </a>
        <?php endif; ?>

        <?php
        $start = max(1, $currentPage - 2);
        $end = min($totalPages, $currentPage + 2);

        if ($start > 1) {
            echo '<a href="' . $baseUrl . '?page=1" class="pagination-item">1</a>';
            if ($start > 2)
                echo '<span class="pagination-item dots">...</span>';
        }

        for ($i = $start; $i <= $end; $i++): ?>
            <a href="<?= $baseUrl ?>?page=<?= $i ?>" class="pagination-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php
        if ($end < $totalPages) {
            if ($end < $totalPages - 1)
                echo '<span class="pagination-item dots">...</span>';
            echo '<a href="' . $baseUrl . '?page=' . $totalPages . '" class="pagination-item">' . $totalPages . '</a>';
        }
        ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="<?= $baseUrl ?>?page=<?= $currentPage + 1 ?>" class="pagination-item next">
                <i class="fa fa-chevron-right"></i>
            </a>
        <?php endif; ?>
    </div>
</div>

<style>
    .vnpc-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
        width: 100%;
    }

    .pagination-list {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0px;
        gap: 10px;
    }

    .pagination-item {
        box-sizing: border-box;
        width: 35px;
        height: 35px;
        background: #FFFFFF;
        border: 1px solid #CCCCCC;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #888888;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        transition: all 0.2s ease;
    }

    .pagination-item:hover {
        border-color: #1B99D4;
        color: #1B99D4;
    }

    .pagination-item.active {
        background: #1B99D4;
        border-color: #1B99D4;
        color: #FFFFFF;
    }

    .pagination-item.dots {
        border: none;
        background: transparent;
        cursor: default;
    }

    .pagination-item.prev,
    .pagination-item.next {
        background: rgba(233, 233, 233, 0.9);
    }

    .pagination-item i {
        font-size: 14px;
    }
</style>