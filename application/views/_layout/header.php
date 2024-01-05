<?php
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
$data['userdata'] = $this->model_signup->find_by_pk($this->userid);
$userdata = $data['userdata'];
$service_email = g('db.admin.service');
$total_cart_items = $this->cart->total_items();

// Get Categories
$categories = $this->model_category->find_all_active(array("where"=>array("category_navigation"=>STATUS_ACTIVE)));

// Set classes for header
/*if( ($class=='home') && ($method=='index')){
    $classes = "navbar-fixed-top wow fadeInDown";
}
else{
    $classes = "wow fadeInDown";
}*/

?>

<header>
    <!-- Begin: Top Row -->
    <div class="top-row">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="tp-cntc">
                        <ul>
                          <!--               <li><a href="tel:<?php echo g('db.admin.phone');?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo g('db.admin.phone');?></a></li> -->
                          <li><a href="https://divineconsignsaleil.com/">Home</a></li>
                          <li><a href="<?=g('base_url')?>">Login</a></li>
                          <li><a href="<?=g('base_url')?>forgot-password-client">Forgot Consignor Number?</a></li>
                          <!-- <?=g('base_url')?>forgot-password -->
                          <li><a href="<?=g('base_url')?>mailing-list">Join Our Mailing List</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-3">
              </div>
          </div>
      </div>
  </div>
  <!-- END: Top Row -->


</header>