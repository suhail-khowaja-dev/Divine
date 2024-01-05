<br><br><br><br>
<? $this->load->view('account/header_main') ?>
<div class="col-md-9 col-sm-7">
  <div class="content-page ">
    <h2>Sale Registered</h2>
    <table class="table text-nowrap table-striped">
      <thead>
        <tr>
          <th scope="col">Sale Location</th>
          <th scope="col">Sale Start Date</th>
          <th scope="col">Drop Off Shift</th>
          <th scope="col">Edit</th>
          <th scope="col">Link</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach($saleregistered as $key =>$value){ ?>
        <tr>
          <td><?php echo $value['registered_sale_sale_location'] ?></td>
          <td><?php echo   date('F j, Y',strtotime($value['registered_sale_sale_start_date']))?></td>
          <td><?php echo   date('F j, Y g:i A',strtotime($value['registered_sale_sale_dropoffs_start_time']))?></td>
          <td>
           <a href='javascript:void(0);' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal<?php echo $key?>" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil"></span></a> 
           |
           <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_this" data-url='<?=l('account/'.$class."/Consignor-delete")?>' data-pkid='<?=$value['registered_sale_id']?>' data-userid='<?=$this->userid?>' data-saleid='<?=$value['registered_sale_sale_id']?>'>  <i class="fa fa-trash" aria-hidden="true"></i></a>
         </td>
         <?php if($value['sale_status'] == 0){?>
          <td> </td> 
          <?}else{?>
            <td> <a href="<?=g('base_url').'account/saledetail'?>?sale_ref=<?php echo $value['registered_sale_sale_id'] ?>">Sale Details </a></td> 

          <?php }?>

        </tr>
        <!-- Modal -->

        <div class="modal fade" id="exampleModal<?php echo $key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $value['registered_sale_sale_location'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= g('base_url') ?>account/ajax_edit" method="post" id="editform" class="footTop">
                  <div class="form-group">
                    <input type="hidden" name="registered_sale[registered_sale_id]" value="<?php echo $value['registered_sale_id'] ?>"/>
                    <input type="hidden" name="registered_sale[user_id]" value="<?php echo $this->userid?>"/>
                    <label for="recipient-name" class="col-form-label">Sale Location:</label>
                    <input type="text" name="registered_sale[registered_sale_sale_title]" readonly class="form-control" value="<?php echo $value['registered_sale_sale_title'] ?>" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Sale Address:</label>
                    <input type="text" name="registered_sale[registered_sale_sale_street]" readonly class="form-control" value="<?php echo $value['registered_sale_sale_street'] ?>" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Selected Drop Off:</label>
                    <input type="text" readonly class="form-control" value="<?php echo   date("F j, Y h:i A", strtotime($value['registered_sale_sale_dropoffs_start_time']))?>" id="recipient-name">

                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Select New Drop Off:</label>
                    <select name="registered_sale[registered_sale_dropoff_id]">
                      <?php
                      $param['where']['sale_dropoffs_sale_id'] = $value['registered_sale_sale_id'];
                      $param['where']['sale_dropoffs_id !='] = $value['registered_sale_dropoff_id']; 
                      $dropoffs = $this->model_sale_dropoffs->find_all($param);
                      foreach ($dropoffs as $key => $value) { ?>                      
                        <option class="form-control" value="<?php echo $value['sale_dropoffs_id']?>">
                          <?php echo   date("F j, Y h:i:s A", strtotime($value['sale_dropoffs_start_time']))?>
                          -
                          <?php echo   date("F j, Y h:i:s A", strtotime($value['sale_dropoffs_end_time']))?>
                        </option>
                      <?php } ?>
                    </select>
                    
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit-btn"  data-pkid='<?=$value['registered_sale_id']?>' data-userid='<?=$this->userid?>'>Update</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal End -->
      <?php } ?> 
    </tbody>
  </table>
<!--     <h2>Volunteer Shifts Registered</h2>
   <table class="table text-nowrap table-striped">
    <thead>
      <tr>
        <th scope="col">Sale Location</th>
        <th scope="col">Volunteer Start Date</th>
        <th scope="col">Volunteer End Date</th>
        <th scope="col">Shift Description</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($volunteerregistered as $key =>$value){ ?>
      <tr>
        <td><?php echo $value['sale_location'] ?></td>
        <td><?php echo   date("d/m/Y h:m:s: A", strtotime($value['volunteer_shift_start_time']))?></td>
        <td><?php echo   date("d/m/Y h:m:s: A", strtotime($value['volunteer_shift_end_time']))?></td>
        <td><?php echo $value['volunteer_shift_activity_desc']  ?></td>
        


      </tr>
      <?php
    }
    ?>
  </tbody>
</table> -->
</div>
</div>

<script>
  jQuery(document).ready(function () {
    jQuery("#edit-btn").click(function(){
      var data = $("#editform").serialize();
      var url = "<?=g('base_url')?>account/ajax_edit_dropoff";
      response = AjaxRequest.formrequest(url, data);
      if(response.status == 1)
      {
        AdminToastr.success(response.txt,'Success');
        $("#contactform").find("input[type=text], input[type=email], textarea").val("");
        $("#contactform").find("input[type=radio]").prop('checked', false);
        window.setTimeout('location.reload()', 3000);
      }else{
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
        var saleid =$(this).attr("data-saleid");
        var userid = $(this).attr("data-userid");
        var data = {id:id,userid:userid,saleid:saleid};
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