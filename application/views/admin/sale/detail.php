<? global $config;
//$discount_base = discount_value( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_total' ] );
//$discount = discount_text( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_currency' ] , $order_detail[ 'order_currency_rate' ] ,false ) ;
//debug($order_detail,1);
?>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-shopping-cart"></i>
            <strong>Sale #<?= $sale_detail['sale_id'] ?> </strong>
            <small> / <?= date("Y-m-d", strtotime($sale_detail['sale_createdon'])) ?></small>
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
        <div class="invoice" style="padding: 20px;">
            <div class="row invoice-logo">
                <div class="col-xs-6 invoice-logo-space">
                    <a href="<?= $config['base_url'] ?>admin">
                        <img src="<?= get_image($this->layout_data['logo'][0]['logo_image_path'], $this->layout_data['logo'][0]['logo_image']) ?>"
                        alt="logo" class="main-tem-logo"/>
                    </a>
                </div>
                    <!--<div class="col-xs-6">
                <p>
                     Order #<? /*=$order_detail[ 'order_id' ]*/ ?> <span class="muted">
                    On: <? /*=date("Y-m-d",strtotime($order_detail[ 'order_createdon' ]))*/ ?> </span>
                </p>
            </div>-->
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <h3><strong>Sale Info:</strong></h3>
                <ul class="list-unstyled">
                    <li><strong> Location: </strong><?= $sale_detail['sale_location']; ?> </li>
                    <li><strong> Street: </strong><?= $sale_detail['sale_street']; ?></li>
                    <li><strong> City: </strong><?= $sale_detail['sale_city']; ?> </li>
                    <li><strong> State: </strong><?= $sale_detail['sale_state']; ?> </li>
                    <li><strong> Zip: </strong><?= $sale_detail['sale_zip']; ?> </li>
                    <li><strong> Start Date: </strong><?= $sale_detail['sale_start_date']; ?> </li>
                    <li><strong> End Date: </strong><?= $sale_detail['sale_end_date']; ?> </li>
                    <li><strong> Phone: </strong><?= $sale_detail['sale_location_phone']; ?> </li>
                            <!-- <li><strong> Address: </strong><?= $sale_detail['order_address1']; ?> </li>
                                <li><strong> Country: </strong><?= $sale_detail['order_country']; ?> </li> -->
                            </ul>
                        </div>
                    <!--<div class="col-xs-4">
                        <h3><strong>Shipping Address:</strong></h3>
                        <ul class="list-unstyled">
                            <li><strong> First Name: </strong><?/*= $order_detail['order_shipping_firstname']; */?> </li>
                            <li><strong> Last Name: </strong><?/*= $order_detail['order_shipping_firstname']; */?></li>
                            <li><strong> Email: </strong><?/*= $order_detail['order_shipping_email']; */?> </li>
                            <li><strong> Phone: </strong><?/*= $order_detail['order_shipping_phone']; */?> </li>
                            <li><strong> Address: </strong><?/*= $order_detail['order_shipping_address1']; */?> </li>
                            <li><strong> City: </strong><?/*= $order_detail['order_shipping_city']; */?> </li>
                            <li><strong> State: </strong><?/*= $order_detail['order_shipping_state']; */?> </li>
                            <li><strong> Zip: </strong><?/*= $order_detail['order_shipping_zip']; */?> </li>
                            <li><strong> Country: </strong><?/*= $order_detail['order_shipping_country']; */?> </li>
                        </ul>
                    </div>-->
                    <!-- <div class="col-xs-4">
                        <h3><strong>Payment Info:</strong></h3>

                        <ul class="list-unstyled">

                            <li><strong>Payment
                                    Status:</strong> <?= $this->model_order->get_payment_status($order_detail['order_payment_status']); ?>
                            </li>
                            <li><strong>Total Quantity:</strong> <?= $total_quantity ?>  </li>
                            <li><strong>Tax:</strong> <?php echo price($order_detail['order_tax']); ?>
                            <li><strong>Total Amount:</strong>
                                <?= price($order_detail['order_amount']) ?></li>
                            <li><strong>Created:</strong> <?= $order_detail['order_createdon']; ?></li>

                        </ul>
                    </div> -->

                </div>

                <!-- Adshare info start -->
                <!--<div class="row">
            <div class="col-xs-6">
                <h3><strong>Adshare Info : </strong></h3>
                <ul class="list-unstyled">
                    <li><strong> Campaign Name: </strong><? /*=$ashare_detail[ 'adshare_name' ];*/ ?> </li>
                    <li><strong> Product Name: </strong><? /*=$ashare_detail[ 'product_name' ];*/ ?> </li>
                    <?php
                /*                    if(isset($ashare_detail[ 'size_name' ])){*/ ?>
                        <li><strong>Size: </strong><? /*=$ashare_detail[ 'size_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'quantity_qty' ])){*/ ?>
                        <li><strong>Quantity: </strong><? /*=$ashare_detail[ 'quantity_qty' ];*/ ?></li>
                    <?php /*}
                    if(isset($ashare_detail[ 'print_side_name' ])){*/ ?>
                        <li><strong>Print Speed: </strong><? /*=$ashare_detail[ 'print_side_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'paper_finish_name' ])){*/ ?>
                        <li><strong>Paper Finish: </strong><? /*=$ashare_detail[ 'paper_finish_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'round_corner_name' ])){*/ ?>
                        <li><strong>Round Corner: </strong><? /*=$ashare_detail[ 'round_corner_name' ];*/ ?></li>
                    <?php /*}
                    if(isset($ashare_detail[ 'digital_proof_name' ])){*/ ?>
                        <li><strong>Digital Proof: </strong><? /*=$ashare_detail[ 'digital_proof_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'extra_option_name' ])){*/ ?>
                        <li><strong>Option: </strong><? /*=$ashare_detail[ 'extra_option_name' ];*/ ?> </li>
                   <?php /* }
                    if(!empty($ashare_detail[ 'adshare_number' ])){ */ ?>
                        <li><strong> Adshare: </strong><? /*=$ashare_detail[ 'adshare_number' ];*/ ?> </li>
                    <? /* }
                    */ ?>
                    <li><strong> Distribution Cost: </strong>$<? /*=$ashare_detail[ 'adshare_distribution' ];*/ ?> </li>
                    <li><strong> Zipcode: </strong><? /*=$ashare_detail[ 'adshare_distribution_zipcode' ];*/ ?> </li>
                    <li><strong> Mailing Date: </strong><? /*=$ashare_detail[ 'adshare_mailing_date' ];*/ ?> </li>
                    <li><strong> Business List: </strong><? /*=$ashare_detail[ 'adshare_business_list' ];*/ ?> </li>
                </ul>
            </div>
        </div>-->
        <!-- Adshare info end -->


        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal"  action="<?=g('base_url')?>Contact_us/export_sale_consignor" method="POST" name="upload_excel" enctype="multipart/form-data">
                    <div class="">
                        <div class="pull-right export_btn">
                            <input type="hidden" name="sale_id" value="<?=$sale_detail['sale_id']?>">
                            <!-- input type="submit" id="signupdata" name="Export" class="btn btn-success" value="Export to CSV"/> -->
                            <button type="submit" class="btn btn-primary">Export Sheet</button>
                        </div>
                    </div>
                </form>
                <h3><strong>Registered Consignor List:</strong></h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                First Name
                            </th>

                            <th class="hidden-480">
                                Last Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th class="hidden-480">
                               Address
                           </th>
                           <th class="hidden-480">
                               City
                           </th>
                           <th class="hidden-480">
                               State
                           </th>
                           <th class="hidden-480">
                               Zip
                           </th>
                           <th class="hidden-480">
                               Phone
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                    <? foreach ($consignor as $key=>$item) { ?>

                        <tr>
                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_id'] ?>
                            </td>

                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_firstname'] ?> <br>

                            </td>

                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_lastname'] ?> <br>

                            </td>
                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_email'] ?> <br>

                            </td>

                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_address'] ?> <br>

                            </td>
                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_city'] ?> <br>

                            </td>
                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_state'] ?> <br>

                            </td>
                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_zip'] ?>
                            </td>

                            <td style="padding:10px 0; vertical-align:middle;">
                                <?= $item['signup_phone'] ?>
                            </td>
                        </tr>


                    <? }  ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal"  action="<?=g('base_url')?>Contact_us/export_sale_volunteer" method="POST" name="upload_excel" enctype="multipart/form-data">
                <div class="">
                    <div class="pull-right export_btn">
                     <input type="hidden" name="sale_id" value="<?=$sale_detail['sale_id']?>">
                     <!--  <input type="hidden" name="user_type" value="<?=$sale_detail['sale_signup_id']?>"> -->

                     <!-- input type="submit" id="signupdata" name="Export" class="btn btn-success" value="Export to CSV"/> -->
                     <button type="submit" class="btn btn-primary" >Export Sheet</button>
                 </div>
             </div>
         </form>
         <h3><strong>Registered Volunteer List:</strong></h3>
         <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        First Name
                    </th>

                    <th class="hidden-480">
                        Last Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th class="hidden-480">
                       Address
                   </th>
                   <th class="hidden-480">
                       City
                   </th>
                   <th class="hidden-480">
                       State
                   </th>
                   <th class="hidden-480">
                       Zip
                   </th>
                   <th class="hidden-480">
                       Phone
                   </th>
               </tr>
           </thead>
           <tbody>
            <? foreach ($volunteer as $key=>$item) { ?>

                <tr>
                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_id'] ?>
                    </td>

                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_firstname'] ?> <br>

                    </td>

                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_lastname'] ?> <br>

                    </td>
                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_email'] ?> <br>

                    </td>

                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_address'] ?> <br>

                    </td>
                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_city'] ?> <br>

                    </td>
                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_state'] ?> <br>

                    </td>
                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_zip'] ?>
                    </td>

                    <td style="padding:10px 0; vertical-align:middle;">
                        <?= $item['signup_phone'] ?>
                    </td>
                </tr>


            <? }  ?>

        </tbody>
    </table>
</div>
</div>

               <!--  <div class="row text-right">
                    <div class="col-md-12 col-xs-12 invoice-block">
                        <ul class="list-unstyled amounts">
                            <li><strong style="color:#333">Total Products</strong> : <? /*=count($order_items)*/ ?> </li>
                    <li><strong style="color:#333">No of Items</strong> : <? /*=$total_quantity*/ ?> </li>
                            <li><strong style="color:#333">Sub Total</strong>
                                : <?= price($order_detail['order_total']) ?> </li>
                            <li><strong style="color:#333">Shipping Price</strong>
                                : <?= price($order_detail['order_shipment_price']) ?> </li>
                            <li><strong style="color:#333">Tax</strong> : <?= price($order_detail['order_tax']) ?> </li>
                            <li><strong style="color:#333">Shipping Price</strong> : <? /*=price($order_detail['order_shipment_price'])*/ ?> </li>
                    <li><strong style="color:#333">Shipping Package</strong> : <? /*=$order_detail['order_shipment_package']*/ ?> </li>
                            <li><strong style="color:#333">Total Price</strong>
                                : <?= price($order_detail['order_amount']) ?> </li>
                        </ul>
                        <br>
                        a onclick="javascript:window.print();" class="btn btn-lg blue hidden-print margin-bottom-5">
                        Print <i class="fa fa-print"></i>
                        </a>
                        <a class="btn btn-lg green hidden-print margin-bottom-5">
                        Submit Your Invoice <i class="fa fa-check"></i>
                        </a
                    </div>
                </div> -->



            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
    <? create_modal_html("address_update", "", "", 'method="POST" action="' . $config['base_url'] . 'admin/order/save_address"', false) ?>