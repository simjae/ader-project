<?php
/*
 +=============================================================================
 | 
 | 마이페이지 회원정보 - 마케팅 정보 수정
 | -------
 |
 | 최초 작성	: 윤재은
 | 최초 작성일	: 2023.01.13
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

$member_idx = 0;
if (isset($_SESSION['MEMBER_IDX'])) {
	$member_idx = $_SESSION['MEMBER_IDX'];
}

$country = null;
if (isset($_SESSION['COUNTRY'])) {
	$country = $_SESSION['COUNTRY'];
}

if ($country == null || $member_idx == 0) {
	$json_result['code'] = 401;
	$json_result['msg'] = "로그인 정보가 없습니다";
	exit;
}

$receive_tel_flg	= $_POST['receive_tel_flg'];
$receive_sms_flg	= $_POST['receive_sms_flg'];
$receive_email_flg	= $_POST['receive_email_flg'];

$receive_tel_date_sql = "";
if ($receive_tel_flg == true) {
	$receive_tel_date_sql = "
		RECEIVE_TEL_DATE = NOW(),
	";
}

$receive_sms_date_sql = "";
if ($receive_sms_flg == true) {
	$receive_sms_date_sql = "
		RECEIVE_SMS_DATE = NOW(),
	";
}

$receive_email_date_sql = "";
if ($receive_email_flg == true) {
	$receive_email_date_sql = "
		,RECEIVE_EMAIL_DATE = NOW()
	";
}

$accept_marketing_flg_sql = "";
if ($receive_tel_flg == 'true' || $receive_sms_flg == 'true' || $receive_email_flg == 'true') {
	$accept_marketing_flg_sql = "
		,ACCEPT_MARKETING_FLG = TRUE
	";
}
if($receive_tel_flg == 'false' && $receive_sms_flg == 'false' && $receive_email_flg == 'false') {
  $accept_marketing_flg_sql = "
		,ACCEPT_MARKETING_FLG = FALSE
	";
}

if ($country != null && $member_idx > 0) {
	$update_marketing_sql = "
		UPDATE
			MEMBER_".$country."
		SET
			RECEIVE_TEL_FLG = ".$receive_tel_flg.",
			".$receive_tel_date_sql."
			RECEIVE_SMS_FLG = ".$receive_sms_flg.",
			".$receive_sms_date_sql."
			RECEIVE_EMAIL_FLG = ".$receive_email_flg."
			".$receive_email_date_sql."
			".$accept_marketing_flg_sql."
		WHERE
			IDX = ".$member_idx."
	";

	$db->query($update_marketing_sql);
}
?>