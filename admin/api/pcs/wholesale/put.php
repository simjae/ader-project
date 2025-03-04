<?php
/*
 +=============================================================================
 | 
 | 홀세일 정보 수정 - 홀세일 정보 변경
 | -------
 |
 | 최초 작성	: 손성환
 | 최초 작성일	: 2022.10.18
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

include_once("/var/www/admin/api/common/common.php");

$session_id		= sessionCheck();
$wholesale_idx	= $_POST['wholesale_idx'];
$country		= $_POST['country'];
$buyer			= $_POST['buyer'];
$due_date		= $_POST['due_date'];
$product_qty	= $_POST['product_qty'];
$memo			= $_POST['memo'];

if ($wholesale_idx != null) {
	$set = "";
	if ($country != null) {
		$set .= " COUNTRY = '".$country."', ";
	}
	
	if ($buyer != null) {
		$set .= " BUYER = '".$buyer."', ";
	}
	
	if ($due_date != null) {
		$set .= " DUE_DATE = '".$due_date."', ";
	}
	
	if ($product_qty != null) {
		$set .= " PRODUCT_QTY = ".$product_qty.", ";
	}
	
	if($memo == null){
		$memo = '';
	}
	$set .= " MEMO = '".$memo."', ";

	$sql = "UPDATE
				WHOLESALE_INFO
			SET
				".$set."
				UPDATE_DATE = NOW(),
				UPDATER = '".$session_id."'
			WHERE
				IDX = ".$wholesale_idx;
	
	$db->query($sql);
}
?>