<br><br><br><br>

<? $this->load->view('account/header_main') ?>

<!-- <?php
// $total = $sale_detail['sale_cosnignor_percentage'] * 100 ;
// $percentage = number_format($total,2);

$total_sale=count($sale_detail);
?> -->
<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">
  <section>
    <h2>Sale Consignor Finanical Terms</h2>
    <div class="content-page ">
      <div class="row">
        <div class="col-md-12">
          <form action="<?= g('base_url') ?>account/update_info_sale" method="post" id="saveForm" class="footTop">

           <input type="hidden" name="sale[con_vol_num]"
           value="<?= $this->userid ?>">
                    <!-- <input type="hidden" name="signup[signup_type]"
                      value="<?= $userdata['signup_type'] ?>"> -->

                      <div class="form-group col-md-6">
                        <label for="email">Consignor Fee</label>
                        <input type="text"
                        class="form-control my-form-control my-margin-bottom-15"
                        value="<?php echo $sale_detail['sale_consignor_fee'] ?>"
                        placeholder="Consignor Fee"
                        name="sale[consignor_fee]">
                      </div>


                      <div class="form-group col-md-6">
                        <label>Hanger Fee</label>
                        <input type="text"
                        class="form-control my-form-control my-margin-bottom-15"
                        value="<?php echo $sale_detail['sale_hanger_rental_fee']?>"
                        placeholder="Hanger Fee"
                        name="sale[hanger_rental_fee]">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Volunteer Shifts Scheduled</label>
                        <input type="text"
                        class="form-control my-form-control my-margin-bottom-15"
                        value="<?php echo $sale_detail['sale_volunteer_shift_schedule']?>"
                        placeholder="Volunteer Shifts Scheduled"
                        name="">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Actual</label>
                        <input type="text"
                        class="form-control my-form-control my-margin-bottom-15"
                        value="<?php echo $sale_detail['sale_actual'] ?>"
                        placeholder="Actual" 
                        name="sale[actual_vol_shifts]">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Consignor Perecntage</label>
                        <input type="text"
                        class="form-control my-form-control my-margin-bottom-15"
                        value="<?php echo  $sale_detail['sale_cosnignor_percentage'] ?> %"placeholder="Consignor Perecntage">
                       <!--  <input type="hidden" name="sale[consignor_percentage]" 
                        value="<?php echo $sale_detail['sale_cosnignor_percentage']?>"> -->
                      </div>
                      <!-- <div class="form-group col-md-6 mtop10">
                        <button value="Save Now" id="submitInfo" class="btn btn-warning sale_consignor">Update Information</button>

                      </div> -->
                    </form>
                  </div>
                </div>
                <!--Sale Data Content -->
                <div class="row">
                  <div class="col-md-12">
                   <h2>Sales Data</h2>
                   <form action="#" method="post" id="savesaledata" class="footTop">
                  <!--   <input type="hidden" name="signup[signup_password]"
                           value="<?= $userdata['signup_password'] ?>">
                    <input type="hidden" name="signup[signup_id]"
                           value="<?= $this->userid ?>">
                    <input type="hidden" name="signup[signup_type]"
                    value="<?= $userdata['signup_type'] ?>"> -->

                    <div class="form-group col-md-6">
                      <label for="email">Item Sold</label>
                      <input type="text"
                      class="form-control my-form-control my-margin-bottom-15"
                      value="<?php echo $sale_detail['sale_items_sold'] ?>"
                      placeholder="Item Sold"
                      name="">
                    </div>


                    <div class="form-group col-md-6">
                      <label>Recognized Items</label>
                      <input type="text"
                      class="form-control my-form-control my-margin-bottom-15"
                      value="<?php echo $sale_detail['sale_recognized_items']?>"
                      placeholder="Recognized Items"
                      name="">
                    </div>

                    <div class="form-group col-md-6">
                    	
                      <label>Revenue Ticket</label>
                      <input type="text"
                      class="form-control my-form-control my-margin-bottom-15"
                      value="<?php echo $sale_detail['sale_revenue_ticket'] ?>"
                      placeholder="Revenue Ticket"
                      name="">
                    </div>
                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Tax</label>
                          <input type="text"
                          class="form-control my-form-control"
                          value="<?php echo $sale_detail['sale_tax_rate'] ?>"
                          placeholder="Actual"
                          name="">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Total</label>
                          <?php
                          $total =str_replace(array('$',','),'', $sale_detail['sale_revenue_ticket']) + str_replace('$','',$sale_detail['sale_tax_rate']);
                               	  // debug($sale_detail['ticket_revenue'])
                          ?>
                          <input type="text" class="form-control my-form-control" 
                          value="<?php echo $total ?>"  placeholder="Total" name="" id="">
                        </div>
                      </div>
                    </div>


                    <div class="form-group col-md-6">
                      <label>Consignor Payout</label>
                      <input type="text"
                      class="form-control my-form-control my-margin-bottom-15"
                      value="<?php echo $sale_detail['sale_consignor_payout']?>"
                      placeholder="Consignor Perecntage"
                      name="" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Divine Revenue</label>
                      <input type="text"
                      class="form-control my-form-control my-margin-bottom-15"
                      value="<?php echo $sale_detail['sale_divine_revenue']?>"
                      placeholder="Consignor Perecntage"
                      name="" >
                    </div>
                    <!-- <div class="form-group col-md-6">
                      <button value="Save Now" id="" class="btn btn-warning">Run Revenue</button>
                    </div>
                    <div class="form-group col-md-6">
                      <button value="Save Now" id="" class="btn btn-warning">Print Receipt</button>
                    </div> -->
                  </form>
                </div>
              </div>
              <!-- Sale Data Content End -->

              <!-- Sales Transaction Content-->
              <div class="row">
                <div class="col-md-12">
                 <h2>Sale Transactions</h2>
                 <div class="form-group pull-right">
                  <input type="text" class="search form-control" placeholder="Search">
                </div>
                <span class="counter pull-right"></span>
                <table class="table table-hover table-bordered results">
                  <thead>
                    <tr>
                      <th class="col-md-5 col-xs-5">Transaction Number</th>
                      <th class="col-md-4 col-xs-4">Sale Price</th>
                      <th class="col-md-3 col-xs-3">Half Off?</th>
                    </tr>
                    <tr class="warning no-result">
                      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                    </tr>
                  </thead>
                  <tbody>
                   <!-- <?php foreach($saletransaction as $key=>$value){?>
                    <tr>
                      <td><?php echo $value['transaction_num']?></td>
                      <td><?php echo $value['sale_price']?></td>
                      <td><?php echo $value['half_off']?></td>
                    </tr>
                    <?php
                  }
                  ?> -->
                </tbody>
              </table>
            </div>
          </div>
          <!-- Sales Transaction Content- End-->

        </div>
      </section>
    </div>
    <!-- END CONTENT -->

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
      </script>
      <script>
       $(document).ready(function() {
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
