<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<?php 
$param['where']['sale_num'] = $sale['sale_title'];
$sale_con = $this->model_sale_ref->find_one_active($param);
?>
<body style="font:14px/20px 'Open Sans', sans-serif;">
    <table style="width: 100% !important;height: 100%;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;border-collapse:collapse;"
    cellpadding="0" cellspacing="0">
    <tr>
        <td class="container"
        style="display: block !important;clear: both !important;margin: 0 auto;max-width: 580px !important;">
        <table style="border-collapse:collapse;" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="padding:10px;border:1px solid #eee;">
                    <a href="<?=g('base_url')?>"><img src="<?php echo get_image($logo['logo_image_path'],$logo['logo_image'])?>" alt="img"/></a>
                </td>
            </tr>

            <tr>
                <td>
                    
                    <b><p>Hi <?php echo ucfirst($personal_data['signup_firstname'])?>  <?= ucfirst($personal_data['signup_lastname'])?>,</p></b>
                </td>
            </tr>
            <tr>
                <td>
                    
                    <b><p>Thank You registration to become a consignor at our upcoming Divine  Consign sale!</p></b>
                </td>
            </tr>
            <tr>
                <td>
                    
                    <b><p>Your Consignor # is: <?=$personal_data['signup_id']?></p></b>
                </td>
            </tr>
            <tr>
                <td>
                    
                    <b><p>Your password on record is: <?=$personal_data['signup_static_password']?></p></b>
                </td>
            </tr>
            <tr>
                <td>
                    
                    <b><p>Sale Location: <?=$sale_location?></p></b>
                </td>
            </tr>
            <tr>
                <td>
                   
                    <b><p>Your Scheduled Drop Off Time is : <?=  date("F j, Y g:i A",strtotime($sale_dropoffs_start_time))?> - <?=date("g:i A",strtotime($sale_dropoffs_end_time))?>  
                    (Note:each consignor can only participate in one sale per session)
                </p></b>
            </td>
        </tr>

        <tr>
            <td>
                
                <b><p>If you need to change your drop off time ,please <a href="<?=g('base_url')?>account/saleregistration"> Click Here</a> to select a different time.
                </p></b>
            </td>
        </tr>
        <tr>
            <td>
                
                <b><p>Refer to your  <a href="https://divineconsignsaleil.com/Information/sale/Consignor_Schedule.aspx" target="_blank">Consignor schedule</a>  for important upcoming dates and times.
                </p></b>
            </td>
        </tr>
        <tr>
            <td>
                
                <b><p>Please review our <a href="https://divineconsignsaleil.com/Consignor/Consignor.aspx#Guid" target="_blank"> Consignor gudlines</a> as you begin to prepare your itmes for sale.Carefully read through what we will be accepting and how to prepare and tag your itmes.Items that do not comply 
                    within our  consignor gudlines will not be accepted.There is a limit
                    of 100 clothing items and 50 pieces of jewelry that can be brought in by each consignor(this number does not reflect(other)accessories).
                </p>
            </td>
        </tr>
        <tr>
            <td>
               
                <b><p>
                    There is a limit of 100 clothing  items that can be brought in by each consignor (this number does not reflect accessories).
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <b><p>
                 Each item must have a printed Divine Consign.Tag with your consignor number.Print your  <a href="https://divineconsignsaleil.com/Consignor/Consignor.aspx#Tags" target="_blank">tags</a> online or order a <a href="https://divineconsignsaleil.com/Consignor/Information/Tagging_Package.aspx" target="_blank">Tagging Package</a> which comes with printed tags and a tagging gun. 
             </p>
         </td>
     </tr>

     <tr>
        <td>
            
            <b><p>For each 4 hours volunteer shifts you will receive an additional 5
                %.Choose your volunteer shifts  <a href="<?=g('base_url')?>account/registerdshifts" target="_blank">Now</a>  and earn up to 75% on your sales.select volunteer shifts will also waive your consignor fee.These shifts often fill up quickly so what for them when making your volunteer shifts selections.</p></b>
            </td>
        </tr>
        <tr>
            <td>
                
                <b><p>You will receive emails from us periodically with helpful tips on consignor and details about the event.Please contact us in the meantime with any questions.We are looking forward to our upcoming sales! </p></b>
            </td>
        </tr>

        <tr>
             <td>
                   
                    <b><p>Thank You,<br><br>
                    Tracey and Lisa<br>
                    <a href="https://divineconsignsaleil.com/">https://divineconsignsaleil.com</a><br>
                    Email at : <a href="mailto:divineconsignofillinois@gmail.com">divineconsignofillinois@gmail.com</a>
                    </p></b>
                </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="height:112px;background:url('<?=g('images_root')?>footer-strip.jpg') repeat-x;"></div>
            </td>
        </tr>
    </table>
</td>
</tr>
</table>

</body>
</html>