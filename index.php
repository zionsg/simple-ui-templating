<!--
  This is the index page for the entire website, i.e. its entrypoint, similar to index.html.
  All view template files should include functions.php as the 1st line (excluding comments).
-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>

<?php
// Use of normal PHP code
$body = '
    Test variable scope to see if variable with same name
    is overridden by render().
';
?>

<!-- Render layout view template -->
<?= render('layout.php', ['body' => 'Hello World!']) ?>

<!-- In variable scope of index page -->
<p>&nbsp;</p>
<div>Index Page: <?php echo ($isAdmin ? 'Is Admin' : 'Not Admin'); ?></div>
<code><?= $body ?></code>
