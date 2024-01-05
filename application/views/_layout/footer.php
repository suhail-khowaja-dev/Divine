<?php
//$content_sub = $this->model_cms_page->get_page(13);
?>

<footer class="footer">
    <div class="container">
        <div class="footerLists">
            <div class="col-sm-3 col-xs-12">
                <h2>Customer Services </h2>
                <ul>
                    <li><a href="<?php echo g('base_url');?>about-us">About Us </a></li>
                    <li><a href="<?php echo g('base_url');?>privacy-policy">Privacy Policy </a></li>
                    <li><a href="<?php echo g('base_url');?>terms-and-conditions">Terms & Conditions </a></li>
                    <li><a href="<?php echo g('base_url');?>user">Login </a></li>
                    <li><a href="<?php echo g('base_url');?>user">Register </a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-xs-12">
                <h2>Quick Links</h2>
                <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li><a href="<?php echo g('base_url');?>help">Help</a></li>
                        <li><a href="javascript:void(0)"> Dolor Sit Amet</a></li>
                        <li><a href="javascript:void(0)">Consectetur</a></li>
                        <li><a href="javascript:void(0)">Adipsicing Elit</a></li>
                        <li><a href="javascript:void(0)">Sed Do Euismod</a></li>
                    </ul>
                </div>

                <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li><a href="javascript:void(0)">Lorem Ipsum</a></li>
                        <li><a href="javascript:void(0)"> Dolor Sit Amet</a></li>
                        <li><a href="javascript:void(0)">Consectetur</a></li>
                        <li><a href="javascript:void(0)">Adipsicing Elit</a></li>
                        <li><a href="javascript:void(0)">Sed Do Euismod</a></li>
                    </ul>
                </div>


                <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li><a href="javascript:void(0)">Lorem Ipsum</a></li>
                        <li><a href="javascript:void(0)"> Dolor Sit Amet</a></li>
                        <li><a href="javascript:void(0)">Consectetur</a></li>
                        <li><a href="javascript:void(0)">Adipsicing Elit</a></li>
                        <li><a href="javascript:void(0)">Sed Do Euismod</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-3 col-xs-12">
                <h2>Services</h2>
                <ul>
                    <li>
                        <a href="javascript:void(0)">Lorem Ipsum</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Dolor Sit Amet</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Consectetur</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Adipsicing Elit</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Sed Do Euismod</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="subscribeSec">
        <div class="container">
            <div class="col-md-3 col-xs-12 col-sm-3">
                <h1>ENTER EMAIL TO JOIN<br>
                    OUR NEWSELLTER</h1>
                <p>Sign up and save 10%</p>
                <form action="<?php echo g('base_url'); ?>subscribe/store" method="post" id="form-subscribe">
                    <input type="text" class="form-control" name="subscribe[subscribe_email]" placeholder="Enter Your Email" id="subs-email">
                    <button class="btn-subscribe"><img src="<?php echo g('images_root');?>arrow.png"></button>
                </form>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-3">
                <h1>WE PROMISe 100%<br>
                    SECURE SHIPPING</h1><img class="img-responsive" src="<?php echo g('images_root');?>paypal.png"></div>
            <div class="col-md-3 col-xs-12 col-sm-3">
                <h1>CUSTOMER SERVICE<br>
                    &amp; RETURNS</h1>
                <h3>Have Questions? Call Us <span><img class="img-responsive" src="<?php echo g('images_root');?>call.png"></span></h3>
                <h4>(+01) 23 45 67 89</h4>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-3"><img class="img-responsive lastDiv" src="<?php echo g('images_root');?>paypal2.png"></div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="footerIconbar social-links text-center img-responsive">
                <p><?php echo str_replace(array('{YEAR}'), array(date('Y')), g('db.admin.copyright')); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php
if ($this->userid < 1) {
//$this->load->view('user/login_sigup_modal');
}
?>


<!--<div id="search">
    <button type="button" class="close">×</button>
    <form method="GET" id="searchform" action="<?/*= g('base_url'); */?>shop">
        <input type="Search" required="" name="search" placeholder="SEARCH KEYWORD(s)">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>-->
<script type="text/javascript">


    function addtowishlist(productid) {
        var data = "product_id=" + productid;
        var site_url = "<?=g('base_url')?>account/addwishlist";
        $.ajax({
            type: "POST",
            url: site_url,
            data: data,
            dataType: "json",
            success: function (msg) {
                Loader.hide();

                if (msg.status == true) {
                    AdminToastr.success(msg.message, 'Success');
                } else {
                    AdminToastr.error(msg.message, 'Error');
                }
            },
            beforeSend: function () {
                Loader.show();
            }
        });
    }


    $(document).ready(function () {

         

        $.ajax({
            type: "POST",
            url: "<?=g('base_url')?>checkout/get_basket",
            data: "",
            dataType: "json",

            success: function (msg) {
                $(".badge").html(msg.total_items);
                //$("#item_count").html(msg.total);
            },
            beforeSend: function () {
                //$("#loading-sp").show();
            }
        });
        return false;
    });


</script>

<script type="text/javascript">
    $('.search-input').keypress(function (e) {
        if (e.which == 13) {
            $('form#search').submit();
            return false;    //<---- Add this line
        }
    });
</script>
