<?php
// Copy everything from app/views/admin/assets to public/assets
$src = __DIR__ . '/../app/views/admin/assets';
$dst = __DIR__ . '/../public/assets';

if (!is_dir($src)) {
    fwrite(STDERR, "Source assets directory not found: $src\n");
    exit(1);
}

echo "Copying assets from $src to $dst...\n";

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
foreach ($it as $item) {
    $rel = substr($item->getPathname(), strlen($src) + 1);
    $target = $dst . DIRECTORY_SEPARATOR . $rel;
    if ($item->isDir()) {
        if (!is_dir($target)) mkdir($target, 0755, true);
    } else {
        $dir = dirname($target);
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        if (!copy($item->getPathname(), $target)) {
            fwrite(STDERR, "Failed to copy {$item->getPathname()} -> $target\n");
        }
    }
}

echo "Done copying assets.\n";

// Optionally copy favicon if in view root
$faviconSrc = __DIR__ . '/../app/views/admin/favicon.ico';
if (is_file($faviconSrc)) {
    if (!is_dir($dst)) mkdir($dst, 0755, true);
    copy($faviconSrc, $dst . '/favicon.ico');
    echo "Copied favicon.ico to public/assets/favicon.ico\n";
}

echo "You may now remove the fallback asset serving in the admin route if everything looks good.\n";

// exit
return 0;
