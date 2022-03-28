<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple UI Templating</title>

    <link rel="icon" type="image/x-icon" href="/public/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/public/vendor/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/public/css/layout.css">
    <script src="/public/js/utils.js"></script> <!-- must be in <head> for views to access -->
  </head>

  <body>
    <div data-render-id="<?= $renderId ?>" class="container-fluid">
      <div>Layout View Template: <?= ($isAdmin ? 'Is Admin' : 'Not Admin') ?></div>

      <?= $body ?>
    </div>
  </body>
</html>
