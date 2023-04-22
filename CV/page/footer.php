 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
 <script src="assets/js/main.js"></script>
 <script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'bottom-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
 <?php
 $error = $action->session->get('error');
 $success = $action->session->get('success');
 
 //error
 if($error)
 {
    ?>
    
Toast.fire({
  icon: 'warning',
  title: '<?=$error?>'
});
    <?php
    $action->session->delete('error');
 }

 //success
if($success)
 {
    ?>
    
Toast.fire({
  icon: 'success',
  title: '<?=$success?>'
});
    <?php
    $action->session->delete('success');
 }
 ?>
// addskill 
$("#addskill").click(function()
{
  var skill=$('#userskill').val();
  if(!skill)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a skill'
});
return;
  }
$("#skills").append(`<span class="badge bg-warning p-2 m-1"> ${skill} <input type='hidden' name='skill[]' value='${skill}'/> <span class="text-black removeskill" onclick='removeskill(this)'>X</span></span>`)
$('#userskill').val('');
});
//add education
  $("#addeducation").click(function()
{
  var college = $('#college').val();
  var course = $('#course').val();
  var e_duration= $('#e_duration').val();

//e_duration
  if(!e_duration)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a course duration',
});
return;
  }

//course
  if(!course)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a course',
});
return;
  }

//college
  if(!college)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a colleg/institute',
});
return;
  }


  $("#educations").append(`<div class="d-inline-block border rounded p-2 m-2">
<input type="hidden" name="college[]" value="${college}">
<input type="hidden" name="course[]" value="${course}">
<input type="hidden" name="e_duration[]" value="${e_duration}">
        <h4>${college}</h4>
        <p>${course} - (${e_duration})</p>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeeducation(this)">Remove</button>
      </div>`)
 $('#college').val('');
 $('#course').val('');
$('#e_duration').val('');
});


//add education
$("#addexp").click(function()
{
  var company = $('#company').val();
  var jobrole = $('#jobrole').val();
  var w_duration= $('#w_duration').val();
  var about= $('#work_desc').val();

//w_duration
  if(!w_duration)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a work duration',
});
return;
  }

//company
  if(!company)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a company',
});
return;
  }

//jobrole
  if(!jobrole)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a jobrole',
});
return;
  }

  $("#exps").append(`<div class="d-inline-block border rounded p-2 m-2">
<input type="hidden" name="company[]" value="${company}">
<input type="hidden" name="jobrole[]" value="${jobrole}">
<input type="hidden" name="w_duration[]" value="${w_duration}">
<textarea class="d-none" name="work_desc[]"> 
${about}
</textarea>
        <h4>${company}</h4>
        <p>${jobrole} - (${w_duration})</p>
        <p>${about}</p>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeexp(this)">Remove</button>
      </div>`)
 $('#company').val('');
 $('#jobrole').val('');
$('#w_duration').val('');
$('#work_desc').val('');
});

function removeskill(button)
{
  $(button).parent().remove();
}

function removeeducation(button)
{
  $(button).parent().remove();
}

function removeexp(button)
{
  $(button).parent().remove();
}
function copyurl(url)
{
  navigator.clipboard.writeText(url);
  Toast.fire({
  icon: 'success',
  title: 'share link copied',
});
}
 </script>
</body>
</html>