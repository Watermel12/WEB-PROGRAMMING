  
<main class="form-signin w-100 m-auto text-center">
  <form method="post" action = "<?=$action->helper->url('action/login')?>">
    <img class="mb-4" src="assets/images/logo.png" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Login Now</h1>
    <div class="form-floating">
      <input type="email" class="form-control" name = "email" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name = "password" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"> Login </button>
    <a href = "<?=$action->helper->url('signup')?>" class="d-block mt-2 text-decoration-none"">Create New Account !</a>
  </form>
</main>

