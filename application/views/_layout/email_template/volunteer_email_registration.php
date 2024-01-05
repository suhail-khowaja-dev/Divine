<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body style="font:14px/20px 'Open Sans', sans-serif;">
    <?php
    $para['where']['registered_sale_user_id'] = $personal_data['signup_id'];
    $para['joins'][] = array(
        "table"=>"volunteer_shift" , 
        "joint"=>"volunteer_shift.volunteer_shift_id = registered_sale.registered_sale_volunteer_id"
    );
    $registered_sale = $this->model_registered_sale->find_all($para);

    ?>
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
                 
                    <b><p>Hi <?php echo ucfirst($personal_data['signup_firstname'])?>  <?= ucfirst($personal_data['signup_lastname'])?>, </p></b>
                </td>
            </tr>
            <tr>
                <td>
                    
                    <b><p>Thank you for registration to volunteer for upcoming sale.</p></b>
                </td>
            </tr>
            <tr>
              <tr>
                <td>
                    
                    <b><p>Sale Location: <?=$sale_detail['sale_location']?></p></b>
                </td>
            </tr>
            <tr>
              <tr>
                <td>
                 
                    <b><p>Scheduled volunteer shifts(s):</p></b>
                    <?php foreach ($registered_sale as $key=> $value) {?>
                        <P><b><?php echo $value['volunteer_shift_activity_desc']?> - <?=date("F j, Y g:i A",strtotime($value['volunteer_shift_start_time']))?> - <?=date("F j, Y g:i A",strtotime($value['volunteer_shift_end_time']))?></p></b>
                        <?php }?>
                        
                    </td>
                </tr>
                <td>
                    
                    <b><p>If these are not correct volunteer shifts you selected,please <a href= "<?=g('base_url')?>user" target="_blank">Click here </a> change your selection.Shifts can be added or canceled anytime up untill 48 hours prior to your shift.</p></b>
                </td>
            </tr>
            <td>
                
                <b><p>You will recive a reminder email with ypour volunteer shift times and directions the week of our sale.In the meantime,feel free to contact with any questions.</p></b>
            </td>
        </tr>

        <tr>
            <td>
             
                <b><p>We are looking forward to seeing you at our upcoming sale!</p></b>
            </td>
        </tr>

        <tr>
           <td> <b><p>Thank You,<br><br>
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