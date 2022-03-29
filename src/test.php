<?php
// To run: http://localhost:8080/src/test.php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
$output = ob_get_clean();

file_put_contents('test.html', $output);
echo 'Generated HTML files.';
