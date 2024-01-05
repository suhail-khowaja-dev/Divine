<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Default Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Home Page
	public function index()
	{
        global $config;
        // Get banner
        $data['banner'] = $this->model_banner->find_all_active();
        // Get Home page products
        //$data['feature_products'] = $this->model_product->get_feature_products();
        // debug($data['banner'],1);h

        // Best deals
        $data['best_deals'] = $this->model_product->best_deals();
        // Top 10 Selected Products On the Week
        $data['product_week'] = $this->model_product->product_week();
        // Top 10 Selected Products On the Week
        $data['hot_sale'] = $this->model_product->hot_sale();
        // Top 10 Selected Products On the Week
        $data['recent_views'] = $this->model_product->recent_views($this->userid);
        // Top 10 Selected Products On the Week
        $data['popular_search'] = $this->model_product->popular_search();
        // Flash Sale
        $data['flash_sale'] = $this->model_product_flash_sale->flash_sale();
        //debug($data['flash_sale']);
        // Hot sale
        //$data['hot_sale'] = $this->model_product->hot_sale();
        // Recent views
        //$data['recent_views'] = $this->model_product->recent_views($this->userid);

        // Load View
		$this->load_view("index", $data);
	}
    public function detail($slug = '')
    {
        global $config;
        $this->layout_data['title'] = "News and Event Details | ".g('site_name');
        $data['banner'] = $this->model_inner_banner->get_banner(19);
        // has slug
        if(!empty($slug))
        {
            // Get slug response
            $parm['where']['news_slug'] = $slug;
            $data['news_details'] = $news_details= $this->model_news->find_one_active($parm);
            // debug($data['news_details'],1);
            // Found slug in table
            if(array_filled($data['news_details']))
            {
                // Load view
                $this->load_view("detail", $data);
            }
            // Not found
            else
            {
                redirect(l('404') , true);
            }
        }
        // No slug
        else
        {
            redirect(l('404') , true);
        }
    }

}
