<?php include __DIR__ . '/src/functions.php'; ?>

<!--
  This is the index page for the entire website, i.e. its entrypoint, similar to index.html.
  All view template files should include functions.php as the 1st line (excluding comments).
-->

<!-- All pages, including this index page, will render layout view template -->
<?= render('layout.php', ['body' => render('login-form.php')]) ?>
