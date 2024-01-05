<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class View_promo_ref_single_sale extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		View_promo_ref_single_sale
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "View_promo_ref_single_sale_id,View_promo_ref_single_sale_title,View_promo_ref_single_sale_category,View_promo_ref_single_sale_image,View_promo_ref_single_sale_latest_featured,View_promo_ref_single_sale_status";
        $this->dt_params['searchable'] = array("View_promo_ref_single_sale_id","View_promo_ref_single_sale_title","View_promo_ref_single_sale_category","View_promo_ref_single_sale_latest_featured","View_promo_ref_single_sale_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['View_promo_ref_single_sale_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        $this->_list_data['View_promo_ref_single_sale_latest_featured'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['View_promo_ref_single_sale_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'View_promo_ref_single_sale_info'=>'View_promo_ref_single_sale & Info',
            'contact_us'=>'Contact Us',
        );*/
         // $this->_list_data['View_promo_ref_single_sale_category'] = $this->model_View_promo_ref_single_sale_category->find_all_list_active(array(),"View_promo_ref_single_sale_category_name");


		//$this->_list_data['View_promo_ref_single_sale_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['View_promo_ref_single_sale_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, false);
	}

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
