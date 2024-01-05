<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailing_list extends MY_Controller {

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
        //$data['banner'] = $this->model_inner_banner->get_banner(5);
        $data['about_us'] = $this->model_cms_page->get_page(6);
        $data['registered_sales'] = $this->model_sale->find_all_active();
        // Load View
        $this->load_view("index", $data);
    }



}
