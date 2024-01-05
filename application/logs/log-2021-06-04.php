<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-04 01:51:40 --> Query error: Unknown column 'signup_company' in 'field list' - Invalid query: SELECT `signup_id`, `signup_firstname`, `signup_lastname`, `signup_email`, `signup_static_password`, `signup_address`, `signup_city`, `signup_state`, `signup_zip`, `signup_phone`, `signup_name`, `signup_username`, `signup_country`, `signup_company`, `signup_business_name`, `signup_address2`, `created_on`
FROM `mt_signup`
WHERE `signup_type` = '1'
