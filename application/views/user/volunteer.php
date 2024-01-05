<section class="Inner_content Login">
    <div class="container">
        <div class="row">
            <div class="colx-s-12 col-sm-12 Middle">
               <!--  <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>LogIn</h3>
                    <?php echo html_entity_decode($login['cms_page_content']);?>

                    <form action="<?php echo g('base_url'); ?>user/login_process" method="post" class="Login_form" id="login-form">
                        <div class="form-group">
                            <input type="text" id="email" name="signup[signup_email]" placeholder="Email" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup[signup_password]" id="password" placeholder="Password" class="form-control">
                        </div>

                        <p class="password"><a href="#" data-toggle="modal" data-target="#forgot-password" class="forgot-password cre">Forgot Password?</a></p>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <input type="submit" class="btn submit_btn" value="Login" id="btn-login">

                        </div>
                    </form>
                </div> -->

                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
                    <h3>Register As Volunteer</h3>
                    <?php echo html_entity_decode($register['cms_page_content']);?>

                    <form method="post" action="<?=g('base_url')?>user/save" id="signupForm" class="Login_form">
                        <div class="form-group">
                            <input type="hidden" name="signup[signup_type]" value="2" class="form-control" >
                           <!--  <select name="signup[signup_type]" id="" class="form-control">
                                <option value="">Type</option>
                                <option value="1">Consignor</option>
                                <option value="2">Volunteer</option>
                            </select> -->
                        </div>
                        <div class="form-group">
                            <input type="text" name="signup[signup_firstname]" class="form-control" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_lastname]" class="form-control" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_address]" class="form-control" placeholder="Street Address">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_city]" class="form-control" placeholder="City">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_state]" class="form-control" placeholder="State">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_zip]" class="form-control" placeholder="Zip Code">
                        </div>

                        <div class="form-group">
                            <input type="text" name="signup[signup_phone]" class="form-control" placeholder="Phone">
                        </div>

                        <!--     <div class="form-group">
                            <input type="text" name="signup_country" class="form-control" placeholder="Country">
                        </div>  -->

                        <div class="form-group">
                            <input type="text" name="signup[signup_email]" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup[signup_password]" class="form-control slugger-source" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="signup[signup_static_password]" class="form-control slugger-target" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="signup_password_confirm" class="form-control" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn submit_btn" value="Register" id="btn-signup">

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</section>

<?php
// Load modal
$this->load->view('user/modal_forgot_password');
?>


<script type="text/javascript">
    $(document).ready(function () {
        var $form = $('#login-form');
        // On submit login action start
        //$form.submit(function(event) {
            $('#btn-login').click(function (event) {
            // Get input data
            var email = $('#email').val();
            var password = $('#password').val();

            /*console.log(password);
            console.log(email);*/
            
            // Define regular expression
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            // Checking fields (both fields empty)
            if ((email == '') && (password == '')) {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>' +
                    '<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>', 'Error');
            }
            // Email validation
            else if (email == '') {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>');
            } else if (!regex.test(email)) {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Invalid email address</span>');
            }
            // Password validation
            else if (password == '') {
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>');
            } else {
                // Disable the submit button to prevent repeated clicks:
                $form.find('#btn-login').prop('disabled', true);
                // Get form
                var form = $(this).closest('form');
                // Get action url
                var url = form.attr('action');
                // Get form data
                var data = form.serialize();
                Loader.show();
                setTimeout(function () {
                    // Submit action
                    var response = AjaxRequest.fire(url, data);
                    // Register success
                    if (response.status) {
                        $form.find('#btn-login').prop('disabled', false);
                        // Reset form
                        $form[0].reset();
                        // Redirect to Time line page
                        //window.location.href = response.refer;
                        location.reload();

                    }
                    // Register fail
                    else {
                        // Enable form
                        $form.find('#btn-login').prop('disabled', false);

                    }
                },1000);
            }

            return false;
        });
        // On submit login action end

        // Submit Form Modal Start
        $('.user-pass-rec-btn').on('click', function () {

            var obj_forgot = $(this);

            Loader.show();
            setTimeout(function () {
                // Get form obj
                var $form = $('#forgot-form');
                // Get form
                var form = obj_forgot.closest('form');
                // Get action and form data
                var data = form.serialize();
                var url = form.attr('action');

                // Submit action
                var response = AjaxRequest.fire(url, data);
                // Register success
                if (response.status) {
                    // Reset form
                    $form[0].reset();
                    // Close Dialog box
                    $('#forgot-password').modal('toggle');
                    setTimeout(function () {
                        location.reload();
                    },2000);

                }
            },1000);

            return false;
        });
        // Submit Form Modal End

    });
</script>
<script>
            //for password static
            let source = $('.slugger-source');
            let target = $('.slugger-target');

    //When the user is typing in the name field.
    source.keyup( function(){
        transformStringToSlug(source , target)
    });

    //When the user is typing in the target field
    target.keyup( function(){
        transformStringToSlug(target , target)
    });

    //Actually perform the sluggify
    function transformStringToSlug(the_source , the_target){

        string = the_source.val();

        //Remove any special chars, ignoring any spaces or hyphens
        var slug = string.replace(/[^a-zA-Z0-9\ \-]/g, "");

        //Replace any spaces with hyphens
        slug = slug.split(' ').join('-');

        //Chuck it back into lowercase
        slug = slug.toLowerCase();

        //Valiate out any double hyphens
        slug = slug.split('--').join('-');

        var lastChar = slug.substring(slug.length -1, slug.length);
        if ( lastChar == '-'){
            slug = slug.substring(0 , slug.length -1 );
        }

        //Dump it back to the destination input
        the_target.val( slug );
    }
        //end password static
    </script>