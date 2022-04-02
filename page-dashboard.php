<?php include __DIR__ . '/src/functions.php'; ?>

<!-- Capture HTML in template variable to be passed to rendering of layout view template -->
<?php ob_start(); ?>
  <div>
    <h1 class="text-center">Welcome Back <?= $user['name']; ?>!</h1>
    <p>
      The alignment and order of the 3 columns in the pagination at the top of the page is
      different for mobile and desktop - try resizing the browser.
    </p>
    <p class="text-center">
      This main content panel will automatically take up the remaining width if the left and/or the
      right panels are removed.
    </p>
  </div>
<?php $contentMainHtml = ob_get_clean(); ?>

<!-- This is a page, hence rendered in layout view template -->
<?php
echo render('layout.php', [
    'body' => render('content-panels.php', [
        'contentLeftHtml' => '
            <h2>Left Panel</h2>
            There are actually 3 panels - the right panel is only shown when <code>?admin=1</code>
            is appended to the browser url to simulate an admin login (only works when running
            on localhost server, not in static HTML webpage).
        ',
        'contentMainHtml' => $contentMainHtml,
        'contentRightHtml' =>
            ($isAdmin ? '<h2>Right Panel</h2>Try resizing the browser and see how the panels stack up.' : ''),
    ]),
])
?>
