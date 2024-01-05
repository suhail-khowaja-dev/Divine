<?
class Model_sale_transaction_data extends MY_Model
{
    /**
     * TKD sale_transaction MODEL
     *
     * @package     sale_transaction Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_transaction_data';
    protected $_field_prefix = 'sale_transaction_data_';
    protected $_pk = 'sale_transaction_data_id';
    protected $_status_field = 'sale_transaction_data_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "sale_transaction_data_id,sale_transaction_data_title,CONCAT(sale_transaction_data_image_path,sale_transaction_data_image) AS sale_transaction_data_image,sale_transaction_data_latest_featured,sale_transaction_data_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'sale_transaction_data_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'sale_transaction_data_category',
            'joint' => 'sale_transaction_data_category.sale_transaction_data_category_id = sale_transaction_data.sale_transaction_data_category',
            'type' => 'right'
        );  


      // $params['where']['sale_transaction_data_id'] = $id;
      // Set params
      $params['order'] = 'sale_transaction_data_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_transaction_data_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'sale_transaction_data_category',
            'joint' => 'sale_transaction_data_category.sale_transaction_data_category_id = sale_transaction_data.sale_transaction_data_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_transaction_data_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_transaction_data_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_transaction_data($page='')
    {
        // Set params
        $params['fields'] = 'sale_transaction_data_page,sale_transaction_data_title,sale_transaction_data_category,sale_transaction_data_image_path,sale_transaction_data_image,sale_transaction_data_status';
        $params['where']['sale_transaction_data_page'] = $page;
        return $this->sale_transaction_data->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        $param['fields'] = "sale_transaction_data_id,sale_transaction_data_title,sale_transaction_data_slug,sale_transaction_data_detail,sale_transaction_data_image,sale_transaction_data_image_thumb,sale_transaction_data_image_path,sale_transaction_data_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_transaction_data_id and comment_status=1) AS total_comments";



        $param['where']['sale_transaction_data_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "sale_transaction_data_id,sale_transaction_data_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['sale_transaction_data_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_transaction_data.sale_transaction_data_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->sale_transaction_data->find_all_active($params);
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

            'mt_sale_transaction_data_id' => array(
                'table' => $this->_table,
                'name' => 'mt_sale_transaction_data_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),


              'transaction_num' => array(
                     'table'   => $this->_table,
                     'name'   => 'transaction_num',
                     'label'   => 'Transaction Number',
                     'type'   => 'text',
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'con_vol_num'  => array(
                  'table'   => $this->_table,
                  'name'   => 'con_vol_num',
                  'label'   => 'Con Vol Number',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => 'required',
              ),

               'sale_num' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_num',
                     'label'   => 'Sale Number',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_price' => array(
                'table' => $this->_table,
                'name' => 'sale_price',
                'label' => 'Sale Price',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'half_off' => array(
                'table' => $this->_table,
                'name' => 'half_off',
                'label' => 'Half Off',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'sale_transaction_detail' => array(
                'table' => $this->_table,
                'name' => 'sale_transaction_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          'status' => array(
                'table' => $this->_table,
                'name' => 'status',
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