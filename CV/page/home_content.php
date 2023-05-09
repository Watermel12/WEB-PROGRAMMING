<style>
  .bg {
    background-color: white;
    border-radius: 15px;
  }
</style>
<div class = "container">
<a href="<?=$action->helper->url('select-template')?>" class="btn btn-sm btn-primary my-2"><i class="bi bi-plus-circle"></i> Create New Resume</a>
<?php
foreach($resumes as $resume)
{
  ?>
<div class="card my-3 bg">
  <div class="card-body" >
    <h5 class="card-title"><?=$resume['headline']?></h5>
    <p class="card-text"><?=$resume['objective']?></p>
    <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Update</a>
    <a href="<?=$action->helper->url("resume/".$resume['url'])?>" class="btn btn-sm btn-success"><i class="bi bi-binoculars-fill"></i> View</a>
    <a href="<?=$action->helper->url("action/deleteresume/".$resume['url'])?>" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Delete</a>
    <a href="#" class="btn btn-sm btn-dark" onclick="copyurl('<?=$action->helper->url("resume/".$resume['url'])?>')"><i class="bi bi-clipboard-check-fill"></i> Copy Url</a>
    <a href="#" class="btn btn-sm btn-dark"><i class="bi bi-link-45deg"></i> Create Url</a>
  </div>
</div>
<?php
}
if(count($resumes) <1)
{
  ?>
  <div class="card my-3">
  <div class="card-body">
    <h1 class = "text-center text-muted"><i class="bi bi-cloud-lightning-rain-fill"></i> No Resume Available</h1>
  </div>
</div>
  <?php
}
?>
</div>


