<?php
/*
 +=============================================================================
 | 
 | 홀세일 정보 리스트 - 홀세일 리스트 정보 조회/검색
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
$ordersheet_idx = $_POST['ordersheet_idx'];
$wholesale_idx	= $_POST['wholesale_idx'];
$style_code		= $_POST['style_code'];
$color_code		= $_POST['color_code'];
$product_code	= $_POST['product_code'];
$product_name	= $_POST['product_name'];
$color			= $_POST['color'];
$country		= $_POST['country'];
$buyer			= $_POST['buyer'];
$min_due_date	= $_POST['min_due_date'];
$max_due_date	= $_POST['max_due_date'];
$min_qty		= $_POST['min_qty'];
$max_qty		= $_POST['max_qty'];

$sort_type 			= $_POST['sort_type'];				//정렬 타입
$sort_value 		= $_POST['sort_value'];				//정렬 값

$rows = $_POST['rows'];
$page = $_POST['page'];

$where = "1=1";
$where .= " AND DEL_FLG = FALSE ";
$where_cnt = $where;

if($wholesale_idx != null){
	$sql = "SELECT
				IDX				AS WHOLESALE_IDX,
				ORDERSHEET_IDX	AS ORDERSHEET_IDX,
				STYLE_CODE		AS STYLE_CODE,
				COLOR_CODE		AS COLOR_CODE,
				PRODUCT_CODE	AS PRODUCT_CODE,
				PRODUCT_NAME	AS PRODUCT_NAME,
				COLOR			AS COLOR,
				COUNTRY			AS COUNTRY,
				BUYER			AS BUYER,
				IFNULL(DATE_FORMAT(DUE_DATE, '%Y-%m-%d'),'')		AS DUE_DATE,
				PRODUCT_QTY		AS PRODUCT_QTY,
				MEMO 			AS MEMO,
				CREATE_DATE		AS CREATE_DATE,
				CREATER			AS CREATER,
				UPDATE_DATE		AS UPDATE_DATE,
				UPDATER			AS UPDATER
			FROM
				dev.WHOLESALE_INFO
			WHERE
				IDX = ".$wholesale_idx."
		";
}
else{
	if ($ordersheet_idx != null) {
		$where .= ' AND (WI.ORDERSHEET_IDX = '.$ordersheet_idx.') ';
	}
	if ($style_code != null) {
		$where .= ' AND (WI.STYLE_CODE LIKE "%'.$style_code.'%") ';
	}
	
	if ($color_code != null) {
		$where .= ' AND (WI.COLOR_CODE LIKE "%'.$color_code.'%") ';
	}
	
	if ($product_code != null) {
		$where .= ' AND (WI.PRODUCT_CODE LIKE "%'.$product_code.'%") ';
	}
	
	if ($product_name != null) {
		$where .= ' AND (WI.PRODUCT_NAME LIKE "%'.$product_name.'%") ';
	}
	
	if ($color != null) {
		$where .= ' AND (WI.COLOR LIKE "%'.$color.'%") ';
	}
	
	if ($country != null) {
		$where .= ' AND (WI.COUNTRY LIKE "%'.$country.'%") ';
	}
	
	if ($buyer != null) {
		$where .= ' AND (WI.BUYER LIKE "%'.$buyer.'%") ';
	}
	
	if ($min_due_date != null || $max_due_date != null) {
		if ($min_due_date != null && $max_due_date == null) {
			$where .= " AND (WI.DUE_DATE >= '".$min_due_date."') ";
		}
		
		if ($min_due_date == null && $max_due_date != null) {
			$where .= " AND (WI.DUE_DATE <= '".$max_due_date."') ";
		}
		
		if ($min_due_date != null && $max_due_date != null) {
			$where .= " AND (WI.DUE_DATE BETWEEN '".$min_due_date."' AND '".$max_due_date."') ";
		}
	}
	
	if ($min_qty != null || $max_qty != null) {
		if ($min_qty != null && $max_qty == null) {
			$where .= " AND (WI.PRODUCT_QTY >= ".$min_qty.") ";
		}
	
		if ($min_qty == null && $max_qty != null) {
			$where .= " AND (WI.PRODUCT_QTY <= ".$max_qty.") ";
		}
		
		if ($min_qty != null && $max_qty != null) {
			$where .= " AND (WI.PRODUCT_QTY BETWEEN ".$min_qty." AND ".$max_qty.") ";
		}
	}
	
	/** 정렬 조건 **/
	$order = '';
	if ($sort_value != null && $sort_type != null) {
		$order = ' '.$sort_value." ".$sort_type." ";
	} else {
		$order = ' WI.IDX DESC';
	}
	
	$limit_start = (intval($page)-1)*$rows;
	$total = $db->count("dev.WHOLESALE_INFO WI",$where);
	$total_cnt = $db->count("dev.WHOLESALE_INFO WI",$where_cnt);
	
	$json_result = array(
		'total' => $total,
		'total_cnt' => $total_cnt,
		'page' => $page
	);
	
	$sql = "SELECT
				WI.IDX				AS WHOLESALE_IDX,
				WI.ORDERSHEET_IDX	AS ORDERSHEET_IDX,
				WI.STYLE_CODE		AS STYLE_CODE,
				WI.COLOR_CODE		AS COLOR_CODE,
				WI.PRODUCT_CODE	AS PRODUCT_CODE,
				WI.PRODUCT_NAME	AS PRODUCT_NAME,
				WI.COLOR			AS COLOR,
				WI.COUNTRY			AS COUNTRY,
				WI.BUYER			AS BUYER,
				IFNULL(DATE_FORMAT(WI.DUE_DATE, '%Y-%m-%d'),'')		AS DUE_DATE,
				WI.PRODUCT_QTY		AS PRODUCT_QTY,
				WI.MEMO			AS MEMO,
				CASE
					WHEN
						(
							SELECT
								COUNT(S_OI.IDX)
							FROM
								dev.ORDERSHEET_IMG S_OI
							WHERE
								S_OI.ORDERSHEET_IDX = WI.ORDERSHEET_IDX AND
								IMG_TYPE = 'P' AND
								IMG_SIZE = 'S'
						) > 0
						THEN
							(
								SELECT
									S_OI.IMG_LOCATION
								FROM
									dev.ORDERSHEET_IMG S_OI
								WHERE
									S_OI.ORDERSHEET_IDX = WI.ORDERSHEET_IDX AND
									S_OI.IMG_TYPE = 'P' AND
									S_OI.IMG_SIZE = 'S'
								ORDER BY
									S_OI.IDX ASC
								LIMIT
									0,1
							)
					ELSE
						'/images/default_product_img.jpg'
				END												AS ORDERSHEET_IMG,
				WI.CREATE_DATE		AS CREATE_DATE,
				WI.CREATER			AS CREATER,
				WI.UPDATE_DATE		AS UPDATE_DATE,
				WI.UPDATER			AS UPDATER
			FROM
				dev.WHOLESALE_INFO WI
			WHERE
				".$where."
			ORDER BY
				".$order;
	
	if ($rows != null) {
		$sql .= " LIMIT ".$limit_start.",".$rows;
	}
}

$db->query($sql);

foreach($db->fetch() as $data) {
	$json_result['data'][] = array(
		'num'				=>$total_cnt--,
		'wholesale_idx'		=>$data['WHOLESALE_IDX'],
		'ordersheet_idx'	=>$data['ORDERSHEET_IDX'],
		'style_code'		=>$data['STYLE_CODE'],
		'color_code'		=>$data['COLOR_CODE'],
		'product_code'		=>$data['PRODUCT_CODE'],
		'product_name'		=>$data['PRODUCT_NAME'],
		'color'				=>$data['COLOR'],
		'country'			=>$data['COUNTRY'],
		'buyer'				=>$data['BUYER'],
		'due_date'			=>$data['DUE_DATE'],
		'product_qty'		=>$data['PRODUCT_QTY'],
		'memo'				=>$data['MEMO'],
		'ordersheet_img'	=>$data['ORDERSHEET_IMG'],
		'create_date'		=>$data['CREATE_DATE'],
		'creater'			=>$data['CREATER'],
		'update_date'		=>$data['UPDATE_DATE'],
		'updater'			=>$data['UPDATER']
	);
}
?>