<?php
require('dnlib/load.php');

$action->helper->route('/',function()
{
    global $action;
    $data ['title'] = 'CV Online - Make & Share CV Online';
    if($action->user_id() != 0){
        $action->helper->redirect('home');
    }
    else {
        $action->helper->redirect('login');
    }
});

//for logout
$action->helper->route('action/createresume',function()
{
    
    global $action;
    
    $action->onlyForAuthUser();
    $users= $action->session->get('Auth')['data'];
    $user_id = $users['id'];
    $resume_data[0] = $user_id;

    $resume_data[1] = $action->db->clean($_POST['headline']);
    $resume_data[2] = $action->db->clean(str_replace("\r\n", "",$_POST['objective']));
    
    $contact['address'] = $action->db->clean(str_replace("\r\n", "",$_POST['address']));

    $resume_data[3] = json_encode($contact);
    $resume_data[4] = json_encode($_POST['skill']);
    $education=array();
    $work=array();
//////////////////////////
    $certificate=array();
    $refer=array();
foreach($_POST['titles'] as $key=>$value)
    {
$certificate[$key]['titles']=$action->db->clean($value);
$certificate[$key]['or_name']=$action->db->clean($_POST['or_name'][$key]);
$certificate[$key]['cert_duration']=$action->db->clean($_POST['cert_duration'][$key]);
    }
    var_dump($certificate);
foreach($_POST['re_name'] as $key=>$value)
    {
$refer[$key]['re_name']=$action->db->clean($value);
$refer[$key]['re_email']=$action->db->clean($_POST['re_email'][$key]);
$refer[$key]['re_number']=$action->db->clean($_POST['re_number'][$key]);
$refer[$key]['re_relate']=$action->db->clean($_POST['re_relate'][$key]);
    }
/////////////////////////
foreach($_POST['college'] as $key=>$value)
    {
$education[$key]['college']=$action->db->clean($value);
$education[$key]['course']=$action->db->clean($_POST['course'][$key]);
$education[$key]['e_duration']=$action->db->clean($_POST['e_duration'][$key]);
    }

foreach($_POST['company'] as $key=>$value)
    {
$work[$key]['company']=$action->db->clean($value);
$work[$key]['jobrole']=$action->db->clean($_POST['jobrole'][$key]);
$work[$key]['w_duration']=$action->db->clean($_POST['w_duration'][$key]);
$work[$key]['work_desc']=$action->db->clean(str_replace("\r\n", "", $_POST['work_desc'][$key]));
    }
    $resume_data[6] = json_encode($work);
    $resume_data[7] = json_encode($education);
    $resume_data[8] = json_encode($certificate);
    $resume_data[9] = json_encode($refer);
    $resume_data[10] = $action->helper->UID();
    $run=$action->db->insert('resumes', 'user_id,headline,objective,contact,skills,experience,education,certificate,reference,url', $resume_data);
    if($run)
    {
         $action->session->set('success', 'resume created');
         $action->helper->redirect('home'); 
    }else
    {
        $action->session->set('error', 'something went wrong, try again later');
        $action->helper->redirect('home');
    }
   
    
});

//for delete
$action->helper->route('action/deleteresume/$url',function($data)
{
    global $action;
    $url=$data['url'];
    $action->db->delete('resumes', "url='$url'");
    $action->session->set('success', 'resume deleted !');
    $action->helper->redirect('home');
});

//for logout
$action->helper->route('action/logout',function()
{
    global $action;
    $action->session->delete('Auth');
    $action->session->set('success', 'logged out !');
    $action->helper->redirect('login');
});


// for template
$action->helper->route('cv-details/$cvtype',function($data)
{
    global $action;
    $action->onlyForAuthUser();
    $data ['title'] = "CV Details";
    $data ['myresume'] = 'active';
    $action->view->load('header', $data);

    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 250%;
    }
    </style>";

    $action->view->load('navbar',$data);

    if($data['cvtype']==1)
    {
        $action->view->load('cv_details_1');
    }else
    {
        $action->session->set('error','invalid resume type');
        
        $action->helper->redirect('select-template');
        
    }
    
    $action->view->load('footer');

});

// for template
$action->helper->route('select-template',function()
{
    global $action;
    $action->onlyForAuthUser();
    $data ['title'] = "Select CV Template";
    $data ['myresume'] = 'active';
    $action->view->load('header', $data);

    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 100%;
    }
    </style>";

    $action->view->load('navbar',$data);

    $action->view->load('template_content');
   
    
    $action->view->load('footer');

});

// for home
$action->helper->route('resume/$url',function($data)
{
    global $action;
    $resumedata=$action->db->read("resumes","*", "WHERE url='".$data['url']."'" );
    $userdata=$action->db->read("users","full_name,email_id,phone_num,img", "WHERE id='".$action->user_id()."'" );
    if(!$resumedata)
    {
        $action->helper->redirect('home');

    }
    $resumedata=$resumedata[0];
    

    $data ['title'] = $resumedata['headline'];
    $data ['type'] = 1;
    $data['resume']=array_merge($userdata, $resumedata);
    //view resume value
    //var_dump($data['resume']);

    if($data['type']==1)
    {
        $action->view->load('cv_content_1',$data);
    }else
    {
        $action->helper->redirect('home');
    }

});

// for home
$action->helper->route('home',function()
{
    global $action;
    $action->onlyForAuthUser();
    if($action->user_id()){
    $data ['title'] = 'Home';
    $data ['myresume'] = 'active';

    $data['resumes']=$action->db->read('resumes',"*","WHERE user_id=".$action->user_id());

    $action->view->load('header', $data);
    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 100%;
    }
    </style>";
    $action->view->load('navbar',$data);
    $action->view->load('home_content',$data);
    $action->view->load('footer');
    }
});
$action->helper->route('profile',function()
{
    global $action;
    $action->onlyForAuthUser();
    if($action->user_id()){
    $data ['title'] = 'Profile';
    $data ['myresume'] = 'active';

    $data['resumes']=$action->db->read('resumes',"*","WHERE user_id=".$action->user_id());

    $action->view->load('header', $data);
    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 150%;
    }
    </style>";
    $action->view->load('navbar',$data);
    $action->view->load('profile',$data);
    $action->view->load('footer');
    }
});



//for login
$action->helper->route('login',function()
{
    global $action;
    $action->onlyForUnauthUser();
    $data ['title'] = 'Login - CVOnline';

    $action->view->load('header', $data);
    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 100%;
    }
    </style>";
    $action->view->load('login_content');
    $action->view->load('footer');
});

// for login action
$action->helper->route('action/login',function()
{
    global $action;
    $error = $action->helper->isAnyEmpty($_POST);
    if($error)
    {
       $action->session->set('error', "$error is empty !");
    }else
    {
        $email = $action->db->clean($_POST['email']);
        $password = $action->db->clean($_POST['password']);
        $users= $action->db->read('users', 'id, email_id', "WHERE email_id='$email'AND password='$password'");
    if(count($users) > 0)
    {
        $action->session->set('Auth', ['status'=>true, 'data'=>$users[0]]);
        $action->session->set('success', 'logged in !');
        $action->helper->redirect('home');
    }
    else
    {
       $action->session->set('error', "incorrect email/password");
       $action->helper->redirect('login');
    }
    }
    
});

//for signup

$action->helper->route('signup',function()
{
    global $action;
    $action->onlyForUnauthUser();
    $data ['title'] = 'SignUp - CVOnline';

    $action->view->load('header', $data);
    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 100%;
    }
    </style>";
    $action->view->load('signup_content');
    $action->view->load('footer');
});

//for signup action
$action->helper->route('action/signup',function()
{
    global $action;
    $error = $action->helper->isAnyEmpty($_POST);
    if($error)
    {
       $action->session->set('error', "$error is empty !");
       $action->helper->redirect('signup');
    }
    else
    {
        $signup_data[0] = $action->db->clean($_POST['full_name']);
        $signup_data[1] = $action->db->clean($_POST['email']);
        $signup_data[2] = $action->db->clean($_POST['phone-num']);
        $signup_data[3] = $action->db->clean($_POST['password']);
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $target_dir = "page/upload_img/";
        $target_file = $target_dir . basename($img_name);
        move_uploaded_file($tmp_name, $target_file);
        $signup_data[4] = $img_name;
        $user=$action->db->read('users', 'email_id', "WHERE email_id='$signup_data[1]'");
        if(count($user) > 0)
        {
            $action->session->set('error', $signup_data[1]." is already registered");
            $action->helper->redirect('signup');

        }
        else{
            $action->db->insert('users', 'full_name, email_id, phone_num, password,img', $signup_data);
            $action->session->set('success', 'account created !');      
            $action->helper->redirect('login');
            
            
        }

        
    }
});
//////////////////////////////////////

$action->helper->route('update',function()
{
    global $action;
    $action->onlyForAuthUser();
    if($action->user_id()){
        $data ['title'] = 'Update';
        $data ['myresume'] = 'active';
    
        $data['users']=$action->db->read('users',"*","WHERE id=".$action->user_id());
    
        $action->view->load('header', $data);
        echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 100%;
    }
    </style>";
        $action->view->load('navbar',$data);
        $action->view->load('update_prof',$data);
        $action->view->load('footer');
        }

});

//for signup action
$action->helper->route('action/update',function()
{
    global $action;
    $ids=$action->user_id();
    $error = $action->helper->isAnyEmpty($_POST);
    if($error)
    {
       $action->session->set('error', "$error is empty !");
       $action->helper->redirect('update');
    }
    else
    {
        $signup_data[0] = $action->db->clean($_POST['full_name']);
        $signup_data[1] = $action->db->clean($_POST['email']);
        $signup_data[2] = $action->db->clean($_POST['phone-num']);
    
            $action->db->update('users', 'full_name, email_id, phone_num', $signup_data,"id=".$action->user_id());
            $action->session->set('success', 'account updated !');      
            $action->helper->redirect('profile');
            
        
    }
});

//////////////////////////////////////
//for search form
$action->helper->route('search', function () {
    global $action;
    $data['title'] = 'Search CV Forms';

    $action->view->load('header', $data);
    echo "<style>
    html,
    body 
    {
        height: 100%;
    }

    body 
    {
        background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 150%;
    }
    </style>";
    $action->view->load('navbar', $data);
    $action->view->load('search_form');
    $action->view->load('footer');
});

$action->helper->route('live_search', function () {
    global $action;
    $data['title'] = 'LiveSearching';
    $action->view->load('livesearch');
});

if(!Helper::$isPageIsAvailable)
{
    $data ['title'] = 'No Page Found';
    $action->view->load('header', $data);
    $action->view->load('navbar',$data);
    $action->view->load('not_found');
    $action->view->load('footer');
}