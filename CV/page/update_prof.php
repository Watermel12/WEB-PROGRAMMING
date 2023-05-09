<?php 
  global $action;
  $userdata=$action->db->read("users","full_name,email_id,phone_num,img", "WHERE id='".$action->user_id()."'" );
  $data['user']=$userdata;
  //var_dump($userdata);
?>
<main class="form-signin w-100 m-auto text-center">
  <form method="post" enctype="multipart/form-data" action = "<?=$action->helper->url('action/update')?>">
    <img class="mb-4" src="assets/images/logo.png" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Update account</h1>
    <div class="form-floating">
      <input type="name" class="form-control" id="floatingInput" name="full_name" placeholder="Monu girl" required  value="<?=$userdata[0]['full_name']?>">
      <label for="floatingInput">Full Name</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" name = "email" id="floatingInput" placeholder="name@example.com" required value="<?=$userdata[0]["email_id"]?>">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name = "phone-num" id="floatingInput" placeholder="012345678"  value="<?=$userdata[0]["phone_num"]?>" required>
      <label for="floatingInput">Phone number</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"> Update </button>
  </form>
  <script>
</script>
</main>

