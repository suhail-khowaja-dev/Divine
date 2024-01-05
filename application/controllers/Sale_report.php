 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Sale_report extends MY_Controller
  {
    /**
     * Account Controller
     *
     */
    public function __construct()
    {
      // Call the Model constructor latest_product
      parent::__construct();
    }
    public function index()
    {
      // debug($_POST,1);
      $report_type = $_POST['report_name'];
      $para['order'] = 'sale_id desc';
      $data['sale'] = $this->model_sale->find_all_active($para);
      if ($report_type == 1) {
        $filename = 'Sale_consigner_report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $userquery = "SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_email
    FROM mt_signup
    INNER JOIN mt_registered_sale
    ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
    WHERE mt_signup.signup_email != ''
    AND mt_signup.signup_state != ''
    AND mt_registered_sale.registered_sale_status = 1
    AND mt_registered_sale.registered_sale_sale_id = {$_POST['sale']['sale_id']}
    GROUP BY mt_registered_sale.registered_sale_user_id";
        // -- INNER JOIN mt_sale
        // -- ON mt_registered_sale.registered_sale_sale_id=mt_sale.sale_id
        // -- INNER JOIN mt_signup
        // -- ON mt_registered_sale.registered_sale_user_id=mt_signup.signup_id
        // -- WHERE mt_registered_sale.registered_sale_sale_id=mt_sale.sale_id
        // -- WHERE mt_registered_sale.registered_sale_volunteer_id > 0
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Con_Vol_Num", "Name", "Street", "City", "State", "Zip", "E_Mail");
        fputcsv($file, $header);

        foreach ($usersData as $key => $line) {

          fputcsv($file, $line);
        }
        fclose($file);
        exit;
        // $data =$this->contact_us->cosnignor_report();
        // debug(1,1);
      }
      // else if($report_type == 2){
      //      // debug(2,1);
      // }
      else if ($report_type == 3) {
        $filename = 'Count_Of_Registration_For_Wisconsin_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_sale_dropoffs_start_time,mt_registered_sale.registered_sale_user_id,mt_signup.signup_firstname,mt_signup.signup_lastname
   FROM mt_registered_sale
   INNER JOIN mt_signup
   ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
   WHERE mt_registered_sale.registered_sale_status = 1
   AND mt_registered_sale.registered_sale_user_type = 1
   -- GROUP BY mt_registered_sale.registered_sale_user_id
   AND mt_registered_sale.registered_sale_sale_id = {$_POST['sale']['sale_id']}
   GROUP BY mt_registered_sale.registered_sale_user_id";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Drop Off Start Time", "Consignor #", "First_Name", "Last_Name", "# of Items", "Hanger Rental", "Donate", "Volunteer", "Comments");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 4) {
        $filename = 'Consignor_Payout_All_Sales_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        // HEADER QUERY WORK
        $header_cols = $this->db->query(
          "SELECT 
    DATE_FORMAT(mt_financial_data.financial_data_createdon,'%c/%d/%Y') as financial_data_createdon
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')"
        );

        $head_cols_cnt = $header_cols->num_rows();

        $head_cols = $header_cols->result_array();
        // debug($head_cols,1);
        // debug($header_cols,1);
        // Header query end

        // $zero = 0;
        // data query start
        $date_count = $this->db->query("SELECT
    COUNT(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t")->result_array();

        for ($i = 1; $i <= $date_count[0]['total_dates']; $i++) {
          $date_cols .= "sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,','," . $i . "), ',', -1),'%c/%d/%Y') = '" . $head_cols[$i - 1]['financial_data_createdon'] . "' THEN   substring_index ( substring_index ( mt_financial_data.value,','," . $i . "), ',', -1) 
    ELSE 0
    END )as val" . $i . ",";
        }
        // debug($date_cols,1);
        $date_cols = rtrim($date_cols, ',');
        // $date_cols = $date_cols->result_array();
        // debug($date_cols,1);
        $userquery = "
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,{$date_cols}
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
  GROUP BY mt_financial_data.financial_data_user_id ";
        // debug($userquery,1);
        $que12 = $this->db->query($userquery);
        // print_r($userquery);
        // exit;
        $usersData  = $que12->result_array();
        // debug($usersData,1);
        // data query end
        $file = fopen('php://output', 'w');

        $header = array("Con_Vol_Num", "First_Name", "Last_Name", "Total Of Consignor_Payout");

        // query in after header function 
        for ($h = 0; $h < $head_cols_cnt; $h++) {
          array_push($header, $head_cols[$h]['financial_data_createdon']);
        }
        // header work end
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 5) {
        $filename = 'Consignor_Redistration_W/E-Mail_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_user_id, mt_signup.signup_firstname,mt_signup.signup_email,mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_createdon
  FROM mt_registered_sale
  INNER JOIN mt_signup
  ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_sale_id = {$_POST['sale']['sale_id']}
  GROUP BY mt_registered_sale.registered_sale_user_id";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Consignor Number", "Name", "E_Mail", "Sale_Location", "Registration_Date");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 6) {
        $filename = 'Count_Of_Registration_For_Wisconsin_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_user_id,mt_signup.signup_firstname, mt_signup.signup_lastname,COUNT(*) as Total
 FROM mt_signup
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_user_id = mt_signup.signup_id
 WHERE mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_user_type = 1
 GROUP BY mt_registered_sale.registered_sale_dropoff_id";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array(" Con_Vol_Num", "First_Name", "Last_Name", "Total Of DropOff");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      }
      // else if($report_type == 7){
      //  $filename = 'Referal_View_by_Sale_Report_'.date('Y-m-d').'.csv'; 
      //  header("Content-Description: File Transfer"); 
      //  header("Content-Disposition: attachment; filename=$filename"); 
      //  header("Content-Type: application/csv;");
      //  $userquery = "SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_lastname,mt_signup.signup_email,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_phone,mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_id
      //  FROM mt_registered_sale
      //  INNER JOIN mt_signup
      //  ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
      //  WHERE mt_registered_sale.registered_sale_volunteer_id > 0
      //  AND mt_registered_sale.registered_sale_status = 1
      //  AND mt_registered_sale.registered_sale_sale_id = " . $_POST['sale']['sale_id'];
      //  $que12 = $this->db->query($userquery);
      //  $usersData  = $que12->result_array();
      //  $file = fopen('php://output', 'w');
      //  $header = array("Con_Vol_Num","First_Name","Last_Name","E_Mail","Street","City","State","Zip","Phone","Sale_Location","Sale_Num");
      //  fputcsv($file, $header);
      //  foreach ($usersData as $key=>$line){ 
      //    fputcsv($file,$line);
      //  }
      //  fclose($file);
      //  exit; 
      // }
      // else if($report_type == 8){
      // // debug(9,1);
      // }
      else if ($report_type == 9) {
        $filename = 'Sale_Totals_Summary_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT
  mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,mt_registered_sale.Total,mt_financial_data.Item,mt_financial_data.item_sold,CONCAT('$',mt_financial_data.consigner),CONCAT('$',mt_financial_data.percentage),CONCAT('$',mt_financial_data.ticket),CONCAT('$',mt_financial_data.tax),CONCAT('$',mt_financial_data.payout),CONCAT('$',mt_financial_data.revenue),CONCAT('$',mt_financial_data.hanger)
  from 
  (
  SELECT registered_sale_id,registered_sale_sale_id,registered_sale_sale_location,registered_sale_sale_state,registered_sale_sale_start_date, COUNT(*) as Total
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_sale_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_sale
  ) as mt_sale
  on mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  inner join
  (
  Select * , COUNT(*) as Item , sum(financial_data_item_sold) as item_sold , sum(financial_data_consignor_fee) as consigner,avg(financial_data_cosnignor_percentage) as percentage,sum(financial_data_revenue_ticket) as ticket,sum(financial_data_tax) as tax,sum(financial_data_consignor_payout) as payout,sum(financial_data_divine_revenue) as revenue, sum(financial_data_hanger_fee) as hanger
  From mt_financial_data
  Where (financial_data_consignor_payout > 0)
  GROUP BY financial_data_consignor_payout 
  ) as mt_financial_data
  on mt_financial_data.financial_data_sale_id = mt_registered_sale.registered_sale_sale_id";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Sale_Num", "Sale_Location", "Sale_State", "Sale_Start_Date", "Registered_Consignors", "Paid_Consignors", "Ticket_Total", "SumOfConsignor_Fee", "Avg_Consignor_Percentage", "SumOfTicket_Revenue", "SumOfTax_Revenue", "SumOfConsignor_Payout", "SumOfDC_Revenue", "SumOfHanger_Rental_Fee");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 10) {
        $filename = 'Sale_Transaction_Count_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,COUNT(*) as Total,mt_registered_sale.registered_sale_sale_start_date
 FROM mt_sale_transaction
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_id = mt_sale_transaction.sale_transaction_registered_sale_id
 WHERE mt_registered_sale.registered_sale_status = 1
 GROUP BY mt_registered_sale.registered_sale_sale_id ";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Sale_Num", "Sale_Location", "CountOfTransaction_Num", "Sale_Start_Date");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 11) {
        $filename = 'Sales_Revenue_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_financial_data.financial_data_user_id,mt_signup.signup_firstname, mt_signup.signup_lastname,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_financial_data.financial_data_sale_id,CONCAT('$', mt_financial_data.financial_data_revenue_ticket),CONCAT('$', mt_financial_data.financial_data_consignor_fee),CONCAT('$',mt_financial_data.financial_data_consignor_payout)
  FROM mt_financial_data
  INNER JOIN mt_signup
  ON mt_signup.signup_id = mt_financial_data.financial_data_user_id
  WHERE mt_financial_data.financial_data_status = 1
  AND mt_financial_data.financial_data_sale_id = {$_POST['sale']['sale_id']}
  GROUP BY mt_financial_data.financial_data_user_id";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Con_Vol_Num", "First_Name", "Last_Name", "Street", "City", "State", "Zip", "Sale_Num", "Ticket_Revenue", "Consignor_Fee", "Consignor_Payout");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      }
      // else if($report_type == 12){
      //     // debug(12,1);
      // }
      else if ($report_type == 13) {
        $filename = 'Volunteer_Shifts_Roster_by_Sale_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_user_id, mt_signup.signup_firstname, mt_signup.signup_lastname,mt_signup.signup_email,mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc,mt_registered_sale.registered_sale_sale_id
  FROM mt_registered_sale
  INNER JOIN mt_signup
  ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  WHERE mt_registered_sale.registered_sale_volunteer_id > 0
  AND mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_sale_id = {$_POST['sale']['sale_id']}";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Consignor Number", "First_Name", "Last_Name", "E_Mail", "Shift_Start_Time", "Activity_Desc", "Sale_Num");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      } else if ($report_type == 14) {
        $filename = 'Volunteer_Shifts_Report_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        $userquery = "SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
 FROM mt_registered_sale
 WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_sale_id = {$_POST['sale']['sale_id']}";
        $que12 = $this->db->query($userquery);
        $usersData  = $que12->result_array();
        $file = fopen('php://output', 'w');
        $header = array("Consignor Number", "Name", "Shift_Start_Time", "Shift_End_Time", "Activity_Desc");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
          fputcsv($file, $line);
        }
        fclose($file);
        exit;
      }
      $this->load_view("index", $data);
    }
  }
