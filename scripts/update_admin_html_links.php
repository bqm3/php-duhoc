<?php
// Update admin html/php files to use /assets/ absolute paths and /admin/ html links
$root = __DIR__ . '/../app/views/admin';
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS));
$files = [];
foreach ($rii as $f) {
    if ($f->isFile()) {
        $ext = strtolower(pathinfo($f->getFilename(), PATHINFO_EXTENSION));
        if (in_array($ext, ['html', 'php'])) $files[] = $f->getPathname();
    }
}

foreach ($files as $file) {
    $orig = file_get_contents($file);
    $new = $orig;

    // assets -> /assets/
    $new = preg_replace('#(href|src)=("|\')assets/#i', '$1=$2/assets/', $new);

    // favicon
    $new = preg_replace('#href=("|\')favicon\.ico("|\')#i', 'href=$1/assets/favicon.ico$2', $new);

    // relative html links -> /admin/<page>.html (but skip absolute links)
    $new = preg_replace_callback('#href=("|\')(?!/|https?://)([^"\']+?\.html)("|\')#i', function($m){
        return 'href='.$m[1].'/admin/'.$m[2].$m[3];
    }, $new);

    if ($new !== $orig) {
        file_put_contents($file, $new);
        echo "Updated: $file\n";
    }
}

echo "Done updating admin html links.\n";
