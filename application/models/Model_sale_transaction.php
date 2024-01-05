<?
class Model_sale_transaction extends MY_Model
{
    /**
     * TKD sale_transaction MODEL
     *
     * @package     sale_transaction Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_transaction';
    protected $_field_prefix = 'sale_transaction_';
    protected $_pk = 'sale_transaction_id';
    protected $_status_field = 'sale_transaction_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "sale_transaction_id,sale_transaction_user_id,sale_transaction_registered_sale_id,sale_transaction_sale_price,sale_transaction_half_off,sale_transaction_status";

      parent::__construct();
    }
    // public function export_sale_summary($userquery)
    // {
    //   $params['joins'][] = array(
    //     "table"=>"sale" , 
    //     "joint"=>"sale.sale_id = registered_sale.registered_sale_sale_id"
    //   );
    //   $params['group'] = "registered_sale_sale_id ";
    //   $volunteer = $this->model_registered_sale->find_all($params);
    //   debug($volunteer);

    //   $param2['joins'][] = array(
    //     "table"=>"financial_data" , 
    //     "joint"=>"financial_data.financial_data_sale_id  = registered_sale.registered_sale_sale_id"
    //   );
    //   $param2['group'] = "financial_data_consignor_payout ";
    //   $sale_transaction = $this->model_financial_data->find_all($param2);
    //   debug()
    // }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'sale_transaction_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'sale_transaction_category',
        'joint' => 'sale_transaction_category.sale_transaction_category_id = sale_transaction.sale_transaction_category',
        'type' => 'right'
      );  


      // $params['where']['sale_transaction_id'] = $id;
      // Set params
      $params['order'] = 'sale_transaction_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_transaction_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'sale_transaction_category',
        'joint' => 'sale_transaction_category.sale_transaction_category_id = sale_transaction.sale_transaction_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_transaction_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_transaction_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);

      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_transaction($page='')
    {
        // Set params
      $params['fields'] = 'sale_transaction_page,sale_transaction_title,sale_transaction_category,sale_transaction_image_path,sale_transaction_image,sale_transaction_status';
      $params['where']['sale_transaction_page'] = $page;
      return $this->model_sale_transaction->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_transaction_id,sale_transaction_name,sale_transaction_slug,sale_transaction_detail,sale_transaction_image,sale_transaction_image_thumb,sale_transaction_image_path,sale_transaction_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_transaction_id and comment_status=1) AS total_comments,sale_transaction_category_name";*/

        $param['fields'] = "sale_transaction_id,sale_transaction_title,sale_transaction_slug,sale_transaction_detail,sale_transaction_image,sale_transaction_image_thumb,sale_transaction_image_path,sale_transaction_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_transaction_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_transaction_category" ,

            "joint"=>"sale_transaction_category.sale_transaction_category_id = sale_transaction.sale_transaction_category_id and sale_transaction_category.sale_transaction_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['sale_transaction_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "sale_transaction_id,sale_transaction_user_id,sale_transaction_sale_id,comment_name,comment_description,comment_created_on";
          $params['where']['sale_transaction_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_transaction.sale_transaction_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_sale_transaction->find_all_active($params);
        }

        public function update_sale_voluteer($id, $saleid)
        {
         $this->db->set('sale_transaction_status',2);
         $this->db->where('sale_transaction_user_id',$id);
         $this->db->where('sale_transaction_sale_id', $saleid);
         $this->db->update('sale_transaction');
       }
       //EXCEL REPORT FUNCTION Sale Transaction
       public function getexportsaletransaction(){
        $response = array();
        $this->db->select('sale_transaction_id,sale_transaction_user_id,sale_transaction_registered_sale_id,sale_transaction_sale_price,sale_transaction_half_off,sale_transaction_createdon')
        ->where('sale_transaction_status = 1');
        $query = $this->db->get('mt_sale_transaction');
        $response = $query->result_array();
        return $response;
      }
    //EXCEL REPORT FUNCTION Sale END
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

        'sale_transaction_id' => array(
          'table' => $this->_table,
          'name' => 'sale_transaction_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        'sale_transaction_user_id' => array(
         'table'   => $this->_table,
         'name'   => 'sale_transaction_user_id',
         'label'   => 'Consigner No',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

      //  'sale_transaction_user_type' => array(
      //   'table'   => $this->_table,
      //   'name'   => 'sale_transaction_user_type',
      //   'label'   => 'User Type',
      //   'type'   => 'hidden',
      //   'list_data' => array(),
      //   'attributes'   => array(),
      //   'js_rules'   => '',
      //   'rules'   => ''
      // ),


        'sale_transaction_registered_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'sale_transaction_registered_sale_id',
         'label'   => 'Registered Sale Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'sale_transaction_sale_price' => array(
         'table'   => $this->_table,
         'name'   => 'sale_transaction_sale_price',
         'label'   => 'Sale Price',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'sale_transaction_tax' => array(
         'table'   => $this->_table,
         'name'   => 'sale_transaction_tax',
         'label'   => 'Tax',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'sale_transaction_half_off' => array(
          'table'   => $this->_table,
          'name'   => 'sale_transaction_half_off',
          'label'   => 'Half Off ?', 
          'type' => 'switch',
          'type_dt' => 'switch',
          'type_filter_dt' => 'dropdown',
          'list_data' => array(
            0 => "<span class='label label-danger'>No</span>" ,
            1 =>  "<span class='label label-primary'>Yes</span>"
          ) ,
          'default' => '0',
          'attributes' => array(),
          'dt_attributes' => array("width" => "7%"),
          'rules' => 'trim'
        ),

        'sale_transaction_status' => array(
          'table' => $this->_table,
          'name' => 'sale_transaction_status',
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