<style>

  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 30%;
  }
  .portlet-form .form-body, .form .form-body {
    padding: 0px;
  }
  .fileUploaderForm{
    background: #fff;
  }
  .fileUploader {
    background: #fff;
    padding: 14px 20px;
    border-radius: 100px !important;
    display: table;
    margin: 20px auto;
    border: 1px solid #d8d8d8;
    position: relative;
    width: 300px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .fileUploader label{
    font-size: 12px;
    font-family: "Open Sans", sans-serif;
    text-transform: uppercase;
    margin: 0;
    font-weight: 800;
    color: #8a8a8a;
  }
  .fileUploader input[type="file"] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0;
  }
  #btn_news_let {
    border: 0;
    background: #85581f;
    color: #fff;
    display: inline-block;
    padding: 10px 30px;
    text-transform: capitalize;
    font-weight: 100;
    font-size: 16px;
    border-radius: 4px !important;
    margin-bottom: 20px;
  }
  .generatedMsg {
    border: 1px solid #F44336;
    background: #F44336;
    color: #fff;
    display: block;
    padding: 14px;
    font-size: 16px;
    font-weight: 400;
    border-radius: 4px;
    margin-bottom: 10px;
  }
</style>
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-flag"></i>
      <strong>Import Users
      </div>
      <div class="tools">
        <a href="javascript:;" class="collapse">
        </a>
        <a href="javascript:;" class="reload">
        </a>
      </div>
    </div>
    <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <div class="invoice">
        <div class="">
          <div class="row invoice-logo form-body">
          <!-- <div class="col-md-2 col-sm-12">
          </div>
        -->
      </div>
      <!-- <hr> -->
      <div class="form-body fileUploaderForm">
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button>
          You have some form errors. Please check below.
        </div>
        <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button>
          Your form validation is successful!
        </div>
        <input type = "hidden" value="<?=$form_data['product']['product_id']?>" name = "product_addons[product_id]" />
        <div class="row item_set">
          <div class="col-md-12">
            <div class="form-group ">
              <!-- <h1 class="control-label col-md-5 "> Add-ons </h1><h1 class="control-label col-md-3 " style="    padding-left: 49px;"> Select Order </h1> -->
              <div class="col-md-12 col-sm-12">
                <div class="table-group-actions text-center">
                  <form  enctype="multipart/form-data"  method="post" action="<?=g('base_url')?>admin/sale_transaction/import" id="register">
                    <div class="btn-submit fileUploader">
                      <label>Upload File</label>
                      <input type="file" name="file_csv" required="required">
                    </div>
                    <div class="btn-submit">
                      <input type="submit" id="btn_news_let" value="Import File">
                    </div>
                    <strong class="generatedMsg"><?php echo $success_message; ?></strong>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <hr> -->
    </div>
  </div>
  <!-- END VALIDATION STATES-->
</div>
</div>
<script>
  $(document).ready(function() {
    <?if($error)
    echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
    ?>
  });
</script>
<!-- <script>
  $('#btn_news_let').on("click", function(e){
    alert('yes');
    function ajax_job_form_(){
// e.preventDefault();
var formData = new FormData($('#register')[0]);
// alert(formData,1);
$.ajax({
  url: '<?php echo base_url(); ?>admin/sale_transaction/import',
  type: 'POST',
  data: formData,
  async: false,
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",
  success: function (response) {
    if(response.status) {
      AdminToastr.success(response.txt,'Success');
      $('#job-form')[0].reset();
      setTimeout(function() {
        // location.reload();
      }, 2000);
    }
    else
    {
      AdminToastr.error(response.txt,'Error');
      return false;
    }
  },
});
};
</script> -->