<?php
/*
 +=============================================================================
 | 
 | WKLA 삭제
 | -------
 |
 | 최초 작성	: 박성혁
 | 최초 작성일	: 2022.11.11
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/
$sel_idx        = $_POST['sel_idx'];
$wkla_name      = $_POST['wkla_name'];
$wkla_memo      = $_POST['wkla_memo'];

$line_cnt = $db->count('dev.WKLA_INFO', ' WKLA_NAME = "'.$wkla_name.'" AND IDX != '.$sel_idx.' ');
if($line_cnt == 0){
    $sql = 	'
        UPDATE
            dev.WKLA_INFO
        SET
            WKLA_NAME   = "'.$wkla_name.'",
            MEMO  = "'.$wkla_memo.'"
        WHERE 
            IDX = '.$sel_idx.'
    ';
    $db->query($sql);
}
else{
    $json_result['code'] = 300;
    $json_result['msg'] = '이미 동일 이름의 WKLA가 있습니다.';
    return $json_result;
}


?>