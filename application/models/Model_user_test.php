
<?
class Model_user_test extends MY_Model
{
    /**
     * TKD user_test MODEL
     *
     * @package     user_test Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'user_test';
    protected $_field_prefix = 'user_test_';
    protected $_pk = 'user_test_id';
    protected $_status_field = 'user_test_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
    	$this->pagination_params['fields'] = "user_test_id,user_test_sale_id,user_test_dropoff_id,user_test_volunteer_id,user_test_status";

    	parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
    	if(!empty($keyword)){
    		$params['where_like'][] = array(
    			'column'=>'user_test_title',
    			'value'=>$keyword,
    			'type'=>'both',
    		);
    	}

    	$params['joins'][] = array(
    		'table' => 'user_test_category',
    		'joint' => 'user_test_category.user_test_category_id = user_test.user_test_category',
    		'type' => 'right'
    	);  


      // $params['where']['user_test_id'] = $id;
      // Set params
    	$params['order'] = 'user_test_id DESC';


    	return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
    	$prefix = $this->db->dbprefix;

    	$param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=user_test_id and comment_status=1) as comments_count";

      // LEFT JOIN
    	$param['joins'][] = array(
    		'table' => 'user_test_category',
    		'joint' => 'user_test_category.user_test_category_id = user_test.user_test_category',
    		'type' => 'right'
    	); 
      // For search
    	if(!empty($_GET['search'])  && $_GET['search'] != ''){
    		$param['where_like'][] = array(
    			'column'=>'user_test_title',
    			'value'=>$keyword,
    			'type'=>'both',
    		);
    	}
    	$param['order'] = 'user_test_id DESC';
    	$param['limit'] = $limit;
    	$param['offset'] = $offset;

      // debug($param,1);

      // Query data
    	$data = $this->find_all_active($param);
       // debug($data,1);

    	return $data;
    }

    public function get_page_user_test($page='')
    {
        // Set params
    	$params['fields'] = 'user_test_page,user_test_title,user_test_category,user_test_image_path,user_test_image,user_test_status';
    	$params['where']['user_test_page'] = $page;
    	return $this->model_user_test->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
    	$prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "user_test_id,user_test_name,user_test_slug,user_test_detail,user_test_image,user_test_image_thumb,user_test_image_path,user_test_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = user_test_id and comment_status=1) AS total_comments,user_test_category_name";*/

        $param['fields'] = "user_test_id,user_test_title,user_test_slug,user_test_detail,user_test_image,user_test_image_thumb,user_test_image_path,user_test_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = user_test_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"user_test_category" ,

            "joint"=>"user_test_category.user_test_category_id = user_test.user_test_category_id and user_test_category.user_test_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['user_test_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
    	$params['fields'] = "user_test_id,user_test_user_id,user_test_sale_id,comment_name,comment_description,comment_created_on";
    	$params['where']['user_test_slug'] = $slug;
        // Join
    	$params['joins'][] = array(
    		"table"=>"comment" ,
    		"joint"=>"user_test.user_test_id = comment_post_id and comment_status=1",
    	);
    	$params['order'] = 'comment_id DESC';

    	return $this->model_user_test->find_all_active($params);
    }

    // public function update_sale_voluteer($id, $saleid)
    // {
    // 	$this->db->set('user_test_status',2);
    // 	$this->db->where('user_test_user_id',$id);
    // 	$this->db->where('user_test_sale_id', $saleid);
    // 	$this->db->update('user_test');
    // }
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

    		'id' => array(
    			'table' => $this->_table,
    			'name' => 'id',
    			'label' => 'id #',
    			'type' => 'hidden',
    			'type_dt' => 'text',
    			'attributes' => array(),
    			'dt_attributes' => array("width" => "5%"),
    			'js_rules' => '',
    			'rules' => 'trim'
    		),

    		'user_name' => array(
    			'table'   => $this->_table,
    			'name'   => 'user_name',
    			'label'   => 'User Name',
    			'type'   => 'text',
    			'list_data' => array(),
    			'attributes'   => array(),
    			'js_rules'   => 'required',
    			'rules'   => 'required|trim'
    		),

    		'user_val' => array(
    			'table'   => $this->_table,
    			'name'   => 'user_val',
    			'label'   => 'User Val',
    			'type'   => 'text',
    			'list_data' => array(),
    			'attributes'   => array(),
    			'js_rules'   => '',
    			'rules'   => ''
    		),


    		// 'user_test_sale_id' => array(
    		// 	'table'   => $this->_table,
    		// 	'name'   => 'user_test_sale_id',
    		// 	'label'   => 'Sale Id',
    		// 	'type'   => 'dropdown',
    		// 	'list_data' => array(),
    		// 	'attributes'   => array(),
    		// 	'js_rules'   => 'required',
    		// 	'rules'   => 'required|trim'
    		// ),

    		// 'user_test_dropoff_id' => array(
    		// 	'table'   => $this->_table,
    		// 	'name'   => 'user_test_dropoff_id',
    		// 	'label'   => 'DropOff Id',
    		// 	'type'   => 'dropdown',
    		// 	'list_data' => array(),
    		// 	'attributes'   => array(),
    		// 	'js_rules'   => 'required',
    		// 	'rules'   => 'required|trim'
    		// ),


    		// 'user_test_volunteer_id' => array(
    		// 	'table'   => $this->_table,
    		// 	'name'   => 'user_test_volunteer_id',
    		// 	'label'   => 'Volunteer Id',
    		// 	'type'   => 'dropdown',
    		// 	'list_data' => array(),
    		// 	'attributes'   => array(),
    		// 	'js_rules'   => 'required',
    		// 	'rules'   => 'required|trim'
    		// ),

    		// 'user_test_status' => array(
    		// 	'table' => $this->_table,
    		// 	'name' => 'user_test_status',
    		// 	'label' => 'Status?',
    		// 	'type' => 'switch',
    		// 	'type_dt' => 'switch',
    		// 	'type_filter_dt' => 'dropdown',
    		// 	'list_data' => array(),
    		// 	'default' => '1',
    		// 	'attributes' => array(),
    		// 	'dt_attributes' => array("width" => "7%"),
    		// 	'rules' => 'trim'
    		// ),

    	);

    	if ($specific_field)
    		return $fields[$specific_field];
    	else
    		return $fields;

    }

}

?>
