<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Financial_data extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		financial_data
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "financial_data_id,financial_data_user_id,financial_data_registered_sale_id,financial_data_consignor_fee,financial_data_hanger_fee,financial_data_cosnignor_percentage,financial_data_status";
        $this->dt_params['searchable'] = array("financial_data_id","financial_data_sale_price","financial_data_tax","financial_data_half_off","financial_data_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['financial_data_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        $this->_list_data['financial_data_latest_featured'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['financial_data_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'financial_data_info'=>'financial_data & Info',
            'contact_us'=>'Contact Us',
        );*/
         $this->_list_data['financial_data_registered_sale_id'] = $this->model_registered_sale->find_all_list_active(array(),"registered_sale_id");

         // $this->_list_data['financial_data_user_id'] = $this->model_signup->find_all_list_active(array(),"signup_firstname");

         $this->_list_data['financial_data_user_id'] = $this->model_signup->find_all_list_active(array('where'=>arraY('signup_type ='=>1)),"signup_id");

         $this->_list_data['financial_data_user_type'] = $this->model_signup->find_all_list_active(array(),"signup_type");

        //  $this->_list_data['financial_data_sale_id'] = $this->model_sale->find_all_list_active(array(),"sale_location");
        //  $this->_list_data['financial_data_dropoff_id'] = $this->model_sale_dropoffs->find_all_list_active(array(),"sale_dropoffs_start_time");
        //  $this->_list_data['financial_data_volunteer_id'] = $this->model_volunteer_shift->find_all_list_active(array(),"volunteer_shift_start_time");
         



		//$this->_list_data['financial_data_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['financial_data_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

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

    

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
