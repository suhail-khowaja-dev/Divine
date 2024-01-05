<style>
 select#dropoff_select {
  height: 50px;
  border: 2px solid #bfbfbf;
}
</style>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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
                <h2>Sale Registration</h2>
                <?php
                $param['where']['registered_sale_user_id'] = $this->userid;
                $param['where']['registered_sale_status'] = 1;
                $select_sale = $this->model_registered_sale->find_all($param);
                // debug($select_sale,1);
                if(count($select_sale) > 0){ ?>

                  <h1>You have already registered in sale</h1>
                  <?}else{?>

                    <form action="<?= g('base_url') ?>account/add_sale_info"
                      method="post" id="saveForm" class="footTop">

                      <input type="hidden" name="registered_sale[registered_sale_user_id]"
                      value="<?= $this->userid ?>">
                      <input type="hidden" name="registered_sale[registered_sale_user_type]"
                      value="<?=  $userdata['signup_type']?>">
                  <!--<input type="hidden" name="registered_sale[registered_sale_sale_id]"
                    value="<?= $this->userid ?>"> -->
                    <!--<input type="hidden" name="sale[sale_signup_type]"
                     value="<?= $userdata['signup_type'] ?>"> -->

                     <div class="form-group col-md-12">
                      <label for="email">Select Your Sale:</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="registered_sale[registered_sale_sale_id]">
                        <option value="">Select Your Sale </option>
                        <?php foreach ($active_sale as $key => $value) { ?>
                          <option value="<?php echo $value['sale_id']?>"><?php echo $value['sale_location']?> <?php echo $value['sale_street']?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="email">Drop Off Information:</label>
                      <select class="form-control dropoff_select" id="dropoff_select" name="registered_sale[registered_sale_dropoff_id]">
                        <?php foreach ($sale_dropoffs as $key => $value) { ?>
                          <!-- <option value="<?php echo $value['sale_dropoffs_id']?>"><?php echo date("F j, Y g:i A",strtotime($value['sale_dropoffs_start_time']))?></option> -->
                        <?php }?>
                      </select>

                    </div>

                    <div class="form-group col-md-12">
                      <label for="email">Volunteer Information:</label>
                      <select class="form-control volunteer_select" id="js-example-basic-multiple"  name="registered_sale[registered_sale_volunteer_id][]" multiple="multiple">
                       <?php foreach ($volunteer_shift as $key => $value) { ?>  
                         <!--  <option value="<?php echo $value['volunteer_shift_id']?>"><?php echo date("F j, Y g:i A",strtotime($value['volunteer_shift_start_time']))?> <?php echo $value['volunteer_shift_activity_desc']?></option> -->
                       <?php } ?>
                     </select>

                   </div>


                   <div class="clearfix"></div>
                   <div class="col-lg-6 col-md-6 col-sm-6 mtop10">
                    <button type="button" value="Save Now"  id="submitsaleInfo" class="btn btn-warning">Submit</button>
                    <br>
                    <br>
                  </div>

                </form>
                <?}?>
              </div>
            </div>

          </div>
        </div>
        <!-- END CONTENT -->

        <? $this->load->view('account/footer_main') ?>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function () {

              // alert('');

              $('#exampleFormControlSelect1').on('change',function()
              {
                // alert('yes');
                var id = $(this).val();
                    // alert(id);
                    console.log(id);
                    $.ajax({
                      type: "POST",
                      url: "<?=g('base_url')?>account/dropdown",
                      data: {id:id},
                      dataType: "json",

                      success: function (msg) {

                        console.log('msg__',msg);
                        // 
                        // 
                        $('.dropoff_select').html(msg.dropoff_data);
                        $('.volunteer_select').html(msg.shift_data);

                        $('#js-example-basic-multiple').select2(
                        {
                          placeholder: "Select Volunteer Shifts"
                        });


                            // $(".badge").html(msg.total_items);
                            //$("#item_count").html(msg.total);
                          },
                          beforeSend: function () {
                            //$("#loading-sp").show();
                          }
                        });

                  })

              var obj;
              $("#submitsaleInfo").click(function(e) {
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
                var response = AjaxRequest.fire(url,data);
                if(response.status){
                  // console.log(response.status);
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
        $(document).ready(function() {
          $('#js-example-basic-multiple').select2(
          {
            placeholder: "Select Volunteer Shifts"
          });

        });
      });
    </script>