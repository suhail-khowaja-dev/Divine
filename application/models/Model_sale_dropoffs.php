<?
class Model_sale_dropoffs extends MY_Model
{
    /**
     * TKD sale_dropoffs MODEL
     *
     * @package     sale_dropoffs Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_dropoffs';
    protected $_field_prefix = 'sale_dropoffs_';
    protected $_pk = 'sale_dropoffs_id';
    protected $_status_field = 'sale_dropoffs_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "sale_dropoffs_id,sale_dropoffs_sale_id,sale_dropoffs_start_time,sale_dropoffs_end_time,sale_dropoffs_designated_slots,sale_dropoffs_createdon,sale_dropoffs_status";

      parent::__construct();
    }
      //EXCEL REPORT FUNCTION
    public function getexportdropoff(){
      $response = array();
      $this->db->select('mt_sale_dropoffs.sale_dropoffs_id,mt_sale.sale_title,mt_sale_dropoffs.sale_dropoffs_start_time,mt_sale_dropoffs.sale_dropoffs_end_time,mt_sale_dropoffs.sale_dropoffs_designated_slots,mt_sale_dropoffs.sale_dropoffs_createdon')
      ->from('mt_sale_dropoffs')
      ->join('mt_sale', 'mt_sale_dropoffs.sale_dropoffs_sale_id = mt_sale.sale_id')
      ->where('mt_sale_dropoffs.sale_dropoffs_status = 1');
      $query = $this->db->get();
      $response = $query->result_array();
      return $response;
    }
    //EXCEL REPORT FUNCTION END
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'sale_dropoffs_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'sale_dropoffs_category',
        'joint' => 'sale_dropoffs_category.sale_dropoffs_category_id = sale_dropoffs.sale_dropoffs_category',
        'type' => 'right'
      );  


      // $params['where']['sale_dropoffs_id'] = $id;
      // Set params
      $params['order'] = 'sale_dropoffs_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_dropoffs_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'sale_dropoffs_category',
        'joint' => 'sale_dropoffs_category.sale_dropoffs_category_id = sale_dropoffs.sale_dropoffs_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_dropoffs_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_dropoffs_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_dropoffs($page='')
    {
        // Set params
      $params['fields'] = 'sale_dropoffs_page,sale_dropoffs_title,sale_dropoffs_category,sale_dropoffs_image_path,sale_dropoffs_image,sale_dropoffs_status';
      $params['where']['sale_dropoffs_page'] = $page;
      return $this->model_sale_dropoffs->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_dropoffs_id,sale_dropoffs_name,sale_dropoffs_slug,sale_dropoffs_detail,sale_dropoffs_image,sale_dropoffs_image_thumb,sale_dropoffs_image_path,sale_dropoffs_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_dropoffs_id and comment_status=1) AS total_comments,sale_dropoffs_category_name";*/

        $param['fields'] = "sale_dropoffs_id,sale_dropoffs_title,sale_dropoffs_slug,sale_dropoffs_detail,sale_dropoffs_image,sale_dropoffs_image_thumb,sale_dropoffs_image_path,sale_dropoffs_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_dropoffs_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_dropoffs_category" ,

            "joint"=>"sale_dropoffs_category.sale_dropoffs_category_id = sale_dropoffs.sale_dropoffs_category_id and sale_dropoffs_category.sale_dropoffs_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['sale_dropoffs_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "sale_dropoffs_id,sale_dropoffs_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['sale_dropoffs_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_dropoffs.sale_dropoffs_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_sale_dropoffs->find_all_active($params);
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

        'sale_dropoffs_id' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        'sale_dropoffs_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'sale_dropoffs_sale_id',
         'label'   => 'Sale',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'sale_dropoffs_start_time' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_start_time',
          'label' => 'Start Time',
          'type' => 'datetime',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'sale_dropoffs_end_time' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_end_time',
          'label' => 'End Time',
          'type' => 'datetime',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'sale_dropoffs_designated_slots' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_designated_slots',
          'label' => 'Designated Slots',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),
        'sale_dropoffs_createdon' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_createdon',
          'label' => 'Created On',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => 'trim|htmlentities'
        ),


        'sale_dropoffs_status' => array(
          'table' => $this->_table,
          'name' => 'sale_dropoffs_status',
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