<!-- // views/layouts/pages/home/index.php -->
<?php if (!isset($base))
    $base = ''; ?>

<?php

?>

<?php include __DIR__ . '/sections/hero.php'; ?>
<div class="d-none d-md-block">
    <?php include __DIR__ . '/sections/spacing.php'; ?>
</div>
<?php include __DIR__ . '/sections/about.php'; ?>
<div class="d-none d-md-block">
    <?php include __DIR__ . '/sections/spacing.php'; ?>
    <?php include __DIR__ . '/sections/strip.php'; ?>
    <?php include __DIR__ . '/sections/spacing.php'; ?>
</div>
<?php include __DIR__ . '/sections/countries.php'; ?>
<?php include __DIR__ . '/sections/scholarships.php'; ?>
<?php include __DIR__ . '/sections/why.php'; ?>
<?php include __DIR__ . '/sections/process.php'; ?>
<?php include __DIR__ . '/sections/consult.php'; ?>
<?php include __DIR__ . '/sections/testimonials.php'; ?>
<?php include __DIR__ . '/sections/blogs.php'; ?>

<?php
include __DIR__ . '/sections/partners.php';
?>