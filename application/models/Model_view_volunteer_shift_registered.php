<?
class Model_view_volunteer_shift_registered extends MY_Model
{
    /**
     * TKD view_volunteer_shift_registered MODEL
     *
     * @package     view_volunteer_shift_registered Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'view_volunteer_shift_registered';
    protected $_field_prefix = 'view_volunteer_shift_registered_';
    protected $_pk = 'view_volunteer_shift_registered_id';
    protected $_status_field = 'view_volunteer_shift_registered_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "view_volunteer_shift_registered_id,view_volunteer_shift_registered_title,CONCAT(view_volunteer_shift_registered_image_path,view_volunteer_shift_registered_image) AS view_volunteer_shift_registered_image,view_volunteer_shift_registered_latest_featured,view_volunteer_shift_registered_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'view_volunteer_shift_registered_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'view_volunteer_shift_registered_category',
        'joint' => 'view_volunteer_shift_registered_category.view_volunteer_shift_registered_category_id = view_volunteer_shift_registered.view_volunteer_shift_registered_category',
        'type' => 'right'
      );  


      // $params['where']['view_volunteer_shift_registered_id'] = $id;
      // Set params
      $params['order'] = 'view_volunteer_shift_registered_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=view_volunteer_shift_registered_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'view_volunteer_shift_registered_category',
        'joint' => 'view_volunteer_shift_registered_category.view_volunteer_shift_registered_category_id = view_volunteer_shift_registered.view_volunteer_shift_registered_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'view_volunteer_shift_registered_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'view_volunteer_shift_registered_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_view_volunteer_shift_registered($page='')
    {
        // Set params
      $params['fields'] = 'view_volunteer_shift_registered_page,view_volunteer_shift_registered_title,view_volunteer_shift_registered_category,view_volunteer_shift_registered_image_path,view_volunteer_shift_registered_image,view_volunteer_shift_registered_status';
      $params['where']['view_volunteer_shift_registered_page'] = $page;
      return $this->model_view_volunteer_shift_registered->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "view_volunteer_shift_registered_id,view_volunteer_shift_registered_name,view_volunteer_shift_registered_slug,view_volunteer_shift_registered_detail,view_volunteer_shift_registered_image,view_volunteer_shift_registered_image_thumb,view_volunteer_shift_registered_image_path,view_volunteer_shift_registered_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_volunteer_shift_registered_id and comment_status=1) AS total_comments,view_volunteer_shift_registered_category_name";*/

        $param['fields'] = "view_volunteer_shift_registered_id,view_volunteer_shift_registered_title,view_volunteer_shift_registered_slug,view_volunteer_shift_registered_detail,view_volunteer_shift_registered_image,view_volunteer_shift_registered_image_thumb,view_volunteer_shift_registered_image_path,view_volunteer_shift_registered_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_volunteer_shift_registered_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"view_volunteer_shift_registered_category" ,

            "joint"=>"view_volunteer_shift_registered_category.view_volunteer_shift_registered_category_id = view_volunteer_shift_registered.view_volunteer_shift_registered_category_id and view_volunteer_shift_registered_category.view_volunteer_shift_registered_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['view_volunteer_shift_registered_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "view_volunteer_shift_registered_id,view_volunteer_shift_registered_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['view_volunteer_shift_registered_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"view_volunteer_shift_registered.view_volunteer_shift_registered_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_view_volunteer_shift_registered->find_all_active($params);
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

        'mt_volunteer_shift_ref_id' => array(
          'table' => $this->_table,
          'name' => 'mt_volunteer_shift_ref_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),
        'vol_shift_num' => array(
         'table'   => $this->_table,
         'name'   => 'vol_shift_num',
         'label'   => 'Vol Shift Number',
         'type'   => 'text',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim|htmlentities'
       ),

        'sale_ref'  => array(
          'table'   => $this->_table,
          'name'   => 'sale_ref',
          'label'   => 'Sale Ref',
          'type'   => 'text',
          'attributes'   => array(),
          'js_rules'   => 'required',
          'rules'   => 'required|trim|htmlentities'
        ),

        'shift_start_time' => array(
         'table'   => $this->_table,
         'name'   => 'shift_start_time',
         'label'   => 'Date',
         'type'   => 'date',
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim|htmlentities'
       ),

        'shift_end_time' => array(
          'table' => $this->_table,
          'name' => 'shift_end_time',
          'label' => 'Date',
          'type' => 'date',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'max_volunteers' => array(
          'table' => $this->_table,
          'name' => 'max_volunteers',
          'label' => 'Max Volunteers',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),

        'activity_desc' => array(
          'table' => $this->_table,
          'name' => 'activity_desc',
          'label' => 'Activity Desc',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),

        'view_volunteer_shift_registered_status' => array(
          'table' => $this->_table,
          'name' => 'view_volunteer_shift_registered_status',
          'label' => 'Status',
          'type' => 'switch',
          'type_dt'   => 'dropdown',
          'type_filter_dt'   => 'dropdown',
          'list_data' => array(

          ) ,
          'default'   => '1',
          'attributes'   => array(),
          'dt_attributes'   => array("width"=>"7%"),
          'rules'   => 'trim'
        ),
        'created_on' => array(
          'table' => $this->_table,
          'name' => 'created_on',
          'label'   => 'Date',
          'type'   => 'text',
          'type_dt'   => 'text',
          'type_filter_dt'   => 'dropdown',
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


      );

      if ($specific_field)
        return $fields[$specific_field];
      else
        return $fields;

    }

  }

  ?>