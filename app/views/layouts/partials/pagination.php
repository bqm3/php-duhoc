<?php
/**
 * Pagination Component
 * @param int $currentPage Current page number
 * @param int $totalPages Total number of pages
 * @param string $baseUrl Base URL for pagination links
 */

// Early return if pagination not needed
if (!isset($totalPages) || $totalPages <= 1) {
    return;
}

$currentPage = $currentPage ?? 1;
$baseUrl = $baseUrl ?? '';

// Calculate page range
$start = max(1, $currentPage - 2);
$end = min($totalPages, $currentPage + 2);
?>



<div class="vnpc-pagination">
    <div class="pagination-list">
        <?php
        $separator = (strpos($baseUrl, '?') !== false) ? '&' : '?';
        ?>
        <!-- Previous Button -->
        <?php if ($currentPage > 1): ?>
            <a href="<?= $baseUrl . $separator ?>page=<?= $currentPage - 1 ?>" class="pagination-item prev">
                <i class="fa fa-chevron-left"></i>
            </a>
        <?php else: ?>
            <span class="pagination-item prev disabled">
                <i class="fa fa-chevron-left"></i>
            </span>
        <?php endif; ?>

        <!-- First Page + Dots -->
        <?php if ($start > 1): ?>
            <a href="<?= $baseUrl . $separator ?>page=1" class="pagination-item">1</a>
            <?php if ($start > 2): ?>
                <span class="pagination-item dots">...</span>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Page Numbers -->
        <?php for ($i = $start; $i <= $end; $i++): ?>
            <a href="<?= $baseUrl . $separator ?>page=<?= $i ?>"
                class="pagination-item <?= $i == $currentPage ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <!-- Dots + Last Page -->
        <?php if ($end < $totalPages): ?>
            <?php if ($end < $totalPages - 1): ?>
                <span class="pagination-item dots">...</span>
            <?php endif; ?>
            <a href="<?= $baseUrl . $separator ?>page=<?= $totalPages ?>" class="pagination-item">
                <?= $totalPages ?>
            </a>
        <?php endif; ?>

        <!-- Next Button -->
        <?php if ($currentPage < $totalPages): ?>
            <a href="<?= $baseUrl . $separator ?>page=<?= $currentPage + 1 ?>" class="pagination-item next">
                <i class="fa fa-chevron-right"></i>
            </a>
        <?php else: ?>
            <span class="pagination-item next disabled">
                <i class="fa fa-chevron-right"></i>
            </span>
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
        align-items: center;
        gap: 10px;
    }

    .pagination-item {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
        border: 1px solid #CCCCCC;
        border-radius: 5px;
        text-decoration: none;
        color: #666666;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 16px;
        transition: all 0.2s ease;
    }

    .pagination-item:hover {
        border-color: #1B99D4;
        color: #1B99D4;
        background: #F5FBFF;
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
        pointer-events: none;
        color: #CCCCCC;
    }

    .pagination-item.dots:hover {
        border: none;
        background: transparent;
        color: #CCCCCC;
    }

    /* Previous & Next Buttons - Nổi bật hơn */
    .pagination-item.prev,
    .pagination-item.next {
        background: #FFFFFF;
        border: 1.5px solid #1B99D4;
        color: #1B99D4;
        font-weight: 600;
    }

    .pagination-item.prev:hover,
    .pagination-item.next:hover {
        background: #1B99D4;
        color: #FFFFFF;
    }

    /* Disabled state */
    .pagination-item.disabled {
        background: #F5F5F5;
        border-color: #E0E0E0;
        color: #CCCCCC;
        cursor: not-allowed;
        pointer-events: none;
    }

    .pagination-item i {
        font-size: 14px;
    }
</style>