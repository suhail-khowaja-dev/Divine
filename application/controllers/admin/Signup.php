<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signup extends MY_Controller {


    public $_list_data = array();

    public function __construct() {

      global $config;


      parent::__construct();
        //$this->dt_params['dt_headings'] = "signup_id, signup_firstname, signup_lastname, signup_email, signup_status";
      $this->dt_params['dt_headings'] = "signup_id, signup_type, signup_firstname,signup_lastname, signup_email, signup_status";
      $this->dt_params['searchable'] = array("signup_id","signup_type","signup_name","signup_status");
      $this->dt_params['action'] = array(
        "hide_add_button" => false ,
        "hide" => false ,
        "show_delete" => true ,
        "show_edit" => true ,
        "order_field" => false ,
        "show_view" => false ,
        "extra" => array(
            '<a title="View" href="'.$config['admin_base_url'].'signup/detail/%d/" class="btn-xs btn btn-primary sale_details_btn"><i class="icon-users"></i></a>',
        ) ,
    );

/*
        $this->_list_data['signup_status'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-danger\">Inactive</span>",
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );*/

                                    $config['js_config']['paginate'] = $this->dt_params['paginate'];

        /*$this->_list_data['signup_category'] = $this->model_category->find_all_list_active(array(),"category_name");
        $this->_list_data['signup_level'] = $this->model_item->get_fields('item_level')['list_data'];
        $this->_list_data['signup_item_type'] = $this->model_item->get_fields('item_type')['list_data'];*/

        $_POST = $this->input->post(NULL, false);
    }

    

    public function get_registered_sale()
    {
        // debug($_POST,1);

        $id =  $_POST['id'];



        $para['where']['registered_sale_user_id'] = $id;
        $para['where']['registered_sale_user_type'] = 1;
        $para['where']['registered_sale_volunteer_id'] = 0;
        $registered_sales = $this->model_registered_sale->find_all_active($para);
        //debug($registered_sales,1);

        $str = '';
        foreach ($registered_sales as $key => $value) {
            $str .= '<option value="'.$value['registered_sale_id'].'" >'.$value['registered_sale_sale_title'].'</option>';
        }

        if(count($registered_sales) > 0)
          echo json_encode(array('status' => 1 , 'html' => $str));
      else
          echo json_encode(array('status' => 0 , 'html' => $str));


  }

  public function get_sale_transaction(){

        // debug($_POST);

    $id =  $_POST['id'];
    // debug($id,1);
    $user_id = $_POST['user_id'];
        // $para['where']['registered_sale_user_id'] = $sale_detail['signup_id']
    // $paras['where']['sale_id'] = $id;
    // $sale_data= $this->model_sale->find_by_pk($id);
    // debug($sale_data,1);
        // $user_data = $this->model_signup->find_by_pk($user_id);
        // $percentage = $user_data['signup_consignor_percentage']/100;
        // $consignor_fee = $user_data['signup_consignor_fee'];
        // $hanger_fee = $user_data['signup_hanger_fee'];
    // $param['where']['sale_id'] = $user_id;

    // debug($sale_data[0]['sale_registration_tax'],1);

    $param['where']['financial_data_user_id'] = $user_id;
    $param['where']['financial_data_sale_id'] = $id;
    $user_data1 = $this->model_financial_data->find_one($param);
    // debug($user_data1,1);

    $recognized_item = $user_data1['financial_data_recognized_item'];
    $consignor_fee = $user_data1['financial_data_consignor_fee'];
    $hanger_fee = $user_data1['financial_data_hanger_fee'];
    $volunteer_shifts_schedule = $user_data1['financial_data_volunteer_shifts_schedule'];
    $actual = $user_data1['financial_data_actual'];
    $cosnignor_percentage = $user_data1['financial_data_cosnignor_percentage'];
    $percentage = $user_data1['financial_data_cosnignor_percentage']/100;
    // debug($percentage,1);


    $param3['where']['registered_sale_sale_id'] = $id;
    $param3['where']['registered_sale_volunteer_id'] = 0;
    $param3['where']['registered_sale_user_id'] = $user_id;
    $sale_id = $this->model_registered_sale->find_all_active($param3);
    // debug($sale_id,1);
    $sale_reg_id = $sale_id[0]['registered_sale_sale_id'];
    // debug($sale_reg_id,1);

    $para['where']['sale_transaction_user_id'] = $user_id;
    $para['where']['sale_transaction_registered_sale_id'] = $id;
    $sales_transaction = $this->model_sale_transaction->find_all_active($para);
    // debug($sales_transaction,1);

    $para1['where']['financial_data_registered_sale_id'] = $id;
    $financial_data = $this->model_financial_data->find_one_active($para1);



    $financial_id = $financial_data['financial_data_id'];


    $str = '';
    foreach ($sales_transaction as $key => $value) {
            // $str .= '<option value="'.$value['registered_sale_id'].'" >'.$value['registered_sale_sale_title'].'</option>';
        $str .= '<tr>'.
        '<td class="sale_transaction_id">'.$value['sale_transaction_id'].'</td>'.
        '<td class="sale_transaction_sale_price">'.'$'.$value['sale_transaction_sale_price'].'</td>'.
        // '<td class="sale_transaction_tax">'.$value['sale_transaction_tax'].'</td>'.
        '<td class="sale_transaction_half_off">'.$value['sale_transaction_half_off'].'</td>'.
        '</tr>';
    }
    $que1 = $this->db->query("Select SUM(sale_transaction_sale_price) from mt_sale_transaction Where sale_transaction_registered_sale_id={$id}
        AND sale_transaction_user_id={$user_id}")->row_array();
    // debug($que1);
    $que2 = $this->db->query("Select SUM(sale_transaction_tax) from mt_sale_transaction Where sale_transaction_registered_sale_id={$id}
        AND sale_transaction_user_id={$user_id}")->row_array();
    // debug($que2,1);
    $paras['where']['sale_id'] = $id;
    $sale_data = $this->model_sale->find_all_active($paras);

    $sale_tax = $sale_data[0]['sale_registration_tax'];
    // debug($sale_tax);

    $sale_tax_amount = $que1['SUM(sale_transaction_sale_price)']*$sale_tax/100;
    // debug($sale_tax_amount,1);

    $str1 = count($sales_transaction);
    $revenue_ticket = $que1['SUM(sale_transaction_sale_price)'];
    $tax = $que2['SUM(sale_transaction_tax)'] + $sale_tax_amount;
    $consignor_payout = round($revenue_ticket*$percentage-$consignor_fee-$hanger_fee,2);
    $divine_revenue = round($revenue_ticket - $consignor_payout,2);
    $total = $revenue_ticket + $tax;


    if(count($sales_transaction) > 0)
      echo json_encode(array(
        'status' => 1 , 'html' => $str,
        'status' => 1 , 'html1' => $str1,
        'status' => 1 , 'html2' => $revenue_ticket,
        'status' => 1 , 'html3' => $consignor_payout,
        'status' => 1 , 'html4' => $divine_revenue,
        'status' => 1 , 'html5' => $tax,
        'status' => 1 , 'html6' => $total,
        'status' => 1 , 'html7' => $consignor_fee,
        'status' => 1 , 'html8' => $hanger_fee,
        'status' => 1 , 'html9' => $volunteer_shifts_schedule,
        'status' => 1 , 'html10' => $actual,
        'status' => 1 , 'html11' => $cosnignor_percentage,
        'status' => 1 , 'html12' => $financial_id,
        'status' => 1 , 'html13' => $sale_reg_id,
        'status' => 1 , 'html14' => $recognized_item,

    ));
  else
      echo json_encode(array('status' => 0 , 'html' => $str));

}

public function update_financial(){

    if(isset($_POST) AND array_filled($_POST))
    {
        if($_POST['T_detail']['financial_data_id'] == ''){
            // debug(1,1);
            $data = array(
              'financial_data_sale_id' => $_POST['T_detail']['financial_data_sale_id'],
              'financial_data_user_type' => $_POST['T_detail']['financial_data_user_type'],
              'financial_data_registered_sale_id' => $_POST['T_detail']['financial_data_registered_sale_id'],
              'financial_data_user_id' => $_POST['T_detail']['financial_data_user_id'],
              'financial_data_consignor_fee' => $_POST['T_detail']['financial_data_consignor_fee'],
              'financial_data_item_sold' => $_POST['T_detail']['financial_data_item_sold'],
              'financial_data_recognized_item' => $_POST['T_detail']['financial_data_recognized_item'],
              'financial_data_hanger_fee' => $_POST['T_detail']['financial_data_hanger_fee'],
              'financial_data_volunteer_shifts_schedule' => $_POST['T_detail']['financial_data_volunteer_shifts_schedule'],
              'financial_data_actual' => $_POST['T_detail']['financial_data_actual'],
              'financial_data_cosnignor_percentage' => $_POST['T_detail']['financial_data_cosnignor_percentage'],
              'financial_data_revenue_ticket' => $_POST['T_detail']['financial_data_revenue_ticket'],
              'financial_data_tax'=>$_POST['T_detail']['financial_data_tax'],
              'financial_data_consignor_payout'=>$_POST['T_detail']['financial_data_consignor_payout'],
              'financial_data_divine_revenue'=>$_POST['T_detail']['financial_data_divine_revenue'],      
              'financial_data_status' => 1,
          );

            $inserted_id = $this->model_financial_data->insert_record($data);
        }
        else{
            // debug(2,1);
            $id = intval($_POST['T_detail']['financial_data_id']);
            $this->model_financial_data->update_by_pk($id,array(
                'financial_data_sale_id' => $_POST['T_detail']['financial_data_sale_id'],
                'financial_data_user_type' => $_POST['T_detail']['financial_data_user_type'],
                'financial_data_registered_sale_id' => $_POST['T_detail']['financial_data_registered_sale_id'],
                'financial_data_user_id' => $_POST['T_detail']['financial_data_user_id'],
                'financial_data_consignor_fee' => $_POST['T_detail']['financial_data_consignor_fee'],
                'financial_data_item_sold' => $_POST['T_detail']['financial_data_item_sold'],
                'financial_data_recognized_item' => $_POST['T_detail']['financial_data_recognized_item'],
                'financial_data_hanger_fee' => $_POST['T_detail']['financial_data_hanger_fee'],
                'financial_data_volunteer_shifts_schedule' => $_POST['T_detail']['financial_data_volunteer_shifts_schedule'],
                'financial_data_actual' => $_POST['T_detail']['financial_data_actual'],
                'financial_data_cosnignor_percentage' => $_POST['T_detail']['financial_data_cosnignor_percentage'],
                'financial_data_revenue_ticket' => $_POST['T_detail']['financial_data_revenue_ticket'],
                'financial_data_tax'=>$_POST['T_detail']['financial_data_tax'],
                'financial_data_consignor_payout'=>$_POST['T_detail']['financial_data_consignor_payout'],
                'financial_data_divine_revenue'=>$_POST['T_detail']['financial_data_divine_revenue'],
            ));
        }
        $json_param['status'] = true;
        echo json_encode($json_param);
    }
}

public function add($id='', $data=array())
{
        //debug($_POST['signup']['signup_email'],1);
    if($_POST['signup']['signup_status'] == 1){
        $this->model_email->send_welcome_email($_POST['signup']['signup_email']);
    }
	    // Unset password to avoid pass change
    if((isset($_POST)) && (count($_POST)>0) && (!empty($id))){
     unset($_POST['signup']['signup_password']);
 }
 parent::add($id, $data);
}

    // update_password
public function update_password(){
    // debug($_POST,1);
    $data = $this->input->post('signup');
    if((count($_POST) > 0) && (isset($data['signup_password'])) && (!empty($data['signup_password']))) {
        $param['signup_password'] = md5($data['signup_password']);
        $param['signup_static_password'] = ($data['signup_password']);
        $status = $this->model_signup->update_by_pk($data['signup_id'],$param);
        if($status){
            $msg = 'Password changed successfully.';
            redirect($this->admin_path."?msgtype=success&msg=$msg", 'refresh');
        }
        else{
            $msg = "Unable to change password. Please user different password";
            redirect($this->admin_path."?msgtype=error&msg=$msg", 'refresh');
        }
    }
    else{
        $msg = "Record not updated.";
        redirect($this->admin_path."?msgtype=error&msg=$msg", 'refresh');
    }
}
public function detail($signup_id='')
{   
//  if($this->userid <= 0){
//    redirect(g('base_url').'user/login');
// }
        //debug($sale_id);
 /** check rights before deletion **/
 $class_name = $this->router->class;
 $page_name = $class_name."_edit";
        //$this->admin_rights->check_admin_rights($page_name);

        //$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );

 $this->layout_data['template_config']['show_toolbar'] = false ;
 $this->register_plugins(array(                      
    "jquery-ui",
    "bootstrap",
    "bootstrap-hover-dropdown",
    "jquery-slimscroll",
    "uniform",
    "boots",
    "font-awesome",
    "simple-line-icons" ,
    "select2",
    "bootbox",
    "bootstrap-toastr",
    "bootstrap-datetimepicker"
));


    // $sale_transaction_id = $_POST['id'];
    // $par['where']['sale_transaction_registered_sale_id'] = $sale_transaction_id;
    // $sale_transaction = $this->model_sale_transaction->find_all_active($par);
    // $data['item_sold'] = count($sale_transaction);
    // // debug($data['item_sold'],1);

    // $que1 = $this->db->query("Select SUM(sale_transaction_sale_price) from mt_sale_transaction Where sale_transaction_registered_sale_id='51' ")->row_array();
    // $data['revenue_ticket'] = $que1['SUM(sale_transaction_sale_price)'];





 $data['sale_detail'] = $this->model_signup->find_by_pk($signup_id);
  //  $param['joins'][] = array(
  //     "table"=>"sale" , 
  //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
  // );
  //  $param['where']['registered_sale_id'] = 51;
  //  $sale_con = $this->model_registered_sale->find_all_active($param)
    // $params1['where']['financial_data_user_id'] = $this->userid;
//  $params1['joins'][] = array(
//     "table"=>"registered_sale" , 
//     "joint"=>"registered_sale.registered_sale_id = financial_data_id.financial_data_user_id"
// );
 // $params1['where']['financial_data_user_id'] = $signup_id;
 // $data['sale_transaction'] = $this->model_financial_data->find_all_active($params1);
   // debug($data['volunterdetail'],1);
    // $params2['joins'][] = array(
    //     "table"=>"signup" , 
    //     "joint"=>"signup.signup_id = financial_data.financial_data_user_id"
    // );    
    // $params2['group'] = 'financial_data_user_id';
    // $data['sale_transaction'] = $this->model_financial_data->find_all_active($params2);
    // debug($data['sale_transaction'],1);



        // debug($signup_id,1);
        //$data['ashare_detail'] = $this->model_adshare->get_adshare_detail($data['order_detail']['order_adshare_id']);
        //debug($data[ 'ashare_detail' ]);
        //$data['country'] = $this->model_country->find_by_pk($data[ 'order_detail' ]['order_country']);

 if(!array_filled($data[ 'sale_detail' ]))
    not_found("Invalid Sale ID");



$param['where']['registered_sale_sale_id'] = $signup_id;
$param['joins'][] = array(
    "table"=>"signup" , 
    "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
);
$param['group'] = 'registered_sale_user_id';
$param['where']['signup_type'] = 1;
$param['where']['registered_sale_status'] = 1;
$data['consignor'] = $this->model_registered_sale->find_all($param);


$param1['where']['registered_sale_sale_id'] = $signup_id;
$param1['joins'][] = array(
    "table"=>"signup" , 
    "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id",
);
$param1['joins'][] = array(
    "table" =>"volunteer_shift",
    "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id",
);

$param1['where']['registered_sale_status'] = 1;
$data['volunteer'] = $this->model_registered_sale->find_all($param1);

$this->load_view("detail" , $data);
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
