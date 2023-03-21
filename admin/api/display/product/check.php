<?php
/*
 +=============================================================================
 | 
 | 상품 진열 페이지 - 게시물 작성 체크
 | -----------
 |
 | 최초 작성	:  손성환
 | 최초 작성일	: 2023.02.07
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

$page_title			= $_POST['page_title'];
$page_title			= str_replace("'","\'",$page_title);

$page_cnt = $db->count("PAGE_PRODUCT","PAGE_TITLE = '".$page_title."' AND DEL_FLG = FALSE");

if ($page_cnt > 0) {
	$json_result['code'] = 301;
	$json_result['msg'] = "동일한 페이지명의 진열 페이지를 등록할 수 없습니다. 페이지명을 변경해주세요.";
} else {
	$json_result['code'] = 200;
	$json_result['msg'] = "등록 가능한 페이지명입니다.";
}


?>