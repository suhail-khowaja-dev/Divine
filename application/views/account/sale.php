<? //$this->load->view('account/header_main') ?>

<?

/*if(!empty($userdata['signup_logo_image'])){
    $img = get_image($userdata['signup_logo_image_path'],$userdata['signup_logo_image']);
}
else{
    $img = g('images_root') ."fan-img.png";
}*/
?>

<?php
/*$data['breadcrumb_title'] = 'Edit Account';
$this->load->view('widgets/breadcrumb', $data);*/
?>

<br><br><br><br>

<? $this->load->view('account/header_main') ?>

<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">
    <div class="content-page ">

        <div class="row">

            <!-- Profile image start -->
            <!--<div class="col-md-8">
                <div class="form-group">
                    <form action="<? /*=g('base_url').'account/update-profile-image'*/ ?>" method="post" enctype="multipart/form-data" id="form-image" class="profileimg">
                        <input type="hidden" name="signup_id" value="<? /*=$this->userid*/ ?>">
                        <img src="<? /*= $img */ ?>" alt="" class="img-circle" />
                          <div class="upload-btn-wrapper">
                            <label>Change Profile Image</label>
                          <button class="mybtn" >Upload a file</button>
                          <input type="file" name="file" id="btn-profile" / >
                          </div>
                    </form>
                </div>
            </div>-->
            <!-- Profile image end -->
            <div class="col-md-12">
              <h2>Add Sale</h2>
                <form action="<?= g('base_url') ?>account/add_sale_info"
                      method="post" id="saveForm" class="footTop">
                    
                    <input type="hidden" name="sale[sale_signup_id]"
                           value="<?= $this->userid ?>">
                   <!--  <input type="hidden" name="sale[sale_signup_type]"
                           value="<?= $userdata['signup_type'] ?>"> -->

                    <div class="form-group col-md-6">
                        <label for="email">Sale Title:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Sale Title *"
                               name="sale[sale_title]" id="textString">
                        <input type="hidden"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Sale Title *"
                               name="sale[sale_slug]" id="textSlug">
                    </div>
                    <script>
                      document.getElementById("textString").addEventListener("input", function () {
                    let theSlug = string_to_slug(this.value);
                    document.getElementById("textSlug").value = theSlug;
                  });

                  function string_to_slug(str) {
                    str = str.replace(/^\s+|\s+$/g, ""); // trim
                    str = str.toLowerCase();

                    // remove accents, swap ñ for n, etc
                    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                    var to = "aaaaeeeeiiiioooouuuunc------";
                    for (var i = 0, l = from.length; i < l; i++) {
                      str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
                    }

                    str = str
                      .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
                      .replace(/\s+/g, "-") // collapse whitespace and replace by -
                      .replace(/-+/g, "-"); // collapse dashes

                    return str;
                  }

                    </script>

                    <div class="form-group col-md-6">
                        <label for="email">Sale Location:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               
                               placeholder="Sale Location *"
                               name="sale[sale_location]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Sale Street:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Sale Street *"
                               name="sale[sale_street]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>City:  </label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               
                               placeholder="City *"
                               name="sale[sale_city]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>State:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="State *"
                               name="sale[sale_state]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Zipcode:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15" min="0"                               
                               placeholder="Zipcode *"
                               name="sale[sale_zip]">
                    </div>


                    <div class="form-group col-md-6">
                        <label>Start Date:</label>
                        <input type="date"
                               class="form-control my-form-control my-margin-bottom-15"                             
                               placeholder="Start Date *"
                               name="sale[sale_start_date]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>End Date:</label>
                        <input type="date"
                               class="form-control my-form-control my-margin-bottom-15"                             
                               placeholder="End Date *"
                               name="sale[sale_end_date]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone:</label>
                        <input type="number"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Phone *"
                               name="sale[sale_location_phone]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Registration Fee:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Sale Registration Fee *"
                               name="sale[sale_registration_fee]" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tax Rate:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Tax Rate *"
                               name="sale[sale_tax_rate]">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Hanger Rental Fee:</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               placeholder="Hanger Rental Fee *"
                               name="sale[sale_hanger_rental_fee]">
                    </div>

                    

                    

                    <!-- <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?= $userdata['signup_email'] ?>"
                               placeholder="Your Email"
                               name="signup[signup_email]" readonly>
                    </div> -->
                    <!--<div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text"
                               class="form-control my-form-control my-margin-bottom-15"
                               value="<?/*= $userdata['signup_username'] */?>"
                               placeholder="Your Username"
                               name="signup[signup_username]" readonly>
                    </div>-->



                  

                    <!-- <div class="form-group col-md-6">
                        <label>Country</label>
                        <select name="signup[signup_country]" id=""
                                class="form-control my-form-control my-margin-bottom-15">
                            <option value="">Select Country</option>
                            <?php
                            foreach ($countries as $key => $value):?>
                                <option value="<?php echo $value['country']; ?>" <?php echo ($value['country'] == $userdata['signup_country']) ? 'selected' : '' ?>><?php echo $value['country']; ?></option>
                            <? endforeach;
                            ?>
                        </select>
                    </div> -->

                    

                    <!--<label>Business Name</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_business_name'] */ ?>"
                           placeholder="Business Name *"
                           name="signup[signup_business_name]">

                    <label>Company</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_company'] */ ?>"
                           placeholder="Company"
                           name="signup[signup_company]">-->

                    <!--<label>Contact</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<?/*= $userdata['signup_contact'] */?>"
                           placeholder="Contact"
                           name="signup[signup_contact]">-->
                    <!-- <label>Business Address</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_address2'] */ ?>"
                           placeholder="Business Address"
                           name="signup[signup_address2]">-->

                    <!--<label>Industry</label>
                    <input type="text"
                           class="form-control my-form-control my-margin-bottom-15"
                           value="<? /*= $userdata['signup_industry'] */ ?>"
                           placeholder="Industry *"
                           name="signup[signup_industry]">-->

                    <!--<input type="text"
                                                                               class="form-control my-form-control my-margin-bottom-15"
                                                                               placeholder="Phone *"
                                                                               value="<? /*= $userdata['signup_telephone'] */ ?>"
                                                                               name="signup[signup_telephone]">-->

                    <div class="clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mtop10">
                        <button value="Save Now" id="submitsaleInfo" class="btn btn-warning">Add Sales</button>
                        <br>
                        <br>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!-- END CONTENT -->

<? $this->load->view('account/footer_main') ?>

<script type="text/javascript">
    $(document).ready(function () {
        var obj;
        $("#submitsaleInfo").click(function (e) {
            e.preventDefault();
            Loader.show();
            setTimeout(function () {
                // Prevent form submit
                var obj = $("#saveForm");
                // Get form data
                var data = obj.serialize();
                // Get post url
                var url = obj.attr('action');
                // Submit action
                var response = AjaxRequest.fire(url, data);
                if(response.status){
                    location.reload();
                }
                // Add return
                return false;
            },1000);
            return false;
        });

        // Profile image update start (not implement)
        $("#btn-profile").on('change', function () {
            // Get file obj
            var file_obj = $(this);
            // Define allow extension
            var ext = file_obj.val().split('.').pop().toLowerCase();

            // Check ext empty or not (empty means no file selected)
            if (ext != '') {
                // Other extension
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    file_obj.val('');
                    AdminToastr.error('Invalid file', 'Error');
                }
                // Upload file
                else {
                    var data = new FormData(document.getElementById("form-image"));
                    var url = $("#form-image").attr("action");

                    FileUploadScript.fire(url, data, 'json', true);

                }
            }
        });
        // Profile image update end

    });
</script>