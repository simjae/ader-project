<?php
/*
 +=============================================================================
 | 
 | 샘플 정보 리스트 - 샘플 리스트 정보 조회/검색
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
$sample_idx		= $_POST['sample_idx'];
$style_code		= $_POST['style_code'];
$color_code		= $_POST['color_code'];
$product_code	= $_POST['product_code'];
$product_name	= $_POST['product_name'];
$color			= $_POST['color'];
$manufacturer	= $_POST['manufacturer'];
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


if($sample_idx != null){
	$sql = "SELECT
				IDX				AS SAMPLE_IDX,
				ORDERSHEET_IDX	AS ORDERSHEET_IDX,
				STYLE_CODE		AS STYLE_CODE,
				COLOR_CODE		AS COLOR_CODE,
				PRODUCT_CODE	AS PRODUCT_CODE,
				PRODUCT_NAME	AS PRODUCT_NAME,
				COLOR			AS COLOR,
				MANUFACTURER	AS MANUFACTURER,
				IFNULL(DATE_FORMAT(DUE_DATE, '%Y-%m-%d'),'')		AS DUE_DATE,
				PRODUCT_QTY		AS PRODUCT_QTY,
				MEMO			AS MEMO,
				CREATE_DATE		AS CREATE_DATE,
				CREATER			AS CREATER,
				UPDATE_DATE		AS UPDATE_DATE,
				UPDATER			AS UPDATER
			FROM
				SAMPLE_INFO
			WHERE
				IDX = ".$sample_idx."
		";
}
else{
	if ($ordersheet_idx != null) {
		$where .= ' AND (SI.ORDERSHEET_IDX = '.$ordersheet_idx.') ';
	}

	if ($style_code != null) {
		$where .= ' AND (SI.STYLE_CODE LIKE "%'.$style_code.'%") ';
	}
	
	if ($color_code != null) {
		$where .= ' AND (SI.COLOR_CODE LIKE "%'.$color_code.'%") ';
	}
	
	if ($product_code != null) {
		$where .= ' AND (SI.PRODUCT_CODE LIKE "%'.$product_code.'%") ';
	}
	
	if ($product_name != null) {
		$where .= ' AND (SI.PRODUCT_NAME LIKE "%'.$product_name.'%") ';
	}
	
	if ($color != null) {
		$where .= ' AND (SI.COLOR LIKE "%'.$color.'%") ';
	}
	
	if ($manufacturer != null) {
		$where .= ' AND (SI.MANUFACTURER LIKE "%'.$manufacturer.'%") ';
	}
	
	if ($min_due_date != null || $max_due_date != null) {
		if ($min_due_date != null && $max_due_date == null) {
			$where .= " AND (SI.DUE_DATE >= '".$min_due_date."') ";
		}
		
		if ($min_due_date == null && $max_due_date != null) {
			$where .= " AND (SI.DUE_DATE <= '".$max_due_date."') ";
		}
		
		if ($min_due_date != null && $max_due_date != null) {
			$where .= " AND (SI.DUE_DATE BETWEEN '".$min_due_date."' AND '".$max_due_date."') ";
		}
	}
	
	if ($min_qty != null || $max_qty != null) {
		if ($min_qty != null && $max_qty == null) {
			$where .= " AND (SI.PRODUCT_QTY >= ".$min_qty.") ";
		}
	
		if ($min_qty == null && $max_qty != null) {
			$where .= " AND (SI.PRODUCT_QTY <= ".$max_qty.") ";
		}
		
		if ($min_qty != null && $max_qty != null) {
			$where .= " AND (SI.PRODUCT_QTY BETWEEN ".$min_qty." AND ".$max_qty.") ";
		}
	}
	
	/** 정렬 조건 **/
	$order = '';
	if ($sort_value != null && $sort_type != null) {
		$order = ' '.$sort_value." ".$sort_type." ";
	} else {
		$order = ' SI.IDX DESC';
	}
	
	$limit_start = (intval($page)-1)*$rows;
	$total = $db->count("SAMPLE_INFO SI",$where);
	$total_cnt = $db->count("SAMPLE_INFO SI",$where_cnt);
	
	$json_result = array(
		'total' => $total,
		'total_cnt' => $total_cnt,
		'page' => $page
	);
	
	$sql = "SELECT
				SI.IDX				AS SAMPLE_IDX,
				SI.ORDERSHEET_IDX	AS ORDERSHEET_IDX,
				SI.STYLE_CODE		AS STYLE_CODE,
				SI.COLOR_CODE		AS COLOR_CODE,
				SI.PRODUCT_CODE	AS PRODUCT_CODE,
				SI.PRODUCT_NAME	AS PRODUCT_NAME,
				SI.COLOR			AS COLOR,
				SI.MANUFACTURER	AS MANUFACTURER,
				IFNULL(DATE_FORMAT(SI.DUE_DATE, '%Y-%m-%d'),'')		AS DUE_DATE,
				SI.PRODUCT_QTY		AS PRODUCT_QTY,
				SI.MEMO			AS MEMO,
				CASE
					WHEN
						(
							SELECT
								COUNT(S_OI.IDX)
							FROM
								ORDERSHEET_IMG S_OI
							WHERE
								S_OI.ORDERSHEET_IDX = SI.ORDERSHEET_IDX AND
								IMG_TYPE = 'P' AND
								IMG_SIZE = 'S'
						) > 0
						THEN
							(
								SELECT
									S_OI.IMG_LOCATION
								FROM
									ORDERSHEET_IMG S_OI
								WHERE
									S_OI.ORDERSHEET_IDX = SI.ORDERSHEET_IDX AND
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
				SI.CREATE_DATE		AS CREATE_DATE,
				SI.CREATER			AS CREATER,
				SI.UPDATE_DATE		AS UPDATE_DATE,
				SI.UPDATER			AS UPDATER
			FROM
				SAMPLE_INFO 	SI
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
		'sample_idx'		=>$data['SAMPLE_IDX'],
		'ordersheet_idx'	=>$data['ORDERSHEET_IDX'],
		'style_code'		=>$data['STYLE_CODE'],
		'color_code'		=>$data['COLOR_CODE'],
		'product_code'		=>$data['PRODUCT_CODE'],
		'product_name'		=>$data['PRODUCT_NAME'],
		'color'				=>$data['COLOR'],
		'manufacturer'		=>$data['MANUFACTURER'],
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