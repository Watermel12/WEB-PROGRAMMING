<style>
  .bg {
    border-radius: 15px;
  }
</style>
<div class="container">
    <h2 class="my-2">Select Your CV Template</h2>
<div class="card my-3 bg" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="assets/images/cv_t_1.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Default CV Template</h5>
        <p class="card-text">This is a free and simple resume template.</p>
        <a href="<?=$action->helper->url('cv-details/1')?>" class = "btn btn-sm btn-success"><i class="bi bi-file-earmark-plus-fill"></i> Create</a>
      </div>
    </div>
  </div>
</div>
</div>