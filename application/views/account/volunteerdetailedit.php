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

<div class="col-md-9 col-sm-7">
  <div class="content-page ">
    <div class="row">
      <div class="col-md-12">
        <form action="<?= g('base_url') ?>account/update_detail" method="post" id="saveForm" class="footTop">
          <div class="form-group">
            <input type="hidden" name="v_detail[registered_sale_id]" value="<?php echo $volunterdetail[0]['registered_sale_id'] ?>"/>
            <input type="hidden" name="v_detail[registered_sale_user_id]" value="<?php echo $this->userid?>"/>
            <label for="recipient-name" class="col-form-label">Sale Location:</label>
            <input type="text" name="v_detail[registered_sale_sale_title]" readonly class="form-control" value="<?php echo $volunterdetail[0]['registered_sale_sale_title'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sale Address:</label>
            <input type="text" name="v_detail[registered_sale_sale_street]" readonly class="form-control" value="<?php echo $volunterdetail[0]['registered_sale_sale_street'] ?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Selected Volunteer Shift:</label>
            <input type="text" readonly class="form-control" value="<?php echo   date("F j, Y h:i:s A",strtotime($volunterdetail[0]['registered_sale_volunteer_shift_start_time']))?>" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select New Shift:</label>
            <select name="v_detail[registered_sale_volunteer_id]">
              <?php if(!empty($volunterdetail)){?>
                <?php
                for($k=0;$k<count($volunterdetail);$k++){
                  $reg_ids .= $volunterdetail[$k]['registered_sale_volunteer_id'].",";
                }
                $cm_reg_id = substr($reg_ids,0,-1);
                $sql="SELECT  * FROM mt_volunteer_shift WHERE  volunteer_shift_sale_id =".$volunterdetail[0]['registered_sale_sale_id'] . " AND volunteer_shift_id NOT IN (".$cm_reg_id.")";
                $query = $this->db->query($sql);
                $active_volunteer =  $query->result_array();                         
                foreach ($active_volunteer as $key => $value) { ?>   
                 <option class="form-control" value="<?php echo $value['volunteer_shift_id']?>">
                  <?php echo   date("F j, Y h:i:s A",strtotime($value['volunteer_shift_start_time']))?>
                  -
                  <?php echo   date("F j, Y h:i:s A",strtotime($value['volunteer_shift_end_time']))?>

                  <option type="hidden" style="display:none"><?php echo $value['registered_sale_volunteer_shift_activity_desc'] ?></option>
                </option>                   
              <?php } ?>
              <?php
            } 
            ?>
          </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mtop10">
          <button value="Save Now" id="submitInfo" class="btn btn-primary">Update Now</button>
          <br>
          <br>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<? $this->load->view('account/footer_main') ?>

<script type="text/javascript">
  $(document).ready(function () {
    var obj;
    $("#submitInfo").click(function (e) {
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
  });
</script>