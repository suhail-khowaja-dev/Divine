<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Content -->
<div class="contactsecm" id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <h4>Sign Up</h4>
                <div class="login_bg">
                    <!--<div class="social">
                        <p> Sign Up with social media </p>
                        <ul>
                            <li><a href="#" class="active"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>-->
                    <form method="post" action="<?php echo g('base_url');?>user/save" id="signupForm">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_firstname]"  placeholder="First Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_lastname]"  placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="signup[signup_email]"  placeholder="Email ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="signup[signup_password]"  placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox" align="left">
                                <label>
                                    <input type="checkbox" name="checkbox">
                                    I Agree To The <a href="<?php echo g('base_url');?>terms-and-conditions" target="_blank">Terms & Conditions</a> </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)"><input type="submit" class="form-control" name="" value="Sign Up" id="btn-signup"></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <div class="no-acount"> Don't have an Account? <a href="<?php echo g('base_url');?>user/login"> Login Now!</a></div>
                    </div></div>
            </div>
        </div>
    </div>
</div>

<!--end Content -->

<!-- Sign up ajax start-->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        // Get form object
        var $form = $('#signup-form');
        // On submit action start
        //$form.submit(function(event) {
        $('#btn-signup').click(function(event) {

            // Disable the submit button to prevent repeated clicks:
            $form.find('#btn-signup').prop('disabled', true);
            // Get form
            var form = $(this).closest('form');
            // Get action url
            var url = form.attr('action');
            // Get form data
            var data = form.serialize();
            // Submit action
            var response = AjaxRequest.fire(url, data);
            // Register success
            if (response.status) {
                $form.find('#btn-signup').prop('disabled', false);
                // Reset form
                $form[0].reset();
                setTimeout(function(){
                    location.href = '<?=g('base_url')?>';
                },2000);

            }
            // Register fail
            else {
                // Enable form
                $form.find('#btn-signup').prop('disabled', false);
            }

            event.preventDefault();
            return false;
        });
        // On submit action end
    });
</script> -->



<script type="text/javascript">

    $(document).ready(function(){

        var file_type = ['png', 'jpg', 'jpeg'];

        // On change file (single image)
        $('#file1').on('change',function(){

            var anyWindow = window.URL || window.webkitURL;

            var fileList = this.files;
            var result = check_file_extension(fileList);
            if(result!=''){
                $('#file1').val('');
                AdminToastr.error(result, 'Error');
            }
            else
            {
                var objectUrl = anyWindow.createObjectURL(fileList[0]);
                $('#profileImg').attr('src', objectUrl);
                $('#profileImg').show();
            }
        });

        function check_file_extension(fileList)
        {
            var error = '';
            // Check each file type extension
            for (var x = 0; x < fileList.length; x++) {
                // Define allow extension
                var ext = fileList[x]['name'].split('.').pop().toLowerCase();

                // Check ext empty or not (empty means no file selected)
                if (ext != '') {
                    // Other extension
                    if ($.inArray(ext, file_type) == -1) {
                        // Set error message
                        error += "Invalid file type <br/>" + fileList[x]['name'] + '<br/>';
                    }
                }
            }   // end loop
            return error;
        }

    });
</script>