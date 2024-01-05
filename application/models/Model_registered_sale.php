<?
class Model_registered_sale extends MY_Model
{
    /**
     * TKD registered_sale MODEL
     *
     * @package     registered_sale Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'registered_sale';
    protected $_field_prefix = 'registered_sale_';
    protected $_pk = 'registered_sale_id';
    protected $_status_field = 'registered_sale_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "registered_sale_id,registered_sale_sale_id,registered_sale_dropoff_id,registered_sale_volunteer_id,registered_sale_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'registered_sale_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'registered_sale_category',
        'joint' => 'registered_sale_category.registered_sale_category_id = registered_sale.registered_sale_category',
        'type' => 'right'
      );  


      // $params['where']['registered_sale_id'] = $id;
      // Set params
      $params['order'] = 'registered_sale_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=registered_sale_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'registered_sale_category',
        'joint' => 'registered_sale_category.registered_sale_category_id = registered_sale.registered_sale_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'registered_sale_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'registered_sale_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);

      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_registered_sale($page='')
    {
        // Set params
      $params['fields'] = 'registered_sale_page,registered_sale_title,registered_sale_category,registered_sale_image_path,registered_sale_image,registered_sale_status';
      $params['where']['registered_sale_page'] = $page;
      return $this->model_registered_sale->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "registered_sale_id,registered_sale_name,registered_sale_slug,registered_sale_detail,registered_sale_image,registered_sale_image_thumb,registered_sale_image_path,registered_sale_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = registered_sale_id and comment_status=1) AS total_comments,registered_sale_category_name";*/

        $param['fields'] = "registered_sale_id,registered_sale_title,registered_sale_slug,registered_sale_detail,registered_sale_image,registered_sale_image_thumb,registered_sale_image_path,registered_sale_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = registered_sale_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"registered_sale_category" ,

            "joint"=>"registered_sale_category.registered_sale_category_id = registered_sale.registered_sale_category_id and registered_sale_category.registered_sale_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['registered_sale_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "registered_sale_id,registered_sale_user_id,registered_sale_sale_id,comment_name,comment_description,comment_created_on";
          $params['where']['registered_sale_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"registered_sale.registered_sale_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_registered_sale->find_all_active($params);
        }

        public function update_sale_voluteer($id, $saleid)
        {
         $this->db->set('registered_sale_status',2);
         $this->db->where('registered_sale_user_id',$id);
         $this->db->where('registered_sale_sale_id', $saleid);
         $this->db->update('registered_sale');
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

        'registered_sale_id' => array(
          'table' => $this->_table,
          'name' => 'registered_sale_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        'registered_sale_user_id' => array(
         'table'   => $this->_table,
         'name'   => 'registered_sale_user_id',
         'label'   => 'User Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

       'registered_sale_user_type' => array(
        'table'   => $this->_table,
        'name'   => 'registered_sale_user_type',
        'label'   => 'User Type',
        'type'   => 'hidden',
        'list_data' => array(),
        'attributes'   => array(),
        'js_rules'   => '',
        'rules'   => ''
      ),


        'registered_sale_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'registered_sale_sale_id',
         'label'   => 'Sale Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'registered_sale_dropoff_id' => array(
         'table'   => $this->_table,
         'name'   => 'registered_sale_dropoff_id',
         'label'   => 'DropOff Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'registered_sale_volunteer_id' => array(
         'table'   => $this->_table,
         'name'   => 'registered_sale_volunteer_id',
         'label'   => 'Volunteer Id',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),

        'registered_sale_status' => array(
          'table' => $this->_table,
          'name' => 'registered_sale_status',
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