<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>

<!-- Capture HTML in template variable to be passed to rendering of layout view template -->
<?php ob_start(); ?>
  <div>
    <h1 class="text-center">Welcome Back <?= $user['name']; ?>!</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dictum massa eu rhoncus accumsan.
      Curabitur ultricies elit eu dignissim elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus.
      Maecenas dictum pulvinar posuere. Donec ut urna dignissim, lobortis elit at, consequat erat.
      Cras urna magna, mollis vel tincidunt in, tempor ac massa. Cras egestas in tellus vitae aliquam.
      Aenean elementum lectus ut lectus varius, ut molestie nunc sollicitudin. Donec sed commodo augue.
      Vestibulum maximus in nisl ac faucibus. Sed sit amet arcu sed lacus fermentum feugiat.
    </p>
    <p class="text-center"><i>
      This main content panel will automatically take up the remaining width if the left and/or the
      right panels are removed.
    </i></p>
  </div>
<?php $contentMainHtml = ob_get_clean(); ?>

<!-- This is a page, hence rendered in layout view template -->
<?php
echo render('layout.php', [
    'body' => render('content-panels.php', [
        'contentLeftHtml' => '
            <h2>Left Panel</h2>
            There are actually 3 panels - the right panel is only shown when <code>?admin=1</code>
            is appended to the browser url to simulate an admin login.
        ',
        'contentMainHtml' => $contentMainHtml,
        'contentRightHtml' =>
            ($isAdmin ? '<h2>Right Panel</h2>Try resizing the browser and see how the panels stack up.' : ''),
    ]),
])
?>
