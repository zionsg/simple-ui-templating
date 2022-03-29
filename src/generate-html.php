<?php
/**
 * This converts all the view template files into static HTML webpages
 *
 * Only .php files in the root directory are processed.
 * A folder will be created in the root directory to store the output.
 */

ini_set('allow_url_fopen', 'on'); // required for file_get_contents() to work with localhost url

$outputDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'html-' . microtime(true);
$result = mkdir($outputDir, 0700);
if (!$result) {
    echo "Unable to create directory ${outputDir} to store generated HTML webpages.";
    return;
}

// @todo file_get_contents() seem to have issues with localhost URLs. To try cURL instead.
$fileCnt = 0;
foreach (glob($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '*.php') as $filePath) {
    $filename = basename($filePath);
    $output = file_get_contents("http://{$_SERVER['SERVER_NAME']}:{$_SERVER['SERVER_PORT']}/{$filename}");

    $newFilename = $outputDir . DIRECTORY_SEPARATOR . basename($filePath, '.php') . '.html';
    file_put_contents($newFilename, $output);
    $fileCnt++;
}

echo "Generated {$fileCnt} HTML webpages and stored in {$outputDir}";
