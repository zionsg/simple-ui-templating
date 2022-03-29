<!--
  This is the index page for the entire website, i.e. its entrypoint, similar to index.html.
  All view template files should include functions.php as the 1st line (excluding comments).
-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>

<!-- Render layout view template -->
<?= render('layout.php', ['body' => render('login-form.php')]) ?>
