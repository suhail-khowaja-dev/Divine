 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Account extends MY_Controller {

	/**
	 * Account Controller
	 *
	 */
	
	public function __construct()
  {
    	// Call the Model constructor latest_product
    parent::__construct();
  }


  public function dropdown()
  { 
        // debug($_POST);
    $shift_data  = $this->model_volunteer_shift->find_all(array('where' => array('volunteer_shift_sale_id' => $_POST['id'])));
    $data['shift_data'] = '';       
    foreach ($shift_data as $key => $value) {

            // debug($value,1);
     $id = $value['volunteer_shift_id'];
     $data['shift_data'] .= "<option value='".$value['volunteer_shift_id']."' >".date('F j, Y g:i A',strtotime($value['volunteer_shift_start_time'])).'-'.date('F j, Y g:i A',strtotime($value['volunteer_shift_end_time'])).' '.$value['volunteer_shift_activity_desc']."</option>";
   }


   $dropoff_data = $this->model_sale_dropoffs->find_all(
    array('where'=> 
      array('sale_dropoffs_sale_id' => $_POST['id'])
    )
  );
   $data['dropoff_data'] = '';       
   foreach ($dropoff_data as $key => $value) {
     $data['dropoff_data'] .= '<option value="'.$value['sale_dropoffs_id'].'">'.date('F j, Y g:i A',strtotime($value['sale_dropoffs_start_time'])).'</option>';
   }


   echo json_encode($data);
 }

 //add more vaolunteer
 public function add_volunteer_shift()
 {
  global $config;
  // debug($_POST);
  $signup_data= $this->model_signup->find_by_pk($_POST['registered_sale']['registered_sale_user_id']);
  $registered_sale = $_POST['registered_sale'];
  // debug($registered_sale);


  $registered_sale['registered_sale_volunteer_id'] = implode(',', $_POST['registered_sale']['registered_sale_volunteer_id']);

  if (array_filled($registered_sale) > 0) {
    // debug($registered_sale);


    $volunteer_id = explode(',',$registered_sale['registered_sale_volunteer_id']);
    // debug($volunteer_id);
    $params['joins'][] = array(
      "table"=>"sale" , 
      "joint"=>"sale.sale_id = volunteer_shift.volunteer_shift_sale_id"
    );
    $params['where_in'] = array('volunteer_shift_id'=>$volunteer_id);
    $volunteer = $this->model_volunteer_shift->find_all($params);
    // debug($volunteer);

    $params1['where']['sale_dropoffs_id'] = $_POST['registered_sale']['registered_sale_dropoff_id'];
    $dropoff = $this->model_sale_dropoffs->find_one($params1);
    // debug($dropoff,1);
    foreach ($volunteer as $key => $value) {
      $data = array(
       'registered_sale_user_id'      => $_POST['registered_sale']['registered_sale_user_id'],
       'registered_sale_sale_id'      => $_POST['registered_sale']['registered_sale_sale_id'],
       'registered_sale_sale_title'      => $value['sale_title'],
       'registered_sale_sale_location'      => $value['sale_location'],
       'registered_sale_sale_street'      => $value['sale_street'],
       'registered_sale_sale_city'      => $value['sale_city'],
       'registered_sale_sale_state'      => $value['sale_state'],
       'registered_sale_sale_zip'      => $value['sale_zip'],
       'registered_sale_sale_start_date'      => $value['sale_start_date'],
       'registered_sale_sale_end_date'      => $value['sale_end_date'],
       'registered_sale_sale_location_phone'      => $value['sale_location_phone'],
       'registered_sale_sale_registration_fee'      => $value['sale_registration_fee'],
       'registered_sale_sale_volunteer_registration'      => $value['sale_volunteer_registration'],
       'registered_sale_sale_data_entry_option'      => $value['sale_data_entry_option'],
       'registered_sale_sale_consignor_fee'      => $value['sale_consignor_fee'],
       'registered_sale_sale_hanger_rental_fee'      => $value['sale_hanger_rental_fee'],
       'registered_sale_sale_volunteer_shift_schedule'      => $value['sale_volunteer_shift_schedule'],
       'registered_sale_dropoff_id'      => $_POST['registered_sale']['registered_sale_dropoff_id'],
       'registered_sale_sale_dropoffs_start_time'      => $dropoff['sale_dropoffs_start_time'],
       'registered_sale_sale_dropoffs_end_time'      => $dropoff['sale_dropoffs_end_time'],
       'registered_sale_sale_dropoffs_designated_slots'      => $dropoff['sale_dropoffs_designated_slots'],
       'registered_sale_volunteer_id'      => $value['volunteer_shift_id'],
       'registered_sale_volunteer_shift_start_time'      => $value['volunteer_shift_start_time'],
       'registered_sale_volunteer_shift_end_time'      => $value['volunteer_shift_end_time'],
       'registered_sale_volunteer_shift_max_volunteers'      => $value['volunteer_shift_max_volunteers'],
       'registered_sale_volunteer_shift_activity_desc'      => $value['volunteer_shift_activity_desc'],
       'registered_sale_status' => 1,
     );
      // debug($data);

      $inserted_id = $this->model_registered_sale->insert_record($data);
    }
    // debug($inserted_id,1);

  }

  $registered_sale['registered_sale_status'] = 1;

  if($inserted_id > 0)
  {

    $this->json_param['status'] = true;
    $this->json_param['txt'] = 'Thank you for registration.';
  }

  echo json_encode($this->json_param);
}
//end volunteer shift

 //add as a more vaolunteer
public function volunteer_shift()
{
  global $config;
  // debug($_POST);
  $signup_data= $this->model_signup->find_by_pk($_POST['registered_sale']['registered_sale_user_id']);
  $registered_sale = $_POST['registered_sale'];
  // debug($registered_sale);


  $registered_sale['registered_sale_volunteer_id'] = implode(',', $_POST['registered_sale']['registered_sale_volunteer_id']);

  if (array_filled($registered_sale) > 0) {
    // debug($registered_sale);


    $volunteer_id = explode(',',$registered_sale['registered_sale_volunteer_id']);
    // debug($volunteer_id);
    $params['joins'][] = array(
      "table"=>"sale" , 
      "joint"=>"sale.sale_id = volunteer_shift.volunteer_shift_sale_id"
    );
    $params['where_in'] = array('volunteer_shift_id'=>$volunteer_id);
    $volunteer = $this->model_volunteer_shift->find_all($params);
    // debug($volunteer);

    $params1['where']['sale_dropoffs_id'] = $_POST['registered_sale']['registered_sale_dropoff_id'];
    $dropoff = $this->model_sale_dropoffs->find_one($params1);
    // debug($dropoff,1);
    foreach ($volunteer as $key => $value) {
      $data = array(
       'registered_sale_user_id'      => $_POST['registered_sale']['registered_sale_user_id'],
       'registered_sale_sale_id'      => $_POST['registered_sale']['registered_sale_sale_id'],
       'registered_sale_sale_title'      => $value['sale_title'],
       'registered_sale_sale_location'      => $value['sale_location'],
       'registered_sale_sale_street'      => $value['sale_street'],
       'registered_sale_sale_city'      => $value['sale_city'],
       'registered_sale_sale_state'      => $value['sale_state'],
       'registered_sale_sale_zip'      => $value['sale_zip'],
       'registered_sale_sale_start_date'      => $value['sale_start_date'],
       'registered_sale_sale_end_date'      => $value['sale_end_date'],
       'registered_sale_sale_location_phone'      => $value['sale_location_phone'],
       'registered_sale_sale_registration_fee'      => $value['sale_registration_fee'],
       'registered_sale_sale_volunteer_registration'      => $value['sale_volunteer_registration'],
       'registered_sale_sale_data_entry_option'      => $value['sale_data_entry_option'],
       'registered_sale_sale_consignor_fee'      => $value['sale_consignor_fee'],
       'registered_sale_sale_hanger_rental_fee'      => $value['sale_hanger_rental_fee'],
       'registered_sale_sale_volunteer_shift_schedule'      => $value['sale_volunteer_shift_schedule'],
       'registered_sale_dropoff_id'      => $_POST['registered_sale']['registered_sale_dropoff_id'],
       'registered_sale_sale_dropoffs_start_time'      => $dropoff['sale_dropoffs_start_time'],
       'registered_sale_sale_dropoffs_end_time'      => $dropoff['sale_dropoffs_end_time'],
       'registered_sale_sale_dropoffs_designated_slots'      => $dropoff['sale_dropoffs_designated_slots'],
       'registered_sale_volunteer_id'      => $value['volunteer_shift_id'],
       'registered_sale_volunteer_shift_start_time'      => $value['volunteer_shift_start_time'],
       'registered_sale_volunteer_shift_end_time'      => $value['volunteer_shift_end_time'],
       'registered_sale_volunteer_shift_max_volunteers'      => $value['volunteer_shift_max_volunteers'],
       'registered_sale_volunteer_shift_activity_desc'      => $value['volunteer_shift_activity_desc'],
       'registered_sale_status' => 1,
     );
      // debug($data);

      $inserted_id = $this->model_registered_sale->insert_record($data);
    }
    // debug($inserted_id,1);

  }

  $registered_sale['registered_sale_status'] = 1;

  if($inserted_id > 0)
  {

    $this->json_param['status'] = true;
    $this->json_param['txt'] = 'Thank you for registration.';
  }

  echo json_encode($this->json_param);
}
//end as a volunteer shift



    // Default Profile page
public function index()
{ 
  if($this->userid <= 0){
   redirect(g('base_url').'user/index');
 }
 global $config;
        // Set banner heading
        //$data['banner_heading'] = "My Account";

 $data['banner'] = $this->model_inner_banner->get_banner(16);
        // Get and set cms data
 $data['content'] = $this->model_cms_page->get_page(12);
        // Get banner
        // $data['banner'] = $this->model_banner->get_banners(8);

        //$data['banner'] = $this->model_inner_banner->find_by_pk(2);
 $this->load_view("index" , $data);
}

    // Account info page
public function info(){
  if($this->userid <= 0){
   redirect(g('base_url').'user/login');
 }
 global $config;
        //$model = $this->cuser_model;
		//$this->add_script(array('innerstyle.css','font-awesome.min.css'));
 $data['userEmail'] = $this->session->userdata['logged_in']['email'];
 $data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Get Countries
 $data['countries'] = $this->model_country->find_all_active();

		//$data['title'] = 'My Account Info';
        // Set banner heading
 $data['banner_heading'] = "Account Info";

        // 1:parent/teacher , 2:kid
        //$view = ($this->user_type==1)?'info':'kid/info';

 $this->load_view("info" , $data);
}

public function edit_consigner_info($id){
  if($this->userid <= 0){
   redirect(g('base_url').'user/login');
 }
 global $config;
 $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
 $params1['joins'][] = array(
  "table"=>"signup" , 
  "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
);
 $params1['where']['registered_sale_user_id'] = $this->userid;
 $params1['where']['registered_sale_id'] = $id;
 $data['volunterdetail'] = $this->model_registered_sale->find_all_active($params1);
 // debug($data['volunterdetail'][0],1);
        // Set banner heading
 $data['banner_heading'] = "Account Info";
 $this->load_view("consignorvolunteeredit" , $data);
}

public function update_detail()
{
  // debug($_POST);
  if(isset($_POST) AND array_filled($_POST))
  {
    $id = intval($_POST['v_detail']['registered_sale_id']);
    // debug($id);

    $para['where']['volunteer_shift_id'] = $_POST['v_detail']['registered_sale_volunteer_id'];
    $volunteer_data = $this->model_volunteer_shift->find_one($para);
    debug($volunteer_data,1);

    $this->model_registered_sale->update_by_pk($id,array(
      'registered_sale_volunteer_id' => $_POST['v_detail']['registered_sale_volunteer_id'],
      'registered_sale_volunteer_shift_start_time' => $volunteer_data['volunteer_shift_start_time'],
      'registered_sale_volunteer_shift_end_time' => $volunteer_data['volunteer_shift_end_time'],
      'registered_sale_volunteer_shift_activity_desc' => $volunteer_data['volunteer_shift_activity_desc'],
    ));
    $json_param['status'] = true;
    echo json_encode($json_param);
  }
}
    // Insert Record
public function add_sale_info()
{
  global $config;

  $signup_data= $this->model_signup->find_by_pk($_POST['registered_sale']['registered_sale_user_id']);
// debug($signup_data,1);
        // Get post data
  $registered_sale = $_POST['registered_sale'];
  if(!empty($registered_sale['registered_sale_volunteer_id'])){
    // debug(1,1);
    // debug($registered_sale);
    // debug($registered_sale,1);

    $registered_sale['registered_sale_volunteer_id'] = implode(',', $_POST['registered_sale']['registered_sale_volunteer_id']);

    if (array_filled($registered_sale) > 0) {

      $volunteer_id = explode(',',$registered_sale['registered_sale_volunteer_id']);
      // debug($volunteer_id);
      $params['joins'][] = array(
        "table"=>"sale" , 
        "joint"=>"sale.sale_id = volunteer_shift.volunteer_shift_sale_id"
      );
      $params['where_in'] = array('volunteer_shift_id'=>$volunteer_id);
      $volunteer = $this->model_volunteer_shift->find_all($params);
      // debug($volunteer);

      $params1['where']['sale_dropoffs_id'] = $_POST['registered_sale']['registered_sale_dropoff_id'];
      $dropoff = $this->model_sale_dropoffs->find_one($params1);
      // debug($dropoff);
      foreach ($volunteer as $key => $value) {
        $data = array(
         'registered_sale_user_id'      => $_POST['registered_sale']['registered_sale_user_id'],
         'registered_sale_sale_id'      => $_POST['registered_sale']['registered_sale_sale_id'],
         'registered_sale_user_type'  => $_POST['registered_sale']['registered_sale_user_type'],
         'registered_sale_sale_title'      => $value['sale_title'],
         'registered_sale_sale_location'      => $value['sale_location'],
         'registered_sale_sale_street'      => $value['sale_street'],
         'registered_sale_sale_city'      => $value['sale_city'],
         'registered_sale_sale_state'      => $value['sale_state'],
         'registered_sale_sale_zip'      => $value['sale_zip'],
         'registered_sale_sale_start_date'      => $value['sale_start_date'],
         'registered_sale_sale_end_date'      => $value['sale_end_date'],
         'registered_sale_sale_location_phone'      => $value['sale_location_phone'],
         'registered_sale_sale_registration_fee'      => $value['sale_registration_fee'],
         'registered_sale_sale_volunteer_registration'      => $value['sale_volunteer_registration'],
         'registered_sale_sale_data_entry_option'      => $value['sale_data_entry_option'],
         'registered_sale_sale_consignor_fee'      => $value['sale_consignor_fee'],
         'registered_sale_sale_hanger_rental_fee'      => $value['sale_hanger_rental_fee'],
         'registered_sale_sale_volunteer_shift_schedule'      => $value['sale_volunteer_shift_schedule'],
         'registered_sale_dropoff_id'      => $_POST['registered_sale']['registered_sale_dropoff_id'],
         'registered_sale_sale_dropoffs_start_time'      => $dropoff['sale_dropoffs_start_time'],
         'registered_sale_sale_dropoffs_end_time'      => $dropoff['sale_dropoffs_end_time'],
         'registered_sale_sale_dropoffs_designated_slots'      => $dropoff['sale_dropoffs_designated_slots'],
         'registered_sale_volunteer_id'      => $value['volunteer_shift_id'],
         'registered_sale_volunteer_shift_start_time'      => $value['volunteer_shift_start_time'],
         'registered_sale_volunteer_shift_end_time'      => $value['volunteer_shift_end_time'],
         'registered_sale_volunteer_shift_max_volunteers'      => $value['volunteer_shift_max_volunteers'],
         'registered_sale_volunteer_shift_activity_desc'      => $value['volunteer_shift_activity_desc'],
         'registered_sale_status' => 1,
       );

        $inserted_id = $this->model_registered_sale->insert_record($data);
      }
      // debug($inserted_id);

    }

    $registered_sale['registered_sale_status'] = 1;

    if($inserted_id > 0)
    {
      if(ENVIRONMENT!='development'){
                        // Send confirmation email

                        // Welcome email
        if($signup_data['signup_type'] == 1){

          $this->model_email->sale_registration_confirmation($signup_data,$registered_sale);
        }
        if($signup_data['signup_type'] == 2){

          $this->model_email->volunteer_registration_confirmation($signup_data,$registered_sale);
        }

        else{
        }

      }
      $this->json_param['status'] = true;
      $this->json_param['txt'] = 'Thank you for registration.';
    }

  }
  else
  {
    // debug(2,1);
    $params['joins'][] = array(
      "table"=>"sale" , 
      "joint"=>"sale.sale_id = sale_dropoffs.sale_dropoffs_sale_id"
    );
    $params['where']['sale_dropoffs_id'] = $_POST['registered_sale']['registered_sale_dropoff_id'];
    $dropoff= $this->model_sale_dropoffs->find_one($params);
      // debug($dropoff,1);
    $data = array(
     'registered_sale_user_id' => $_POST['registered_sale']['registered_sale_user_id'],
     'registered_sale_sale_id' => $_POST['registered_sale']['registered_sale_sale_id'],
     'registered_sale_user_type' => $_POST['registered_sale']['registered_sale_user_type'],
     'registered_sale_sale_title' => $dropoff['sale_title'],
     'registered_sale_sale_location' => $dropoff['sale_location'],
     'registered_sale_sale_street'  => $dropoff['sale_street'],
     'registered_sale_sale_city' => $dropoff['sale_city'],
     'registered_sale_sale_state' => $dropoff['sale_state'],
     'registered_sale_sale_zip' => $dropoff['sale_zip'],
     'registered_sale_sale_start_date' => $dropoff['sale_start_date'],
     'registered_sale_sale_end_date' => $dropoff['sale_end_date'],
     'registered_sale_sale_location_phone' => $dropoff['sale_location_phone'],
     'registered_sale_sale_registration_fee' => $dropoff['sale_registration_fee'],
     'registered_sale_sale_volunteer_registration' => $dropoff['sale_volunteer_registration'],
     'registered_sale_sale_data_entry_option' => $dropoff['sale_data_entry_option'],
     'registered_sale_sale_consignor_fee' => $dropoff['sale_consignor_fee'],
     'registered_sale_sale_hanger_rental_fee' => $dropoff['sale_hanger_rental_fee'],
     'registered_sale_sale_volunteer_shift_schedule' => $dropoff['sale_volunteer_shift_schedule'],
     'registered_sale_dropoff_id' => $_POST['registered_sale']['registered_sale_dropoff_id'],
     'registered_sale_sale_dropoffs_start_time' => $dropoff['sale_dropoffs_start_time'],
     'registered_sale_sale_dropoffs_end_time' => $dropoff['sale_dropoffs_end_time'],
     'registered_sale_sale_dropoffs_designated_slots' => $dropoff['sale_dropoffs_designated_slots'],
     'registered_sale_volunteer_id' => 0,
     'registered_sale_volunteer_shift_start_time' => '',
     'registered_sale_volunteer_shift_end_time' => '',
     'registered_sale_volunteer_shift_max_volunteers' => '',
     'registered_sale_volunteer_shift_activity_desc' => '',       
     'registered_sale_status' => 1,
   );

    $inserted_id = $this->model_registered_sale->insert_record($data);
    // debug($inserted_id,1);

    $registered_sale['registered_sale_status'] = 1;

    if($inserted_id > 0)
    {
      if(ENVIRONMENT!='development'){
                        // Send confirmation email

                        // Welcome email
        if($signup_data['signup_type'] == 1){

          $this->model_email->sale_registration_confirmation($signup_data,$registered_sale);
        }
        if($signup_data['signup_type'] == 2){

          $this->model_email->volunteer_registration_confirmation($signup_data,$registered_sale);
        }

        else{
        }

      }
      $this->json_param['status'] = true;
      $this->json_param['txt'] = 'Thank you for registration.';
    }
  }
  echo json_encode($this->json_param);
}



     // Sale
public function sale(){
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
        //$model = $this->cuser_model;
        //$this->add_script(array('innerstyle.css','font-awesome.min.css'));
  $data['userEmail'] = $this->session->userdata['logged_in']['email'];
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
        // debug($data['userdata'],1);
        // Get Countries
  $data['countries'] = $this->model_country->find_all_active();
  $data['active_sale'] = $this->model_sale->find_all_active();
        // debug($data['active_sale'],1);

        //$data['title'] = 'My Account Info';
        // Set banner heading
  $data['banner_heading'] = "Account Info";

        // 1:parent/teacher , 2:kid
        //$view = ($this->user_type==1)?'info':'kid/info';

  $this->load_view("sale" , $data);
}

     // Register Sale
public function saleregistration(){
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
        //$model = $this->cuser_model;
        //$this->add_script(array('innerstyle.css','font-awesome.min.css'));
  $data['userEmail'] = $this->session->userdata['logged_in']['email'];
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
        //debug($data['userdata'],1);
        // Get Countries
  $para['order'] = 'sale_id desc';
  $data['active_sale'] = $this->model_sale->find_all_active($para);

  $data['sale_dropoffs'] = $this->model_sale_dropoffs->find_all_active();
        // debug($data['sale_dropoffs'],1);
  $data['volunteer_shift'] = $this->model_volunteer_shift->find_all_active();

        //debug($data['active_sale'],1);

        //$data['title'] = 'My Account Info';
        // Set banner heading
  $data['banner_heading'] = "Account Info";

        // 1:parent/teacher , 2:kid
        //$view = ($this->user_type==1)?'info':'kid/info';

  $this->load_view("saleregistration" , $data);
}

      // Registerd Sale
public function saleregistered(){
        // debug($_POST,1);
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);

    // $param['where']['con_vol_num'] = $data['userdata']['signup_id'];
    // $params['joins'][] = array(
    //     "table"=>"sale" , 
    //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
    // );
  $params['joins'][] = array(
    "table"=>"signup" , 
    "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
  );
  // $params['joins'][] = array(
  //   "table"=>"sale_dropoffs" , 
  //   "joint"=>"sale_dropoffs.sale_dropoffs_id = registered_sale.registered_sale_dropoff_id"
  // );
  // $params['joins'][] = array(
  //   "table"=>"volunteer_shift" , 
  //   "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id"
  // );
  $params['where']['registered_sale_user_id'] = $this->userid;
  $params['group'] = "registered_sale_sale_id";
  $params['order'] = 'registered_sale_id desc';
  $data['saleregistered'] = $this->model_registered_sale->find_all_active($params);
    // debug($data['saleregistered'],1);
    // $params1['joins'][] = array(
    //     "table"=>"sale" , 
    //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
    // );
  $params1['joins'][] = array(
    "table"=>"signup" , 
    "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
  );
    // $params1['joins'][] = array(
    //     "table"=>"sale_dropoffs" , 
    //     "joint"=>"sale_dropoffs.sale_dropoffs_id = registered_sale.registered_sale_dropoff_id"
    // );
    // $params1['joins'][] = array(
    //     "table"=>"volunteer_shift" , 
    //     "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id"
    // );
  $params1['where']['registered_sale_user_id'] = $this->userid;
  $data['volunteerregistered'] = $this->model_registered_sale->find_all_active($params1);
  $data['banner_heading'] = "Account Info";
  $this->load_view("saleregistered" , $data);
}


      // Registerd shifts
public function registeredshifts(){
  //debug($_POST,1);
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);


    // $params1['joins'][] = array(
    //     "table"=>"sale" , 
    //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
    // );
  $params1['joins'][] = array(
    "table"=>"signup" , 
    "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
  );
    // $params1['joins'][] = array(
    //     "table"=>"sale_dropoffs" , 
    //     "joint"=>"sale_dropoffs.sale_dropoffs_id = registered_sale.registered_sale_dropoff_id"
    // );
    // $params1['joins'][] = array(
    //     "table"=>"volunteer_shift" , 
    //     "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id"
    // );
  $params1['where']['registered_sale_user_id'] = $this->userid;
  $params1['order'] = "registered_sale_id desc";    
  $data['volunteerregistered'] = $this->model_registered_sale->find_all_active($params1);
  // debug($data['volunteerregistered'][0],1);

  // $params2['where']['registered_sale_user_id'] = $this->userid;  
  // $data['add_volunteer'] = $this->model_registered_sale->find_all($params2);
  //debug($data['add_volunteer'],1);


  $data['banner_heading'] = "Account Info";
  $this->load_view("registeredshifts" , $data);
}


      // volunteer details
public function volunteerdetail(){
        // debug($_POST,1);
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
  $params['joins'][] = array(
    "table"=>"sale" , 
    "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
  );
  $params['joins'][] = array(
    "table"=>"volunteer_shift" , 
    "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id"
  );
    // $volunteer_id = $this->model_registered_sale->find_all();

  $params['where']['registered_sale_user_id'] = $this->userid;
  $params['order'] = "registered_sale_id desc";
  $data['get_volunteer_id'] = $this->model_registered_sale->find_all_active($params);
  // debug($data['get_volunteer_id'][0],1);
    // debug($data['get_volunteer_id'],1);
    // debug($volunteer_id[0]['registered_sale_volunteer_id'],1);

    // $volunteer_id = explode(',',$volunteer_id[0]['registered_sale_volunteer_id']);


    // $params['where_in'] = array('registered_sale_volunteer_id'=>$volunteer_id);
    // $get_volunteer_id = $this->model_registered_sale->find_all($params);
    //debug($get_volunteer_id,1);
    // // $param['where']['con_vol_num'] = $data['userdata']['signup_id'];
    // $params['joins'][] = array(
    //     "table"=>"sale" , 
    //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
    // );
    // $params['joins'][] = array(
    //     "table"=>"signup" , 
    //     "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
    // );
    // $params['where']['registered_sale_user_id'] = $this->userid;
    // $data['saleregistered'] = $this->model_registered_sale->find_all_active($params);
    // // debug($data['saleregistered'],1);
    // $data['banner_heading'] = "Account Info";
  $this->load_view("volunteerdetail" , $data);
}
//end volunteer register

public function ajax_delete()
{
        // debug($_POST,1);
  if(isset($_POST) AND array_filled($_POST))
  {
    $id = intval($_POST['id']);

    $this->model_registered_sale->update_by_pk($id,array('registered_sale_status' => 2));

    $json_param['status'] = true;
    echo json_encode($json_param);
  }
}

//consignor_delete
function Consignor_delete()
{
 if (isset($_POST) AND array_filled($_POST)) {
  $saleid = intval($_POST['saleid']);
  $id = intval($_POST['userid']);
  $this->model_registered_sale->update_sale_voluteer($id, $saleid);
  $json_param['status'] = true;
  echo json_encode($json_param);
}
}


public function ajax_edit()
{
  // debug($_POST); 
  if(isset($_POST) AND array_filled($_POST))
  {
    $id = intval($_POST['registered_sale']['registered_sale_id']);
    // debug($id,1);

    $para['where']['volunteer_shift_id'] = $_POST['registered_sale']['registered_sale_volunteer_id'];
    $volunteer_data = $this->model_volunteer_shift->find_one($para);

    $this->model_registered_sale->update_by_pk($id,array(
      'registered_sale_volunteer_id' => $_POST['registered_sale']['registered_sale_volunteer_id'],
      'registered_sale_volunteer_shift_start_time' => $volunteer_data['volunteer_shift_start_time'],
      'registered_sale_volunteer_shift_end_time' => $volunteer_data['volunteer_shift_end_time'],
      'registered_sale_volunteer_shift_activity_desc' => $volunteer_data['volunteer_shift_activity_desc'],
    ));
    // debug($volunteer_data,1);
    // debug($)
    $json_param['status'] = true;
    echo json_encode($json_param);
  }
}

public function ajax_edit_dropoff()
{
  // debug($_POST,1);
  if(isset($_POST) AND array_filled($_POST))
  {
    $id = intval($_POST['registered_sale']['registered_sale_id']);
    // debug($id,1);

    $para['where']['sale_dropoffs_id'] = $_POST['registered_sale']['registered_sale_dropoff_id'];
    $volunteer_data = $this->model_sale_dropoffs->find_one($para);
        // debug($volunteer_data,1);

    $this->model_registered_sale->update_by_pk($id,array(
      'registered_sale_dropoff_id' => $_POST['registered_sale']['registered_sale_dropoff_id'],
      'registered_sale_sale_dropoffs_start_time' => $volunteer_data['sale_dropoffs_start_time'],
      'registered_sale_sale_dropoffs_end_time' => $volunteer_data['sale_dropoffs_end_time'],
    ));

    $json_param['status'] = true;
    echo json_encode($json_param);
  }
}

    //Sale Details
public function saledetail()
{
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;
  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
    // debug($data['userdata'],1);

        // for input field data
  $param['where']['sale_id'] = $_GET['sale_ref'];
  $data['sale_detail'] = $this->model_sale->find_one($param);
// debug($data['sale_detail'],1);

        // for table data
// $param1['where']['sale_num'] = $_GET['sale_ref'];
// $param1['where']['con_vol_num'] =$data['userdata']['signup_id'];
// $data['saletransaction'] = $this->model_sale_transaction_data->find_all_active($param1);

        //debug($data['total_transaction'],1);

  $data['banner_heading'] = "Account Info";
  $this->load_view("saledetail",$data);
}

    //volunter_shit_registered function start
public function volunteerregisterd()
{
  if($this->userid <= 0){
    redirect(g('base_url').'user/login');
  }
  global $config;

  $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
  $para['order'] = "sale_id desc";
  $data['active_sale'] = $this->model_sale->find_all_active($para);

  $data['volunteer_shift'] = $this->model_volunteer_shift->find_all_active();

    // debug( $data['active_volunteer'],1);

  $data['banner_heading'] = "Account Info";
  $this->load_view('volunteerregisterd',$data);
}
//update for sale information
public function update_info_sale()
{
  $sale_data = $this->input->post('consignor_financial_data');
    // debug($sale_data);

  if((count($_POST) > 0) && (array_filled($sale_data)))
  {

    if($this->validate("model_consignor_financial_data"))
    {
      $status = $this->model_consignor_financial_data->update_by_pk($sale_data);
      // debug($_POST);



      if($status < 0)
      {
                    // Update session
        $this->model_consignor_financial_data->update_financial_data($sale_data);
                // debug($status,1);
        $param['status'] = 1;
        $param['txt'] = 'Updated successfully.';
        echo json_encode($param);
      }
      else
      {
        $param['status'] = 0;
        $param['txt'] = 'Fail to update record';
        echo json_encode($param);
      }
    }
    else
    {
      $param['status'] = 0;
      $param['txt'] = validation_errors();
      echo json_encode($param);
    }
  }
  else{
    $param['status'] = 0;
    $param['txt'] = "Please enter required field";
    echo json_encode($param);
  }
}


public function update_info()
{
 // debug($_POST,1);
 $signup_data = $this->input->post('signup');

 if((count($_POST) > 0) && (array_filled($signup_data)))
 {
  if($this->validate("model_signup"))
  {
    $status = $this->model_signup->update_by_pk($this->userid,$signup_data);

    if($status > 0)
    {
            // debug($signup_data,1);
                    // Update session
      $this->model_email->personal_info_update($signup_data);
      $this->model_signup->update_user_session($signup_data);

      $param['status'] = 1;
      $param['txt'] = 'Updated successfully.';
      echo json_encode($param);
    }
    else
    {
      $param['status'] = 0;
      $param['txt'] = 'Fail to update record';
      echo json_encode($param);
    }
  }
  else
  {
    $param['status'] = 0;
    $param['txt'] = validation_errors();
    echo json_encode($param);
  }
}
else{
  $param['status'] = 0;
  $param['txt'] = "Please enter required field";
  echo json_encode($param);
}
}



public function orderhistory(){
  if($this->userid <= 0){
   redirect(g('base_url').'user/login');
 }
 global $config;
 $data['userEmail'] = $this->session->userdata['logged_in']['email'];

		/*$params['joins'][] = array(
            "table"=>"order_item" , 
            "joint"=>"order_item.order_item_order_id = order.order_id"
          );*/
          $params['order'] = "order_id DESC";
          $params['where']['order_user_id'] = $this->userid;
          $data['orders'] = $this->model_order->find_all($params);

		//$data['country'] = $this->model_country->find_all();

          $data['title'] = 'Order History';

          $this->load_view("orderhistory" , $data);
        }

        public function getinvoice(){

          $order_id = intval($_POST['order_id']);
          $data['order_detail'] = $this->model_order->find_by_pk($order_id);
          $data['order_items'] = $this->model_order_item->find_all(
            array('where'=>array('order_item_order_id'=>$order_id))
          );
        //debug($data['order_detail']);
        //debug($data['order_items']);

          $message = $this->load->view("account/invoiceTemplate",
            $data,
            true
          );
          echo $message;
        }

        public function mywishlist(){
          if($this->userid <= 0){
           redirect(g('base_url').'user/login');
         }
         global $config;
         $data['userEmail'] = $this->session->userdata['logged_in']['email'];
         $data['wishlist'] = $this->model_wishlist->find_all(
           array('where'=>array('wishlist_user_id'=>$this->userid)));

		//$data['country'] = $this->model_country->find_all();

         $data['title'] = 'My Wishlist';

         $this->load_view("wishlist" , $data);
       }

       public function my_favorites(){
        if($this->userid <= 0){
          redirect(g('base_url').'');
        }
        global $config;
        //$data['userEmail'] = $this->session->userdata['logged_in']['email'];

        /*$params['joins'][] = array(
            "table"=>"order_item" ,
            "joint"=>"order_item.order_item_order_id = order.order_id"
          );*/

          $data['banner_heading'] = "Account Info";

          $data['result'] = $this->model_favorite->get_my_fav($this->userid);
        //$data['country'] = $this->model_country->find_all();

        //$data['title'] = 'Order History';

          $this->load_view("my_favorites" , $data);
        }

        public function addwishlist(){
          if($this->userid <= 0){
           echo json_encode(array('status'=>0,'message'=>'You are not logged in'));
         }
         else{
           $data['wishlist_user_id'] = $this->userid;
           $data['wishlist_product_id'] = intval($_POST['product_id']);
           $status = $this->model_wishlist->insert_record($data);
           if($status > 0){
            echo json_encode(array('status'=>1,'message'=>'Your item has been added into your wishlist.'));
          }
          else{
            echo json_encode(array('status'=>0,'message'=>'Please try again'));
          }
        }
      }

    // Change password view
      public function change_password(){

    // debug($_POST,1);

        if($this->userid <= 0){
         redirect(g('base_url').'user/login');
       }
       global $config;
       $data['banner'] = $this->model_inner_banner->get_banner(16);
        // Get and set cms data
       $data['content'] = $this->model_cms_page->get_page(12);
		//$this->add_script(array('innerstyle.css','font-awesome.min.css'));
       $data['userEmail'] = $this->session->userdata['userdata']['email'];
       $data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Set banner heading
       $data['banner_heading'] = "Change Password";

       $this->load_view("changepassword" , $data);
     }

    // update_password
     public function update_password(){
    // debug($_POST,1);
      if($this->userid <= 0){
       $param['status'] = 0;
       $param['txt'] = "you are not registered";
       echo json_encode($param);
     }
     else{
      $password = $this->input->post('signup');
            //debug($password['signup_password']);
      if((count($_POST) > 0) && (isset($password['signup_password'])) && (!empty($password['signup_password']))) {
        $param['signup_password'] = md5($password['signup_password']);
        $param['signup_static_password'] = ($password['signup_password']);

                //debug($param['signup_password']);
        $status = $this->model_signup->update_by_pk($this->userid,$param);
                //debug($status);
        if($status){
         $this->json_param['status'] = 1;
         $this->json_param['txt'] = 'Password has been changed.';
         echo json_encode($this->json_param);
       }
     }
     else{
      $this->json_param['status'] = 0;
      $this->json_param['txt'] = 'Record Not Found.';
      echo json_encode($this->json_param);
    }
  }
}


public function resetpasswordclient(){
  $id = $_POST['id'];
  		//$encodedID = "yrt15".$result['id']."xyurt8576412";
  $id = str_replace("yrt15", "", $id);
  $id = str_replace("xyurt8576412", "", $id);

  if(isset($_POST['password']) && empty($_POST['password'])){
   echo json_encode(array('status'=>0,'txt'=>'Please provide the password'));
 }
 else{
   $password = md5($_POST['password']);
   $status = $this->model_signup->update_by_pk($id,array('signup_password'=>$password));
   if($status){
    echo json_encode(array('status'=>1,'txt'=>'Your password has been changed.'));		
  }
  else{
    echo json_encode(array('status'=>0,'txt'=>'Please try again or use different password'));		
  }
}
}

    // Update profile image
public function update_profile_image()
{
        // Get User id
  $user_id = $this->userid;

        // Success
  if((count($_FILES)>0) && ($user_id!=null)){
            // Get temp file
    $tmp = $_FILES['file']['tmp_name'];
            // Generate file name
    $name = mt_rand().$_FILES['file']['name'];

            // Get upload path
    $upload_path = $this->config->item('site_upload_signup');

            // Set data
    $data = array(
      'signup_logo_image' => $name,
      'signup_logo_image_path' => $upload_path,
    );

            // Remove old file
            /*if(!empty($this->session->userdata('userdata')['signup_image'])){
                unlink($this->config->item('site_upload_user_photo') . basename($this->session->userdata('userdata')['signup_image']));
              }*/

            // Not remove default profile image
            /*if(basename($this->session->userdata('userdata')['signup_image'])!=$this->config->item('default_profile_image')){
                unlink($this->config->item('site_upload_user_photo') . basename($this->session->userdata('userdata')['signup_image']));
              }*/

            // Upload new file
              move_uploaded_file( $tmp,$upload_path.$name);

              $inserted_id = $this->model_signup->update_by_pk($user_id, $data);

              if($inserted_id > 0)
              {
                $profile_image_url = array(
                  'signup_image'=>$upload_path . $name
                );
                // Update session profile
                $this->model_signup->update_user_session($profile_image_url);
                // save log ends

                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Updated successfully.';
              }
              else{
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Something went wrong.Please try later.';
              }
            }
        // Error
            else{
              $this->json_param['status'] = false;
              $this->json_param['txt'] = lang('something_wrong');
            }

            echo json_encode($this->json_param);

          }


        }

        /* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */