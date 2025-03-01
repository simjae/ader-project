<?php
/*
 +=============================================================================
 | 
 | 회원 조회 페이지 - 회원조회
 | -------
 |
 | 최초 작성	: 손성환
 | 최초 작성일	: 2022.05.01
 | 최종 수정일	: 
 | 버전		: 1.1
 | 설명		: 
 | 
 +=============================================================================
*/

$country			= $_POST['country'];

$search_type		= $_POST['search_type'];		//검색유형 - 이름, 아이디, 이메일, 전화번호, 휴대폰번호, 휴면일자
$search_keyword		= $_POST['search_keyword'];		//검색 키워드
$search_date		= $_POST['search_date'];		//검색 일자

$sleep_from			= $_POST['sleep_from'];			//휴면 처리일 - 시작일
$sleep_to			= $_POST['sleep_to'];			//휴면 처리일 - 종료일

$member_level		= $_POST['member_level'];		//멤버 그룹 - 일반회원, ADER family

$day_type			= $_POST['day_type'];			//가입일/생일
$day_from			= $_POST['day_from'];			//가입일/생일 시작일
$day_to				= $_POST['day_to'];				//가입일/생일 종료일

$min_age			= $_POST['min_age'];			//나이 - 최소값
$max_age			= $_POST['max_age'];			//나이 - 최대값

$member_gender		= $_POST['member_gender'];		//성별

$login_from			= $_POST['login_from'];			//접속일 - 시작일
$login_to			= $_POST['login_to'];			//접속일 - 종료일
$login_ip			= $_POST['login_ip'];			//접속IP

$min_login_cnt		= $_POST['min_login_cnt'];		//로그인 횟수 - 최소값
$max_login_cnt		= $_POST['max_login_cnt'];		//로그인 횟수 - 최대값

$receive_sms_flg	= $_POST['receive_sms_flg'];	//SMS 수신 확인
$receive_push_flg	= $_POST['receive_push_flg'];	//푸쉬 수신 확인
$receive_email_flg	= $_POST['receive_email_flg'];	//메일 수신 확인

$region				= $_POST['region'];				//지역

$min_mileage		= $_POST['min_mileage'];		//마일리지 - 최소값
$max_mileage		= $_POST['max_mileage'];		//마일리지 - 최대값

$rows = $_POST['rows'];
$page = $_POST['page'];

$sort_type = $_POST['sort_type'];				//정렬타입
$sort_value = $_POST['sort_value'];				//정렬 기준값

/** 검색 조건 **/
$where = '1=1';
$where_cnt = $where;

//검색 유형 - 이름, 아이디, 이메일, 전화번호, 휴대폰번호
if ($search_type != null) {
	if ($search_keyword != null) {
		switch ($search_type) {
			case 'member_id':
				$where .= ' AND (MB.MEMBER_ID LIKE "%'.$search_keyword.'%") ';
			break;
			
			case 'member_name':
				$where .= ' AND (MB.MEMBER_NAMENAME LIKE "%'.$search_keyword.'%") ';
			break;
			
			case 'tel_mobile':
				$where .= ' AND (MB.TEL_MOBILE LIKE "%'.$search_keyword.'%") ';
			break;
			
			case 'member_addr':
				$where .= ' AND (MB.TEL_MOBILE LIKE "%'.$search_keyword.'%") ';
			break;
		}
	} else {
		if ($search_date != null) {
			switch ($search_date) {
				case "today" :
					$where .= ' AND (MB.SLEEP_DATE = CURDATE()) ';
					break;
				
				case "01d" :
					$where .= ' AND (MB.SLEEP_DATE = (CURDATE() - INTERVAL 1 DAY)) ';
					break;
				
				case "03d" :
					$where .= ' AND (MB.SLEEP_DATE >= (CURDATE() - INTERVAL 3 DAY)) ';
					break;
				
				case "07d" :
					$where .= ' AND (MB.SLEEP_DATE >= (CURDATE() - INTERVAL 7 DAY)) ';
					break;
				
				case "15d" :
					$where .= ' AND (MB.SLEEP_DATE >= (CURDATE() - INTERVAL 15 DAY)) ';
					break;
				
				case "01m" :
					$where .= ' AND (MB.SLEEP_DATE >= (CURDATE() - INTERVAL 1 MONTH)) ';
					break;
				
				case "03m" :
					$where .= ' AND (MB.SLEEP_DATE >= (CURDATE() - INTERVAL 3 MONTH)) ';
					break;
			}
		} else if ($sleep_from != null && $sleep_to != null) {
			$where .= " AND (MB.SLEEP_DATE BETWEEN '".$sleep_from."' AND '".$sleep_to."') ";
		}
	}
}

//멤버 레벨
if ($member_level != null && $member_level != 'ALL') {
	$where .= " AND (MB.LEVEL_IDX = ".$member_level.") ";
}

//가입일/생일
if ($day_type != null && ($day_from != null || $day_to != null)) {
	if ($daty_from =! null && $day_to == null) {
		$where .= " AND (MB.".$day_type." >= '".$day_from."') ";
	} else if ($daty_from == null && $day_to != null) {
		$where .= " AND (MB.".$day_type." <= '".$day_to."') ";
	} else if ($daty_from != null && $day_to != null) {
		$where .= " AND (MB.".$day_type." BETWEEN '".$day_from."' AND '".$day_to."') ";
	}
}

//나이
if ($min_age != null || $max_age != null) {
	if ($min_age != null && $max_age == null) {
		$where .= ' AND (ROUND((TO_DAYS(NOW()) - (TO_DAYS(MB.MEMBER_BIRTH))) / 365) >= '.$min_age.') ';
	} else if ($min_age == null && $max_age != null) {
		$where .= ' AND (ROUND((TO_DAYS(NOW()) - (TO_DAYS(MB.MEMBER_BIRTH))) / 365) <= '.$max_age.') ';
	} else if ($min_age != null && $max_age != null) {
		$where .= ' AND (ROUND((TO_DAYS(NOW()) - (TO_DAYS(MB.MEMBER_BIRTH))) / 365) BETWEEN '.$min_age.' AND '.$max_age.') ';
	}
}

//성별
if ($member_gender != null && $member_gender != 'ALL') {
	$where .= " AND (MB.MEMBER_GENDER = '".$member_gender."') ";
}

//접속일
if ($login_from != null && $login_to != null) {
	$where .= " AND (MB.LOGIN_DATE BETWEEN '".$login_from."' AND '".$login_to."') ";
}

//접속IP
if ($login_ip != null) {
	$where .= " AND (MB.IP LIKE '%".$login_ip."%') ";
}

//SMS 수신 확인
if ($receive_sms_flg != null && $receive_sms_flg != 'ALL') {
	$where .= " AND(MB.RECEIVE_SMS_FLG = ".$receive_sms_flg.") ";
}

//푸쉬 수신 확인
if ($receive_push_flg != null && $receive_push_flg != 'ALL') {
	$where .= " AND (MB.RECEIVE_EMAIL_FLG = ".$receive_push_flg.") ";
}

//메일 수신 확인
if ($receive_email_flg != null && $receive_email_flg != 'ALL') {
	$where .= " AND (MB.RECEIVE_EMAIL_FLG = ".$receive_email_flg.") ";
}

//지역
if ($region != null && $region != 'ALL') {
	$where .= "
		AND (
			MB.LOT_ADDR LIKE '%".$region."%' OR
			MB.ROAD_ADDR LIKE '%".$region."%'
		)
	";
}

//마일리지 타입
if ($min_mileage != null || $max_mileage != null) {
	if ($min_mileage != null && $max_mileage == null) {
		$where .= " AND (MB.MILEAGE >= ".$min_mileage.") ";
	} else if ($min_mileage == null && $max_mileage != null) {
		$where .= " AND (MB.MILEAGE >= ".$max_mileage.") ";
	} else if ($min_mileage != null && $max_mileage != null) {
		$where .= " AND (MB.MILEAGE BETWEEN ".$min_mileage." AND ".$max_mileage.") ";
	}
}

/** 정렬 조건 **/
$order = '';
if ($sort_value != null && $sort_type != null) {
	$order = ' '.$sort_value." ".$sort_type." ";
} else {
	$order = ' MB.IDX DESC';
}

$table = "
	MEMBER_".$country." MB
	LEFT JOIN MEMBER_LEVEL LV ON
	MB.LEVEL_IDX = LV.IDX
";

$total_cnt = $db->count($table,$where_cnt);
$json_result = array(
	'total' => $db->count($table,$where),
	'page' => intval($page)
);

$limit_start = (intval($page)-1)*$rows;

//검색항목
$select_member_sql = "
	SELECT
		MB.IDX					AS MEMBER_IDX,
		DATE_FORMAT(
			MB.JOIN_DATE,
			'%Y-%m-%d %H:%i'
		)						AS JOIN_DATE,
		MB.MEMBER_NAME			AS MEMBER_NAME,
		MB.MEMBER_ID			AS MEMBER_ID,
		LV.TITLE				AS MEMBER_LEVEL,
		MB.MEMBER_STATUS		AS MEMBER_STATUS,
		MB.TEL_MOBILE			AS TEL_MOBILE,
		CASE
			WHEN
				MB.MEMBER_GENDER = 'F'
				THEN
					'여자'
			WHEN
				MB.MEMBER_GENDER = 'M'
				THEN
					'남자'
			ELSE
				'-'
		END						AS MEMBER_GENDER,
		ROUND(
			(
				TO_DAYS(NOW()) - (
					TO_DAYS(MB.MEMBER_BIRTH)
				)
			) / 365
		)						AS AGE,
		MB.ROAD_ADDR			AS ROAD_ADDR,
		MB.LOT_ADDR				AS LOT_ADDR,
		MB.RECEIVE_SMS_FLG		AS RECEIVE_SMS_FLG,
		MB.RECEIVE_PUSH_FLG		AS RECEIVE_PUSH_FLG,
		MB.RECEIVE_EMAIL_FLG	AS RECEIVE_EMAIL_FLG,
		MB.SUSPICION_FLG		AS SUSPICION_FLG
	FROM
		".$table."
	WHERE
		".$where."
	ORDER BY
		".$order."
";

if ($rows != null && $select_idx_flg == null) {
	$select_member_sql .= " LIMIT ".$limit_start.",".$rows;
}

$db->query($select_member_sql);

foreach($db->fetch() as $member_data) {
	$member_status = "";
	switch ($member_data['MEMBER_STATUS']) {
		case "NML" :
			if ($member_data['SUSPICION_FLG'] == true) {
				$member_status = "의심";
			} else {
				$member_status = "정상";
			}
			
			break;
		
		case "SLP" :
			$member_status = "휴면";
			break;
		
		case 'BMB':
			$member_status = "불량";
			break;
		
		case "SPC" :
			$member_status = "탈퇴";
			break;
	}
	
	$region = null;
	$road_addr = $member_data['ROAD_ADDR'];
	$lot_addr = $lot_addr['LOT_ADDR'];
	
	$tmp_addr = array();
	if (!empty($road_addr) && $road_addr != null) {
		$tmp_addr = explode(" ",$road_addr);
	} else if (!empty($lot_addr) && $lot_addr != null) {
		$tmp_addr = explode(" ",$lot_addr);
	} else {
		$region = "주소 미입력";
	}
	
	$region = $tmp_addr[0];
	
	$json_result['data'][] = array(
		'num'					=>$total_cnt--,
		'member_idx'			=>$member_data['MEMBER_IDX'],
		'join_date'				=>$member_data['JOIN_DATE'],
		'member_name'			=>$member_data['MEMBER_NAME'],
		'member_id'				=>$member_data['MEMBER_ID'],
		'member_level'			=>$member_data['MEMBER_LEVEL'],
		'member_status'			=>$member_status,
		'tel_mobile'			=>$member_data['TEL_MOBILE'],
		'member_gender'			=>$member_data['MEMBER_GENDER'],
		'age'					=>$member_data['AGE'],
		'region'				=>$region,
		'receive_sms_flg'		=>$member_data['RECEIVE_SMS_FLG'],
		'receive_push_flg'		=>$member_data['RECEIVE_PUSH_FLG'],
		'receive_email_flg'		=>$member_data['RECEIVE_EMAIL_FLG']
	);
}
?>