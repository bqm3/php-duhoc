<?php if (!isset($base))
    $base = ''; ?>

<!-- Hero / Breadcrumb Section -->
<section class="vnpc-about-hero" style="background-image: url('<?= $base ?>/assets/img/client/img_background1.png')">
    <!-- Decorative images -->
    <img src="<?= $base ?>/assets/img/client/img_home25.png" class="hero-deco h-deco-1" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home28.png" class="hero-deco h-deco-2" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home26.png" class="hero-deco h-deco-3" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home27.png" class="hero-deco h-deco-4" alt="">

    <div class="container vnpc-about-hero-content">
        <h1 class="vnpc-about-hero-title animate-fade-in-up"><?= $title ?? 'Học Bổng Du Học' ?></h1>
        <?php if (isset($showSearch) && $showSearch): ?>
            <form action="<?= $base ?>/hoc-bong" method="GET" class="vnpc-hero-search animate-fade-in-up"
                style="animation-delay: 0.2s;">
                <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>"
                    placeholder="Nhập từ khóa để tìm kiếm">
                <button type="submit">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.811 18.9119L14.647 13.8308C15.999 12.3617 16.83 10.4187 16.83 8.2807C16.829 3.7071 13.062 0 8.415 0C3.767 0 0 3.7071 0 8.2807C0 12.8543 3.767 16.5613 8.415 16.5613C10.423 16.5613 12.264 15.8668 13.711 14.7121L18.895 19.8133C19.147 20.0623 19.557 20.0623 19.81 19.8133C20.063 19.5645 20.063 19.1608 19.811 18.9119ZM8.415 15.2873C4.482 15.2873 1.295 12.1504 1.295 8.2807C1.295 4.411 4.482 1.2741 8.415 1.2741C12.347 1.2741 15.535 4.411 15.535 8.2807C15.535 12.1504 12.347 15.2873 8.415 15.2873Z"
                            fill="white" />
                    </svg>
                </button>
            </form>
        <?php endif; ?>

        <div class="vnpc-breadcrumb animate-fade-in-up" style="animation-delay: 0.2s;">
            <a href="<?= $base ?>/">Trang chủ</a>
            <?php if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
                <?php foreach ($breadcrumbs as $bc): ?>
                    <span class="sep">//</span>
                    <?php if (!empty($bc['url'])): ?>
                        <a href="<?= $base . $bc['url'] ?>"><?= htmlspecialchars($bc['label']) ?></a>
                    <?php else: ?>
                        <span><?= htmlspecialchars($bc['label']) ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <span class="sep">//</span>
                <span><?= $title ?? 'Giới thiệu' ?></span>
            <?php endif; ?>
        </div>


    </div>
</section>

<style>
    /* Search Form Styling */
    .vnpc-hero-search {
        max-width: 800px;
        width: 100%;
        margin: 0 auto 30px;
        position: relative;
        display: flex;
        align-items: center;
        background: white;
        border-radius: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .vnpc-hero-search input {
        flex: 1;
        padding: 18px 30px;
        border: none;
        outline: none;
        font-size: 16px;
        color: #4D5756;
        background: transparent;
    }

    .vnpc-hero-search input::placeholder {
        color: #999;
    }

    .vnpc-hero-search button {
        width: 120px;
        height: 60px;
        background: #2777C4;
        border: none;
        border-radius: 0 30px 30px 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
        flex-shrink: 0;
    }

    .vnpc-hero-search button:hover {
        background: #1e5fa0;
    }

    .vnpc-hero-search button svg {
        width: 20px;
        height: 20px;
    }
</style>