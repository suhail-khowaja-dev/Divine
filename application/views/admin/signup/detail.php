<style>
*[data-href] {
  cursor: pointer;
}
td a {
  display:inline-block;
  min-height:100%;
  width:100%;
  padding: 10px; /* add your padding here */
}
td {
  padding:0;  
}
#sale_invoice {
  /*background: #fb5587;*/
  /* border-radius: inherit; */
  color: #FFF;
  position: relative;
  margin: 8px auto;
  float: right;
  display: table;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-align: center;
  border: none;
  padding: 7px 5px;
  font-size: 13px;
}
</style>
<? global $config;
//$discount_base = discount_value( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_total' ] );
//$discount = discount_text( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_currency' ] , $order_detail[ 'order_currency_rate' ] ,false ) ;
//debug($order_detail,1);
?>

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-6">
        <h2>User Information</h2>
        <form action="" method="post" id="savedata" class="footTop">
          <div class="form-group col-md-12">
            <label for="email">Consignor #</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_id']?>"
            placeholder="Consignor #"
            name="">
          </div>


          <div class="form-group col-md-6">
            <label>First Name</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_firstname']?>"
            placeholder="First Name"
            name="">
          </div>

          <div class="form-group col-md-6">
            <label>Last Name</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_lastname']?>"
            placeholder="Last Name"
            name="">
          </div>

          <div class="form-group col-md-12">
            <label>Address</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_address']?>"
            placeholder="Address" 
            name="">
          </div>

          <div class="form-group col-md-4">
            <label>City</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_city']?>" placeholder="Address">
          </div>

          <div class="form-group col-md-4">
            <label>State</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_state']?>"placeholder="State">
          </div>

          <div class="form-group col-md-4">
            <label>Zipcode</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_zip']?>" placeholder="Zip">
          </div>
          <div class="form-group col-md-12">
            <label>Phone Number</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_phone']?>" placeholder="Zip">
          </div>
          <div class="form-group col-md-12">
            <label>Email</label>
            <input type="text"
            class="form-control my-form-control my-margin-bottom-15"
            value="<?php echo $sale_detail['signup_email']?>" placeholder="Zip">
          </div>

        </form>
      </div>

      <div class="col-md-6">
        <h2>Registered Sales</h2>
        <div class="form-group pull-right">
        </div>
        <table class="table table-hover table-bordered results">
          <thead>
            <tr>
              <th class="col-md-5 col-xs-5">Sale Location</th>
              <th class="col-md-4 col-xs-4">Sale Start Date</th>
              <!--     <th class="col-md-3 col-xs-3">Half Off?</th> -->
            </tr>
          </thead>
          <tbody>
            <?php 
            $para['where']['registered_sale_user_id'] = $sale_detail['signup_id'];
            $para['where']['registered_sale_user_type'] = 1;                    
            $para['where']['registered_sale_volunteer_id'] = 0;                    
            $registered_sale = $this->model_registered_sale->find_all_active($para);
            // debug($registered_sale,1);
            foreach($registered_sale as $key=>$value){?>
              <tr data-href="linkToFile.pdf" class="reg_sale" id="sale_id" reg-id="<?php echo $value['registered_sale_sale_id']?>" user-id="<?php echo $sale_detail['signup_id']?>">

                <td><?php echo $value['registered_sale_sale_location']?></td>
                <td>
                  <?php echo   date("d/m/Y",strtotime($value['registered_sale_sale_start_date']))?> 
                </td>
                <!--  <td><?php echo $value['half_off']?></td>  -->

              </tr>
            <?php } ?> 
          </tbody>
        </table>
      </div>

    </div>
    <hr>

    <div class="row">
      <div class="col-md-6">
        <h2>Sale Consignor Finanical Terms </h2>

        <form action="<?= g('admin_base_url')?>signup/update_financial" method="post" id="saveFinancial" class="footTop">
          <input type="hidden"  name="T_detail[financial_data_id]" id="trans_id" value="0"/>
          <input type="hidden"  name="T_detail[financial_data_user_id]" id="" value="<?php echo $sale_detail['signup_id']?>"/>
          <input type="hidden"  name="T_detail[financial_data_user_type]" id="" value="<?php echo $sale_detail['signup_type']?>"/>
          <input type="hidden" id="sale_registered_id"  value=""/>
          <input type="hidden" id="id_sale" value="">
          <div class="form-group col-md-6">
            <label for="email">Consignor Fee</label>
            <input type="text" id="consignor_fee"
            class="form-control my-form-control my-margin-bottom-15"
            value="0"
            placeholder="Consignor Fee"
            name="T_detail[financial_data_consignor_fee]">
          </div>
          <div class="form-group col-md-6">
            <label>Hanger Fee</label>
            <input type="text" id="hanger_fee"
            class="form-control my-form-control my-margin-bottom-15"
            value="0"
            placeholder="Hanger Fee"
            name="T_detail[financial_data_hanger_fee]">
          </div>

          <div class="form-group col-md-6">
            <label>Volunteer Shifts Scheduled</label>
            <input type="text" id="volunteer_shifts_schedule"
            class="form-control my-form-control my-margin-bottom-15"
            value="0"
            placeholder="Volunteer Shifts Scheduled"
            name="T_detail[financial_data_volunteer_shifts_schedule]">
          </div>

          <div class="form-group col-md-6">
            <label>Actual</label>
            <input type="text" id="actual"
            class="form-control my-form-control my-margin-bottom-15"
            value="0"
            placeholder="Actual" 
            name="T_detail[financial_data_actual]">
          </div>

          <div class="form-group col-md-6">
            <label>Consignor Perecntage</label>
            <input type="text" id="cosnignor_percentage"
            class="form-control my-form-control my-margin-bottom-15 cosnignor_percentage"
            value="0" 
            placeholder="Consignor Perecntage"
            name="T_detail[financial_data_cosnignor_percentage]">
          </div>

          <div class="form-group col-md-6">
            <div style="margin-bottom: 25px;"></div>
            <!--  <button value="Update Information" id="submitInfo" class="btn btn-warning">Update Information</button> -->

            <button value="Update Information" type="submit" style="display: none;"  id="submitInfo" class="btn btn-primary">Update Information</button>
          </div>

        </form>
        <div>
        </div>
      </div>

      <div class="col-md-6">
        <h2>Sale Transactions</h2>

        <table class="table table-hover table-bordered results">
          <thead>
            <tr>
              <th class="col-md-5 col-xs-5">Transaction Number</th>
              <th class="col-md-4 col-xs-4">Sale Price</th>
              <!-- <th class="col-md-4 col-xs-4">Tax</th> -->
              <th class="col-md-3 col-xs-3">Half Off?</th>
            </tr>

          </thead>
          <tbody id="sale_tran">
           <?php
           $saletransaction = $this->model_sale_transaction->find_all_active();
           foreach($saletransaction as $key=>$value){?>

           </span>
         <?php } ?> 
       </tbody>
     </table>
   </div>
 </div>

 <div class="row">
  <div class="col-md-6">
    <h2>Sales Data </h2>
    <form action="" method="post" id="saveForm" class="footTop">
      <div class="form-group col-md-6">
        <label for="email">Items Sold</label>
        <input type="text" id="item_sold"
        class="form-control my-form-control my-margin-bottom-15 item_so"
        value="0"
        placeholder="Items Sold"
        name="">
      </div>


      <div class="form-group col-md-6">
        <label>Recognized Items</label>
        <input type="text" id="recognized_item"
        class="form-control my-form-control my-margin-bottom-15"
        value=""
        placeholder="Recognized Items"
        name="">
      </div>

      <div class="form-group col-md-4">
        <label>Revenue Ticket</label>
        <input type="text" id="revenue_ticket"
        class="form-control my-form-control my-margin-bottom-15"
        value="0"
        placeholder="Revenue Ticket"
        name="">
      </div>

      <div class="form-group col-md-4">
        <label>Tax</label>
        <input type="text" id="tax"
        class="form-control my-form-control my-margin-bottom-15"
        value="0"
        placeholder="Tax" 
        name="">
      </div>

      <div class="form-group col-md-4">
        <label>Total With Tax</label>
        <input type="text" id="total"
        class="form-control my-form-control my-margin-bottom-15"
        value="0" 
        placeholder="Total">
      </div>

      <div class="form-group col-md-6">
        <label>Consignor Payout</label>
        <input type="text" id="Consignor_payout"
        class="form-control my-form-control my-margin-bottom-15"
        value="0" 
        placeholder="Consignor Payout">
      </div>

      <div class="form-group col-md-6">
        <label>Divine Revenue</label>
        <input type="text" id="divine_revenue"
        class="form-control my-form-control my-margin-bottom-15"
        value="0" 
        placeholder="Divine Revenue">
      </div>
    </form>
    <div>
    </div>
    <!-- Ptrint Area Work -->
    <div id="printableArea" class="hidden">
      <table>
        <tbody>
          <tr>
            <td>
              <img src="http://localhost/divine_dev/assets/uploads/logo/logo_2011161904099817.jpg">
            </td>
            <td style="padding-left: 50px">
              <h2 style="color: #000;font-weight:bold;padding-left: 50px;margin-bottom: 20px">Sales Receipt</h2>
              Consignor # <?php echo $sale_detail['signup_id']?>
              <br>
              <?php echo $sale_detail['signup_firstname']?>
              <br>
              <?php echo $sale_detail['signup_address']?> <?php echo $sale_detail['signup_city']?> <?php echo $sale_detail['signup_state']?> <?php echo $sale_detail['signup_zip']?>
              <br>
              <?php echo $sale_detail['signup_email']?>
              <br>
              <?php echo $sale_detail['signup_phone']?>
              <br>
              <!--   <td class="hidden"><?php echo $user_data1['financial_data_cosnignor_percentage']?></td> -->
            </td>
          </tr>
        </tbody>
      </table>

      <table style="margin-top: 20px">
       <thead>
         <tr>
           <th style="padding-right: 20px">Consignment Sale Date</th>
           <td class="pdf_sale_date"></td>
         </tr>
         <tr>
           <th>Sale Location</th>
           <td class="pdf_sale_location"></td>
         </tr>
       </thead>
     </table>
     <hr>
     <table class="table table-bordered">
       <thead>
         <tr>
           <th>Transaction Number</th>
           <th>Sale Price</th>
           <!-- <th>Tax</th> -->
           <th>Half Off</th>
         </tr>
       </thead>
       <tbody class="pdf_body">

       </tbody>
     </table>
     <hr>
     <table>
       <tr>
         <th style="padding-right: 20px">Total Sale</th>
         <td class="pdf_total_sale"></td>
       </tr>
       <tr>
         <th style="padding-right: 20px">Consigner %</th>
         <td class="pdf_total_percentage"></td>
       </tr>
       <tr>
         <th style="padding-right: 20px">Registraion Fee</th>
         <td  class="pdf_total_fee"></td>
       </tr>
       <tr>
         <th style="padding-right: 20px">Hanger rental Fee</th>
         <td class="pdf_total_hanger"></td>
       </tr>
     </table>
     <hr>
     <table>
       <tr>
         <th style="padding-right: 20px">Total Enclosed</th>
         <td class="total_enclosed"></td>
       </tr>
     </table>

   </div>
   <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')"  id="sale_invoice" value="Print Invoice"/>
   <!-- End -->
 </div>
</div>

</div>
</div>

</div>
</div>
<!-- END VALIDATION STATES-->
</div>
<? create_modal_html("address_update", "", "", 'method="POST" action="' . $config['base_url'] . 'admin/order/save_address"', false) ?>
<script>
    // global vars
    var sale_location = "";
    var sale_start_date = "";
    var consignor_fee = "";
    var cosnignor_percentage = "";
    var hanger_fee = "";
    $(document).ready(function() {
      $(".reg_sale").click(function() { 
        $('#submitInfo').css('display','block');
        sale_location = $(this).find('td:first').html();
        sale_start_date = $(this).find('td:last').html();
        var id = $(this).attr('reg-id');
        var user_id = $(this).attr('user-id');
        $('#sale_registered_id').val(id);
        // alert(id);
      // $('.reg_sale').val();
      var params = {};
      params.id = id;
      params.user_id = user_id;
      var res = AjaxRequest.fire($js_config.base_url + "admin/signup/get_sale_transaction" , params);
      if(res.status == 1)
      {
        $('#sale_tran').html(res.html);
        $('#item_sold').val(res.html1);
        $('#revenue_ticket').val(res.html2);
        $('#Consignor_payout').val(res.html3);
        $('#divine_revenue').val(res.html4);
        $('#tax').val(res.html5);
        $('#total').val(res.html6);
        $('#consignor_fee').val(res.html7);
        $('#hanger_fee').val(res.html8);
        $('#volunteer_shifts_schedule').val(res.html9);
        $('#actual').val(res.html10);
        $('#cosnignor_percentage').val(res.html11);
        $('#trans_id').val(res.html12);
        $('#id_sale').val(res.html13);
        // alert()
        $('#recognized_item').val(res.html14);

      }
      else
      {
        $('#sale_tran').html('');
        $('#item_sold').val('');
        $('#revenue_ticket').val('');
        $('#Consignor_payout').val('');
        $('#divine_revenue').val('');
        $('#tax').val('');
        $('#total').val('');
        $('#consignor_fee').val('');
        $('#hanger_fee').val('');
        $('#volunteer_shifts_schedule').val('');
        $('#actual').val('');
        $('#cosnignor_percentage').val('');   
        $('#recognized_item').val('');
      }
      cosnignor_percentage = parseFloat($('#cosnignor_percentage').val());
      consignor_fee = parseFloat($('#consignor_fee').val());
      hanger_fee = parseFloat($('#hanger_fee').val());
      // alert(hanger_fee);
    });

      $("#submitInfo").click(function (e) {
       var item_s =  $('#item_sold').val();
       var recognized_it = $('#recognized_item').val();
       var revenue_ticket = $('#revenue_ticket').val();
       var tax = $('#tax').val();
       var total = $('#total').val();
       var Consignor_payout = $('#Consignor_payout').val();
       var divine_revenue = $('#divine_revenue').val();
       var id = $('#sale_registered_id').val();
       var sale_id = $('#id_sale').val();
       // alert(sale_id);
       $('#saveFinancial').append('<input type="number" value="'+sale_id+'" name="T_detail[financial_data_sale_id]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+id+'" name="T_detail[financial_data_registered_sale_id]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+item_s+'" name="T_detail[financial_data_item_sold]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+recognized_it+'" name="T_detail[financial_data_recognized_item]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+revenue_ticket+'" name="T_detail[financial_data_revenue_ticket]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+tax+'" name="T_detail[financial_data_tax]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+Consignor_payout+'" name="T_detail[financial_data_consignor_payout]" hidden></input>');
       $('#saveFinancial').append('<input type="number" value="'+divine_revenue+'" name="T_detail[financial_data_divine_revenue]" hidden></input>');
       setTimeout(function () {
                // Prevent form submit
                var obj = $("#saveFinancial");
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
      $(".search").keyup(function () {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
          return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
      });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
          $(this).attr('visible','false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
          $(this).attr('visible','true');
        });

        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if(jobCount == '0') {$('.no-result').show();}
        else {$('.no-result').hide();}
      });
    });
  </script>
  <script type="text/javascript">
    function printDiv(divName) {
      $('title').html('');
      var total_sale = 0;
      var total_percentage = 0;
      $('.pdf_sale_date').html(sale_start_date); 
      $('.pdf_sale_location').html(sale_location);
      $('.pdf_body').html('');
      $('.sale_transaction_id').each(function(i){
        var fieldHTML = "";
        var sti_div = "<td>"+$('.sale_transaction_id')[i].outerText+"</td>";
        var stsp_div = "<td>"+$('.sale_transaction_sale_price')[i].outerText+"</td>";
      // var stt_div = "<td>"+$('.sale_transaction_tax')[i].outerText+"</td>";
      var stho_div = "<td>"+$('.sale_transaction_half_off')[i].outerText+"</td>";
      fieldHTML += '<tr>'+sti_div+stsp_div+stho_div+'</tr>';
      total_sale += parseFloat($('.sale_transaction_sale_price')[i].outerText);
      $('.pdf_body').append(fieldHTML);
    });
      $('.pdf_total_sale').html(' $  ' + (total_sale.toFixed(2)));
      $('.pdf_total_percentage').html('$ ' + (total_sale * cosnignor_percentage / 100).toFixed(2) +  '  @  ' + cosnignor_percentage.toFixed(2) + '%'); 
      $('.pdf_total_fee').html(' $ ' + (consignor_fee.toFixed(2)));
      $('.pdf_total_hanger').html(' $ ' + (hanger_fee.toFixed(2)));
      var t_enclosed = (total_sale * cosnignor_percentage / 100) - consignor_fee - hanger_fee;
      $('.total_enclosed').html(' $ ' + t_enclosed.toFixed(2));
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
     // if (window.matchMedia) {
     //        var mediaQueryList = window.matchMedia('print');

     //        mediaQueryList.addListener(function (mql) {
     //            console.log(mql)
     //        });
     //    }
     document.body.innerHTML = originalContents;
     $('title').html('Divine Consign - Admin Panel');
   }
 </script>
 
