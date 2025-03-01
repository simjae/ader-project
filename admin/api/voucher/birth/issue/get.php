<?php
/*
 +=============================================================================
 | 
 | 바우처 발급회원 목록
 | -------
 |
 | 최초 작성	: 박성혁
 | 최초 작성일	: 2022.12.26
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

/** 변수 정리 **/
$voucher_idx			= $_POST['voucher_idx'];		//선택 바우처 IDX
$country				= $_POST['country'];
$search_month			= $_POST['search_month'];

$member_id			 	= $_POST['member_id'];
$member_name			= $_POST['member_name'];
$issue_member_level		= $_POST['issue_member_level'];
$used_flg				= $_POST['used_flg'];
$regist_flg				= $_POST['regist_flg'];

$rows					= $_POST['rows'];
$page					= $_POST['page'];

$sort_value				= $_POST['sort_value'];			//정렬 기준값
$sort_type				= $_POST['sort_type'];			//정렬타입

$tables ="
	MEMBER_".$country." AS MB
	LEFT JOIN MEMBER_LEVEL AS ML ON
	MB.LEVEL_IDX = ML.IDX
	LEFT JOIN (
		SELECT 
			*
		FROM
			VOUCHER_ISSUE
		WHERE 
			DEL_FLG = FALSE AND
			VOUCHER_IDX = ".$voucher_idx."
	) AS VI ON
	MB.IDX = VI.MEMBER_IDX
";

/** 검색 조건 **/
$where = " 1=1 ";
$cnt_where = $where;

if($search_month != null){
	$where .= " AND (DATE_FORMAT(MB.MEMBER_BIRTH,'%m') = '".$search_month."') ";
}

if($member_id != null){
	$where .= ' AND (MB.MEMBER_ID LIKE "%'.$member_id.'%") ';
}

if($member_name != null){
	$where .= ' AND (MB.MEMBER_NAME LIKE "%'.$member_name.'%") ';
}

if($issue_member_level != null && $issue_member_level != 'ALL'){
	$where .= ' AND (MB.LEVEL_IDX = '.$issue_member_level.') ';
}

if($used_flg != null && $used_flg != 'ALL'){
	$where .= ' AND (VI.USED_FLG = '.$used_flg.') ';
}

if($regist_flg != null && $regist_flg != 'ALL'){
	if($regist_flg == 'TRUE'){
		$where .= ' AND (VI.VOUCHER_ADD_DATE IS NOT NULL) ';
	}
	else if($regist_flg == 'FALSE'){
		$where .= ' AND (VI.VOUCHER_ADD_DATE IS NULL) ';
	}
}

/** 정렬 조건 **/
$order = '';
if ($sort_value != null && $sort_type != null) {
	$order = ' '.$sort_value." ".$sort_type." ";
} else {
	$order = ' VI.IDX DESC ';
}

/** DB 처리 **/
$json_result = array(
	'total' => $db->count($tables,$where),
	'total_cnt' => $db->count($tables,$where_cnt),
	'page' => intval($page)
);

$limit_start = (intval($page)-1)*$rows;


// 바우처 발급정보
$select_voucher_issue_sql = "
	SELECT
		VI.VOUCHER_IDX		AS VOUCHER_IDX,
		'".$country."'		AS COUNTRY,
		
		IFNULL(
			VI.VOUCHER_ISSUE_CODE,'미발급'
		)					AS VOUCHER_ISSUE_CODE,
		IFNULL(
			DATE_FORMAT(
				VI.VOUCHER_ADD_DATE,
				'%Y-%m-%d %H:%i'
			),'-'
		)					AS VOUCHER_ADD_DATE,
		VI.USED_FLG,
		IFNULL(
			DATE_FORMAT(
				VI.USABLE_START_DATE,
				'%Y-%m-%d %H:%i'
			),'-'
		)					AS USABLE_START_DATE,
		IFNULL(
			DATE_FORMAT(
				VI.USABLE_END_DATE,
				'%Y-%m-%d %H:%i'
			),'-'
		)					AS USABLE_END_DATE,
		
		VI.MEMBER_IDX		AS MEMBER_IDX,
		MB.MEMBER_ID		AS MEMBER_ID,
		MB.MEMBER_NAME		AS MEMBER_NAME,
		ML.TITLE			AS MEMBER_LEVEL,
		IFNULL(
			DATE_FORMAT(
				MB.MEMBER_BIRTH,
				'%Y-%m-%d'
			),'-'
		)					AS MEMBER_BIRTH,
		MB.TEL_MOBILE		AS TEL_MOBILE, 
		
		DATE_FORMAT(
			VI.CREATE_DATE,
			'%Y-%m-%d %H:%i'
		)					AS CRAETE_DATE,
		VI.CREATER			AS CREATER,
		DATE_FORMAT(
			VI.UPDATE_DATE,
			'%Y-%m-%d %H:%i'
		)					AS UPDATE_DATE,
		VI.UPDATER			AS UPDATER
	FROM
		".$tables."
	WHERE
		".$where."
	ORDER BY
		".$order."
	LIMIT
		".$limit_start.",".$rows."
";

$db->query($select_voucher_issue_sql);

foreach($db->fetch() as $data){
	$used_flg = "";
	$update_date = "";
	
	if ($data['USED_FLG'] == true) {
		$used_flg = "사용";
		$update_date = $data['UPDATE_DATE'];
	} else if ($data['USED_FLG'] == false) {
		$used_flg = "미사용";
		$update_date = "-";
	}
	
	$json_result['data'][] = array(
		'num'					=>$total_cnt--,
		'voucher_idx'			=>$data['VOUCHER_IDX'],
		'country'				=>$data['COUNTRY'],
		
		'voucher_issue_code'	=>strtoupper($data['VOUCHER_ISSUE_CODE']),
		'voucher_add_date'		=>$data['VOUCHER_ADD_DATE'], 
		'used_flg'				=>$used_flg,
		'usable_start_date'		=>$data['USABLE_START_DATE'],
		'usable_end_date'		=>$data['USABLE_END_DATE'],
		
		'member_idx'			=>$data['MEMBER_IDX'],
		'member_id'				=>$data['MEMBER_ID'],
		'member_name'			=>$data['MEMBER_NAME'],
		'member_level'			=>$data['MEMBER_LEVEL'],
		'member_birth'			=>$data['MEMBER_BIRTH'],
		'tel_mobile'			=>$data['TEL_MOBILE'],
		
		'create_date'			=>$data['CREATE_DATE'],
		'creater'				=>$data['CREATER'],
		'update_date'			=>$update_date,
		'updater'				=>$data['UPDATER'],
	);
}



?>