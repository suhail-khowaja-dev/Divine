<?
class Model_consignor_volunteer extends MY_Model
{
    /**
     * TKD consignor_volunteer MODEL
     *
     * @package     consignor_volunteer Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'consignor_volunteer';
    protected $_field_prefix = 'consignor_volunteer_';
    protected $_pk = 'consignor_volunteer_id';
    protected $_status_field = 'consignor_volunteer_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "consignor_volunteer_id,consignor_volunteer_title,CONCAT(consignor_volunteer_image_path,consignor_volunteer_image) AS consignor_volunteer_image,consignor_volunteer_latest_featured,consignor_volunteer_status";

        parent::__construct();
    }
    public function get_total_count($params = array() , $keyword='')
    {

      // debug($keyword,1);

      // For search
      if(!empty($keyword)){
      $params['where_like'][] = array(
        'column'=>'consignor_volunteer_title',
        'value'=>$keyword,
        'type'=>'both',
        );
      }

      $params['joins'][] = array(
            'table' => 'consignor_volunteer_category',
            'joint' => 'consignor_volunteer_category.consignor_volunteer_category_id = consignor_volunteer.consignor_volunteer_category',
            'type' => 'right'
        );  


      // $params['where']['consignor_volunteer_id'] = $id;
      // Set params
      $params['order'] = 'consignor_volunteer_id DESC';


      return $this->find_count_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '', $param = array() ,$keyword = '')
    {
      $prefix = $this->db->dbprefix;

      $param['fields'] = "*,(select count(*) from yt_comment where comment_post_id=consignor_volunteer_id and comment_status=1) as comments_count";

      // LEFT JOIN
     $param['joins'][] = array(
            'table' => 'consignor_volunteer_category',
            'joint' => 'consignor_volunteer_category.consignor_volunteer_category_id = consignor_volunteer.consignor_volunteer_category',
            'type' => 'right'
        ); 
      // For search
      if(!empty($_GET['search'])  && $_GET['search'] != ''){
        $param['where_like'][] = array(
          'column'=>'consignor_volunteer_title',
          'value'=>$keyword,
          'type'=>'both',
        );
      }
      $param['order'] = 'consignor_volunteer_id DESC';
      $param['limit'] = $limit;
      $param['offset'] = $offset;

      // debug($param,1);
      
      // Query data
      $data = $this->find_all_active($param);
       // debug($data,1);

      return $data;
    }

    public function get_page_consignor_volunteer($page='')
    {
        // Set params
        $params['fields'] = 'consignor_volunteer_page,consignor_volunteer_title,consignor_volunteer_category,consignor_volunteer_image_path,consignor_volunteer_image,consignor_volunteer_status';
        $params['where']['consignor_volunteer_page'] = $page;
        return $this->model_consignor_volunteer->find_one_active($params);

    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        $prefix = $this->db->dbprefix;

        // Set params

        /*$param['fields'] = "consignor_volunteer_id,consignor_volunteer_name,consignor_volunteer_slug,consignor_volunteer_detail,consignor_volunteer_image,consignor_volunteer_image_thumb,consignor_volunteer_image_path,consignor_volunteer_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = consignor_volunteer_id and comment_status=1) AS total_comments,consignor_volunteer_category_name";*/

        $param['fields'] = "consignor_volunteer_id,consignor_volunteer_title,consignor_volunteer_slug,consignor_volunteer_detail,consignor_volunteer_image,consignor_volunteer_image_thumb,consignor_volunteer_image_path,consignor_volunteer_createdon,

        (SELECT COUNT(comment_post_id) FROM ".$prefix."comment WHERE comment_post_id = consignor_volunteer_id and comment_status=1) AS total_comments";



        // LEFT JOIN

        /*$param['joins'][] = array(

            "table"=>"consignor_volunteer_category" ,

            "joint"=>"consignor_volunteer_category.consignor_volunteer_category_id = consignor_volunteer.consignor_volunteer_category_id and consignor_volunteer_category.consignor_volunteer_category_status =1",

            "type"=>"left"

        );*/



        $param['where']['consignor_volunteer_slug'] = $slug;

        // Query

        $result = $this->find_one_active($param);



        // Return result;

        return $result;

    }

    // Get news comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "consignor_volunteer_id,consignor_volunteer_title,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['consignor_volunteer_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"consignor_volunteer.consignor_volunteer_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_consignor_volunteer->find_all_active($params);
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

            'consignor_volunteer_id' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

           // 'consignor_volunteer_category' => array(
           //       'table'   => $this->_table,
           //       'name'   => 'consignor_volunteer_category',
           //       'label'   => 'Category',
           //       'type'   => 'dropdown',
           //       'list_data' => array(),
           //       'attributes'   => array(),
           //       'js_rules'   => 'required',
           //       'rules'   => 'required|trim'
           //   ),
        


              'consignor_volunteer_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'consignor_volunteer_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'consignor_volunteer_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'consignor_volunteer_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|strtolower|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

               'consignor_volunteer_auhtor' => array(
                     'table'   => $this->_table,
                     'name'   => 'consignor_volunteer_auhtor',
                     'label'   => 'Author',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
            ),

            'consignor_volunteer_date' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_date',
                'label' => 'Date',
                'type' => 'date',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


            'consignor_volunteer_short_detail' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_short_detail',
                'label' => 'Short Description',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),
          
          'consignor_volunteer_detail' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_detail',
                'label' => 'Long Description',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),

            'consignor_volunteer_image' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_image',
                'label' => 'Image',
                'name_path' => 'consignor_volunteer_image_path',
                'upload_config' => 'site_upload_consignor_volunteer',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'thumb'   => array(array('name'=>'consignor_volunteer_image_thumb','max_width'=>470, 'max_height'=>316),),
                'attributes'   => array(
                    'image_size_recommended'=>'370px × 225px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            // 'consignor_volunteer_image_detail1' => array(
            //     'table' => $this->_table,
            //     'name' => 'consignor_volunteer_image_detail1',
            //     'label' => 'Image 1 Detail Page',
            //     'name_path' => 'consignor_volunteer_image_path',
            //     'upload_config' => 'site_upload_consignor_volunteer',
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
            // 'consignor_volunteer_image_detail2' => array(
            //     'table' => $this->_table,
            //     'name' => 'consignor_volunteer_image_detail2',
            //     'label' => 'Image 2 Detail Page',
            //     'name_path' => 'consignor_volunteer_image_path',
            //     'upload_config' => 'site_upload_consignor_volunteer',
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
            // 'consignor_volunteer_image_detail12' => array(
            //     'table' => $this->_table,
            //     'name' => 'consignor_volunteer_image_detail12',
            //     'label' => 'Image 3 Detail Page',
            //     'name_path' => 'consignor_volunteer_image_path',
            //     'upload_config' => 'site_upload_consignor_volunteer',
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

         /*'consignor_volunteer_by' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_by',
                'label' => 'By',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),*/

     'consignor_volunteer_latest_featured' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_latest_featured',
                'label' => 'Is Featured?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "consignor_volunteer_latest_featured" ,
                'list_data' => array(),
                'default' => '0',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),
            'consignor_volunteer_status' => array(
                'table' => $this->_table,
                'name' => 'consignor_volunteer_status',
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