<?php if ($this->adminid == 1) { ?>
	<div class="text-center customSaleContainer">
<!-- 	<div class="col-md-12 col-sm-12">
		
</div> -->
<div class="content-page ">
	<h3>Sales Report</h3>
	<form action="<?=g('base_url')?>sale_report/index" method="post" id="saveForm" class="footTop">
		<div class="form-group">
			<label for="recipient-name" class="col-form-label">Select Report:</label>
			<select name="report_name">                 
				<option class="form-control" value="1">All Consignors w/State & E-Mail</option>
				<!-- <option class="form-control" value="2">Business Promotion by Sale</option> -->
				<option class="form-control" value="3">Check-in Listing - Excel</option>
				<option class="form-control" value="4">Consignor Payout All Sales</option>
				<option class="form-control" value="5">Consignor Registration W/E-Mail - Excel</option>
				<option class="form-control" value="6">Count of registrations for Wisconsin</option>
				<!-- <option class="form-control" value="7">Referal View by Sale</option> -->
				<!-- <option class="form-control" value="8">Sale Quickbook Output</option> -->
				<option class="form-control" value="9">Sale Totals Summary</option>
				<option class="form-control" value="10">Sale Transaction Count</option>
				<option class="form-control" value="11">Sales Revenue - Excel</option>
				<!-- <option class="form-control" value="12">Sales Revenue - Report</option> -->
				<option class="form-control" value="13">Volunteer Shift Roster by Sale</option>
				<option class="form-control" value="14">Volunteer Shifts - Excel</option>
			</select>
		</div>

		<div class="form-group">
			<label for="recipient-name" class="col-form-label">Select Sale:</label>
			<select name="sale[sale_id]"> 
				<?php
				foreach ($sale as $key => $value) {?>
					<option class="form-control" value="<?php echo $value['sale_id']?>">
						<?php echo $value['sale_title']?>
						<?php
					}
					?> 
				</select>
			</div>
			<button value="Save Now" class="btn btn-primary">Get Report</button>
		</form>
	</div>
</div>
<?php
}
?>
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
