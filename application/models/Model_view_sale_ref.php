<?
class Model_view_sale_ref extends MY_Model
{
    /**
     * TKD view_sale_ref MODEL
     *
     * @package     view_sale_ref Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'view_sale_ref';
    protected $_field_prefix = 'view_sale_ref_';
    protected $_pk = 'view_sale_ref_id';
    protected $_status_field = 'view_sale_ref_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "view_sale_ref_id,view_sale_ref_title,CONCAT(view_sale_ref_image_path,view_sale_ref_image) AS view_sale_ref_image,view_sale_ref_latest_featured,view_sale_ref_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'view_sale_ref_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'view_sale_ref_category',
            'joint' => 'view_sale_ref_category.view_sale_ref_category_id = view_sale_ref.view_sale_ref_category',
            'type' => 'right'
        );  


      // $params['where']['view_sale_ref_id'] = $id;
      // Set params
      $params['order'] = 'view_sale_ref_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=view_sale_ref_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'view_sale_ref_category',
            'joint' => 'view_sale_ref_category.view_sale_ref_category_id = view_sale_ref.view_sale_ref_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'view_sale_ref_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'view_sale_ref_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_view_sale_ref($page='')
    {
        // Set params
        $params['fields'] = 'view_sale_ref_page,view_sale_ref_title,view_sale_ref_category,view_sale_ref_image_path,view_sale_ref_image,view_sale_ref_status';
        $params['where']['view_sale_ref_page'] = $page;
        return $this->model_view_sale_ref->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "view_sale_ref_id,view_sale_ref_name,view_sale_ref_slug,view_sale_ref_detail,view_sale_ref_image,view_sale_ref_image_thumb,view_sale_ref_image_path,view_sale_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_sale_ref_id and comment_status=1) AS total_comments,view_sale_ref_category_name";*/

        $param['fields'] = "view_sale_ref_id,view_sale_ref_title,view_sale_ref_slug,view_sale_ref_detail,view_sale_ref_image,view_sale_ref_image_thumb,view_sale_ref_image_path,view_sale_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_sale_ref_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"view_sale_ref_category" ,

            "joint"=>"view_sale_ref_category.view_sale_ref_category_id = view_sale_ref.view_sale_ref_category_id and view_sale_ref_category.view_sale_ref_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['view_sale_ref_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "view_sale_ref_id,view_sale_ref_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['view_sale_ref_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"view_sale_ref.view_sale_ref_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_view_sale_ref->find_all_active($params);
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

            'view_sale_ref_id' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'view_sale_ref_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'view_sale_ref_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'view_sale_ref_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'view_sale_ref_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'view_sale_ref_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'view_sale_ref_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

               'view_sale_ref_auhtor' => array(
                     'table'   => $this->_table,
                     'name'   => 'view_sale_ref_auhtor',
                     'label'   => 'Author',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'view_sale_ref_date' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_date',
                'label' => 'Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'view_sale_ref_short_detail' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_short_detail',
                'label' => 'Short Description',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'view_sale_ref_detail' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'view_sale_ref_image' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_image',
                'label' => 'Image',
                'name_path' => 'view_sale_ref_image_path',
                'upload_config' => 'site_upload_view_sale_ref',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'thumb'   => array(array('name'=>'view_sale_ref_image_thumb','max_width'=>470, 'max_height'=>316),),
                'attributes'   => array(
                    'image_size_recommended'=>'370px × 225px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            // 'view_sale_ref_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_sale_ref_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'view_sale_ref_image_path',
            //     'upload_config' => 'site_upload_view_sale_ref',
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
            // 'view_sale_ref_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_sale_ref_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'view_sale_ref_image_path',
            //     'upload_config' => 'site_upload_view_sale_ref',
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
            // 'view_sale_ref_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_sale_ref_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'view_sale_ref_image_path',
            //     'upload_config' => 'site_upload_view_sale_ref',
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

         /*'view_sale_ref_by' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),*/

     'view_sale_ref_latest_featured' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_latest_featured',
                'label' => 'Is Featured?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "view_sale_ref_latest_featured" ,
                'list_data' => array(),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            'view_sale_ref_status' => array(
                'table' => $this->_table,
                'name' => 'view_sale_ref_status',
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