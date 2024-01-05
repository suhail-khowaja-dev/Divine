<?
class Model_sale extends MY_Model
{
    /**
     * TKD sale MODEL
     *
     * @package     sale Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale';
    protected $_field_prefix = 'sale_';
    protected $_pk = 'sale_id';
    protected $_status_field = 'sale_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "sale_id,sale_title,sale_location,sale_street,sale_city,sale_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'sale_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'sale_category',
        'joint' => 'sale_category.sale_category_id = sale.sale_category',
        'type' => 'right'
      );  


      // $params['where']['sale_id'] = $id;
      // Set params
      $params['order'] = 'sale_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'sale_category',
        'joint' => 'sale_category.sale_category_id = sale.sale_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }
     //EXCEL REPORT FUNCTION Sale
    public function getexportsale(){
      $response = array();
      $this->db->select('sale_id,sale_title,sale_slug,sale_location,sale_street,sale_city,sale_state,sale_zip,sale_start_date,sale_end_date,sale_location_phone,sale_registration_fee,sale_volunteer_registration,sale_data_entry_option,sale_consignor_fee,sale_hanger_rental_fee,sale_volunteer_shift_schedule,sale_actual,sale_cosnignor_percentage,sale_items_sold,sale_recognized_items,sale_revenue_ticket,sale_tax_rate,sale_total,sale_consignor_payout,sale_divine_revenue,sale_createdon')
      ->where('sale_status = 1');
      $query = $this->db->get('mt_sale');
      $response = $query->result_array();
      return $response;
    }
    //EXCEL REPORT FUNCTION Sale END

    //    //EXCEL REPORT FUNCTION Sale
    // public function getexportsaleconsignorreport(){
    //   $response = array();
    //   $this->db->select('mt_sale.sale_location,mt_sale.sale_street,mt_sale.sale_city,mt_sale.sale_state,mt_sale.sale_zip,mt_sale.sale_start_date,mt_sale.sale_end_date,mt_registered_sale.registered_sale_dropoff_id,mt_registered_sale.registered_sale_sale_dropoffs_start_time,mt_registered_sale.registered_sale_sale_dropoffs_end_time,mt_signup.signup_id,mt_signup.signup_firstname,mt_signup.signup_lastname,mt_signup.signup_email,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_phone,mt_registered_sale.registered_sale_createdon')
    //   ->from('mt_registered_sale')
    //   ->join('mt_sale','mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id')
    //   ->join('mt_signup','mt_registered_sale.registered_sale_user_id = mt_signup.signup_id')
    //   ->where('mt_registered_sale.registered_sale_sale_id',$sale_id)
    //   ->where('mt_registered_sale.registered_sale_status = 1')
    //   ->where('mt_signup.signup_type = 1');
    //   // ->group_by('mt_registered_sale.registered_sale_user_id');
    //   $query = $this->db->get();
    //   $response = $query->result_array();
    //   return $response;
    // }
    // //EXCEL REPORT FUNCTION Sale END


    //EXCEL REPORT FUNCTION Consigner
    public function getexportsaleconsignor($sale_id){
      $response = array();
      $this->db->select('mt_sale.sale_location,mt_sale.sale_street,mt_sale.sale_city,mt_sale.sale_state,mt_sale.sale_zip,mt_sale.sale_start_date,mt_sale.sale_end_date,mt_registered_sale.registered_sale_dropoff_id,mt_registered_sale.registered_sale_sale_dropoffs_start_time,mt_registered_sale.registered_sale_sale_dropoffs_end_time,mt_signup.signup_id,mt_signup.signup_firstname,mt_signup.signup_lastname,mt_signup.signup_email,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_phone,mt_registered_sale.registered_sale_createdon')
      ->from('mt_registered_sale')
      ->join('mt_sale','mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id')
      ->join('mt_signup','mt_registered_sale.registered_sale_user_id = mt_signup.signup_id')
      ->where('mt_registered_sale.registered_sale_sale_id',$sale_id)
      ->where('mt_registered_sale.registered_sale_status = 1')
      ->where('mt_signup.signup_type = 1')
      ->group_by('mt_registered_sale.registered_sale_user_id');
      $query = $this->db->get();
      $response = $query->result_array();
      return $response;
    }
    //EXCEL REPORT FUNCTION Consigner END

    //EXCEL REPORT FUNCTION Volunteer
    public function getexportsalevolunteer($sale_id){
      $response = array();
      $this->db->select('mt_sale.sale_location,mt_sale.sale_street,mt_sale.sale_city,mt_sale.sale_state,mt_sale.sale_zip,mt_sale.sale_start_date,mt_sale.sale_end_date,,mt_registered_sale.registered_sale_volunteer_id,mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_signup.signup_id,mt_signup.signup_firstname,mt_signup.signup_lastname,mt_signup.signup_email,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_phone,mt_registered_sale.registered_sale_createdon')
      ->from('mt_registered_sale')
      ->join('mt_sale','mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id')
      ->join('mt_signup','mt_registered_sale.registered_sale_user_id = mt_signup.signup_id')
      ->where('mt_registered_sale.registered_sale_sale_id',$sale_id)
      ->where('mt_registered_sale.registered_sale_volunteer_id > 0')
      ->where('mt_registered_sale.registered_sale_status = 1');
      $query = $this->db->get();
      $response = $query->result_array();
      return $response;
    }
    //EXCEL REPORT FUNCTION  Volunteer END 


    public function get_page_sale($page='')
    {
        // Set params
      $params['fields'] = 'sale_page,sale_title,sale_category,sale_image_path,sale_image,sale_status';
      $params['where']['sale_page'] = $page;
      return $this->model_sale->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_id,sale_name,sale_slug,sale_detail,sale_image,sale_image_thumb,sale_image_path,sale_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_id and comment_status=1) AS total_comments,sale_category_name";*/

        $param['fields'] = "sale_id,sale_title,sale_slug,sale_detail,sale_image,sale_image_thumb,sale_image_path,sale_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_category" ,

            "joint"=>"sale_category.sale_category_id = sale.sale_category_id and sale_category.sale_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['sale_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "sale_id,sale_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['sale_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale.sale_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_sale->find_all_active($params);
        }

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */
    public function get_fields($specific_field = "")
    {
        // Use when add new image
      $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

      $fields = array(

        'sale_id' => array(
          'table' => $this->_table,
          'name' => 'sale_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        // 'sale_signup_id' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_signup_id',
        //   'label' => 'Signup id #',
        //   'type' => 'hidden',
        //   'type_dt' => 'text',
        //   'attributes' => array(),
        //   'dt_attributes' => array("width" => "5%"),
        //   'js_rules' => 'required',
        //   'rules' => 'required|trim'
        // ),



           // 'sale_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'sale_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


        'sale_title' => array(
         'table'   => $this->_table,
         'name'   => 'sale_title',
         'label'   => 'Sale Title',
         'type'   => 'text',
         'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),

        'sale_slug'  => array(
          'table'   => $this->_table,
          'name'   => 'sale_slug',
          'label'   => 'Slug',
          'type'   => 'text',
          'attributes'   => array(),
          'js_rules'   => array("is_slug" => array() ),
          'rules'   => 'required'
        ),

        'sale_location' => array(
         'table'   => $this->_table,
         'name'   => 'sale_location',
         'label'   => 'Location',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),

        'sale_street' => array(
         'table'   => $this->_table,
         'name'   => 'sale_street',
         'label'   => 'Street',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),

        'sale_city' => array(
         'table'   => $this->_table,
         'name'   => 'sale_city',
         'label'   => 'City',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),

        'sale_state' => array(
         'table'   => $this->_table,
         'name'   => 'sale_state',
         'label'   => 'State',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),


        'sale_zip' => array(
         'table'   => $this->_table,
         'name'   => 'sale_zip',
         'label'   => 'Zip',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required'
       ),

        'sale_start_date' => array(
          'table' => $this->_table,
          'name' => 'sale_start_date',
          'label' => 'Start Date',
          'type' => 'date',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required'
        ),

        'sale_end_date' => array(
          'table' => $this->_table,
          'name' => 'sale_end_date',
          'label' => 'End Date',
          'type' => 'date',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required'
        ),

        'sale_location_phone' => array(
          'table' => $this->_table,
          'name' => 'sale_location_phone',
          'label' => 'Location Phone No',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required'
        ),

        'sale_registration_fee' => array(
          'table' => $this->_table,
          'name' => 'sale_registration_fee',
          'label' => 'Registration Fee',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required'
        ), 

        'sale_registration_tax' => array(
          'table' => $this->_table,
          'name' => 'sale_registration_tax',
          'label' => 'Sale Tax %',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required'
        ),        



        // 'sale_tax' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_tax',
        //   'label' => 'Data Entry Option?',
        //   'type' => 'switch',
        //   'type_dt' => 'switch',
        //   'type_filter_dt' => 'dropdown',
        //   'list_data' => array(),
        //   'default' => '0',
        //   'attributes' => array(),
        //   'dt_attributes' => array("width" => "7%"),
        //   'rules' => 'trim'
        // ),


        // 'sale_data_entry_option' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_data_entry_option',
        //   'label' => 'Volunteer Registration?',
        //   'type' => 'switch',
        //   'type_dt' => 'switch',
        //   'type_filter_dt' => 'dropdown',
        //   'list_data' => array(),
        //   'default' => '0',
        //   'attributes' => array(),
        //   'dt_attributes' => array("width" => "7%"),
        //   'rules' => 'trim'
        // ),

        // 'sale_consignor_fee' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_consignor_fee',
        //   'label' => 'Consignor Fee',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),

        // 'sale_hanger_rental_fee' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_hanger_rental_fee',
        //   'label' => 'Hanger Rental Fee',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),

        // 'sale_volunteer_shift_schedule' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_volunteer_shift_schedule',
        //   'label' => 'Volunteer Schedule?',
        //   'type' => 'switch',
        //   'type_dt' => 'switch',
        //   'type_filter_dt' => 'dropdown',
        //   'list_data' => array(),
        //   'default' => '0',
        //   'attributes' => array(),
        //   'dt_attributes' => array("width" => "7%"),
        //   'rules' => 'trim'
        // ),

        // 'sale_actual' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_actual',
        //   'label' => 'Actual?',
        //   'type' => 'switch',
        //   'type_dt' => 'switch',
        //   'type_filter_dt' => 'dropdown',
        //   'list_data' => array(),
        //   'default' => '0',
        //   'attributes' => array(),
        //   'dt_attributes' => array("width" => "7%"),
        //   'rules' => 'trim'
        // ),

        // 'sale_cosnignor_percentage' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_cosnignor_percentage',
        //   'label' => 'Consignor Percentage',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),


        // 'sale_items_sold' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_items_sold',
        //   'label' => 'Items Sold',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),


        // 'sale_recognized_items' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_recognized_items',
        //   'label' => 'Recognized Items',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),

        // 'sale_revenue_ticket' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_revenue_ticket',
        //   'label' => 'Revenue Ticket',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),

        // 'sale_tax_rate' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_tax_rate',
        //   'label' => 'Tax Rate',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),


        // 'sale_total' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_total',
        //   'label' => 'Total',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),


        // 'sale_consignor_payout' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_consignor_payout',
        //   'label' => 'Consignor Payout',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),

        // 'sale_divine_revenue' => array(
        //   'table' => $this->_table,
        //   'name' => 'sale_divine_revenue',
        //   'label' => 'Divine Revenue',
        //   'type' => 'text',
        //   'attributes' => array(),
        //   'js_rules' => 'required',
        //   'rules' => 'required'
        // ),



        'sale_status' => array(
          'table' => $this->_table,
          'name' => 'sale_status',
          'label' => 'Status?',
          'type' => 'switch',
          'type_dt' => 'switch',
          'type_filter_dt' => 'dropdown',
          'list_data' => array(),
          'default' => '1',
          'attributes' => array(),
          'dt_attributes' => array("width" => "7%"),
          'rules' => 'trim'
        ),

      );

if ($specific_field)
  return $fields[$specific_field];
else
  return $fields;

}

}

?>