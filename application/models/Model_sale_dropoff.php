<?
class Model_sale_dropoff extends MY_Model
{
    /**
     * TKD sale_dropoff MODEL
     *
     * @package     sale_dropoff Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_dropoff';
    protected $_field_prefix = 'sale_dropoff_';
    protected $_pk = 'sale_dropoff_ref_id';
    protected $_status_field = 'sale_dropoff_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "sale_dropoff_ref_id,drop_off,sale_num,start_time,end_time,designated_slots,sale_dropoff_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'sale_dropoff_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'sale_dropoff_category',
            'joint' => 'sale_dropoff_category.sale_dropoff_category_id = sale_dropoff.sale_dropoff_category',
            'type' => 'right'
        );  


      // $params['where']['sale_dropoff_ref_id'] = $id;
      // Set params
      $params['order'] = 'sale_dropoff_ref_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_dropoff_ref_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'sale_dropoff_category',
            'joint' => 'sale_dropoff_category.sale_dropoff_category_id = sale_dropoff.sale_dropoff_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_dropoff_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_dropoff_ref_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_dropoff($page='')
    {
        // Set params
        $params['fields'] = 'sale_dropoff_page,sale_dropoff_title,sale_dropoff_category,sale_dropoff_image_path,sale_dropoff_image,sale_dropoff_status';
        $params['where']['sale_dropoff_page'] = $page;
        return $this->model_sale_dropoff->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_dropoff_ref_id,sale_dropoff_name,sale_dropoff_slug,sale_dropoff_detail,sale_dropoff_image,sale_dropoff_image_thumb,sale_dropoff_image_path,sale_dropoff_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_dropoff_ref_id and comment_status=1) AS total_comments,sale_dropoff_category_name";*/

        $param['fields'] = "sale_dropoff_ref_id,sale_dropoff_title,sale_dropoff_slug,sale_dropoff_detail,sale_dropoff_image,sale_dropoff_image_thumb,sale_dropoff_image_path,sale_dropoff_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_dropoff_ref_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_dropoff_category" ,

            "joint"=>"sale_dropoff_category.sale_dropoff_category_id = sale_dropoff.sale_dropoff_category_id and sale_dropoff_category.sale_dropoff_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['sale_dropoff_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "sale_dropoff_ref_id,sale_dropoff_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['sale_dropoff_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_dropoff.sale_dropoff_ref_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_sale_dropoff->find_all_active($params);
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

            'sale_dropoff_ref_id' => array(
                'table' => $this->_table,
                'name' => 'sale_dropoff_ref_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            'drop_off' => array(
                'table' => $this->_table,
                'name' => 'drop_off',
                'label' => 'Drop Off id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),
             'sale_num' => array(
                'table' => $this->_table,
                'name' => 'sale_num',
                'label' => 'Sale #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            

           // 'sale_dropoff_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'sale_dropoff_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


            

            'start_time' => array(
                'table' => $this->_table,
                'name' => 'start_time',
                'label' => 'Start Time',
                'type' => 'datetime',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'end_time' => array(
                'table' => $this->_table,
                'name' => 'end_time',
                'label' => 'End Time',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'sale_dropoff_location_phone' => array(
                'table' => $this->_table,
                'name' => 'sale_dropoff_location_phone',
                'label' => 'Location Phone No',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'designated_slots' => array(
                'table' => $this->_table,
                'name' => 'designated_slots',
                'label' => 'Designated Slots',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

           
            'sale_dropoff_status' => array(
                'table' => $this->_table,
                'name' => 'sale_dropoff_status',
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