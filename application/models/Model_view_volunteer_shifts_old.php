<?
class Model_view_volunteer_shifts_old extends MY_Model
{
    /**
     * TKD view_volunteer_shifts_old MODEL
     *
     * @package     view_volunteer_shifts_old Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'view_volunteer_shifts_old';
    protected $_field_prefix = 'view_volunteer_shifts_old_';
    protected $_pk = 'view_volunteer_shifts_old_id';
    protected $_status_field = 'view_volunteer_shifts_old_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "view_volunteer_shifts_old_id,view_volunteer_shifts_old_title,CONCAT(view_volunteer_shifts_old_image_path,view_volunteer_shifts_old_image) AS view_volunteer_shifts_old_image,view_volunteer_shifts_old_latest_featured,view_volunteer_shifts_old_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'view_volunteer_shifts_old_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'view_volunteer_shifts_old_category',
            'joint' => 'view_volunteer_shifts_old_category.view_volunteer_shifts_old_category_id = view_volunteer_shifts_old.view_volunteer_shifts_old_category',
            'type' => 'right'
        );  


      // $params['where']['view_volunteer_shifts_old_id'] = $id;
      // Set params
      $params['order'] = 'view_volunteer_shifts_old_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=view_volunteer_shifts_old_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'view_volunteer_shifts_old_category',
            'joint' => 'view_volunteer_shifts_old_category.view_volunteer_shifts_old_category_id = view_volunteer_shifts_old.view_volunteer_shifts_old_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'view_volunteer_shifts_old_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'view_volunteer_shifts_old_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_view_volunteer_shifts_old($page='')
    {
        // Set params
        $params['fields'] = 'view_volunteer_shifts_old_page,view_volunteer_shifts_old_title,view_volunteer_shifts_old_category,view_volunteer_shifts_old_image_path,view_volunteer_shifts_old_image,view_volunteer_shifts_old_status';
        $params['where']['view_volunteer_shifts_old_page'] = $page;
        return $this->model_view_volunteer_shifts_old->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "view_volunteer_shifts_old_id,view_volunteer_shifts_old_name,view_volunteer_shifts_old_slug,view_volunteer_shifts_old_detail,view_volunteer_shifts_old_image,view_volunteer_shifts_old_image_thumb,view_volunteer_shifts_old_image_path,view_volunteer_shifts_old_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_volunteer_shifts_old_id and comment_status=1) AS total_comments,view_volunteer_shifts_old_category_name";*/

        $param['fields'] = "view_volunteer_shifts_old_id,view_volunteer_shifts_old_title,view_volunteer_shifts_old_slug,view_volunteer_shifts_old_detail,view_volunteer_shifts_old_image,view_volunteer_shifts_old_image_thumb,view_volunteer_shifts_old_image_path,view_volunteer_shifts_old_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = view_volunteer_shifts_old_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"view_volunteer_shifts_old_category" ,

            "joint"=>"view_volunteer_shifts_old_category.view_volunteer_shifts_old_category_id = view_volunteer_shifts_old.view_volunteer_shifts_old_category_id and view_volunteer_shifts_old_category.view_volunteer_shifts_old_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['view_volunteer_shifts_old_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "view_volunteer_shifts_old_id,view_volunteer_shifts_old_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['view_volunteer_shifts_old_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"view_volunteer_shifts_old.view_volunteer_shifts_old_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_view_volunteer_shifts_old->find_all_active($params);
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

            'view_volunteer_shifts_old_id' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'view_volunteer_shifts_old_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'view_volunteer_shifts_old_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'view_volunteer_shifts_old_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'view_volunteer_shifts_old_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'view_volunteer_shifts_old_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'view_volunteer_shifts_old_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

               'view_volunteer_shifts_old_auhtor' => array(
                     'table'   => $this->_table,
                     'name'   => 'view_volunteer_shifts_old_auhtor',
                     'label'   => 'Author',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'view_volunteer_shifts_old_date' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_date',
                'label' => 'Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'view_volunteer_shifts_old_short_detail' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_short_detail',
                'label' => 'Short Description',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'view_volunteer_shifts_old_detail' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'view_volunteer_shifts_old_image' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_image',
                'label' => 'Image',
                'name_path' => 'view_volunteer_shifts_old_image_path',
                'upload_config' => 'site_upload_view_volunteer_shifts_old',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'thumb'   => array(array('name'=>'view_volunteer_shifts_old_image_thumb','max_width'=>470, 'max_height'=>316),),
                'attributes'   => array(
                    'image_size_recommended'=>'370px × 225px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            // 'view_volunteer_shifts_old_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_volunteer_shifts_old_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'view_volunteer_shifts_old_image_path',
            //     'upload_config' => 'site_upload_view_volunteer_shifts_old',
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
            // 'view_volunteer_shifts_old_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_volunteer_shifts_old_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'view_volunteer_shifts_old_image_path',
            //     'upload_config' => 'site_upload_view_volunteer_shifts_old',
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
            // 'view_volunteer_shifts_old_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'view_volunteer_shifts_old_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'view_volunteer_shifts_old_image_path',
            //     'upload_config' => 'site_upload_view_volunteer_shifts_old',
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

         /*'view_volunteer_shifts_old_by' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),*/

     'view_volunteer_shifts_old_latest_featured' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_latest_featured',
                'label' => 'Is Featured?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "view_volunteer_shifts_old_latest_featured" ,
                'list_data' => array(),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            'view_volunteer_shifts_old_status' => array(
                'table' => $this->_table,
                'name' => 'view_volunteer_shifts_old_status',
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