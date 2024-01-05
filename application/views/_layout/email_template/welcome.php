<?
global $config;
// $email_data


//debug($form_input);
//debug($user_id,1);
$param['where']['signup_id'] = $user_id;
$signupid = $this->model_signup->find_one($param);
//debug($signup_id,1);
?>
<style>
    p{
        margin-bottom:-20px;
    }
    h2{
        margin-bottom:-20px;
    }
</style>
<html>
	<body>
		<p>Hi <?=ucfirst($form_input['signup_firstname'])?> <?=ucfirst($form_input['signup_lastname'])?>,&nbsp;</p>
        <h2>Welcome to <?=g('site_name')?>,</h2>    
        <p>Thank you for registering with <?=g('site_name')?>. Your account has been created successfully<!--  and waiting for admin approval once your account will approve you can login and register for sale or volunteer. --></p>
        <p>Your Id Number: <?php echo $signupid['signup_id']?><br>Your Password: <?=$form_input['signup_static_password']?></p>
        <p><a href="http://divineconsignsalesil.com/user">Click Here To Login</a></p>
        <p>Thank You,<br><br>Tracey and Lisa<br>
                    <a href="https://divineconsignsaleil.com/" target="_blank">https://divineconsignsaleil.com</a><br>
                    Email at : <a href="mailto:divineconsignofillinois@gmail.com">divineconsignofillinois@gmail.com</a>
                    </p>

	</body>
</html>