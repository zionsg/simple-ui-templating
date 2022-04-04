<?php include __DIR__ . '/src/functions.php'; ?>

<div class="row my-3">
  <div class="col-12 order-3 text-center mt-5 col-sm-4 order-sm-1 text-sm-start mt-sm-0">
    Showing 1 - 10 of 30 results
  </div>

  <div class="col-6 order-2 text-end col-sm-4 order-sm-2 text-sm-center">
    <div class="d-block d-sm-none"> <!-- page dropdown shown only on mobile or small viewport -->
      <label>Page</label>
      <select class="form-select w-auto form-check-inline">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>

    <nav class="d-none d-sm-block"> <!-- page links hidden on mobile or small viewport -->
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#"> <span aria-hidden="true">&laquo;</span></a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>
      </ul>
    </nav>
  </div>

  <div class="col-6 order-1 text-start col-sm-4 order-sm-3 text-sm-end">
    <label>Items Per Page</label>
    <select class="form-select w-auto form-check-inline">
      <option>25</option>
      <option>50</option>
      <option>100</option>
    </select>
  </div>
</div>
