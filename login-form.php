<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>

<section data-render-id="<?= $renderId ?>" class="row vh-100 justify-content-center align-items-center">
  <div class="col-12 col-sm-6 col-md-3 col-xl-2">
    <div class="text-center mb-3">
      <img class="img-fluid logo" src="/public/images/logo.svg"
        title="This ambigram looks the same upside-down :)" data-bs-toggle="tooltip" data-bs-placement="right" />
    </div>

    <!-- Neither username or password is highlighted when there is an error to prevent guessing attacks -->
    <form method="POST" action="dashboard.php">
      <div class="input-group">
        <span class="input-group-text font-monospace">Username</span>
        <input name="username" required autofocus type="text" class="form-control"
          placeholder="Enter your username here" />
      </div>

      <div class="input-group has-validation mb-3">
        <span class="input-group-text font-monospace">Password</span>
        <input name="password" required type="password" class="form-control"
          placeholder="Enter your password here" />
      </div>

      <input type="hidden" name="_csrf" value="<?= $csrfToken ?>" />
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</section>

<script>
    (function () {
        let view = document.querySelector('section[data-render-id="<?= $renderId ?>"]');

        // Animate logo
        let logo = view.querySelector('img.logo');
        window.setInterval(
            function () {
                let colors = utils.getRandomColors();
                logo.style.filter = ('#000000' === colors.foreground_color) ? 'none' : 'invert(1)';
                logo.style.background = colors.background_color;
            },
            1000
        );
    })();
</script>
