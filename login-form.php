<?php include __DIR__ . '/src/functions.php'; ?>

<!-- This is just a form, not a page, hence not rendered in layout view template -->
<section data-render-id="<?= $renderId ?>" class="row vh-100 justify-content-center align-items-center">
  <div class="col-12 col-sm-6 col-md-3 col-xl-2">
    <div class="text-center mb-3">
      <img class="img-fluid logo" src="/public/images/logo.svg"
        title="This ambigram looks the same upside-down :)" data-bs-toggle="tooltip" data-bs-placement="right" />
    </div>

    <!-- Neither username or password is highlighted when there is an error to prevent guessing attacks -->
    <form method="POST" action="page-dashboard.php">
      <div class="input-group">
        <span class="input-group-text font-monospace">Username</span>
        <input name="username" required autofocus type="text"
          class="form-control" placeholder="Enter your username here" />
      </div>

      <div class="input-group has-validation mb-3">
        <span class="input-group-text font-monospace">Password</span>
        <input name="password" required type="password" class="form-control"
          placeholder="Enter your password here" />
      </div>

      <div>
        <select name="favorite_food" class="form-select">
          <option value="" selected>Please select your favorite food</option>
          <optgroup label="Fruits">
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="cranberries">Cranberries</option>
          </optgroup>
          <optgroup label="Grain">
            <option value="amaranth">Amaranth</option>
            <option value="broccoli">Buckwheat</option>
            <option value="corn">Corn</option>
          </optgroup>
          <optgroup label="Vegetables">
            <option value="asparagus">Asparagus</option>
            <option value="broccoli">Broccoli</option>
            <option value="carrot">Carrot</option>
          </optgroup>
          <option value="-1">Others</option>
        </select>

        <input name="other_favorite_food" type="text" class="form-control mt-2 d-none"
          placeholder="Enter other food here" />
      </div>

      <div class="mt-3">
        <input type="hidden" name="_csrf" value="<?= $csrfToken ?>" />
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </div>
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

        // Toggle display of other field based on value in dropdown
        let dropdown = view.querySelector('select[name="favorite_food"]');
        let otherField = view.querySelector('input[name="other_favorite_food"]');
        dropdown.addEventListener('change', (event) => {
            let isOthersSelected = (-1 === parseInt(event.target.value));
            otherField.required = isOthersSelected;
            otherField.classList.toggle('d-none', isOthersSelected ? false : true); // remove d-none if Others chosen
        });
        dropdown.dispatchEvent(new Event('change')); // trigger on page load
    })();
</script>
