<?
class Model_sale_promotion_assignments extends MY_Model
{
    /**
     * TKD sale_promotion_assignments MODEL
     *
     * @package     sale_promotion_assignments Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'sale_promotion_assignments';
    protected $_field_prefix = 'sale_promotion_assignments_';
    protected $_pk = 'sale_promotion_assignments_id';
    protected $_status_field = 'sale_promotion_assignments_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "sale_promotion_assignments_id,sale_promotion_assignments_title,CONCAT(sale_promotion_assignments_image_path,sale_promotion_assignments_image) AS sale_promotion_assignments_image,sale_promotion_assignments_latest_featured,sale_promotion_assignments_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'sale_promotion_assignments_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'sale_promotion_assignments_category',
            'joint' => 'sale_promotion_assignments_category.sale_promotion_assignments_category_id = sale_promotion_assignments.sale_promotion_assignments_category',
            'type' => 'right'
        );  


      // $params['where']['sale_promotion_assignments_id'] = $id;
      // Set params
      $params['order'] = 'sale_promotion_assignments_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=sale_promotion_assignments_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'sale_promotion_assignments_category',
            'joint' => 'sale_promotion_assignments_category.sale_promotion_assignments_category_id = sale_promotion_assignments.sale_promotion_assignments_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'sale_promotion_assignments_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'sale_promotion_assignments_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_sale_promotion_assignments($page='')
    {
        // Set params
        $params['fields'] = 'sale_promotion_assignments_page,sale_promotion_assignments_title,sale_promotion_assignments_category,sale_promotion_assignments_image_path,sale_promotion_assignments_image,sale_promotion_assignments_status';
        $params['where']['sale_promotion_assignments_page'] = $page;
        return $this->model_sale_promotion_assignments->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "sale_promotion_assignments_id,sale_promotion_assignments_name,sale_promotion_assignments_slug,sale_promotion_assignments_detail,sale_promotion_assignments_image,sale_promotion_assignments_image_thumb,sale_promotion_assignments_image_path,sale_promotion_assignments_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_promotion_assignments_id and comment_status=1) AS total_comments,sale_promotion_assignments_category_name";*/

        $param['fields'] = "sale_promotion_assignments_id,sale_promotion_assignments_title,sale_promotion_assignments_slug,sale_promotion_assignments_detail,sale_promotion_assignments_image,sale_promotion_assignments_image_thumb,sale_promotion_assignments_image_path,sale_promotion_assignments_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = sale_promotion_assignments_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"sale_promotion_assignments_category" ,

            "joint"=>"sale_promotion_assignments_category.sale_promotion_assignments_category_id = sale_promotion_assignments.sale_promotion_assignments_category_id and sale_promotion_assignments_category.sale_promotion_assignments_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['sale_promotion_assignments_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "sale_promotion_assignments_id,sale_promotion_assignments_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['sale_promotion_assignments_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"sale_promotion_assignments.sale_promotion_assignments_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_sale_promotion_assignments->find_all_active($params);
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

            'sale_promotion_assignments_id' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'sale_promotion_assignments_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'sale_promotion_assignments_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'sale_promotion_assignments_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_promotion_assignments_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'sale_promotion_assignments_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'sale_promotion_assignments_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

               'sale_promotion_assignments_auhtor' => array(
                     'table'   => $this->_table,
                     'name'   => 'sale_promotion_assignments_auhtor',
                     'label'   => 'Author',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'sale_promotion_assignments_date' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_date',
                'label' => 'Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'sale_promotion_assignments_short_detail' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_short_detail',
                'label' => 'Short Description',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'sale_promotion_assignments_detail' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'sale_promotion_assignments_image' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_image',
                'label' => 'Image',
                'name_path' => 'sale_promotion_assignments_image_path',
                'upload_config' => 'site_upload_sale_promotion_assignments',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'thumb'   => array(array('name'=>'sale_promotion_assignments_image_thumb','max_width'=>470, 'max_height'=>316),),
                'attributes'   => array(
                    'image_size_recommended'=>'370px × 225px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            // 'sale_promotion_assignments_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'sale_promotion_assignments_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'sale_promotion_assignments_image_path',
            //     'upload_config' => 'site_upload_sale_promotion_assignments',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
                
            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),
            // 'sale_promotion_assignments_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'sale_promotion_assignments_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'sale_promotion_assignments_image_path',
            //     'upload_config' => 'site_upload_sale_promotion_assignments',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
                
            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),
            // 'sale_promotion_assignments_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'sale_promotion_assignments_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'sale_promotion_assignments_image_path',
            //     'upload_config' => 'site_upload_sale_promotion_assignments',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
                
            //     'attributes'   => array(
            //         'image_size_recommended'=>'540px × 370px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //    // 'js_rules'=>$is_required_image
            // ),

         /*'sale_promotion_assignments_by' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),*/

     'sale_promotion_assignments_latest_featured' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_latest_featured',
                'label' => 'Is Featured?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "sale_promotion_assignments_latest_featured" ,
                'list_data' => array(),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            'sale_promotion_assignments_status' => array(
                'table' => $this->_table,
                'name' => 'sale_promotion_assignments_status',
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