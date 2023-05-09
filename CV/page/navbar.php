<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?=SITE_URL?>">
      <img src="assets/images/logo.png" alt="" height="30" class="d-inline-block align-text-top">
      CV Builder Online
    </a>
      <ul class="navbar-nav">
<?php
if($action->user_id())
{
  ?>
        <li class="nav-item">
          <a class="nav-link <?=@$profile?>" href="<?=$action->helper->url('profile')?>"><i class="bi bi-person-workspace"></i> Profile</a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="<?= $action->helper->url('search') ?>"><i class="bi bi-search"></i>
                        Search CVs</a>
                </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=$action->helper->url('action/logout')?>"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </li>
  <?php
}
?>
       
      </ul>

  </div>
</nav>