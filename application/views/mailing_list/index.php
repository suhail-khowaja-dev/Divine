<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>
<div class="contact-sec">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="cntc-info">
                    <h4>Join Our Mailing List</h4>
                </div>
 
            </div>

                <div class="cntc-form">
                        <form action="<?php echo g('base_url'); ?>subscribe/store" method="post" id="form-subscribe">
                    <div class="col-md-6">
                            <div class="col-md-12"><label>Email ID*</label><input type="email" name="subscribe[subscribe_email]" placeholder="Enter Your Email"></div>                    
                            
                    
                    </div>
                    <div class="col-md-6"> 
                    <div class="col-md-12">
                        <button class="btn-subscribe" style="margin-top: 25px;">Submit</button>
                    </div>                     
                        <!--  <div class="form-group">
                            <label for="exampleFormControlSelect1">Select a Sale</label>
                            <select class="form-control" name="subscribe[subscribe_sale_id]"  id="exampleFormControlSelect1">
                            <?php foreach ($registered_sales as $key => $value) { ?>

                              <option value="<?php echo $value['sale_id']?>"><?php echo $value['sale_location']?></option>
                            <?php } ?>
                            </select>
                          </div> -->
                        </form>
                    </div>
            </div>

            </div>

        </div>
    </div>
</div>
            
