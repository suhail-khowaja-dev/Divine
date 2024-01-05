<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sale_transaction extends MY_Controller {

	/**
	 *
	 * @package		Sale_transaction
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

  public $_list_data = array();

  public function __construct() {

    global $config;

    parent::__construct();
    $this->dt_params['dt_headings'] = "sale_transaction_id,sale_transaction_user_id,sale_transaction_registered_sale_id,sale_transaction_sale_price,sale_transaction_half_off,sale_transaction_status";
    $this->dt_params['searchable'] = array("sale_transaction_id","sale_transaction_sale_price","sale_transaction_tax","sale_transaction_half_off","sale_transaction_status",);
    $this->dt_params['action'] = array(
      "hide_add_button" => true ,
      "hide" => false ,
      "show_delete" => true ,
      "order_field" => false ,
      "show_view" => true ,
      "extra" => array() ,
    );
    $this->_list_data['sale_transaction_status'] = array( 
      STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
      STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
    );
    $this->_list_data['sale_transaction_latest_featured'] = array( 
      STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
      STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

    $config['js_config']['paginate'] = $this->dt_params['paginate'];
    
    $this->_list_data['sale_transaction_registered_sale_id'] = $this->model_registered_sale->find_all_list_active(array(),"registered_sale_id");

         // $this->_list_data['sale_transaction_user_id'] = $this->model_signup->find_all_list_active(array(),"signup_firstname");

    $this->_list_data['sale_transaction_user_id'] = $this->model_signup->find_all_list_active(array('where'=>arraY('signup_type ='=>1)),"signup_id");

    $this->_list_data['sale_transaction_user_type'] = $this->model_signup->find_all_list_active(array(),"signup_type");


    $_POST = $this->input->post(NULL, false);
  }

  public function add($id='', $data=array())
  {
    parent::add($id, $data=array());
  }

  // public function send_mail()
  // {
  //   $this->configure_add_page();
  //   $this->layout_data['bread_crumbs'] = array(
  //     array(
  //       "home/"=>"Home" ));
  //       // Send email
  //   if(isset($_POST) && count($_POST)>0){
  //     $data = $this->input->post();
  //     $subject = $data['subject'];
  //     $message = $data['message'];
  //           /*debug($subject);
  //           debug($message,1);*/
  //           if((empty($subject)) || (empty($message))){
  //             redirect($this->admin_path.'send_mail'."?msgtype=error&msg=fields required.", 'refresh');
  //           }
  //           else{
  //               // Get data
  //             $result = $this->model_Sale_transaction->find_all_active(array('fields'=>'Sale_transaction_email'));
  //             $email = array_column($result,'Sale_transaction_email');

  //             if(array_filled($email)){
  //               foreach($email as $key=>$value):
  //                 $this->model_email->_send_all_Sale_transactionrs($value, $data['subject'], $data['message']);
  //               endforeach;

  //               redirect($this->admin_path.'send_mail'."?msgtype=success&msg=Sent successfully.", 'refresh');

  //             }

  //           }
  //         }

  //       // :pad view
  //         $this->load_view('send_mail');
  //       }


  public function file_upload(){
          // debug(1,1);
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
    $this->load_view("detail" , $data);
  }
  public function import(){

    $path = 'assets/uploads/excel/';
    require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel.php";
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);  
          // debug($config,1);   
    if (!$this->upload->do_upload('file_csv')) {
            // debug(1,1);
      $error = array('error' => $this->upload->display_errors());
    } else {
            // debug(3,1);
      $data = array('upload_data' => $this->upload->data());
    }
    if(empty($error)){
      if (!empty($data['upload_data']['file_name'])) {
        $import_xls_file = $data['upload_data']['file_name'];
      } else {
        $import_xls_file = 0;
      }
      $inputFileName = $path . $import_xls_file;

      try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
              // debug($allDataInSheet,1);
        $flag = true;
        $i=0;
        foreach ($allDataInSheet as $value) {
          if($flag){
            $flag =false;
            continue;
          }
                // $inserdata[$i]['sale_transaction_id'] = $value['A'];
          $inserdata[$i]['sale_transaction_user_id'] = $value['A'];
          $inserdata[$i]['sale_transaction_registered_sale_id'] = $value['B'];
          $inserdata[$i]['sale_transaction_sale_price'] = $value['C'];
          $inserdata[$i]['sale_transaction_half_off'] = $value['D'];
          $inserdata[$i]['sale_transaction_status'] = 1;
          $i++;
        }               
        $result = $this->_importdata($inserdata);
              // debug($result,1);   
        if($result){
                  // echo "Imported successfully";
         redirect(g('base_url').'admin/sale_transaction?msgtype=success&msg=file imported Successsfully.');
       }else{
                  // echo "ERROR !";
        redirect(g('base_url').'admin/sale_transaction?msgtype=error&msg=file imported failed.');
      }              

    } catch (Exception $e) {
     die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
      . '": ' .$e->getMessage());
   }
 }else{
  echo $error['error'];
}
}
public function _importData($inserdata) {
  $res = $this->db->insert_batch('mt_sale_transaction',$inserdata);
  if($res){
    return TRUE;
  }else{
    return FALSE;
  }

}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
