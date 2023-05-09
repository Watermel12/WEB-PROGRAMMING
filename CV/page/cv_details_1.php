<style>
  .bg {
    border-radius: 15px;
    background-color: white;
  }
</style>
<div class ="container">
  <h3 class="my-3">Enter your Details</h3>
<form method="post" action="<?=$action->helper->url('action/createresume')?>" class="border border-3 p-2 my-3 bg">
<p class="fs-4"><i class="bi bi-person-bounding-box"></i> Personal Details</p>
<div class="row justify-content-between">
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Headline</label>
    <div class="p-3 bg-warning bg-opacity-10 border border-warning border-start-0 rounded-pill">
      <input type="text" class="form-control" name="headline" placeholder="PHP Developer" id="inputEmail3" required>
    </div>
  </div>
</div>
  <div class="col mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Objective</label>
    <div class="p-3 bg-warning bg-opacity-10 border border-warning border-start-0 rounded">
      <textarea class="w-100" name="objective" required></textarea>
    </div>
  </div>
  <hr>
  <p class="fs-4"><i class="bi bi-person-lines-fill"></i> Contact Details</p>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
    <div class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-pill">
      <input type="text" name="address" placeholder="HCM, Viet Nam" class="form-control" id="inputEmail3" required>
    </div>
    <hr>
  </div>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-tools"></i> Skills</label>
    <div id="skills">
    </div>
    <div class="d-flex gap-2 p-3 bg-warning bg-opacity-10 border border-warning border-start-0 rounded-pill">
    <input type="text" class="form-control" id= "userskill" placeholder="HTML" aria-label="Example text with button addon" aria-describedby="button-addon1">
    <button class="btn btn-primary" type="button" id="addskill"> Add </button>  
</div>

  </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-journal-bookmark-fill"></i> Education</label>
    <div id="educations" class= "">
      
    </div>
    <div class="d-flex gap-2 p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-pill">
      <input type="text" class="form-control" id="college" placeholder = "Bach Khoa University, Ho Chi Minh">
      <input type="text" class="form-control" id="course" placeholder = "Bachelor In Computer Application">
      <input type="text" class="form-control" id="e_duration" placeholder = "2020-2024">
      <button type = "button" class = "btn btn-primary" id="addeducation"> Add </button>
    </div>
  </div>

  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-journal-bookmark-fill"></i> Certificate</label>
    <div id="certificates" class= "">
      
    </div>
    <div class="d-flex gap-2 p-3 bg-warning bg-opacity-10 border border-warning border-start-0 rounded-pill">
      <input type="text" class="form-control" id="titles" placeholder = "IELTS 6.0">
      <input type="text" class="form-control" id="or_name" placeholder = "British Council">
      <input type="text" class="form-control" id="cert_duration" placeholder = "2020-2024">
      <button type = "button" class = "btn btn-primary" id="addcertificate"> Add </button>
    </div>
  </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-briefcase-fill"></i> Experience</label>
    <div id="exps" class= "">
      
    </div>
    <div class="d-flex gap-2 p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-pill">
      <input type="text" class="form-control" id="company" placeholder = "Apple">
      <input type="text" class="form-control" id="jobrole" placeholder = "Graphic Design">
      <input type="text" class="form-control" id="w_duration" placeholder = "2020-2024">
      
    </div>
    <span class="d-block mt-2">About Your Work</span>
    <div class="d-flex gap-2 p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded">
    <textarea id="work_desc" class="w-100"></textarea>
</div>
</br>
    <button type = "button" class = "btn btn-primary" id="addexp"> Add </button>
  </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-journal-bookmark-fill"></i> Reference</label>
    <div id="references" class= "">
      
    </div>
    <div class="d-flex gap-2 p-3 bg-warning bg-opacity-10 border border-warning border-start-0 rounded-pill">
      <input type="text" class="form-control" id="re_name" placeholder = "Dua Hau">
      <input type="email" class="form-control" id="re_email" placeholder = "thang@gmail.com">
      <input type="text" class="form-control" id="re_number" placeholder = "123456789">
      <input type="text" class="form-control" id="re_relate" placeholder = "sister">
      <button type = "button" class = "btn btn-primary" id="addrefer"> Add </button>
    </div>
  </div>
  
  <button type="submit" class="btn btn-success"><i class="bi bi-box2"></i> Create Resume</button>
</form>
</div>
</br>
</br>
</br>