<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dc_web_ref extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		dc_web_ref
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "dc_web_ref_id,dc_web_ref_title,dc_web_ref_category,dc_web_ref_image,dc_web_ref_latest_featured,dc_web_ref_status";
        $this->dt_params['searchable'] = array("dc_web_ref_id","dc_web_ref_title","dc_web_ref_category","dc_web_ref_latest_featured","dc_web_ref_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['dc_web_ref_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        $this->_list_data['dc_web_ref_latest_featured'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['dc_web_ref_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'dc_web_ref_info'=>'dc_web_ref & Info',
            'contact_us'=>'Contact Us',
        );*/
         // $this->_list_data['dc_web_ref_category'] = $this->model_dc_web_ref_category->find_all_list_active(array(),"dc_web_ref_category_name");


		//$this->_list_data['dc_web_ref_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['dc_web_ref_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, false);
	}

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
