<?
class Model_sale_ref extends MY_Model
{
    /**
     * TKD sale_ref MODEL
     *
     * @package     sale_ref Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_ref';
    protected $_field_prefix = 'sale_ref_';
    protected $_pk = 'sale_num';
    protected $_status_field = 'sale_ref_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "sale_num,sale_location,sale_street,sale_start_date,sale_end_date,sale_ref_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'sale_ref_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'sale_ref_category',
            'joint' => 'sale_ref_category.sale_ref_category_id = sale_ref.sale_ref_category',
            'type' => 'right'
        );  


      // $params['where']['sale_num'] = $id;
      // Set params
      $params['order'] = 'sale_num DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_num and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'sale_ref_category',
            'joint' => 'sale_ref_category.sale_ref_category_id = sale_ref.sale_ref_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_ref_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_num DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_ref($page='')
    {
        // Set params
        $params['fields'] = 'sale_ref_page,sale_ref_title,sale_ref_category,sale_ref_image_path,sale_ref_image,sale_ref_status';
        $params['where']['sale_ref_page'] = $page;
        return $this->model_sale_ref->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_num,sale_ref_name,sale_ref_slug,sale_ref_detail,sale_ref_image,sale_ref_image_thumb,sale_ref_image_path,sale_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_num and comment_status=1) AS total_comments,sale_ref_category_name";*/

        $param['fields'] = "sale_num,sale_ref_title,sale_ref_slug,sale_ref_detail,sale_ref_image,sale_ref_image_thumb,sale_ref_image_path,sale_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_num and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_ref_category" ,

            "joint"=>"sale_ref_category.sale_ref_category_id = sale_ref.sale_ref_category_id and sale_ref_category.sale_ref_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['sale_ref_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "sale_num,sale_ref_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['sale_ref_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_ref.sale_num = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_sale_ref->find_all_active($params);
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

            'sale_num' => array(
                'table' => $this->_table,
                'name' => 'sale_num',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'sale_ref_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'sale_ref_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        

              'sale_location'  => array(
                  'table'   => $this->_table,
                  'name'   => 'sale_location',
                  'label'   => 'Sale Location',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => 'required',
                  'rules'   => 'required'
              ),

               'sale_street' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_street',
                     'label'   => 'Street',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_city' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_city',
                     'label'   => 'City',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_state' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_state',
                     'label'   => 'State',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_zip' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_zip',
                     'label'   => 'Zip',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_start_date' => array(
                'table' => $this->_table,
                'name' => 'sale_start_date',
                'label' => 'Start Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'sale_end_date' => array(
                'table' => $this->_table,
                'name' => 'sale_end_date',
                'label' => 'End Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'sale_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_phone',
                     'label'   => 'Phone',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

             'sale_reg_fee' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_reg_fee',
                     'label'   => 'Reg Fee',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


             'sales_tax_rate' => array(
                     'table'   => $this->_table,
                     'name'   => 'sales_tax_rate',
                     'label'   => 'Tax Rate',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'min_con_vol_num' => array(
                     'table'   => $this->_table,
                     'name'   => 'min_con_vol_num',
                     'label'   => 'Con Vol No',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


            'next_avail_con_vol_num' => array(
                     'table'   => $this->_table,
                     'name'   => 'next_avail_con_vol_num',
                     'label'   => 'Available Con Vol No',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


            'next_avail_con_vol_num' => array(
                     'table'   => $this->_table,
                     'name'   => 'next_avail_con_vol_num',
                     'label'   => 'Available Con Vol No',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),


          'reg_active' => array(
                'table' => $this->_table,
                'name' => 'reg_active',
                'label' => 'Reg?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),


           'vol_active' => array(
                'table' => $this->_table,
                'name' => 'vol_active',
                'label' => 'Vol?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),



            'promo_active' => array(
                'table' => $this->_table,
                'name' => 'promo_active',
                'label' => 'Promo?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),


              'sale_hanger_fee' => array(
                'table' => $this->_table,
                'name' => 'sale_hanger_fee',
                'label' => 'Hanger Fee?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),

             'second_sale_reg_active' => array(
                'table' => $this->_table,
                'name' => 'second_sale_reg_active',
                'label' => 'Second Sale Reg?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),


            'sale_ref_status' => array(
                'table' => $this->_table,
                'name' => 'sale_ref_status',
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