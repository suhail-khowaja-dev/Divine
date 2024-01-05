<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
        // $this->load->model('model_user_test','test');
    }

    // Default Page
    public function index()
    {
        global $config;
        // Get banner
        //$data['banner'] = $this->model_inner_banner->get_banner(5);
        $data['about_us'] = $this->model_cms_page->get_page(6);
        // Load View
        $this->load_view("index", $data);
    }


    public function form_insert()
    {
       global $config;
     // debug($_POST,1);
       if (!isset($_POST['submit'])) {
        $data = array(
            'user_name' => $_POST['name'],
            'user_val' => $_POST['val']
        );
        $inserted_id = $this->model_user_test->insert_record($data);
        // echo $inserted_id;
    }

/*    if (!empty($inserted_id)) {
         $type = 'msg';
        $msg = 'Inserted';
         $set_message($type,$msg);
//        echo $msg;
        array_pop($set_message);
    }*/
         redirect('about_us');


}



}
