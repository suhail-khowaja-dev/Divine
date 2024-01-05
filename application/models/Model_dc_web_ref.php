<?
class Model_dc_web_ref extends MY_Model
{
    /**
     * TKD dc_web_ref MODEL
     *
     * @package     dc_web_ref Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'dc_web_ref';
    protected $_field_prefix = 'dc_web_ref_';
    protected $_pk = 'dc_web_ref_id';
    protected $_status_field = 'dc_web_ref_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "dc_web_ref_id,dc_web_ref_title,CONCAT(dc_web_ref_image_path,dc_web_ref_image) AS dc_web_ref_image,dc_web_ref_latest_featured,dc_web_ref_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'dc_web_ref_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'dc_web_ref_category',
            'joint' => 'dc_web_ref_category.dc_web_ref_category_id = dc_web_ref.dc_web_ref_category',
            'type' => 'right'
        );  


      // $params['where']['dc_web_ref_id'] = $id;
      // Set params
      $params['order'] = 'dc_web_ref_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=dc_web_ref_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'dc_web_ref_category',
            'joint' => 'dc_web_ref_category.dc_web_ref_category_id = dc_web_ref.dc_web_ref_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'dc_web_ref_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'dc_web_ref_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_dc_web_ref($page='')
    {
        // Set params
        $params['fields'] = 'dc_web_ref_page,dc_web_ref_title,dc_web_ref_category,dc_web_ref_image_path,dc_web_ref_image,dc_web_ref_status';
        $params['where']['dc_web_ref_page'] = $page;
        return $this->model_dc_web_ref->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "dc_web_ref_id,dc_web_ref_name,dc_web_ref_slug,dc_web_ref_detail,dc_web_ref_image,dc_web_ref_image_thumb,dc_web_ref_image_path,dc_web_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = dc_web_ref_id and comment_status=1) AS total_comments,dc_web_ref_category_name";*/

        $param['fields'] = "dc_web_ref_id,dc_web_ref_title,dc_web_ref_slug,dc_web_ref_detail,dc_web_ref_image,dc_web_ref_image_thumb,dc_web_ref_image_path,dc_web_ref_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = dc_web_ref_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"dc_web_ref_category" ,

            "joint"=>"dc_web_ref_category.dc_web_ref_category_id = dc_web_ref.dc_web_ref_category_id and dc_web_ref_category.dc_web_ref_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['dc_web_ref_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "dc_web_ref_id,dc_web_ref_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['dc_web_ref_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"dc_web_ref.dc_web_ref_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_dc_web_ref->find_all_active($params);
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

            'dc_web_ref_id' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'dc_web_ref_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'dc_web_ref_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'dc_web_ref_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'dc_web_ref_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'dc_web_ref_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'dc_web_ref_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

               'dc_web_ref_auhtor' => array(
                     'table'   => $this->_table,
                     'name'   => 'dc_web_ref_auhtor',
                     'label'   => 'Author',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'dc_web_ref_date' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_date',
                'label' => 'Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'dc_web_ref_short_detail' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_short_detail',
                'label' => 'Short Description',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'dc_web_ref_detail' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'dc_web_ref_image' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_image',
                'label' => 'Image',
                'name_path' => 'dc_web_ref_image_path',
                'upload_config' => 'site_upload_dc_web_ref',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'thumb'   => array(array('name'=>'dc_web_ref_image_thumb','max_width'=>470, 'max_height'=>316),),
                'attributes'   => array(
                    'image_size_recommended'=>'370px × 225px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            // 'dc_web_ref_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'dc_web_ref_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'dc_web_ref_image_path',
            //     'upload_config' => 'site_upload_dc_web_ref',
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
            // 'dc_web_ref_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'dc_web_ref_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'dc_web_ref_image_path',
            //     'upload_config' => 'site_upload_dc_web_ref',
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
            // 'dc_web_ref_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'dc_web_ref_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'dc_web_ref_image_path',
            //     'upload_config' => 'site_upload_dc_web_ref',
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

         /*'dc_web_ref_by' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),*/

     'dc_web_ref_latest_featured' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_latest_featured',
                'label' => 'Is Featured?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "dc_web_ref_latest_featured" ,
                'list_data' => array(),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            'dc_web_ref_status' => array(
                'table' => $this->_table,
                'name' => 'dc_web_ref_status',
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