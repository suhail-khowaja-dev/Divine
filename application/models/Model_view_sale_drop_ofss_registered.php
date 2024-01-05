<?
class Model_view_sale_drop_ofss_registered extends MY_Model
{
    /**
     * TKD view_sale_drop_ofss_registered MODEL
     *
     * @package     view_sale_drop_ofss_registered Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'view_sale_drop_ofss_registered';
    protected $_field_prefix = 'view_sale_drop_ofss_registered_';
    protected $_pk = 'view_sale_drop_ofss_registered_id';
    protected $_status_field = 'view_sale_drop_ofss_registered_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "view_sale_drop_ofss_registered_id,sale_location,start_time,end_time,designated_slots,reg_drops,reg_active,view_sale_drop_ofss_registered_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'view_sale_drop_ofss_registered_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'view_sale_drop_ofss_registered_category',
            'joint' => 'view_sale_drop_ofss_registered_category.view_sale_drop_ofss_registered_category_id = view_sale_drop_ofss_registered.view_sale_drop_ofss_registered_category',
            'type' => 'right'
        );  


      // $params['where']['view_sale_drop_ofss_registered_id'] = $id;
      // Set params
      $params['order'] = 'view_sale_drop_ofss_registered_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=view_sale_drop_ofss_registered_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'view_sale_drop_ofss_registered_category',
            'joint' => 'view_sale_drop_ofss_registered_category.view_sale_drop_ofss_registered_category_id = view_sale_drop_ofss_registered.view_sale_drop_ofss_registered_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'view_sale_drop_ofss_registered_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'view_sale_drop_ofss_registered_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_view_sale_drop_ofss_registered($page='')
    {
        // Set params
        $params['fields'] = 'view_sale_drop_ofss_registered_page,view_sale_drop_ofss_registered_title,view_sale_drop_ofss_registered_category,view_sale_drop_ofss_registered_image_path,view_sale_drop_ofss_registered_image,view_sale_drop_ofss_registered_status';
        $params['where']['view_sale_drop_ofss_registered_page'] = $page;
        return $this->model_view_sale_drop_ofss_registered->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "view_sale_drop_ofss_registered_id,view_sale_drop_ofss_registered_name,view_sale_drop_ofss_registered_slug,view_sale_drop_ofss_registered_detail,view_sale_drop_ofss_registered_image,view_sale_drop_ofss_registered_image_thumb,view_sale_drop_ofss_registered_image_path,view_sale_drop_ofss_registered_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_sale_drop_ofss_registered_id and comment_status=1) AS total_comments,view_sale_drop_ofss_registered_category_name";*/

        $param['fields'] = "view_sale_drop_ofss_registered_id,view_sale_drop_ofss_registered_title,view_sale_drop_ofss_registered_slug,view_sale_drop_ofss_registered_detail,view_sale_drop_ofss_registered_image,view_sale_drop_ofss_registered_image_thumb,view_sale_drop_ofss_registered_image_path,view_sale_drop_ofss_registered_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_sale_drop_ofss_registered_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"view_sale_drop_ofss_registered_category" ,

            "joint"=>"view_sale_drop_ofss_registered_category.view_sale_drop_ofss_registered_category_id = view_sale_drop_ofss_registered.view_sale_drop_ofss_registered_category_id and view_sale_drop_ofss_registered_category.view_sale_drop_ofss_registered_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['view_sale_drop_ofss_registered_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "view_sale_drop_ofss_registered_id,view_sale_drop_ofss_registered_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['view_sale_drop_ofss_registered_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"view_sale_drop_ofss_registered.view_sale_drop_ofss_registered_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_view_sale_drop_ofss_registered->find_all_active($params);
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

            'view_sale_drop_ofss_registered_id' => array(
                'table' => $this->_table,
                'name' => 'view_sale_drop_ofss_registered_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),
        


              'sale_location' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_location',
                     'label'   => 'Location',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),



            'start_time' => array(
                'table' => $this->_table,
                'name' => 'start_time',
                'label' => 'Start Time',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'end_time' => array(
                'table' => $this->_table,
                'name' => 'end_time',
                'label' => 'End Time',
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


             'reg_drops' => array(
                'table' => $this->_table,
                'name' => 'reg_drops',
                'label' => 'Reg Drops',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'reg_active' => array(
                'table' => $this->_table,
                'name' => 'reg_active',
                'label' => 'Reg Active?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            


            'view_sale_drop_ofss_registered_status' => array(
                'table' => $this->_table,
                'name' => 'view_sale_drop_ofss_registered_status',
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