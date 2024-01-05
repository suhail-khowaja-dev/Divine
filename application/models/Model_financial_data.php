<?
class Model_financial_data extends MY_Model
{
    /**
     * TKD financial_data MODEL
     *
     * @package     financial_data Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'financial_data';
    protected $_field_prefix = 'financial_data_';
    protected $_pk = 'financial_data_id';
    protected $_status_field = 'financial_data_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "financial_data_id,financial_data_user_id,financial_data_registered_sale_id,financial_data_consignor_fee,financial_data_hanger_fee,financial_data_cosnignor_percentage,financial_data_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'financial_data_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'financial_data_category',
        'joint' => 'financial_data_category.financial_data_category_id = financial_data.financial_data_category',
        'type' => 'right'
      );  


      // $params['where']['financial_data_id'] = $id;
      // Set params
      $params['order'] = 'financial_data_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=financial_data_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'financial_data_category',
        'joint' => 'financial_data_category.financial_data_category_id = financial_data.financial_data_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'financial_data_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'financial_data_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);

      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_financial_data($page='')
    {
        // Set params
      $params['fields'] = 'financial_data_page,financial_data_title,financial_data_category,financial_data_image_path,financial_data_image,financial_data_status';
      $params['where']['financial_data_page'] = $page;
      return $this->model_financial_data->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "financial_data_id,financial_data_name,financial_data_slug,financial_data_detail,financial_data_image,financial_data_image_thumb,financial_data_image_path,financial_data_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = financial_data_id and comment_status=1) AS total_comments,financial_data_category_name";*/

        $param['fields'] = "financial_data_id,financial_data_title,financial_data_slug,financial_data_detail,financial_data_image,financial_data_image_thumb,financial_data_image_path,financial_data_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = financial_data_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"financial_data_category" ,

            "joint"=>"financial_data_category.financial_data_category_id = financial_data.financial_data_category_id and financial_data_category.financial_data_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['financial_data_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "financial_data_id,financial_data_user_id,financial_data_sale_id,comment_name,comment_description,comment_created_on";
          $params['where']['financial_data_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"financial_data.financial_data_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_financial_data->find_all_active($params);
        }

        public function update_sale_voluteer($id, $saleid)
        {
         $this->db->set('financial_data_status',2);
         $this->db->where('financial_data_user_id',$id);
         $this->db->where('financial_data_sale_id', $saleid);
         $this->db->update('financial_data');
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

        'financial_data_id' => array(
          'table' => $this->_table,
          'name' => 'financial_data_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        'financial_data_user_id' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_user_id',
         'label'   => 'Consigner No',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

      //  'financial_data_user_type' => array(
      //   'table'   => $this->_table,
      //   'name'   => 'financial_data_user_type',
      //   'label'   => 'User Type',
      //   'type'   => 'hidden',
      //   'list_data' => array(),
      //   'attributes'   => array(),
      //   'js_rules'   => '',
      //   'rules'   => ''
      // ),


        'financial_data_registered_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_registered_sale_id',
         'label'   => 'Registered Sale Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'financial_data_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_sale_id',
         'label'   => 'Sale Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'financial_data_recognized_item' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_recognized_item',
         'label'   => 'Recognized Item',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'financial_data_item_sold' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_item_sold',
         'label'   => 'Item Sold',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'financial_data_consignor_fee' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_consignor_fee',
         'label'   => 'Consigner Fee',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'financial_data_hanger_fee' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_hanger_fee',
         'label'   => 'Hanger Fee',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'financial_data_volunteer_shifts_schedule' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_volunteer_shifts_schedule',
         'label'   => 'Volunteer Shift Schedule',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'financial_data_actual' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_actual',
         'label'   => 'Actual',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'financial_data_cosnignor_percentage' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_cosnignor_percentage',
         'label'   => 'Consignor Percentage',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'financial_data_revenue_ticket' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_revenue_ticket',
         'label'   => 'Revenue Ticket',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => 'trim'
       ),


        'financial_data_tax' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_tax',
         'label'   => 'Tax',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => 'trim'
       ),


        'financial_data_consignor_payout' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_consignor_payout',
         'label'   => 'Consignor Payout',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => 'trim'
       ),

        'financial_data_divine_revenue' => array(
         'table'   => $this->_table,
         'name'   => 'financial_data_divine_revenue',
         'label'   => 'Divine Revenue',
         'type'   => 'text',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => 'trim'
       ),


        'financial_data_status' => array(
          'table' => $this->_table,
          'name' => 'financial_data_status',
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