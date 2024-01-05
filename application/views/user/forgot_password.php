<style>
    body{
        background:#ffffff !important;
    }
</style>

<div class="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cntc-info">
                    <h2>Forgot Your Consignor # or Password ?</h2>
                    <!--<p>Enter your email address and if a match is found,your consignor number and password will be provided</p>-->
                    <p>Enter your email address..... and password will be sent to the email address on file.</p>
                </div>
            </div>
            <div class="cntc-form" style="padding-left:0;">
                <form action="<?php g('base_url')?>user/forgot_password_email" method="post" id="form-forgot">
                    <div class="col-md-6">
                        <div class="col-md-12"><label>E-mail Address*</label><input type="email" name="signup[signup_email]" placeholder="Enter your email address" required id="forgot-email"></div>                    


                    </div>
                    <div class="col-md-6"> 
                        <div class="col-md-6">
                            <button class="text-nowrap" type="submit" style="margin-top: 22px;height: 55px">Get Consignor # /Password</button>
                        </div>                    
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function(){
$("#btnForgot").click(function(){
var data = $("#forgotPAssword").serialize();
var url = "<?=g('base_url')?>user/forgot_password";
response = AjaxRequest.formrequest(url, data) ;
if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
}
else
{
AdminToastr.error(response.txt,'Error'); 
} 
return false;  
});
});
</script> -->