<?
class Model_consignor_financial_data extends MY_Model
{
    /**
     * TKD consignor_financial_data MODEL
     *
     * @package     consignor_financial_data Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'consignor_financial_data';
    protected $_field_prefix = 'consignor_financial_data_';
    protected $_pk = 'consignor_financial_data_id';
    protected $_status_field = 'consignor_financial_data_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "consignor_financial_data_id,consignor_financial_data_title,CONCAT(consignor_financial_data_image_path,consignor_financial_data_image) AS consignor_financial_data_image,consignor_financial_data_latest_featured,consignor_financial_data_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'consignor_financial_data_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'consignor_financial_data_category',
        'joint' => 'consignor_financial_data_category.consignor_financial_data_category_id = consignor_financial_data.consignor_financial_data_category',
        'type' => 'right'
      );  


      // $params['where']['consignor_financial_data_id'] = $id;
      // Set params
      $params['order'] = 'consignor_financial_data_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=consignor_financial_data_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'consignor_financial_data_category',
        'joint' => 'consignor_financial_data_category.consignor_financial_data_category_id = consignor_financial_data.consignor_financial_data_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'consignor_financial_data_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'consignor_financial_data_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_consignor_financial_data($page='')
    {
        // Set params
      $params['fields'] = 'consignor_financial_data_page,consignor_financial_data_title,consignor_financial_data_category,consignor_financial_data_image_path,consignor_financial_data_image,consignor_financial_data_status';
      $params['where']['consignor_financial_data_page'] = $page;
      return $this->model_consignor_financial_data->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "consignor_financial_data_id,consignor_financial_data_name,consignor_financial_data_slug,consignor_financial_data_detail,consignor_financial_data_image,consignor_financial_data_image_thumb,consignor_financial_data_image_path,consignor_financial_data_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = consignor_financial_data_id and comment_status=1) AS total_comments,consignor_financial_data_category_name";*/

        $param['fields'] = "consignor_financial_data_id,consignor_financial_data_title,consignor_financial_data_slug,consignor_financial_data_detail,consignor_financial_data_image,consignor_financial_data_image_thumb,consignor_financial_data_image_path,consignor_financial_data_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = consignor_financial_data_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"consignor_financial_data_category" ,

            "joint"=>"consignor_financial_data_category.consignor_financial_data_category_id = consignor_financial_data.consignor_financial_data_category_id and consignor_financial_data_category.consignor_financial_data_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['consignor_financial_data_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "consignor_financial_data_id,consignor_financial_data_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['consignor_financial_data_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"consignor_financial_data.consignor_financial_data_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_consignor_financial_data->find_all_active($params);
        }

        public function update_financial_data($sale_data)
        {
        // Get user session
          $consignor_data = 'consignor_financial_data';
        // Loop each session
          foreach($sale_data as $key=>$value):
            $user_session[$key] = $value;
            return $this->model_consignor_financial_data->find_one($consignor_data);
          endforeach;
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

        'consignor_financial_data_id' => array(
          'table' => $this->_table,
          'name' => 'consignor_financial_data_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),
        'con_vol_num' => array(
         'table'   => $this->_table,
         'name'   => 'con_vol_num',
         'label'   => 'Con Vol Number',
         'type'   => 'text',
         'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
         'js_rules'   => '',
         'rules'   => ''
       ),

        'sale_num'  => array(
          'table'   => $this->_table,
          'name'   => 'sale_num',
          'label'   => 'Sale Number',
          'type'   => 'text',
          'attributes'   => array(),
          'js_rules'   => array("is_slug" => array() ),
          'rules'   => ''
        ),

        'consignor_fee' => array(
         'table'   => $this->_table,
         'name'   => 'consignor_fee',
         'label'   => 'Consignor Fee',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => '',
         'rules'   => ''
       ),

        'actual_vol_shifts' => array(
          'table' => $this->_table,
          'name' => 'actual_vol_shifts',
          'label' => 'Actual Vol Shifts',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),


        'consignor_percentage' => array(
          'table' => $this->_table,
          'name' => 'consignor_percentage',
          'label' => 'Consignor Percentage',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),

        'ticket_revenue' => array(
          'table' => $this->_table,
          'name' => 'ticket_revenue',
          'label' => 'Ticket Revenue',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),
        'tax_revenue' => array(
          'table' => $this->_table,
          'name' => 'tax_revenue',
          'label' => 'Tax Revenue',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),
        'consignor_payout' => array(
          'table' => $this->_table,
          'name' => 'consignor_payout',
          'label' => 'Consignor Payout',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),

        'dc_revenue' => array(
          'table' => $this->_table,
          'name' => 'dc_revenue',
          'label' => 'Dc Revenue',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),
        'hanger_rental_fee' => array(
          'table' => $this->_table,
          'name' => 'hanger_rental_fee',
          'label' => 'Hanger Rental Fee',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => '',
          'rules' => ''
        ),
      );

      if ($specific_field)
        return $fields[$specific_field];
      else
        return $fields;

    }

  }

  ?>