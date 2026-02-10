<?php if (!empty($internationalInfoPosts)): ?>
    <section class="vnpc-blogs py-5">
        <div class="container-xxl">
            <div class="text-center mb-5">
                <h2 class="section-title">Thông tin du học quốc tế</h2>
                <p class="section-subtitle">Chia sẻ thông tin du học, học bổng của các trường đại học hàng đầu thế giới</p>
            </div>

            <div class="row g-4">
                <!-- Left: Big Post -->
                <div class="col-lg-7">
                    <?php if (isset($internationalInfoPosts[0])):
                        $p = $internationalInfoPosts[0];
                        $pImg = !empty($p['featured_image']) ? ($base . $p['featured_image']) : ($base . '/assets/img/client/placeholder.png');
                        $pUrl = $base . '/' . $p['slug'];
                        ?>
                        <div
                            class="blog-big-card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column bg-white">
                            <a href="<?= $pUrl ?>" class="overflow-hidden">
                                <img src="<?= $pImg ?>" alt="<?= htmlspecialchars($p['title']) ?>"
                                    class="img-fluid w-100 object-fit-cover" style="height: 486px;">
                            </a>
                            <div class="p-4 flex-grow-1 d-flex flex-column">
                                <div class="d-flex align-items-center gap-3 text-muted mb-3 small">
                                    <span><i class="far fa-eye me-1"></i> xem:
                                        <?= number_format($p['count_view'] ?? 0) ?>+
                                    </span>
                                    <span><i class="far fa-calendar-alt me-1"></i>
                                        <?= date('d/m/Y', strtotime($p['created_at'])) ?>
                                    </span>
                                </div>
                                <h3 class="h4 fw-bold mb-3">
                                    <a href="<?= $pUrl ?>" class="text-dark text-decoration-none hover-primary">
                                        <?= htmlspecialchars($p['title']) ?>
                                    </a>
                                </h3>
                                <p class="text-muted mb-0 flex-grow-1">
                                    <?= !empty($p['summary']) ? mb_strimwidth(strip_tags($p['summary']), 0, 250, '...') : '' ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right: 3 Smaller Posts -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        <?php for ($i = 1; $i < 4; $i++): ?>
                            <?php if (isset($internationalInfoPosts[$i])):
                                $p = $internationalInfoPosts[$i];
                                $pImg = !empty($p['featured_image']) ? ($base . $p['featured_image']) : ($base . '/assets/img/client/placeholder.png');
                                $pUrl = $base . '/' . $p['slug'];
                                ?>
                                <div
                                    class="blog-small-card shadow-sm bg-white rounded-3 p-3 d-flex gap-3 border-0 transition-hover">
                                    <div class="flex-shrink-0" style="width: 190px; height: 190px;">
                                        <a href="<?= $pUrl ?>">
                                            <img src="<?= $pImg ?>" alt="<?= htmlspecialchars($p['title']) ?>"
                                                class="w-100 h-100 rounded-2 object-fit-cover">
                                        </a>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center gap-3 text-muted mb-2 small">
                                            <span><i class="far fa-eye me-1"></i>
                                                <?= number_format($p['count_view'] ?? 0) ?>+
                                            </span>
                                            <span><i class="far fa-calendar-alt me-1"></i>
                                                <?= date('d/m/Y', strtotime($p['created_at'])) ?>
                                            </span>
                                        </div>
                                        <h4 class="h6 fw-semibold mb-2 line-clamp-3">
                                            <a href="<?= $pUrl ?>" class="text-dark text-decoration-none hover-primary">
                                                <?= htmlspecialchars($p['title']) ?>
                                            </a>
                                        </h4>
                                        <p class="text-muted mb-0 small line-clamp-3">
                                            <?= !empty($p['summary']) ? mb_strimwidth(strip_tags($p['summary']), 0, 120, '...') : '' ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section-title {
            font-family: 'Farro', sans-serif;
            font-weight: 700;
            font-size: 32px;
            line-height: 40px;
            color: #0E2A46;
        }

        .section-subtitle {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            color: #0E2A46;
            max-width: 578px;
            margin: 0 auto;
        }

        .blog-big-card,
        .blog-small-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-big-card:hover,
        .blog-small-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .hover-primary:hover {
            color: #2777C4 !important;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-small-card .h6 {
            line-height: 1.4;
        }

        .transition-hover {
            transition: all 0.3s ease;
        }

        @media (max-width: 991px) {
            .blog-big-card img {
                height: 350px !important;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 24px;
                line-height: 32px;
            }

            .blog-big-card img {
                height: 250px !important;
            }

            .blog-small-card {
                flex-direction: column;
            }

            .blog-small-card .flex-shrink-0 {
                width: 100% !important;
                height: 250px !important;
            }

            .blog-big-card .p-4 {
                padding: 1.5rem !important;
            }

            .blog-big-card h3 {
                font-size: 1.25rem !important;
            }
        }

        @media (max-width: 576px) {
            .blog-big-card img {
                height: 200px !important;
            }

            .blog-small-card .flex-shrink-0 {
                height: 200px !important;
            }
        }
    </style>
<?php endif; ?>