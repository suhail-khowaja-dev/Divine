<!-- Banner Row  Ends-->
<?
$phone2 =g('db.admin.phone');
$phonenum2 = str_replace(array(')','(','-',' '),array('','','',''),$phone2);
$address=g('db.admin.company_address_1');
$info_email=g('db.admin.email');
$support_email=g('db.admin.support_email');
?>
<!-- Inpage-->

<?php //$this->load->view('widgets/inner_banner');?>

<div class="contact-sec">
    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <div class="cntc-info">
                    <h4>Contact Us</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Address</h5>
                                <ul>
                                    <li><?php echo $address;?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Email Address</h5>
                                <ul>
                                    <li><a href="mailto:<?php echo $info_email;?>"><?php echo $info_email;?></a></li>
                                    <li><a href="mailto:<?php echo $support_email;?>"><?php echo $support_email;?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Phone Number</h5>
                                <ul>
                                    <li><a href="tel:<?php echo $phone2;?>"><?php echo $phone2;?></a></li>
                                    <li><a href="tel:<?php echo $phonenum2;?>"><?php echo $phonenum2;?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inn-info">
                                <h5>Website Address</h5>
                                <ul>
                                    <li><a href="<?php echo g('base_url');?>"><?php echo g('db.admin.domain');?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="cntc-form">
                    <form class="contact-form" id="contact-form" action="<?=g('base_url')?>contact-us/store" method="post">
                            <div class="col-md-12"><label>Name*</label><input type="text" name="inquiry[inquiry_fullname]" placeholder=""></div>
                            <div class="col-md-12"><label>Email ID*</label><input type="email" name="inquiry[inquiry_email]" placeholder=""></div>
                            <div class="col-md-12"><label>Subject*</label><input type="text" name="inquiry[inquiry_subject]" placeholder=""></div>
                            <div class="col-md-12"><label>Message</label><textarea placeholder="" name="inquiry[inquiry_comments]"></textarea></div>
                            <div class="col-md-12"><label>Captcha</label><?php $this->load->view('widgets/google_captcha');?><br></div>
                            <div class="col-md-12"><button class="btn-send">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
            