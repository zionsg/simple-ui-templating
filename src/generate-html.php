<?php
/**
 * This converts all the view template files into static HTML webpages
 *
 * Only .php files in the root directory are processed.
 * A folder will be created in the root directory to store the output.
 */

$outputDir = __DIR__ . '/../html-' . microtime(true);
$result = mkdir($outputDir, 0700);
if (!$result) {
    echo "Unable to create directory ${outputDir} to store generated HTML webpages.";
    return;
}

// file_get_contents() seems to have issues with localhost URLs, cURL requires additional libraries,
// hence use include()
$fileCnt = 0;
foreach (glob(__DIR__ . '/../*.php') as $filePath) {
    ob_start();
    include $filePath;
    $output = ob_get_clean();

    // Replace /public/ with ../public, .php with .html in generated HTML webpages
    // This does not handle url() in linked CSS stylesheets or localhost urls in JS scripts
    $output = preg_replace(
        ['/\\/public\\//', '/\\.php/'],
        ['../public/', '.html'],
        $output
    );

    $newFilename = $outputDir . DIRECTORY_SEPARATOR . basename($filePath, '.php') . '.html';
    file_put_contents($newFilename, $output);
    $fileCnt++;
}

echo "Generated {$fileCnt} HTML webpages and stored in <code>{$outputDir}</code>.";
