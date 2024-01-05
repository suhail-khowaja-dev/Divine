<?
class Model_volunteer_shift_ref extends MY_Model
{
    /**
     * TKD volunteer_shift_ref MODEL
     *
     * @package     volunteer_shift_ref Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'volunteer_shift_ref';
    protected $_field_prefix = 'volunteer_shift_ref_';
    protected $_pk = 'vol_shift_num';
    protected $_status_field = 'volunteer_shift_ref_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "vol_shift_num,sale_ref,shift_start_time,shift_end_time,max_volunteers,activity_desc,volunteer_shift_ref_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'volunteer_shift_ref_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'volunteer_shift_ref_category',
            'joint' => 'volunteer_shift_ref_category.volunteer_shift_ref_category_id = volunteer_shift_ref.volunteer_shift_ref_category',
            'type' => 'right'
        );  


      // $params['where']['vol_shift_num'] = $id;
      // Set params
      $params['order'] = 'vol_shift_num DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=vol_shift_num and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'volunteer_shift_ref_category',
            'joint' => 'volunteer_shift_ref_category.volunteer_shift_ref_category_id = volunteer_shift_ref.volunteer_shift_ref_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'volunteer_shift_ref_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'vol_shift_num DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_volunteer_shift_ref($page='')
    {
        // Set params
        $params['fields'] = 'volunteer_shift_ref_page,volunteer_shift_ref_title,volunteer_shift_ref_category,volunteer_shift_ref_image_path,volunteer_shift_ref_image,volunteer_shift_ref_status';
        $params['where']['volunteer_shift_ref_page'] = $page;
        return $this->model_volunteer_shift_ref->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "vol_shift_num,volunteer_shift_ref_name,volunteer_shift_ref_slug,volunteer_shift_ref_detail,volunteer_shift_ref_image,volunteer_shift_ref_image_thumb,volunteer_shift_ref_image_path,volunteer_shift_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = vol_shift_num and comment_status=1) AS total_comments,volunteer_shift_ref_category_name";*/

        $param['fields'] = "vol_shift_num,volunteer_shift_ref_title,volunteer_shift_ref_slug,volunteer_shift_ref_detail,volunteer_shift_ref_image,volunteer_shift_ref_image_thumb,volunteer_shift_ref_image_path,volunteer_shift_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = vol_shift_num and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"volunteer_shift_ref_category" ,

            "joint"=>"volunteer_shift_ref_category.volunteer_shift_ref_category_id = volunteer_shift_ref.volunteer_shift_ref_category_id and volunteer_shift_ref_category.volunteer_shift_ref_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['volunteer_shift_ref_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "vol_shift_num,volunteer_shift_ref_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['volunteer_shift_ref_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"volunteer_shift_ref.vol_shift_num = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_volunteer_shift_ref->find_all_active($params);
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

            'vol_shift_num' => array(
                'table' => $this->_table,
                'name' => 'vol_shift_num',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'volunteer_shift_ref_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'volunteer_shift_ref_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        

              'sale_ref'  => array(
                  'table'   => $this->_table,
                  'name'   => 'sale_ref',
                  'label'   => 'Sale Number',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => 'required',
                  'rules'   => 'required'
              ),

              

            'shift_start_time' => array(
                'table' => $this->_table,
                'name' => 'shift_start_time',
                'label' => 'Start Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'shift_end_time' => array(
                'table' => $this->_table,
                'name' => 'shift_end_time',
                'label' => 'End Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'max_volunteers' => array(
                     'table'   => $this->_table,
                     'name'   => 'max_volunteers',
                     'label'   => 'Max Volunteer',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

             'activity_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'activity_desc',
                     'label'   => 'Description',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


            

            'volunteer_shift_ref_status' => array(
                'table' => $this->_table,
                'name' => 'volunteer_shift_ref_status',
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