<?php
// app/views//schools/index.php
?>

<?php partial('layouts/pages/base/base_hero', [
    'title' => $title ?? 'Tìm trường',
    'breadcrumbs' => [
        ['label' => 'Tìm trường', 'url' => '']
    ]
]) ?>

<div class="schools-filter-section">
    <form action="<?= $base ?>/tim-truong" method="GET">
        <!-- Row 1: Keyword + Search Button -->
        <div class="filter-row">
            <div class="search-input-group">
                <i class="fa-solid fa-magnifying-glass" style="color: #4C4C4C;"></i>
                <input type="text" name="keyword" value="<?= htmlspecialchars($filters['keyword']) ?>"
                    placeholder="Nhập từ khóa">
            </div>
            <button type="submit" class="search-btn">Tìm kiếm</button>
            <?php if (!empty($filters['keyword']) || $filters['country_id'] > 0 || $filters['city_id'] > 0 || $filters['edu_level_id'] > 0 || $filters['is_scholarship'] !== ''): ?>
                <a href="<?= $base ?>/tim-truong" class="reset-btn" title="Bỏ lọc">
                    <i class="fa-solid fa-rotate-right"></i>
                </a>
            <?php endif; ?>
        </div>

        <!-- Row 2: Dropdowns -->
        <div class="filter-row">
            <div class="filter-select-group">
                <select name="country_id" onchange="this.form.submit()">
                    <option value="">Chọn quốc gia</option>
                    <?php foreach ($filterData['countries'] as $c): ?>
                        <option value="<?= $c['id'] ?>" <?= $filters['country_id'] == $c['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($c['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-select-group">
                <select name="city_id" onchange="this.form.submit()">
                    <option value="">Chọn bang/ tỉnh</option>
                    <?php foreach ($filterData['cities'] as $city): ?>
                        <option value="<?= $city['id'] ?>" <?= $filters['city_id'] == $city['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($city['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-select-group">
                <select name="edu_level_id" onchange="this.form.submit()">
                    <option value="">Chọn bậc học</option>
                    <?php foreach ($filterData['eduLevels'] as $lv): ?>
                        <option value="<?= $lv['id'] ?>" <?= $filters['edu_level_id'] == $lv['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($lv['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-select-group">
                <select name="is_scholarship" onchange="this.form.submit()">
                    <option value="">Học bổng</option>
                    <option value="1" <?= $filters['is_scholarship'] === '1' ? 'selected' : '' ?>>Có</option>
                    <option value="0" <?= $filters['is_scholarship'] === '0' ? 'selected' : '' ?>>Không</option>
                </select>
            </div>
        </div>
    </form>
</div>

<div class="container py-5">
    <?php if (!empty($schools)): ?>
        <div class="row g-4 mb-5">
            <?php foreach ($schools as $school): ?>
                <div class="col-lg-6">
                    <?php
                    $link = $base . '/truong/' . $school['slug'];
                    $isNew = (time() - strtotime($school['created_at'])) < (7 * 24 * 60 * 60);
                    ?>
                    <a href="<?= $link ?>" class="school-card">
                        <?php if ($isNew): ?>
                            <div class="new-badge">
                                <span class="new-text">New</span>
                            </div>
                        <?php endif; ?>

                        <div class="school-top-row">
                            <div class="school-logo-wrapper">
                                <img src="<?= $school['image_url'] ? $base . $school['image_url'] : $base . '/assets/images/no-school-logo.png' ?>"
                                    alt="<?= htmlspecialchars($school['name']) ?>" class="school-logo-img">
                            </div>

                            <div class="school-info-col">
                                <h3 class="school-name"><?= htmlspecialchars($school['name']) ?></h3>

                                <div class="school-meta-grid">
                                    <div class="meta-row">
                                        <div class="meta-item">
                                            <span class="meta-label">Quốc gia:</span>
                                            <span
                                                class="meta-value"><?= htmlspecialchars($school['country_name'] ?? 'N/A') ?></span>
                                        </div>
                                        <div class="meta-item">
                                            <span class="meta-label">Tỉnh/TP:</span>
                                            <span
                                                class="meta-value"><?= htmlspecialchars($school['city_name'] ?? 'N/A') ?></span>
                                        </div>
                                    </div>
                                    <div class="meta-item">
                                        <span class="meta-label">Bậc học:</span>
                                        <span
                                            class="meta-value"><?= htmlspecialchars($school['education_level_name'] ?? 'N/A') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="school-bottom-row">
                            <div class="tuition-badge">
                                <span class="tuition-label">Học phí (tham khảo):</span>
                                <span
                                    class="tuition-value"><?= $school['tuition_fee'] ? htmlspecialchars($school['tuition_fee']) : 'Liên hệ' ?></span>
                            </div>

                            <div class="school-date">
                                <i class="fa-regular fa-calendar-days school-date-icon"></i>
                                <span class="date-text"><?= date('d/m/Y', strtotime($school['created_at'])) ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php partial('layouts/partials/pagination', [
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'baseUrl' => $base . '/tim-truong'
        ]); ?>
    <?php else: ?>
        <div class="text-center py-5 shadow-sm rounded-4 bg-light">
            <i class="fa fa-school fa-4x text-muted mb-3"></i>
            <h3>Chưa có trường học nào</h3>
            <p class="text-muted">Chúng tôi sẽ sớm cập nhật danh sách các trường học.</p>
        </div>
    <?php endif; ?>
</div>