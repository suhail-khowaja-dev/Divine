<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MY_Controller
{

    /**
     * Contact US Controller
     */

    public function __construct()
    {
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;
        // Get banner
        $data['banner'] = $this->model_inner_banner->find_by_pk(6);
        // Get cms work
        //$data['cms_info'] = $this->model_cms_page->get_page(2);
        // Load View
        $this->load_view("index", $data);
    }

    /**
     * Store a newly created resource in storage. //
     */
    public function send()
    {

        if (count($_POST) > 0) {
            if ($this->validate("model_inquiry")) {
                $form_name = 'inquiry';
                $contact_us_data = $_POST['inquiry'];
                //$contact_us_data['inquiry_type'] = 'contactus';
                $contact_us_data['inquiry_status'] = 1;

                $inserted_id = $this->model_inquiry->insert_record($contact_us_data);
                // $this->model_inquiry->set_attributes($contact_us_data);
                // $inserted_id = $this->model_inquiry->save();

                if ($inserted_id > 0) {


                    $param['status'] = 1;
                    // $param['redirect'] = 1;
                    // $param['redirect_url'] = '';

                    $param['txt'] = 'Input Succesfully save';
                    echo json_encode($param);
                    // $subject = 'Contact Us Alert';
                    parent::email_structure_contact($form_name, $subject);
                } else {
                    $param['status'] = 0;
                    $param['txt'] = 'Due to some error, Input not send';
                    echo json_encode($param);
                }
            } else {

                // debug(,1);
                //debug($param,1);

                //$param['field_name'] = validation_errors_name();
                $param['status'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);
            }
        }
    }
    // public function cosnignor_report(){
    //     debug($_POST,1);
    // }

    public function export(){
        // debug($_POST);

    //public function exportCSV(){ 
       // file name 
        $filename = 'Signup_Report_'.date('Y-m-d').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
            // debug($filename,1);

     // $userquery = "SELECT newsletter_id,`newsletter_email`,DATE_FORMAT(`newsletter_createdon`, '%Y-%m-%d')  AS `newsletter_createdon` FROM `sk_newsletter` ;";

            // $userquery = "SELECT signup_id,signup_firstname,signup_lastname,signup_email
            // FROM mt_signup
            // ORDER BY signup_id";
        // $userquery = "SELECT signup_id,signup_firstname,signup_lastname,signup_email,signup_static_password,signup_address,signup_city,signup_state,signup_zip,signup_phone,signup_name,signup_username,signup_country,signup_company,signup_business_name,signup_address2,created_on
        // FROM mt_signup

        // ORDER BY signup_id";
            // // debug($userquery,1);
            // // print_r($userquery,1);
            // // exit();



            // $que12 = $this->db->query($userquery);
            // $usersData  = $que12->result_array();
            // debug($usersData,1);

        $usersData = $this->model_signup->getexportsignup($_POST['user_type']);
        // debug($usersData,1);
       //      $userNewArray  = array();

       //      foreach ($usersData as $key=>$value){ 
       //       $signup_id = array();    
       //       $signup_firstname = array();
       //       $signup_lastname = array();
       //       $signup_email = array();
       //       $signup_static_password = array();
       //       $signup_address = array();
       //       $signup_city = array();
       //       $signup_state = array();
       //       $signup_zip = array();
       //       $signup_phone = array();
       //       $signup_name = array();
       //       $signup_username = array();
       //       $signup_country = array();
       //       $signup_company = array();
       //       $signup_business_name = array();
       //       $signup_address2 = array();
       //       $created_on = array();

       //       $signup_childs = unserialize($value['signup_childs']);

     //    if(count($usersData) > 0)
     //    {
     //        foreach ($usersData as $key => $value) {
     //         $signup_id[] = $value['signup_id'];
     //         $signup_firstname[] = $value['signup_firstname'];
     //         $signup_lastname[] = $value['signup_lastname'];
     //         $signup_email[] = $value['signup_email'];
     //         $signup_static_password[] = $value['signup_static_password'];
     //         $signup_address[] = $value['signup_address'];
     //         $signup_city[] = $value['signup_city'];
     //         $signup_state[]  = $value['signup_state'];
     //         $signup_zip[] = $value['signup_zip'];
     //         $signup_phone[] = $value['signup_phone'];
     //         $signup_name[] = $value['signup_name'];
     //         $signup_username[] = $value['signup_username'];
     //         $signup_country[] = $value['signup_country'];
     //         $signup_company[] = $value['signup_company'];
     //         $signup_business_name[] = $value['signup_business_name'];
     //         $signup_address2[] = $value['signup_address2'];
     //         $created_on[] = $value['created_on'];


     //     }

     //   //       // debug($childdata);

     //     $value['signup_id'] = implode(',', $signup_id);
     //     $value['signup_firstname'] = implode(',', $signup_firstname);
     //     $value['signup_lastname'] = implode(',', $signup_lastname);
     //     $value['signup_email'] = implode(',', $signup_email);
     //     $value['signup_static_password'] = implode(',', $signup_static_password);
     //     $value['signup_address'] = implode(',', $signup_address);
     //     $value['signup_city'] = implode(',', $signup_city);
     //     $value['signup_state'] = implode(',', $signup_state);
     //     $value['signup_zip'] = implode(',', $signup_zip);
     //     $value['signup_phone'] = implode(',', $signup_phone);
     //     $value['signup_name'] = implode(',', $signup_name);
     //     $value['signup_username'] = implode(',', $signup_username);
     //     $value['signup_country'] = implode(',', $signup_country);
     //     $value['signup_company'] = implode(',', $signup_company);
     //     $value['signup_business_name'] = implode(',', $signup_business_name);
     //     $value['signup_lastname'] = implode(',', $signup_address2);
     //     $value['signup_lastname'] = implode(',', $created_on);

     //   //         $userNewArray[] = $value;
     //   //       // debug($userNewArray,1);

     // }



       // }
            // debug($usersData,1);
       // file creation 
        $file = fopen('php://output', 'w');
            // debug($file,1);
        $header = array("Signup  ID","FirstName","LastName","Email","Password","Address","City",
            "State","Zip","Phone","Name","UserName","Country","Company","Business_Name","Address2","Created_On");


        fputcsv($file, $header);

        foreach ($usersData as $key=>$line){ 

         fputcsv($file,$line);


     }
     fclose($file);
     exit; 
 } 
//

// export for subscribe
 public function export_subscribe(){

// file name 
    $filename = 'Subscribe_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $usersData = $this->model_subscribe->getexportsubscribe();

// file creation 
    $file = fopen('php://output', 'w');
    // debug($file,1);
    $header = array("subscribe  ID","subscribe_email","created_On");

    fputcsv($file, $header);

    foreach ($usersData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of subscribe export

// export for sale_transaction
public function export_sale_transaction(){

// file name 
    $filename = 'Sale_Transaction_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $usersData = $this->model_sale_transaction->getexportsaletransaction();

// file creation 
    $file = fopen('php://output', 'w');
    // debug($file,1);
    $header = array("Sale Transaction Id","Sale_Transaction_user_Id","Sale_Transaction_Registered_Sale_Id","Sale_Transaction_Sale_Price","Sale_Transaction_Half_Off","created_On");

    fputcsv($file, $header);

    foreach ($usersData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of subscribe export


// export for sale
public function export_sale(){
// file name 
    $filename = 'Sale_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $usersData = $this->model_sale->getexportsale();

// file creation 
    $file = fopen('php://output', 'w');
// debug($file,1);
    $header = array("Sale ID","Sale Title","Sale Slug","Sale Location","Sale Street","Sale_city","Sale_State","Sale_zip","Sale_Start_date","Sale_end_date","Sale Location Phone","Sale RegiStration Fee","Sale Volunteer Registration","Sale Data Entry Option","Sale Consignor Fee","Sale Hanger Rental Fee","Sale Volunteer Shift Schedule","Sale Actual","Sale Cosnignor Percentage","Sale Items Sold","Sale Recognized Items","Sale Revenue Ticket","Sale Tax Rate","Sale Total","Sale Consignor Payout","Sale Divine Revenue","Sale Created On");

    fputcsv($file, $header);

    foreach ($usersData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of sale export

// export for dropoffs
public function export_dropoffs(){
// file name 
    $filename = 'Sale_DropOffs_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $usersData = $this->model_sale_dropoffs->getexportdropoff();

// file creation 
    $file = fopen('php://output', 'w');
// debug($file,1);
    $header = array("Sale Dropoffs Id","Sale Title","Sale Dropoffs Start Time","Sale Dropoffs End Time","Sale Dropoffs Designated Slots","Created On");

    fputcsv($file, $header);

    foreach ($usersData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of sale dropoff

// export for volunteer shift
public function export_volunteer_shift(){
// file name 
    $filename = 'Volunteer_Shift_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $userData = $this->model_volunteer_shift->getexportvolunteershift();

// file creation 
    $file = fopen('php://output', 'w');
// debug($file,1);
    $header = array("Volunteer Shift Id","Sale Title","Volunteer Shift Start Time","Volunteer Shift End Time","Volunteer Shift Max Volunteers","Volunteer Shift Activity Desc","Created On");

    fputcsv($file, $header);

    foreach ($userData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of volunteer shift

// export for sale consigner
public function export_sale_consignor(){
// file name 
    $filename = 'Sale_Consigner_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $userData = $this->model_sale->getexportsaleconsignor($_POST['sale_id']);

// file creation 
    $file = fopen('php://output', 'w');
// debug($file,1);
    $header = array("Sale Location","Sale Street","Sale City","Sale State","Sale Zip","Sale Start Date","Sale End Date","Drop Off Id","Dropoff Start Time","Dropoff End Time","Consignor Id","First Name","Last Name","Email","Address","City","State","Zip","Phone Number","Created On");

    fputcsv($file, $header);

    foreach ($userData as $key=>$line){ 

        fputcsv($file,$line);


    }
    fclose($file);
    exit; 
} 
// end of sale consigner
// public function export_sale_consignor_report(){
// // file name 
//     $filename = 'Sale_Consigner_Report_'.date('Y-m-d').'.csv'; 
//     header("Content-Description: File Transfer"); 
//     header("Content-Disposition: attachment; filename=$filename"); 
//     header("Content-Type: application/csv; ");

//     $userData = $this->model_sale->getexportsaleconsignorreport($_POST['sale_id']);

// // file creation 
//     $file = fopen('php://output', 'w');
// // debug($file,1);
//     $header = array("Sale Location","Sale Street","Sale City","Sale State","Sale Zip","Sale Start Date","Sale End Date","Drop Off Id","Dropoff Start Time","Dropoff End Time","Consignor Id","First Name","Last Name","Email","Address","City","State","Zip","Phone Number","Created On");

//     fputcsv($file, $header);

//     foreach ($userData as $key=>$line){ 

//         fputcsv($file,$line);


//     }
//     fclose($file);
//     exit; 
// } 
// // end of sale consigner

// export for sale Volunteer
public function export_sale_volunteer(){
    // debug($_POST,1);
// file name 
    $filename = 'Sale_Volunteer_Report_'.date('Y-m-d').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $userData = $this->model_sale->getexportsalevolunteer($_POST['sale_id']);
    // debug($userData,1);

// file creation 
    $file = fopen('php://output', 'w');
// debug($file,1);
    $header = array("Sale Location","Sale Street","Sale City","Sale State","Sale Zip","Sale Start Date","Sale End Date","Reg Sale Volunteer Id","Volunteer Strat Time","Volunteer End Time","Volunteer Id","First Name","Last Name","Email","Address","City","State","Zip","Phone Number","Created On");

    fputcsv($file, $header);

    foreach ($userData as $key=>$line){ 

        fputcsv($file,$line);

    }
    fclose($file);
    exit; 
} 
// end of sale Volunteer

public function newsletter()

{
    global $config;
    // debug($_POST,1);
    if (count($_POST) > 0) {
        if ($this->validate("model_newsletter")) {
            $form_name = 'newsletter';
            $data = $_POST['newsletter'];
            $data['newsletter_status'] = 1;
            $inserted_id = $this->model_newsletter->insert_record($data);
    // debug($inserted_id,1);

            if ($inserted_id > 0) {

                $title = g('site_name') . '- Newsletter Subscription Notification';
                $template = $this->load->view("_layout/email_template/newsletter", $data, true);
                $to = $data['newsletter_email'];

                $admin_to = g("db.admin.email");
                $admin_template = $this->load->view("_layout/email_template/subscribe", $data, true);


                if (ENVIRONMENT != "development") {

                    parent::client_email($to, $template, $title, $admin_to);
                    parent::client_email($admin_to, $admin_template, $title, $to);

                }

                $param['status'] = 1;
                $param['txt'] = 'Thank you for registering for our Newsletter.';
                echo json_encode($param);

            } else {
                $param['status'] = 0;
                $param['txt'] = 'Due to some error, email not send';
                echo json_encode($param);
            }
        } else {
            $param['status'] = 0;
            $param['txt'] = validation_errors();
            echo json_encode($param);

        }

    }

}


public function store()
{
    // debug($_POST,1);

    // Get post data
    $post = $this->input->post();
    // Success
    if (count($post) > 0) {
    // Get Captcha
    // $captcha_answer = $this->input->post('g-recaptcha-response');

    // Define Custom rules for captcha
        $custom_rule = array(
            'g-recaptcha-response' => array(
                'field' => 'g-recaptcha-response',
                'label' => 'Captcha',
                'rules' => 'required'
            )
        );

    // Validation success
        if ($this->validate("model_inquiry", $custom_rule)) {
    // Verify user's answer
            $response = $this->recaptcha->verifyResponse($captcha_answer);

    // Processing ...
            if ($response['success']) {
    // Get data
                $contact_us_data = $post['inquiry'];
    // Set status 1
                $contact_us_data['inquiry_status'] = 1;
    // Set attributes
                $this->model_inquiry->set_attributes($contact_us_data);
    // Save record
                $inserted_id = $this->model_inquiry->save();

    // Insert successfully
                if ($inserted_id > 0) {
    // Send Inquiry email to admin

                    if (ENVIRONMENT != 'development') {
                        $this->model_email->inquiry_email($post['inquiry']);
                    }
                    $this->json_param['status'] = 1;
                    $this->json_param['txt'] = 'Thank you for your inquiry.';
                } else {
                    $this->json_param['status'] = 0;
                    $this->json_param['txt'] = 'Something went wrong.Please try later.';
                }
            } 
            else {
// Something goes wrong
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = 'Captcha not verified';
            }
} // Validation error
else {
    $this->json_param['status'] = 0;
    $this->json_param['txt'] = validation_errors();
}
} else {
    $this->json_param['status'] = 0;
    $this->json_param['txt'] = 'No parameters found';
}

echo json_encode($this->json_param);
}

// public function zillow(){
//     // debug($_POST);
//     $zillow_id ='X1-ZWz16odiizl7nv_64j9s';
//     $search = $_POST['address'];
//     $citystate = $_POST['zipcode'];
//     $address = urlencode($search);
//     $citystatezip = urlencode($citystate);
//     // debug($citystatezip);
//     // debug($address,1);

//     $url = "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=".$zillow_id."&address=".$address."&citystatezip=".$citystatezip;
//     $result = file_get_contents($url);
//     $data = simplexml_load_string($result);
//     // debug($url);
//     // debug($data,1);
//     $zpidNum = $data->response->results->result[0]->zpid;
//     $zurl = "http://www.zillow.com/webservice/GetZestimate.htm?zws-id=".$zillow_id."&zpid=".$zpidNum;
//     $zresult = file_get_contents($zurl);
//     $zdata = simplexml_load_string($zresult);
//     $zstreet=$zdata->response->address->street;
//     echo $street;

// }
}
