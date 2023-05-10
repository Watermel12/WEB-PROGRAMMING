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


//add exp
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
/////////////////////////////////////////////////////

$("#addcertificate").click(function()
{
  var titles = $('#titles').val();
  var or_name = $('#or_name').val();
  var cert_duration= $('#cert_duration').val();

//e_duration
  if(!cert_duration)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a certificate duration',
});
return;
  }

//course
  if(!or_name)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a organize name',
});
return;
  }

//college
  if(!titles)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter a certificate title',
});
return;
  }


  $("#certificates").append(`<div class="d-inline-block border rounded p-2 m-2">
<input type="hidden" name="titles[]" value="${titles}">
<input type="hidden" name="or_name[]" value="${or_name}">
<input type="hidden" name="cert_duration[]" value="${cert_duration}">
        <h4>${titles}</h4>
        <p>${or_name} - (${cert_duration})</p>
        <button type="button" class="btn btn-sm btn-danger" onclick="removecerti(this)">Remove</button>
      </div>`)
 $('#titles').val('');
 $('#or_name').val('');
$('#cert_duration').val('');
});


/////////////////////////////////////////////////////

$("#addrefer").click(function()
{
  var re_name = $('#re_name').val();
  var re_email = $('#re_email').val();
  var re_number= $('#re_number').val();
  var re_relate= $('#re_relate').val();

//e_duration
if(!re_relate)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter reference relation',
});
return;
  }
//e_duration
if(!re_number)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter reference phone number',
});
return;
  }
//course
  if(!re_email)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter reference email',
});
return;
  }

//college
  if(!re_name)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter referece name',
});
return;
  }


  $("#references").append(`<div class="d-inline-block border rounded p-2 m-2">
<input type="hidden" name="re_name[]" value="${re_name}">
<input type="hidden" name="re_email[]" value="${re_email}">
<input type="hidden" name="re_number[]" value="${re_number}">
<input type="hidden" name="re_relate[]" value="${re_relate}">
        <h4>${re_name}</h4>
        <p>${re_email} - ${re_number}</p>
        <p>${re_relate}</p>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeref(this)">Remove</button>
      </div>`)
 $('#title').val('');
 $('#or_name').val('');
$('#c_duration').val('');
});
function showResult(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "live_search?q=" + str, true);
    xmlhttp.send();
}
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
// addskill 
$("#addinfor").click(function()
{
  var userinfo=$('#userinfo').val();
  if(!userinfo)
  {
    Toast.fire({
  icon: 'warning',
  title: 'enter an additional information'
});
return;
  }
$("#addinfo").append(`<span class="badge bg-warning p-2 m-1"> ${userinfo} <input type='hidden' name='userinfo[]' value='${userinfo}'/> <span class="text-black removeinfo" onclick='removeinfo(this)'>X</span></span>`)
$('#userinfo').val('');
});
//////////////////////////////////////////////////////
function removeskill(button)
{
  $(button).parent().remove();
}

function removeeducation(button)
{
  $(button).parent().remove();
}

function removecerti(button)
{
  $(button).parent().remove();
}

function removeexp(button)
{
  $(button).parent().remove();
}

function removeref(button)
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