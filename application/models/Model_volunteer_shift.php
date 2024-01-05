<?
class Model_volunteer_shift extends MY_Model
{
    /**
     * TKD volunteer_shift MODEL
     *
     * @package     volunteer_shift Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'volunteer_shift';
    protected $_field_prefix = 'volunteer_shift_';
    protected $_pk = 'volunteer_shift_id';
    protected $_status_field = 'volunteer_shift_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      $this->pagination_params['fields'] = "volunteer_shift_id,volunteer_shift_sale_id,volunteer_shift_start_time,volunteer_shift_end_time,volunteer_shift_max_volunteers,volunteer_shift_activity_desc,volunteer_shift_status";

      parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
        $params['where_like'][] = array(
          'column'=>'volunteer_shift_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }

      $params['joins'][] = array(
        'table' => 'volunteer_shift_category',
        'joint' => 'volunteer_shift_category.volunteer_shift_category_id = volunteer_shift.volunteer_shift_category',
        'type' => 'right'
      );  


      // $params['where']['volunteer_shift_id'] = $id;
      // Set params
      $params['order'] = 'volunteer_shift_id DESC';


      return $this->find_count_active($params);
    }



    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=volunteer_shift_id and comment_status=1) as comments_count";

      // LEFT JOIN
      $param['joins'][] = array(
        'table' => 'volunteer_shift_category',
        'joint' => 'volunteer_shift_category.volunteer_shift_category_id = volunteer_shift.volunteer_shift_category',
        'type' => 'right'
      ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'volunteer_shift_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'volunteer_shift_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    //EXCEL REPORT FUNCTION
    public function getexportvolunteershift(){
      $response = array();
      $this->db->select('mt_volunteer_shift.volunteer_shift_id,mt_sale.sale_title,mt_volunteer_shift.volunteer_shift_start_time,,mt_volunteer_shift.volunteer_shift_end_time,mt_volunteer_shift.volunteer_shift_max_volunteers,mt_volunteer_shift.volunteer_shift_activity_desc,mt_volunteer_shift.volunteer_shift_createdon')
      ->from('mt_volunteer_shift')
      ->join('mt_sale','mt_volunteer_shift.volunteer_shift_sale_id= mt_sale.sale_id')
      ->where('mt_volunteer_shift.volunteer_shift_status = 1');
      $query = $this->db->get();
      $response = $query->result_array();

      return $response;
    }
    //EXCEL REPORT FUNCTION END

    public function get_page_volunteer_shift($page='')
    {
        // Set params
      $params['fields'] = 'volunteer_shift_page,volunteer_shift_title,volunteer_shift_category,volunteer_shift_image_path,volunteer_shift_image,volunteer_shift_status';
      $params['where']['volunteer_shift_page'] = $page;
      return $this->model_volunteer_shift->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
      $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "volunteer_shift_id,volunteer_shift_name,volunteer_shift_slug,volunteer_shift_detail,volunteer_shift_image,volunteer_shift_image_thumb,volunteer_shift_image_path,volunteer_shift_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = volunteer_shift_id and comment_status=1) AS total_comments,volunteer_shift_category_name";*/

        $param['fields'] = "volunteer_shift_id,volunteer_shift_title,volunteer_shift_slug,volunteer_shift_detail,volunteer_shift_image,volunteer_shift_image_thumb,volunteer_shift_image_path,volunteer_shift_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = volunteer_shift_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"volunteer_shift_category" ,

            "joint"=>"volunteer_shift_category.volunteer_shift_category_id = volunteer_shift.volunteer_shift_category_id and volunteer_shift_category.volunteer_shift_category_status =1",

            "type"=>"left"

          );*/



          $param['where']['volunteer_shift_slug'] = $slug;

        // Query

          $result = $this->find_one_active($param);



        // Return result;

          return $result;

        }

    // Get news comments
        public function get_comments($slug)
        {
        // Set params
          $params['fields'] = "volunteer_shift_id,volunteer_shift_title,comment_post_id,comment_name,comment_description,comment_created_on";
          $params['where']['volunteer_shift_slug'] = $slug;
        // Join
          $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"volunteer_shift.volunteer_shift_id = comment_post_id and comment_status=1",
          );
          $params['order'] = 'comment_id DESC';

          return $this->model_volunteer_shift->find_all_active($params);
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

        'volunteer_shift_id' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_id',
          'label' => 'id #',
          'type' => 'hidden',
          'type_dt' => 'text',
          'attributes' => array(),
          'dt_attributes' => array("width" => "5%"),
          'js_rules' => '',
          'rules' => 'trim'
        ),

        'volunteer_shift_sale_id' => array(
         'table'   => $this->_table,
         'name'   => 'volunteer_shift_sale_id',
         'label'   => 'Sale',
         'type'   => 'dropdown',
         'list_data' => array(),
         'attributes'   => array(),
         'js_rules'   => 'required',
         'rules'   => 'required|trim'
       ),


        'volunteer_shift_start_time' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_start_time',
          'label' => 'Start Time',
          'type' => 'datetime',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'volunteer_shift_end_time' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_end_time',
          'label' => 'End Time',
          'type' => 'datetime',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'volunteer_shift_max_volunteers' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_max_volunteers',
          'label' => 'Max Volunteer',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),


        'volunteer_shift_activity_desc' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_activity_desc',
          'label' => 'Activity Description',
          'type' => 'text',
          'attributes' => array(),
          'js_rules' => 'required',
          'rules' => 'required|trim|htmlentities'
        ),



        'volunteer_shift_status' => array(
          'table' => $this->_table,
          'name' => 'volunteer_shift_status',
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