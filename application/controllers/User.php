<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{

    /**
     * User Controller
     *
     * @package        User Controller
     * @version        1.0
     * @since        11-Apr-2018
     */

    private $json_param = array();


    public function __construct()
    {
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Login/Signup View
    public function index()
    {
        // Temporary redirect
        //redirect(l('user/login'));
        global $config;

        // Redirect user if session set
        if($this->userid  > 0){
            redirect(l(''));
        }
        // Get banner
        //$data['banner'] = $this->model_inner_banner->find_by_pk(2);
        // Sign up / Login main page
        //$this->load_view('login', $data);
        $data['login'] = $this->model_cms_page->get_page(15);
        $data['register'] = $this->model_cms_page->get_page(16);
        $this->load_view('index', $data);
    }

    public function register_consignor()
    {
        // Temporary redirect
        //redirect(l('user/login'));
        global $config;

        // Redirect user if session set
        if($this->userid  > 0){
            redirect(l(''));
        }
        // Get banner
        //$data['banner'] = $this->model_inner_banner->find_by_pk(2);
        // Sign up / Login main page
        //$this->load_view('login', $data);
        $data['login'] = $this->model_cms_page->get_page(15);
        $data['register'] = $this->model_cms_page->get_page(16);
        $this->load_view('consignor', $data);
    }

    public function register_volunteer()
    {
        // Temporary redirect
        //redirect(l('user/login'));
        global $config;

        // Redirect user if session set
        if($this->userid  > 0){
            redirect(l(''));
        }
        // Get banner
        //$data['banner'] = $this->model_inner_banner->find_by_pk(2);
        // Sign up / Login main page
        //$this->load_view('login', $data);
        $data['login'] = $this->model_cms_page->get_page(15);
        $data['register'] = $this->model_cms_page->get_page(16);
        $this->load_view('volunteer', $data);
    }

    // Login Viewlogin-process
    public function login()
    {
        global $config;


        redirect(l('user'));


        // Redirect user if session set
        if($this->userid){
            redirect(l('account'));
        }
        // Get banner
        $data['banner'] = $this->model_inner_banner->find_by_pk(8);
        // Sign up / Login main page
        $this->load_view('login', $data);
    }

    // Sign up View
    public function register()
    {
        global $config;

        redirect(l('user'));

        // Redirect user if session set
        if($this->userid){
            redirect(l(''));
        }
        // Get banner
        $data['banner'] = $this->model_banner->get_banners(7);
        // Get Countries
        //$data['countries'] = $this->model_country->find_all_active();
        // Sign up / Login main page
        $this->load_view('register', $data);
    }

    // Sign up View
    public function signup()
    {
        global $config;

        // Redirect user if session set
        if($this->userid){
            redirect(l(''));
        }
        // Get banner
        $data['banner'] = $this->model_inner_banner->find_by_pk(7);
        // Get Countries
        //$data['countries'] = $this->model_country->find_all_active();
        // Sign up / Login main page
        $this->load_view('signup', $data);
    }

    // Insert Record
    public function save()
    {
        global $config;
        // debug($_POST);
        // Get post data
        $signup = $this->input->post('signup');


        if (array_filled($signup) > 0) {

            $custom_rule = array(
                'signup_password_confirm'=>array(
                    'field'=>'signup_password_confirm',
                    'label'=>'Confirm Password',
                    'rules'=>'required|md5|trim|matches[signup[signup_password]]'
                )
            );

            /*$custom_rule = array(
                'checkbox'=>array(
                    'field'=>'checkbox',
                    'label'=>'Terms & Conditions',
                    'rules'=>'required'
                )
            );*/

            // Validation success
            if ($this->validate("model_signup", $custom_rule)) {
            //if ($this->validate("model_signup")) {
                // Add token for email validation
                //$signup['signup_token'] = md5(time());
                $signup['signup_token'] = "";
                $signup['signup_status'] = 1;
                $signup['signup_password'] = md5($signup['signup_password']);

                // Set profile image data
                if(!empty($_FILES['signup']))
                    $signup['signup_logo_image']=$_FILES['signup'];

                $this->model_signup->set_attributes($signup);
                $inserted_id = $this->model_signup->save($signup);
          
                // Record insert successfully
                if($inserted_id > 0)
                {
                    // debug($inserted_id);
                    if(ENVIRONMENT!='development'){
                        //debug($_POST);
                        //debug($signup,1);
                        // Send confirmation email
                        //$this->model_email->_verification_email($signup,$inserted_id);
                        //sleep(2);
                        // Welcome email
                        $this->model_email->send_user_active_email($signup,$inserted_id);
                        
                     

                    }

                    //$this->model_signup->auto_login($inserted_id);

                    $this->json_param['status'] = true;
                    //$this->json_param['txt'] = 'Thanks for registration. Please check your inbox for account verification.';
                    $this->json_param['txt'] = 'Successfully registered. Info sent on email';
                }
                // Record not insert
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['txt'] = 'Something went wrong.Please try later.';
                }

            }
            // Validation failed
            else {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = validation_errors();
            }
        }
        echo json_encode($this->json_param);
    }

    // Email Verification
    public function confirmation()
    {
        // Get data
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        if((!empty($email)) && (!empty($token))){
            // Where condition
            $params['where']['signup_email'] = $email;
            $params['where']['signup_token'] = $token;

            // Run query
            $query = $this->model_signup->find_one($params);

            //Check record found or not
            if(count($query)>0){
                // Change user status active
                $upd_data = array(
                    'signup_token'=>'',
                    'signup_status'=>1
                );

                $upd_query = $this->model_signup->update_by_pk($query['signup_id'],$upd_data);
                $msg = 'Thank you! Your Email has been verified successfully.';
                redirect(l('?msgtype=success&msg=' . urlencode($msg)));
            }
            else{
                $msg = 'Something went wrong.Please try later.';
                redirect(l('404'));
            }
        }
        else{
            $msg = 'Invalid credentials.';
            redirect(l('?msgtype=error&msg=' . urlencode($msg)));
        }
    }

    // Login action
    public function login_process()
    {
        // Get post data
        $login = $this->input->post('signup');
        //debug($login,1);
        //$refer_url = $this->input->post('refer');

        if(array_filled(array_filter($login)) > 0)
        {
             //debug($login,1);
            // Set params
            $params['where']['signup_id'] = $login['signup_id'];
            // Query
            $params['where']['signup_status !='] = STATUS_DELETE;
            $data = $this->model_signup->find_one($params);
            // debug($data,1);
            // Login success
            if($login['signup_id'] == $data['signup_id'] && (md5($login['signup_password'])) ==
                $data['signup_password']  && ($data['signup_status']=='1'))
            {
                // Set user session (session will be set on layout data
                $this->model_signup->set_user_session($data);
                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Login successfully.';
                //$this->json_param['refer'] = (isset($refer_url))?$refer_url:g('base_url');
            }
            // Deleted Account
            elseif($data['signup_status']=='2'){
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Account is Deleted.';
            }
            // Inactive and unverified
            elseif($data['signup_status']=='0' && (!empty($data['signup_token']))){
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Account verification is required.Kindly Check your inbox.';
            }
            // In active
            elseif($data['signup_status']=='0'){
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Account is pending until approval by Admin.';
            }
            // Login fail
            else
            {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Invalid email / password';
                //$this->json_param['refer'] = g('base_url');
            }

        }
        else{
            $this->json_param['status'] = false;
            $this->json_param['txt'] = 'Fields required';
            //$this->json_param['refer'] = g('base_url');
        }
        echo json_encode($this->json_param);

    }

    // Load edit user view
    public function edit()
    {
        // Redirect user if session not set
        if($this->session->userdata('userdata')==null){
            redirect(l('login'));
        }

        // Define layout
        $this->layout = 's8_main';

        // Set body class
        $this->layout_data['body_class'] = "responsive timelineBody";

       // Define page
        $this->load_view('edit_profile');
    }

    // Check user password
    public function password_check($str)
    {
        $user_id = $this->session->userdata('userdata')['signup_id'];
        $params['where']['signup_id'] = $user_id;
        $params['where']['signup_password'] = md5($str);
        if($this->model_signup->find_one($params, true)){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('password_check', lang('invalid_pass'));
            return FALSE;
        }
    }

    // Delete Record
    public function delete()
    {

    }

    // // Forgot Password
    // public function forgot()
    // {
    //     // Get Post Data
    //     $email = $this->input->post('signup');
    //     // Get Captcha
    //     $captcha_answer = $this->input->post('g-recaptcha-response');

    //     // check Input data empty or not
    //     $this->form_validation->set_rules('signup[signup_email]', 'Email', 'required|valid_email');
    //     // Set validation rules for google captcha
    //     $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');
    //     $this->form_validation->set_error_delimiters("<span style=\"color:white;\" for=\"%s\" class=\"has-error help-block\">", '</span>');

    //     if ($this->form_validation->run() == FALSE)
    //     {
    //         $this->json_param['status'] = false;
    //         $this->json_param['txt'] = validation_errors();
    //     }
    //     else
    //     {
    //         // Verify user's answer
    //         $response = $this->recaptcha->verifyResponse($captcha_answer);
    //         // Processing ...
    //         if ($response['success']) {
    //             // Send email
    //             // Query to check email exists or not
    //             $params['where']['signup_email'] = $email['signup_email'];
    //             $query = $this->model_signup->find_one_active($params);
    //             if(count($query)>0){
    //                 // Remove old token if exist
    //                 $where_params['where']['token_user_id'] = $query['signup_id'];
    //                 $data = array(
    //                     'token_status'=>STATUS_INACTIVE
    //                 );
    //                 $this->model_token->update_model($where_params,$data);
    //                 // Generate token
    //                 $token = md5(time());
    //                 $data = array(
    //                     'token_user'=>$token,
    //                     'token_user_id'=>$query['signup_id'],
    //                     'token_status'=>1
    //                 );
    //                 // Save token
    //                 $this->model_token->set_attributes($data);
    //                 $this->model_token->save();

    //                 // debug($query,1);
    //                 // Send email
    //                 // CHANGE THIS FOR OTHER PROJECT
    //                 $this->model_email->_notification_forgot_password($query,$token);
    //                 //$this->model_email->_notification_forgot_password_smtp($query,$token);
    //                 $this->json_param['status'] = true;
    //                 $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
    //             }
    //             else{
    //                 $this->json_param['status'] = true;
    //                 $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
    //             }
    //         }
    //         else{
    //             // Something goes wrong
    //             $this->json_param['status'] = 0;
    //             $this->json_param['txt'] = 'Captcha not verified';
    //         }
    //     }
    //     echo json_encode($this->json_param);

    // }


    // Forgot Password View
    // public function forgot_password()
    // {
    //   // debug($_POST,1);
    //     // Get Post Data
    //     $email = $this->input->post('signup');
    //     // debug($email,1);
    //      // check Input data empty or not
    //     $this->form_validation->set_rules('signup[signup_email]','Email','required|valid_email');
    //     //$this->form_validation->set_error_delimiters("<span style=\"color:white;\" for=\"%s\" class=\"has-error help-block\">", '</span>');
        
    //     if ($this->form_validation->run() == FALSE)
    //     {
    //         $this->json_param['status'] = false;
    //         $this->json_param['txt'] = validation_errors();
    //     }
    //     else
    //     {
    //             // Send email
    //             // Query to check email exists or not
    //         $params['where']['signup_email'] = $email['signup_email'];
    //         $query = $this->model_signup->find_one_active($params);
    //         // debug($query,1);
    //         if(count($query) > 0){
    //             //debug($query,1);
    //                 // Send email
    //                 // CHANGE THIS FOR OTHER PROJECT
    //             $this->model_email->_notification_forgot_password($query);
    //             //debug($query);
    //             $this->json_param['status'] = true;
    //             $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
    //         }
    //         else{
    //             $this->json_param['status'] = true;
    //             $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
    //         }
    //     }
    //      echo json_encode($this->json_param);

    //     $this->load_view('forgot_password');
    // }
    
     public function forgotpasswordclient(){
        
        if($this->userid > 0){
            redirect(g('base_url'));
        }

        $banner = $this->model_inner_banner->find_by_pk(5);
        $data['banner'] = Links::img($banner['banner_image_path'],$banner['banner_image']);


        $data['breadcrumb'] = array('child_one'=>"Login",'child_two'=>'');
        $this->load_view("forgot_password" , $data);
    }


    public function forgot_password_email(){

        $signupdata = $this->model_signup->find_one(
            array('where'=>array('signup_email'=>$_POST['signup']['signup_email']))
        );
        //debug($signupdata);
        if(count($signupdata) > 0){
            // $title = 'Forgot Password';
            // $signupdata['id'] = md5($signupdata['signup_email']).'&user='.$signupdata['signup_id'];
            // $template = $this->load->view("_layout/email_template/forgotpassword",$signupdata,true);
            // // echo $template;exit;         
            // $to = $signupdata['signup_email'];
            //debug($to,1);
            // parent::client_email($to,$template,$title);
            $this->model_email->_notification_forgot_password($signupdata);
            echo json_encode(array('status'=>1, 'txt'=>'Successfull Please Check Your E-Mail '));

        }
        else{
            echo json_encode(array('status'=>0,'txt'=>'Email not found, Please enter your correct email address.'));
        }
    }

    public function reset_password()
    {
        // Get Post data
        $user_id  = $this->input->post('user_id');
        $token    = $this->input->post('token');
        $password = $this->input->post('password');

        // check Input data empty or not
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('token', 'Token', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_error_delimiters("<span style=\"color:white;\" for=\"%s\" class=\"has-error help-block\">", '</span>');

        // Validation error
        if ($this->form_validation->run() == FALSE)
        {
            $this->json_param['status'] = false;
            $this->json_param['txt'] = validation_errors();
        }
        // No validation
        else{
            // Where condition for token expire
            $params['where']['token_user_id'] = $user_id;
            $params['where']['token_user']    = $token;

            // Token found
            if($this->model_token->find_one_active($params)){
                // Set token status to 0
                $this->model_token->update_model($params,array('token_status'=>STATUS_INACTIVE));

                // Change password
                $this->model_signup->update_by_pk($user_id,array('signup_password'=>md5($password)));

                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Reset password successfully.';

            }
            // Token not found
            else{
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Authentication fail.';
            }
        }

        echo json_encode($this->json_param);
    }

    // Logout
    public function logout()
    {
        $user_id = $this->session->userdata('userdata')['signup_id'];

        $this->cart->destroy();

        // Clear user session
        $this->session->unset_userdata('userdata');
        redirect(l(''));
    }
}