<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sale extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		sale
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

    public function __construct() {

      global $config;
      
      parent::__construct();
      $this->dt_params['dt_headings'] = "sale_id,
      ,sale_title,sale_location,sale_street,sale_city,sale_status";
      $this->dt_params['searchable'] = array("sale_id","sale_title","sale_category","sale_latest_featured","sale_status");
      
      $this->dt_params['action'] = array(
        "hide_add_button" => false ,
        "hide" => false ,
        "show_delete" => true ,
        "show_edit" => true ,
        "order_field" => false ,
        "show_view" => false ,
        "extra" => array(
            '<a title="View" href="'.$config['admin_base_url'].'sale/detail/%d/" class="btn-xs btn btn-primary sale_details_btn"><i class="icon-users"></i></a>',
        ) ,
    );
      $this->_list_data['sale_status'] = array( 
        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
    );
      $this->_list_data['sale_latest_featured'] = array( 
        STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,  
        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"  
    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

      $config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['sale_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'sale_info'=>'sale & Info',
            'contact_us'=>'Contact Us',
        );*/
         // $this->_list_data['sale_category'] = $this->model_sale_category->find_all_list_active(array(),"sale_category_name");


		//$this->_list_data['sale_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['sale_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

        $this->dt_params['export_route'] = g('base_url') . 'Contact_us/export_sale';
        $_POST = $this->input->post(NULL, false);
    }

    public function add($id='', $data=array())
    {
      parent::add($id, $data);
  }

  public function detail($sale_id='')
  {   
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


    
    $data['sale_detail'] = $this->model_sale->find_by_pk($sale_id);
        //debug($data[ 'order_detail' ],1);
        //$data['ashare_detail'] = $this->model_adshare->get_adshare_detail($data['order_detail']['order_adshare_id']);
        //debug($data[ 'ashare_detail' ]);
        //$data['country'] = $this->model_country->find_by_pk($data[ 'order_detail' ]['order_country']);
    
    if(!array_filled($data[ 'sale_detail' ]))
        not_found("Invalid Sale ID");

        // check is parent value ste (use when someone reserve adspace in adshare).
        /*if($data[ 'ashare_detail' ]['adshare_is_parent']!=null){
            $old_data = $data['ashare_detail'];
            //debug($old_data);
            $data['ashare_detail'] = $this->model_adshare->get_adshare_detail($data[ 'ashare_detail' ]['adshare_is_parent']);
            //debug($data['ashare_detail']);
            // set old data value to new data
            $data['ashare_detail']['adshare_is_parent'] = $old_data['adshare_is_parent'];
            $data['ashare_detail']['adshare_number'] = $old_data['adshare_number'];

            // Set adshare id for adshare info
            $adshare_id = $data[ 'ashare_detail' ]['adshare_is_parent'];
        }
        else{
            // Set adshare id for adshare info
            $adshare_id = $data['order_detail']['order_adshare_id'];
        }*/
        //debug($data['ashare_detail'],1);

        
        $param['where']['registered_sale_sale_id'] = $sale_id;
        $param['joins'][] = array(
            "table"=>"signup" , 
            "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id"
        );
        $param['group'] = 'registered_sale_user_id';
        $param['where']['signup_type'] = 1;
        $param['where']['registered_sale_status'] = 1;
        $data['consignor'] = $this->model_registered_sale->find_all($param);
        // debug($data['consignor'],1);


        $param1['where']['registered_sale_sale_id'] = $sale_id;
        $param1['joins'][] = array(
            "table"=>"signup" , 
            "joint"=>"signup.signup_id = registered_sale.registered_sale_user_id",
        );
        $param1['joins'][] = array(
            "table" =>"volunteer_shift",
            "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id",
        );
        // $param1['group'] = 'registered_sale_user_id';
        // $param1['where']['signup_type'] = 2;
        $param1['where']['registered_sale_status'] = 1;
        $data['volunteer'] = $this->model_registered_sale->find_all($param1);
        // debug($data['volunteer'],1);

        // foreach ($data_comsignor as $key => $value) {

        //     $options = unserialize($value['order_item_option']);

        //     $amount = $value['order_item_subtotal'];
        //     //if(isset($options['subscription_tenure'])){
        //     //  $tenure = ($options['subscription_tenure'] == 2 ? '3' : '1');
        //     //  $amount = ($value['order_item_subtotal']*$tenure);
        //     //}
        //     $total_amount += $amount;

        //     $total_quantity += $value['order_item_qty'];
        //     //$total_amount += $value['order_item_subtotal'];
        // }


        // JOIN
        /*$param['joins'][] = array(
            "table"=>"adshare_attachment" ,
            "joint"=>"adshare_attachment.adshare_attachment_adshare_id = adshare_id",
        );*/
        //$adshare = (array) $this->model_adshare->find_by_pk($adshare_id, true,$param);
        
        // $data[ 'total_quantity' ] = $total_quantity;
        // $data[ 'total_amount' ] = $total_amount;
        // $data[ 'order_items' ] = $item_data;
        // //$data[ 'adshare_info' ] = $adshare;
        // $data[ 'page_title_min' ] = "Detail";
        // $data[ 'page_title' ] = "Order";
        // $data[ 'class_name' ] = "order";
        // $data[ 'model_name' ] = "model_order";
        // $data[ 'model_obj' ] = $this->model_order;
        // $data[ 'dt_params' ] = $this->dt_params ;
        // $data[ 'id' ] = $id;
        //debug($data,1);

        //$this->load_view("invoice" , $data);
        $this->load_view("detail" , $data);
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
