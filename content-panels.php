<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>

<!--
  Template for rendering content into 3 panels: left, main, right

  The left/right panels may be shown or hidden hence .col-md used for main panel
  which means it will take up any remaining width.

  On mobile, the panels will stack on top of one another, with the main panel on
  top, hence the use .order-*.

  This is a partial template, hence not rendered in layout view template
-->
<div class="row">
  <?php if ($contentLeftHtml): ?>
    <section class="col-12 col-md-2 order-2 order-md-1 panel panel-left">
      <div class="sticky-top">
        <?= $contentLeftHtml ?>
        <p>&nbsp;</p>
      </div>
    </section>
  <?php endif; ?>

  <section class="col-12 col-md order-1 order-md-2 panel panel-main">
    <?= $contentMainHtml ?>
    <p>&nbsp;</p>
  </section>

  <?php if ($contentRightHtml): ?>
    <section class="col-12 col-md-2 order-3 order-md-3 panel panel-right">
      <div class="sticky-top">
        <?= $contentRightHtml ?>
        <p>&nbsp;</p>
      </div>
    </section>
  <?php endif; ?>
</div>
