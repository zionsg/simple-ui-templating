<?php include __DIR__ . '/src/functions.php'; ?>
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
    <div class="container">
      <header>
        <?= ('/index.php' === $_SERVER['PHP_SELF'] ? '' : render('pagination.php')) ?>
      </header>

      <main data-render-id="<?= $renderId ?>">
        <?= $body ?>
      </main>

      <footer class="my-5">
        <div class="text-end"><i>Layout View Template: <?= ($isAdmin ? 'Is Admin' : 'Not Admin') ?></i></div>
      </footer>
    </div>

    <script src="/public/vendor/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            window.addEventListener('DOMContentLoaded', (event) => {
                // Enable Bootstrap tooltips site-wide
                Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((tooltipElement) => {
                    return new bootstrap.Tooltip(tooltipElement);
                });
            });
        })();
    </script>
  </body>
</html>
