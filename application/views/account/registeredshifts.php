<br><br><br><br>
<style>
  span.select2-selection.select2-selection--multiple {
    width: 550px !important;
  }
</style>
<? $this->load->view('account/header_main') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<div class="col-md-9 col-sm-7">
  <div class="content-page ">
    <button href='javascript:void(0);' type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_new_vol" data-pkid='<?=$value['registered_sale_id']?>' data-userid='<?=$this->userid?>'>Add Volunteer Shift</button>
    <h2>Volunteer Shifts Registered</h2>
    <table class="table text-nowrap table-striped sortable">
      <thead>
        <tr>
          <th scope="col">Sale Location</th>
          <th scope="col">Volunteer Start Date</th>
          <th scope="col">Volunteer End Date</th>
          <th scope="col">Shift Description</th>
          <th scope="col">Edit/Remove</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($volunteerregistered as $key =>$value){ ?>
          <?php if($value['registered_sale_volunteer_id'] != 0) {?>
            <tr class="item">
              <td><?php echo $value['registered_sale_sale_location'] ?></td>
              <td><?php echo   date("F j, Y g:i A",strtotime($value['registered_sale_volunteer_shift_start_time']))?></td>
              <td><?php echo   date("F j, Y g:i A",strtotime($value['registered_sale_volunteer_shift_end_time']))?></td>
              <td><?php echo $value['registered_sale_volunteer_shift_activity_desc']  ?></td>        
              <td>
               <!--  <a href='javascript:void(0);' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal<?php echo $key?>" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil"></span></a>  -->
               <a href='<?=g('base_url')?>account/edit_consigner_info/<?php echo $value['registered_sale_id'];?>'  class="btn btn-primary btn-xs" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" title="Edit Detail"></span></a> 
               <!--           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $key?>" data-whatever="@mdo">Open modal for @mdo</button> --> 
               | 
               <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_this" data-url='<?=l('account/'.$class."ajax-delete")?>' data-pkid='<?=$value['registered_sale_id']?>' data-userid='<?=$this->userid?>'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 

             </tr>
           <?php } ?>

           <?php
         }
         ?>

       </tbody>
     </table>
     <!-- for add -->
     <div class="modal fade" id="add_new_vol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $volunteerregistered[0]['registered_sale_sale_location'] ?> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= g('base_url') ?>account/add_volunteer_shift"
              method="post" id="saveForm" class="footTop">
              <div class="form-group">
                <!-- hidden field -->
                <input type="hidden" name="registered_sale[registered_sale_id]" value="<?php echo $volunteerregistered[0]['registered_sale_id'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_user_id]" value="<?php echo $volunteerregistered[0]['registered_sale_user_id'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_id]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_id'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_title]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_title'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_location]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_location'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_city]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_city'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_state]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_state'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_zip]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_zip'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_start_date]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_start_date'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_end_date]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_end_date'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_location_phone]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_location_phone'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_registration_fee]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_registration_fee'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_volunteer_registration]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_volunteer_registration'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_data_entry_option]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_data_entry_option'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_consignor_fee]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_consignor_fee'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_hanger_rental_fee]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_hanger_rental_fee'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_volunteer_shift_schedule]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_volunteer_shift_schedule'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_dropoff_id]" value="<?php echo$volunteerregistered[0]['registered_sale_dropoff_id'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_dropoffs_start_time]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_dropoffs_start_time'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_dropoffs_end_time]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_dropoffs_end_time'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_sale_dropoffs_designated_slots]" value="<?php echo$volunteerregistered[0]['registered_sale_sale_dropoffs_designated_slots'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_volunteer_id]" value="<?php echo$volunteerregistered[0]['registered_sale_volunteer_id'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_volunteer_shift_max_volunteers]" value="<?php echo$volunteerregistered[0]['registered_sale_volunteer_shift_max_volunteers'] ?>"/>
                <input type="hidden" name="registered_sale[registered_sale_volunteer_shift_activity_desc]" value="<?php echo$volunteerregistered[0]['registered_sale_volunteer_shift_activity_desc'] ?>"/>
                <!-- hidden field end -->

                <input type="hidden" name="registered_sale[user_id]" value="<?php echo $this->userid?>"/>
                <label for="recipient-name" class="col-form-label">Sale Location:</label>
                <input type="text" name="registered_sale[registered_sale_sale_title]"  class="form-control" value="<?php echo $volunteerregistered[0]['registered_sale_sale_title'] ?>" id="recipient-name" readonly/>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sale Address:</label>
                <input type="text" name="registered_sale[registered_sale_sale_street]"  class="form-control" value="<?php echo $volunteerregistered[0]['registered_sale_sale_street'] ?>" id="recipient-name" readonly/>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Selected Volunteer Shift:</label>
                <select class="js-states form-control" id="multiple" multiple
                name="registered_sale[registered_sale_volunteer_id][]" >
                <?php if(!empty($volunteerregistered)){?>
                  <?php
                  for($k=0;$k<count($volunteerregistered);$k++){

                    $reg .= $volunteerregistered[$k]['registered_sale_volunteer_id'].",";
                  }
                  $cm_reg_id = substr($reg,0,-1);
                  $sql ="SELECT  * FROM mt_volunteer_shift WHERE  volunteer_shift_sale_id =".$volunteerregistered[0]['registered_sale_sale_id'] . " AND volunteer_shift_id NOT IN (".$cm_reg_id.")";
                  $query = $this->db->query($sql);
                  $active = $query->result_array(); 
                  foreach ($active as $key => $value) { ?>                      
                    <option class="form-control" value="<?php echo $value['volunteer_shift_id']?>">
                      <?php echo   date("F j, Y h:i:s A",strtotime($value['volunteer_shift_start_time']))?>
                      -
                      <?php echo   date("F j, Y h:i:s A",strtotime($value['volunteer_shift_end_time']))?>
                    </option>
                  <?php } ?>
                <?php } ?>
              </select> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" value="Save Now"  id="submitsaleInfo" class="btn btn-warning">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <!-- for add  -->
</div>
</div>
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $("#single").select2({
    allowClear: true
  });
  $("#multiple").select2({

    allowClear: true
  });
</script>
<!-- <script type="text/javascript">
     $(document).ready(function () {

      $('#edit-btn').click(function() {
          // alert('test');
      });
                
        });
      </script> -->
      <script type="text/javascript">
        jQuery(document).ready(function () {
          jQuery(".edit-btn").click(function(){
      // alert('yes');
      var data = $("#editform").serialize();
      var url = "<?=g('base_url')?>account/ajax_edit";
      response = AjaxRequest.formrequest(url, data);
      if(response.status == 1)
      {
        AdminToastr.success(response.txt,'Success');
        $("#contactform").find("input[type=text], input[type=email], textarea").val("");
        $("#contactform").find("input[type=radio]").prop('checked', false);
        window.setTimeout('location.reload()', 3000);
      }
      else{
        AdminToastr.error(response.txt,'Error');
      }
      return false;
    });
        });
      </script>

      <script type="text/javascript">
        $(document).ready(function() {


          $(".delete_this").on('click',function(){
            if(confirm("Are you delete this <?=humanize($class)?>?"))
            {
              var id = $(this).attr("data-pkid");
              var data = {id:id};
              var url = $(this).attr('data-url');

              response = AjaxRequest.fire(url,data);

              if(response.status)
                $("#row-"+id).remove();
              location.reload();
            }

          });

          $('#example').DataTable();
        });
      </script>
      <script>
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
      </script>

     <!--  <script>
        $('#mySelect2').select2({
          dropdownParent: $("#exampleModal1")
          
        });
      </script> -->