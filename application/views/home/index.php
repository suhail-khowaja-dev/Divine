<?php
// Home page slider
//$this->load->view('widgets/banner');
// Feature product
//$this->load->view('widgets/feature_products');
// Steps
//$this->load->view('widgets/steps');
// Categories
//$this->load->view('widgets/about_us');
// Our Services
//$this->load->view('widgets/our_services');
// News
//$this->load->view('widgets/news');
// Feeds
//$this->load->view('widgets/feeds');
// Login with Social media
//$this->load->view('widgets/login_social_media');
// Information
//$this->load->view('widgets/information');

?>

<!-- Best Deal Sec Start -->
<?php //$this->load->view('widgets/best_deals');?>
<!-- Best Deal Sec End -->


<!-- Top 10 Selected Production Sec Start -->
<?php //$this->load->view('widgets/top_ten');?>
<!-- Top 10 Selected Production Sec End -->


<!-- popular Search Sec Start -->
<?php //$this->load->view('widgets/popular_search');?>
<!-- popular Search Sec End -->


<!-- service Sec Start -->
<?php //$this->load->view('widgets/service');?>
<!-- service Sec End -->


<!-- Flash Sale Sec Start -->
<?php //$this->load->view('widgets/flash_sale');?>
<!-- Flash Sale Sec End -->


<!-- popular Search Sec Start -->
<?php //$this->load->view('widgets/hot_sale');?>
<!-- popular Search Sec End -->


<!-- Recently viewed Sec Start -->
<?php //$this->load->view('widgets/recently');?>
<!-- Recently viewed Sec End -->
<!-- 
 <div class="container">

      <div id="login">

        <h1>Divine Consign Portal</h1>
        <hr class="main-hr">
        <p><a href="<?=g('base_url')?>user">Login</a> Or <a href="<?=g('base_url')?>user">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

      </div> 

  </div> -->


  <section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="about-blk">
                    <img src="<?php echo get_image($layout_data['logo']['logo_image_path'],$layout_data['logo']['logo_image']);?>" class="logo" style="width:40% !important;">
                    <h3>Divine Consign Portal</h3>
                    <hr class="main-hr">
                    <?php
                    if($this->userid>0){?>
                        <p><a href="<?=g('base_url')?>account" class="h-link">My Dashboard</a></p>
                        <?}else{?>
                            <p><a href="<?=g('base_url')?>user" class="h-link">Existing Consignor / Volunteer</a> <span class="or">|</span> <a href="<?=g('base_url')?>consignor" class="h-link">New Consignor</a> <span class="or">|</span> <a href="<?=g('base_url')?>volunteer" class="h-link">New Volunteer Only</a></p>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </section>