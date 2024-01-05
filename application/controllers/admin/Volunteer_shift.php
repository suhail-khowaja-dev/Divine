<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Volunteer_shift extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		volunteer_shift
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

    public function __construct() {

      global $config;

      parent::__construct();
      $this->dt_params['dt_headings'] = "volunteer_shift_id,volunteer_shift_sale_id,volunteer_shift_start_time,volunteer_shift_end_time,volunteer_shift_max_volunteers,volunteer_shift_activity_desc,volunteer_shift_status";
      $this->dt_params['searchable'] = array("volunteer_shift_id","volunteer_shift_title","volunteer_shift_category","volunteer_shift_latest_featured","volunteer_shift_status");

      $this->dt_params['action'] = array(
        "hide_add_button" => false ,
        "hide" => false ,
        "show_delete" => true ,
        "show_edit" => true ,
        "order_field" => false ,
        "show_view" => false ,
        "extra" => array() ,
    );
      $this->_list_data['volunteer_shift_status'] = array( 
        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
    );
      $this->_list_data['volunteer_shift_latest_featured'] = array( 
        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

      $config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['volunteer_shift_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'volunteer_shift_info'=>'volunteer_shift & Info',
            'contact_us'=>'Contact Us',
        );*/
        $this->_list_data['volunteer_shift_sale_id'] = $this->model_sale->find_all_list_active(array(),"sale_location");


		//$this->_list_data['volunteer_shift_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['volunteer_shift_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");
        $this->dt_params['export_route'] = g('base_url') . 'Contact_us/export_volunteer_shift';

        $_POST = $this->input->post(NULL, false);
    }

    public function add($id='', $data=array())
    {
      parent::add($id, $data);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
