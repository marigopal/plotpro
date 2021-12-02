<?php

include('../../include/lib_page.php');
$sales_invoice = $_POST['sales_invoice'];
$sql = "select sum(IFNULL(b.payment_amount,0)) as total_paid,a.plotsale_id,a.initial_payment,a.total_cost,a.plot_id,b.sales_id , 
Case 
	When a.is_emi_converted = 1 Then a.emi_amt
	When a.is_emi_converted = 0 Then a.total_cost - (a.initial_payment +  sum(IFNULL(b.payment_amount,0)))
END
as topay_amount,b.is_deleted
from tbl_plotsales a 
left join tbl_payment b on a.plotsale_id= b.sales_id and b.is_deleted =0
where a.plotsale_id = '$sales_invoice'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $paid_amount = $row['topay_amount'];
    $plot_id = $row['plot_id'];

    $data_arr[] = array("paid_amount" => $paid_amount, "plot_id" => $plot_id);
}
echo json_encode($data_arr);
?>