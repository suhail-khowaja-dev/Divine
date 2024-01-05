<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-29 00:03:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 11 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4, 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:03:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 11 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4, 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:04:11 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-29 00:04:12 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-29 00:07:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END)sum(CASE WHEN DATE_FORMAT(substring_index ( substrin' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:07:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( s' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:07:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( s' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:07:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( s' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:07:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( s' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:07:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( s' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1) as val1,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1) as val2,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1) as val3,
    ELSE 0
    END) as valsum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1) as val4,
    ELSE 0
    END) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:08:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:15:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index ' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:16:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)E' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021) THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021) THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021) THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021) THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:16:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y')) = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y')) = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y')) = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y')) = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:16:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y')) = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y')) = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y')) = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y')) = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:16:40 --> Query error: Incorrect parameter count in the call to native function 'DATE_FORMAT' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1)),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1)),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1)),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1)),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:16:41 --> Query error: Incorrect parameter count in the call to native function 'DATE_FORMAT' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1)),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1)),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1)),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1)),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:19:14 --> Query error: Invalid use of group function - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:19:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_d' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))ELSE 0 END)as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))ELSE 0 END)as val2,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))ELSE 0 END)as val3,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:19:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ENDas val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',1), ',',-1))ELSE 0 ENDas val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',2), ',',-1))ELSE 0 ENDas val2,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',3), ',',-1))ELSE 0 ENDas val3,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',4), ',',-1))ELSE 0 ENDas val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:19:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0 END)as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_f' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:19:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0 END)as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_f' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN sum(substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:02 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:13 --> Query error: Unknown column 'mt_financial_data.total_dates' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:14 --> Query error: Unknown column 'mt_financial_data.total_dates' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.total_dates ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:28 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:29 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:30 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:30 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:21:30 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:22:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY fi' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , count(GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY fi' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , count(GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY fi' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , count(GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:10 --> Query error: Invalid use of group function - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , count(GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id)) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:41 --> Query error: Duplicate column name 'financial_data_user_id' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT *, sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:42 --> Query error: Duplicate column name 'financial_data_user_id' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT *, sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:43 --> Query error: Duplicate column name 'financial_data_user_id' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT *, sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:44 --> Query error: Duplicate column name 'financial_data_user_id' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT *, sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:23:45 --> Query error: Duplicate column name 'financial_data_user_id' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT *, sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:25:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.valu' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,'.sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%y') = 5/22/2021 THEN substring_index (substring_index(mt_financial_data.value,',',1), ',',-1)ELSE 0 END)as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%y') = 5/25/2021 THEN substring_index (substring_index(mt_financial_data.value,',',2), ',',-1)ELSE 0 END)as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%y') = 5/26/2021 THEN substring_index (substring_index(mt_financial_data.value,',',3), ',',-1)ELSE 0 END)as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%y') = 5/30/2021 THEN substring_index (substring_index(mt_financial_data.value,',',4), ',',-1)ELSE 0 END)as val4.' 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 00:27:32 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:27:32 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:27:54 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:27:54 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:28:27 --> Severity: Warning --> fputcsv() expects parameter 3 to be string, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:28:27 --> Severity: Warning --> fputcsv() expects parameter 3 to be string, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 160
ERROR - 2021-05-29 00:54:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.d' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,{sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4}
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 01:06:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_da' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"1"), ",", -1),"%c/%d/%Y") = "5/22/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","1"), ",", -1) 
    ELSE 0
    END ) as val"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"2"), ",", -1),"%c/%d/%Y") = "5/25/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","2"), ",", -1) 
    ELSE 0
    END ) as val"2",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"3"), ",", -1),"%c/%d/%Y") = "5/26/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","3"), ",", -1) 
    ELSE 0
    END ) as val"3",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"4"), ",", -1),"%c/%d/%Y") = "5/30/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","4"), ",", -1) 
    ELSE 0
    END ) as val"4"
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 01:06:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_da' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"1"), ",", -1),"%c/%d/%Y") = "5/22/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","1"), ",", -1) 
    ELSE 0
    END ) as val"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"2"), ",", -1),"%c/%d/%Y") = "5/25/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","2"), ",", -1) 
    ELSE 0
    END ) as val"2",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"3"), ",", -1),"%c/%d/%Y") = "5/26/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","3"), ",", -1) 
    ELSE 0
    END ) as val"3",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"4"), ",", -1),"%c/%d/%Y") = "5/30/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","4"), ",", -1) 
    ELSE 0
    END ) as val"4"
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 01:07:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_da' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"1"), ",", -1),"%c/%d/%Y") = "5/22/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","1"), ",", -1) 
    ELSE 0
    END ) as val"1",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"2"), ",", -1),"%c/%d/%Y") = "5/25/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","2"), ",", -1) 
    ELSE 0
    END ) as val"2",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"3"), ",", -1),"%c/%d/%Y") = "5/26/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","3"), ",", -1) 
    ELSE 0
    END ) as val"3",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data, "," ,"4"), ",", -1),"%c/%d/%Y") = "5/30/2021" THEN   substring_index ( substring_index ( mt_financial_data.value,",","4"), ",", -1) 
    ELSE 0
    END ) as val"4"
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 02:44:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_c' at line 21 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = '5/29/2021' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-29 03:39:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE mt_registered_sale.registered_sale_status = 1
   AND mt_registered_sale.re' at line 6 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_dropoffs_start_time,mt_registered_sale.registered_sale_user_id,mt_signup.signup_firstname,mt_signup.signup_lastname
   FROM mt_registered_sale
   INNER JOIN mt_signup
   ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
   GROUP BY mt_registered_sale.registered_sale_user_id
   WHERE mt_registered_sale.registered_sale_status = 1
   AND mt_registered_sale.registered_sale_user_type = 1
   -- GROUP BY mt_registered_sale.registered_sale_user_id
   AND mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-29 00:55:38 --> Severity: error --> Exception: syntax error, unexpected 'Con_Vol_Num' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 318
ERROR - 2021-05-29 00:55:44 --> Severity: error --> Exception: syntax error, unexpected 'Con_Vol_Num' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 318
ERROR - 2021-05-29 00:55:47 --> Severity: error --> Exception: syntax error, unexpected 'Con_Vol_Num' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 318
